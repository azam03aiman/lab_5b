<?php include '../includes/header.php'; ?>

<!doctype html>
<html lang="en">

<style>
    body{
        background-image:url("../background/bg3.png");
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<div class="form-container">
    <h2>Update User</h2>
    <?php
    include '../includes/Database.php';
    include '../includes/User.php';

    // Get Matric from URL parameters
    $Matric = $_GET['Matric'];

    // Create database connection and fetch user details
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    // Fetch user details by Matric
    $userDetails = $user->getUser($Matric);
    if (!$userDetails) {
        echo "User not found.";
        exit();
    }
    ?>

    <form action="../actions/update.php" method="post">
        <!-- Hidden input for Matric -->
        <input type="hidden" name="Matric" value="<?php echo htmlspecialchars($userDetails['Matric']); ?>">

        <!-- Name field -->
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo htmlspecialchars($userDetails['Name']); ?>" required>

        <!-- Role selection -->
        <label for="Role">Role:</label>
        <select name="Role" required>
            <option value="lecturer" <?php echo $userDetails['Role'] === 'lecturer' ? 'selected' : ''; ?>>Lecturer</option>
            <option value="student" <?php echo $userDetails['Role'] === 'student' ? 'selected' : ''; ?>>Student</option>
        </select>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

</body>
</html>
