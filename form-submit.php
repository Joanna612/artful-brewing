<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["userName"]) || empty($_POST["email"])) {
        $_SESSION['error'] = "Both name and email must be filled out.";
        header('Location: index.php');
        exit();
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format.";
            header('Location: index.php');
            exit();
        }

        $name = htmlspecialchars($_POST["userName"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $agreement = isset($_POST["agreement"]) ? true : false; 
        $to = 'jbrumfield830@gmail.com.com'; // Make sure this email is correct
        $subject = 'New Artful Brewing newsletter signup';
        $message = "Name: " . $name .
        "\n Email: " . $email .
        "\n Agreement: " . ($agreement ? 'Agreed' : 'Not agreed');

        if(mail($to, $subject, $message)) {
            $_SESSION['success'] = "Your information was received.";
        }

        header('Location: index.php');
        exit();
    }
}
?>