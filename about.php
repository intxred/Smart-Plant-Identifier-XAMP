<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>About - Plant Identifier</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="about.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>

<nav class="navbar">
  <h1>Plant Identifier</h1>
  <div class="nav-links">
    <a href="about.php" class="active">About App</a>
    <a href="faq.php">FAQ</a>
    <a href="identify.php">Identify</a>
    <a href="logout.php">Logout</a>
  </div>
</nav>

<header class="hero-overview left-align">
  <h2>About the Plant Identifier App</h2>
  <p class="lead">
    Helping users recognize and care for plants more effectively through the power of AI and automated care recommendations.
  </p>
</header>

<section class="overview-top">
  <div class="overview-text">
    <h2>Overview</h2>
    <p>
      Plant Identifier is a web-based system that helps users accurately identify plant species using artificial intelligence. With just an image upload, users receive detailed results including common names, care instructions, and environmental needs.
    </p>
  </div>
  <div class="overview-image">
    <img src="green.jpg" alt="App Overview Image" />
  </div>
</section>

<main class="overview-content">

  <section class="section">
    <h3>Purpose</h3>
    <p>
      The Plant Identifier app was developed to support individuals—whether hobbyists, students, or professionals—in accurately identifying plant species through image analysis and receiving instant care instructions.
    </p>
  </section>

  <section class="section">
    <h3>Capabilities</h3>
    <ul>
      <li>AI-powered plant recognition from uploaded images</li>
      <li>Identification of common names and care guides</li>
      <li>Watering, sunlight, and soil condition recommendations</li>
      <li>Simple and fast user interface with support for dark mode</li>
    </ul>
  </section>

  <section class="section">
    <h3>How it Works</h3>
    <p>
      Upload a plant photo → The system encodes and sends it to the Plant.id API → AI matches the species and returns plant name, description, and care tips.
    </p>
  </section>

  <section class="section">
    <h3>Usage Summary</h3>
    <div class="infographic-stats">
      <div class="stat-block">
        <p class="number">1,200+</p>
        <p class="label">Identifications</p>
      </div>
      <div class="stat-block">
        <p class="number">500+</p>
        <p class="label">Care Guides</p>
      </div>
    </div>
  </section>

  <section class="developer-info">
    <h4>About the Developer</h4>
    <p>
      This app was built and maintained by <strong>Tristan Jared</strong> using PHP, JavaScript, and the Plant.id API. It aims to provide an accessible and educational plant care platform. Last updated June 2025.
    </p>
  </section>

</main>

<button id="toggle-theme" class="theme-toggle" title="Toggle dark mode">🌙</button>

<script>
  const toggle = document.getElementById("toggle-theme");
  toggle.onclick = () => {
    document.body.classList.toggle("dark-mode");
    toggle.textContent = document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
  };
</script>

</body>
</html>
