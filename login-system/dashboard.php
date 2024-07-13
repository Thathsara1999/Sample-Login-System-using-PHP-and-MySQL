<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
}

$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to Your Dashboard</h1>
    <p>User ID: <?php echo $user_id; ?></p>
    <p>User Name: <?php echo $user_name; ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
