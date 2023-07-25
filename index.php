<?php
session_start();

function sendNewsletterSignup()
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["userName"]) || empty($_POST["email"])) {
      $_SESSION['error'] = "Both name and email must be filled out.";
    } else {
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
      } else {
        $name = htmlspecialchars($_POST["userName"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $agreement = isset($_POST["agreement"]) ? true : false;
        $to = 'perfectcheesehead@gmail.com';
        $subject = 'New Artful Brewing newsletter signup';
        $message = "Name: " . $name . "\n Email: " . $email . "\n Agreement: " . ($agreement ? 'Agreed' : 'Not agreed');

        if (mail($to, $subject, $message)) {
          $_SESSION['success'] = "Your information was received. Please follow our socials as well to stay up to date until the website is up!";
        }
      }
    }

    header('Location: index.php');
    exit();
  }
}

sendNewsletterSignup();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Artful Brewing Company</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://artfulbrewing.com/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">

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
        <script>
          <?php
          if (isset($_SESSION['success'])) {
            echo "console.log('Success message is set in session: " . htmlspecialchars($_SESSION['success']) . "');";
          } else {
            echo "console.log('Success message is NOT set in session');";
          }

          if (isset($_SESSION['error'])) {
            echo "console.log('Error message is set in session: " . htmlspecialchars($_SESSION['error']) . "');";
          } else {
            echo "console.log('Error message is NOT set in session');";
          }
          ?>
        </script>

        <form action="index.php" method="post" name="emailContact">
          <h1>COMING SOON!</h1>
          <h2>Sign up to receive updates</h2>
          <input type="text" name="userName" id="name" placeholder="Name" required />
          <input type="email" name="email" id="emailInput" size="30" placeholder="name@example.com" required />
          <div>
            <input type="checkbox" id="agree" name="agreement" value="Boat" required />
            <label for="agreement">
              I agree to receiving marketing and promotional materials</label>
          </div>
          <button type="submit">Subscribe</button>
          <div class="social-media">
            <a href="https://www.kickstarter.com/projects/artfulbrewing/artful-brewing-company-life-is-art-enjoy-every-sip"><img src="https://artfulbrewing.com/images/kickstarter.png" alt="kickstarter social media icon svg"></a>
            <a href="https://instagram.com/artfulbrewing?igshid=MzNlNGNkZWQ4Mg=="><img src="https://artfulbrewing.com/images/square-instagram.png" alt="instagram social media icon svg"></a>
            <a href="https://www.facebook.com/profile.php?id=100093160657474&mibextid=ZbWKwL"><img src="https://artfulbrewing.com//images/facebook.png" alt="facebook social media icon svg"></a>
          </div>
        </form>
      </div>
    </main>

    <footer>
      <p>&copy; <?php echo date('Y'); ?> Artful Brewing Company</p>
    </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      <?php if (isset($_SESSION['success'])) : ?>
        Swal.fire(
          'Cheers! 🍻',
          '<?php echo htmlspecialchars($_SESSION['success']); ?>',
          'success'
        );
      <?php unset($_SESSION['success']);
      endif; ?>

      <?php if (isset($_SESSION['error'])) : ?>
        Swal.fire(
          'Oops...',
          '<?php echo htmlspecialchars($_SESSION['error']); ?>',
          'error'
        );
      <?php unset($_SESSION['error']);
      endif; ?>
    });
  </script>
</body>

</html>
