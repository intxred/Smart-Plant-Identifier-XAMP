<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🌿 Plant Identifier</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #eafae1;
      background-image: url('https://www.transparenttextures.com/patterns/green-dust-and-scratches.png');
      background-repeat: repeat;
      color: #333;
      min-height: 100vh;
      margin: 0;
    }

    .navbar {
      background-color: #3a6b35;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar h1 {
      font-size: 1.5rem;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: bold;
    }

    .nav-links a:hover {
      text-decoration: underline;
    }

    .home-hero {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      padding: 60px 20px;
      max-width: 1200px;
      margin: 40px auto;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 100, 0, 0.1);
    }

    .home-text {
      flex: 1;
      min-width: 300px;
      padding: 20px;
    }

    .home-text h2 {
      font-size: 2.5rem;
      color: #2d4739;
      margin-bottom: 20px;
    }

    .home-text p {
      font-size: 1.1rem;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .home-image {
      flex: 1;
      min-width: 280px;
      padding: 20px;
      text-align: center;
    }

    .home-image img {
      max-width: 100%;
      height: auto;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .cta-buttons {
      margin-top: 30px;
    }

    .cta-buttons a {
      display: inline-block;
      background-color: #4CAF50;
      color: white;
      padding: 12px 25px;
      margin: 10px 10px 0 0;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .cta-buttons a:hover {
      background-color: #388e3c;
    }

    @media (max-width: 768px) {
      .home-hero {
        flex-direction: column;
      }

      .home-text, .home-image {
        text-align: center;
      }
    }
  </style>
</head>
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
