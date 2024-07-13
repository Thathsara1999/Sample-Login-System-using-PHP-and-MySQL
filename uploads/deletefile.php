<?php
    //file deletion code goes here
	include("config.php");
	
	$file = null; //Initialize $file
	
	//get the specific file details for the delete operation
	if(isset($_GET['id'])){
		$file_id = $_GET['id'];
		$sql = "SELECT * FROM file WHERE id=$file_id;";
		$result = mysqli_query($conn, $sql);
		$file = mysqli_fetch_assoc($result);
	}
	
	//check if the delete form is submitted
	if(isset($_POST['delete'])){
		$delete_id = $_POST['delete_id'];
		$delete_sql = "DELETE FROM file WHERE id=$delete_id;";
		if(mysqli_query($conn, $delete_sql)){
			//file is deleted successfully
			header("Location: viewfiles.php");
		}
		else{
			//error deleting file
			echo "Error deleting file: " . mysqli_error($conn);
		}
	}
	else{
		//display confirmation message
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

                .confirmation-message {
                    background-color: #fff;
                    padding: 30px;
                    border-radius: 8px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    width: 100%;
                    max-width: 600px;
                    box-sizing: border-box;
                    text-align: center;
                }

                p {
                    margin: 0;
                    margin-bottom: 20px;
                    line-height: 1.5;
                }

                .button-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                button {
                    padding: 10px 20px;
                    margin-right: 10px;
                    background-color: #e74c3c;
                    color: #fff;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }

                button:hover {
                    background-color: #c0392b;
                }

                a {
                    text-decoration: none;
                    color: #3498db;
                    transition: color 0.3s;
                }

                a:hover {
                    color: #217dbb;
                }
            </style>
        </head>
        <body>
            <h2>Delete File Confirmation</h2>
            <?php
                // necessary code goes here
				if($file){
					echo "<p>Are you sure you want to delete the file '{$file['file_name']}'?</p>";
					echo "<form action='deletefile.php' method='post'>";
					echo "<input type='hidden' name='delete_id' value='{$file['id']}'>";
					echo "<button type='submit' name='delete'>Yes, Delete</button>";
					echo "</form>";
					echo "<p><a href='filedetails.php?id={$file['id']}'>Cancel</a></P>";
				}
				else{
					echo "File not found.";
				}
            ?>
        </body>
        </html>
<?php
    }
?>
