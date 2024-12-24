<?php
session_start();
include '../includes/Database.php';
include '../includes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    $Matric = $_POST['Matric'];
    $Password = $_POST['Password'];

    $userDetails = $user->getUser($Matric);
    if ($userDetails && password_verify($Password, $userDetails['Password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['Matric'] = $userDetails['Matric'];
        $_SESSION['Role'] = $userDetails['Role'];
        header("Location: ../pages/display.php");
        exit();
    } else {
        ?>

        <style>
            body{
                background-image: url(../background/bg1.png);
            }
        </style>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Login Failed</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <div style="background-color: white; display: flex; justify-content: center; align-items: center; text-align: center; margin-top:300px; padding-top:25px; margin-left:350px; margin-right:350px; padding-bottom:25px;">
                <b><p>Invalid matric number or password. Please try again.</P><b>
                <a class="btn btn-success" href="../pages/login_form.php">Okay</a>
            </div>
        </body>
        </html>

        <?php
    }
}
?>
