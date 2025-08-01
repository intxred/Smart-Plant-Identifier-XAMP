<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$imagePath = "";
$plantName = "";
$careGuide = "";
$api_key = "EiogKKwVvc37XEl57Vc63cx0nTQdoQc6eUIHqKH1h7SvZHs6tJ";

if (isset($_POST['upload']) && isset($_FILES['plant_image'])) {
    $targetDir = "uploads/";
    $imagePath = $targetDir . basename($_FILES['plant_image']['name']);

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    move_uploaded_file($_FILES['plant_image']['tmp_name'], $imagePath);
    $imageData = base64_encode(file_get_contents($imagePath));

    $payload = json_encode([
        "images" => [$imageData],
        "modifiers" => ["crops_fast", "similar_images"],
        "plant_language" => "en",
        "plant_details" => ["common_names", "wiki_description", "care_guides"]
    ]);

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.plant.id/v2/identify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Api-Key: $api_key"
        ],
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $result = json_decode($response, true);

    if (isset($result['suggestions'][0])) {
        $plantName = $result['suggestions'][0]['plant_name'] ?? "Unknown";
        $careGuide = $result['suggestions'][0]['plant_details']['wiki_description']['value'] ?? "No care guide found.";
    } else {
        $plantName = "Not recognized";
        $careGuide = "Try uploading a clearer photo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Identify Plant</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<nav class="navbar">
    <h1>Plant Identifier</h1>
    <div class="nav-links">
        <a href="about.php">About app</a>
        <a href="faq.php">FAQ</a>
        <a href="identify.php">Identify</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<?php if (!isset($_POST['upload'])): ?>
<section class="plant-types-section">
    <h2>Common Types of Plants</h2>
    <div class="plant-type-wrapper">
        <button class="scroll-arrow left" onclick="scrollPlantTypes(-1)">&lt;</button>
        <div class="plant-type-scroll" id="plantScroll">
            <?php
            $plants = [
                ["Vegetables", "vegetables.webp", "Edible crops grown for their leaves, roots, or stems."],
                ["Fruits", "fruits.webp", "Seed-bearing fruits, typically sweet or tangy."],
                ["Herbs", "herb.webp", "Aromatic plants used for flavoring or medicine."],
                ["Flowers", "flower.avif", "Ornamental plants with colorful blossoms."],
                ["Succulents", "succulent.bin", "Water-storing plants adapted to dry areas."],
                ["Ferns", "fern.webp", "Non-flowering plants with feathery leaves."],
                ["Trees", "tree.avif", "Woody perennial plants with a trunk."],
                ["Shrubs", "shrub.jpg", "Compact woody plants."],
                ["Cacti", "cacti.jpg", "Spiny desert plants adapted to dry climates."]
            ];
            foreach ($plants as $plant) {
                echo "<div class='plant-type' onclick='showPopup(\"{$plant[0]}\", \"{$plant[2]}\", \"{$plant[1]}\")'>
                        <img src='{$plant[1]}' alt='{$plant[0]}' />
                        <h3>{$plant[0]}</h3>
                        <p>{$plant[2]}</p>
                      </div>";
            }
            ?>
        </div>
        <button class="scroll-arrow right" onclick="scrollPlantTypes(1)">&gt;</button>
    </div>
</section>

<section id="identify" class="result-container elegant-section compact-upload">
    <h2>Identify a Plant</h2>
    <form method="POST" enctype="multipart/form-data" class="upload-form">
        <input type="file" name="plant_image" accept="image/*" required />
        <button type="submit" name="upload">Upload & Identify</button>
    </form>
</section>
<?php endif; ?>

<?php if (!empty($plantName)): ?>
<section class="result-container elegant-section result-gap">
    <div class="result-box">
        <div class="image-container">
            <img src="<?php echo $imagePath; ?>" alt="Uploaded Plant" class="plant-image-preview" />
        </div>
        <div class="info">
            <h3>Plant Name</h3>
            <p><?php echo htmlspecialchars($plantName); ?></p>
            <h3>Care Guide</h3>
            <p><?php echo htmlspecialchars($careGuide); ?></p>
        </div>
    </div>
    <form method="GET" action="identify.php" style="text-align: center; margin-top: 20px;">
        <button type="submit" class="back-button">Go Back</button>
    </form>
</section>
<?php endif; ?>

<button id="toggle-theme" class="theme-toggle" title="Toggle dark mode">🌙</button>

<div id="plantPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <img id="popupPlantImage" src="" alt="Plant Image" style="max-width: 100%; max-height: 200px; object-fit: contain; border-radius: 8px; margin-bottom: 10px;" />
        <h3 id="popupPlantName"></h3>
        <p id="popupPlantDescription"></p>
    </div>
</div>

<script>
  const toggle = document.getElementById("toggle-theme");
  toggle.onclick = () => {
    document.body.classList.toggle("dark-mode");
    toggle.textContent = document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
  };

  function scrollPlantTypes(direction) {
    const scrollBox = document.getElementById('plantScroll');
    const cardWidth = scrollBox.querySelector('.plant-type').offsetWidth + 16;
    scrollBox.scrollBy({ left: direction * cardWidth * 1.2, behavior: 'smooth' });
  }

  function showPopup(plantName, plantDescription, plantImage) {
    document.getElementById("popupPlantName").innerText = plantName;
    document.getElementById("popupPlantDescription").innerText = plantDescription;
    document.getElementById("popupPlantImage").src = plantImage;
    document.getElementById("plantPopup").style.display = "block";
  }

  function closePopup() {
    document.getElementById("plantPopup").style.display = "none";
  }
</script>
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="spinner"></div>
    <p>Identifying plant...</p>
</div>
<script>
  // Existing dark mode and popup scripts...

  document.querySelector(".upload-form").addEventListener("submit", function () {
    document.getElementById("loadingOverlay").style.display = "flex";
  });
</script>

</body>
</html>
