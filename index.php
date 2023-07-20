<!-- index.php -->

<?php session_start();
  include 'form-submit.php';
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title></title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <main>
      <div class="image-container">
        <div class="logo">
          <h2>ARTFUL</h2>
          <p>BREWING COMPANY</p>
        </div>
      </div>
      <div class="form-container">
        <?php
          if (isset($_SESSION['error'])) {
              echo '<p>' . $_SESSION['error'] . '</p>';
              unset($_SESSION['error']);
          }
          if (isset($_SESSION['success'])) {
              echo '<p>' . $_SESSION['success'] . '</p>';
              unset($_SESSION['success']);
          }
        ?>

        <form action="form-submit.php" method="post" name="emailContact">
          <h1>COMING SOON!</h1>
          <h2>Sign up to recieve updates</h2>
          <input type="text" name="userName" id="name" placeholder="Name" required />
          <input type="email" name="email" id="emailInput" size="30" placeholder="name@example.com" required />
          <div>
            <input type="checkbox" id="agree" name="agreement" value="Boat" required />
            <label for="agreement">
              I agree to receiving marketing and promotional materials</label>
          </div>
          <button type="submit">Subscribe</button>

        </form>
      </div>
    </main>

    <footer>Copyright 2023 © Artful Brewing Company</footer>
  </div>
  <script src="" async defer></script>
</body>

</html>