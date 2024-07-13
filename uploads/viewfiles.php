<?php
    // necessary code goes here
	include("config.php");
	session_start();
	
	$sql = "SELECT * from file";
	$result = mysqli_query($conn, $sql);
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
        padding: 20px; /* Add padding to the body */
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    li {
        background-color: #fff;
        padding: 10px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        transition: box-shadow 0.3s;
    }

    li:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    a {
        text-decoration: none;
        color: #3498db;
    }

    a:hover {
        text-decoration: underline;
    }
    
    .upload-files {
        text-align: center;
    }

    .upload-files a {
        color: #3498db;
        text-decoration: none;
    }

    .upload-files a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <h2>File List</h2>
	<?php
		// necessary code goes here
		if(isset($_SESSION['success'])){
			echo "<p class='success'>" . $_SESSION['success']. "</p>";
			unset($_SESSION['success']);
		}
       ?>
    <ul>
        <?php
			
			while($row = mysqli_fetch_assoc($result)){
				echo "<li><a href='filedetails.php?id={$row['id']}'>{$row['file_name']}</a></p>";
			}
		
		?>
    </ul>
    <div class="upload-files">
        <!-- upload new file link code -->
		<a href="index.php">Upload New Files</a>
    </div>
</body>
</html>