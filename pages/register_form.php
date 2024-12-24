<?php include '../includes/header.php'; ?>

<!doctype html>

<style>
    body{
        background-image:url("../background/bg4.png");
    }
</style>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="form-container">
    <h2 style="color: green">Register</h2>
    <form action="../actions/insert.php" method="post">
        <label for="Matric">Matric:</label>
        <input type="text" name="Matric" id="Matric" required>
        <label for="name">Name:</label>
        <input type="text" name="Name" id="Name" required>
        <label for="Password">Password:</label>
        <input type="Password" name="Password" id="Password" required>
        <label for="Role">Role:</label>
        <select name="Role" id="Role" required>
            <option value="lecturer">Lecturer</option>
            <option value="student">Student</option>
        </select>
        <input style="background-color: green; color: white;" type="submit" class="btn btn-success" value="Register">
    </form>
</div>
</body>
</html>
