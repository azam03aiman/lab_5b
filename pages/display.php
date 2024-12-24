<?php include '../includes/header.php'; ?>


<!doctype html>
<html lang="en">

<style>
    body{
        background-image:url("../background/bg2.png");
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="form-container" style="width:800px;">
    <h2 style="color:green;">User List</h2>
    <table>
        <thead style="background-color: #00ab41; color:white;">
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/Database.php';
            include '../includes/User.php';

            $database = new Database();
            $db = $database->getConnection();

            if (!$db) {
                echo "<tr><td colspan='4'>Database connection failed</td></tr>";
                exit();
            }

            $user = new User($db);
            $result = $user->getUsers();

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['Matric']) . "</td>
                            <td>" . htmlspecialchars($row['Name']) . "</td>
                            <td>" . htmlspecialchars($row['Role']) . "</td>
                            <td>
                                <a href='../pages/update_form.php?Matric=" . $row['Matric'] . "' class='btn btn-warning'>Update</a>
                                <a href='../actions/delete.php?Matric=" . $row['Matric'] . "' onclick='return confirm(\"Are you sure?\")' class='btn btn-danger'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Users Found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Login Button -->
    <a href="../actions/logout.php" class="login-btn btn btn-primary" style="display: flex; justify-content: center; align-items: center; text-align: center;">Logout</a>
</div>

</body>
</html>
