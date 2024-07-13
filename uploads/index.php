<?php
	
	session_start();


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
            background-color: #f7f7f7;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Added margin to separate from the link */
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .view-files {
            text-align: center;
        }

        .view-files a {
            color: #3498db;
            text-decoration: none;
        }

        .view-files a:hover {
            text-decoration: underline;
        }
		
		.error{
			color: red;
		}
    </style>
</head>
<body>
    <div class="container">
        <h2>File Upload Form</h2>
		
		<?php
			
			if(isset($_SESSION['sqlerror'])){
				echo "<p class='error'><b>".$_SESSION['sqlerror']. "</b></p>";
				unset($_SESSION['sqlerror']);
			}
			if(isset($_SESSION['fileformaterror'])){
				echo "<p class='error'><b>".$_SESSION['fileformaterror']. "</b></p>";
				unset($_SESSION['fileformaterror']);
			}
			if(isset($_SESSION['fileexistserror'])){
				echo "<p class='error'><b>".$_SESSION['fileexistserror']. "</b></p>";
				unset($_SESSION['fileexistserror']);
			}
		
		
		?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <!-- File upload form code -->
			Choose File:
			<input type="file" name="file">
			<button type="submit" name="submit">Upload</button>
        </form>
        <div class="view-files">
            <!-- view file link code -->
			<a href="viewfiles.php">view files</a>
        </div>
    </div>
</body>
</html>
