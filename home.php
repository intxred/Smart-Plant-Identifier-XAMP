<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🌿 Plant Identifier</title>
  <link rel="stylesheet" href="style.css">
 
<body>

  <nav class="navbar">
  <h1>🌿 Plant Identifier</h1>
  <div class="nav-links">
    <a href="home.php">Home</a>
    <a href="login.php">Login</a>
    <a href="register.php">Create Account</a>
  </div>
</nav>


  <section class="home-hero">
    <div class="home-text">
      <h2>Discover </h2>
      <p>
        With just one photo, this app helps you identify any plant and learn how to take care of it. 
        Whether you're a gardening pro or a beginner, our system gives you everything you need 
        to become a confident plant parent.
      </p>
      <p>
        Create an account to get started — upload a plant photo and receive its name and care tips instantly.
      </p>
      <div class="cta-buttons">
        <a href="login.php">Login</a>
        <a href="register.php">Create Account</a>
      </div>
    </div>

    <div class="home-image">
      <img src="plant.jpg_large" alt="Plant identifier intro">
    </div>
  </section>

</body>
</html>
