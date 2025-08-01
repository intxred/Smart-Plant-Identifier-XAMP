<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>FAQ - Plant Identifier</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <h1>🌿 Plant Identifier</h1>
  <div class="nav-links">
    <a href="about.php">About app</a>
    <a href="faq.php">FAQ</a> <!-- Added here too -->
    <a href="identify.php">Identify</a>
    <a href="logout.php">Logout</a>

  </div>
</nav>

<main class="faq-container">
  <h2>Frequently Asked Questions</h2>

  <!-- FUNCTIONALITY -->
  <div class="faq-category">
    <h3>Functionality</h3>

    <div class="faq-item">
      <button class="faq-question">How does Plant Identifier work?</button>
      <div class="faq-answer">
        <p>Plant Identifier uses the <strong>Plant.id API</strong>, which applies machine learning to analyze plant features such as leaves, flowers, and structure. The system compares these against a trained dataset to identify plant species with high accuracy. <br><small>Source: <a href="https://web.plant.id/plant-identification-api/" target="_blank">Plant.id API Documentation</a></small></p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">What kind of plants can be identified?</button>
      <div class="faq-answer">
        <p>The app can identify over 30,000 plant species including flowering plants, trees, herbs, and houseplants. It works best with clear, focused images of leaves, stems, or flowers.</p>
      </div>
    </div>
  </div>

  <!-- USAGE -->
  <div class="faq-category">
    <h3>Usage Tips</h3>

    <div class="faq-item">
      <button class="faq-question">What image quality gives the best results?</button>
      <div class="faq-answer">
        <p>Use well-lit, high-resolution images. Avoid blurry or distant photos. The best results come from close-up shots of leaves or flowers taken in natural light.<br><small>Source: <a href="https://web.plant.id/how-to-identify-plant/" target="_blank">Plant.id Guide</a></small></p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">Can I use my mobile phone camera?</button>
      <div class="faq-answer">
        <p>Yes, the system is optimized for mobile use. Make sure to enable autofocus and take steady shots to increase identification accuracy.</p>
      </div>
    </div>
  </div>

  <!-- PRIVACY -->
  <div class="faq-category">
    <h3>Data & Privacy</h3>

    <div class="faq-item">
      <button class="faq-question">Is my data safe?</button>
      <div class="faq-answer">
        <p>Your uploaded images are processed securely and are not publicly shared. Your session data and plant history are stored locally and only accessible to your account. <br><small>Source: <a href="https://web.plant.id/privacy-policy/" target="_blank">Plant.id Privacy Policy</a></small></p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">Will my plant uploads be stored forever?</button>
      <div class="faq-answer">
        <p>No. The plant history is saved under your account temporarily. Admins or users can clear history if needed.</p>
      </div>
    </div>
  </div>

  <!-- COST -->
  <div class="faq-category">
    <h3>Pricing & Access</h3>

    <div class="faq-item">
      <button class="faq-question">Is Plant Identifier free?</button>
      <div class="faq-answer">
        <p>Yes. The web application is completely free for personal, academic, and non-commercial use. The API tier used may have limitations, but no charges are passed to users.</p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">Are there premium features?</button>
      <div class="faq-answer">
        <p>Currently, the app uses a free-tier API key. In the future, premium features like advanced care tracking, offline mode, or database export may be added based on user demand.</p>
      </div>
    </div>

  </div>
</main>

<script>
  const questions = document.querySelectorAll('.faq-question');
  questions.forEach(q => {
    q.addEventListener('click', () => {
      q.classList.toggle('active');
      const answer = q.nextElementSibling;
      answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
    });
  });
</script>

</body>
</html>
