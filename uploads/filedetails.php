<?php
    // necessary code goes here
	include("config.php");
	if(isset($_GET['id'])){
		$file_id = $_GET['id'];
		$sql = "SELECT * FROM file WHERE id = $file_id";
		$result = mysqli_query($conn, $sql);
		$file = mysqli_fetch_assoc($result);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .file-details {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }

        p {
            margin: 0;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        strong {
            color: #3498db;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #217dbb;
        }

        .delete-link {
            color: #e74c3c; /* Red color for delete link */
        }

        .delete-link:hover {
            text-decoration: underline;
        }

        .back-link {
            margin-top: 20px;
            text-align: center;
        }

        .back-link a {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-link a:hover {
            background-color: #217dbb;
        }
    </style>
</head>
<body>
    <h2>File Details</h2>
    <?php
		// necessary code goes here
		if($file){
			echo "<p>File Name: {$file['file_name']}</p>";
			echo "<p>File Path: {$file['file_path']}</p>";
			echo "<p>Upload Date: {$file['upload_date']}</p>";
			echo "<p><a href='deletefile.php?id={$file['id']}'>Delete File</a></p>";
		}
		else{
			echo "File not found";
		}
    ?>
    <p><a href="viewfiles.php">Back to File List</a></p>
</body>
</html>