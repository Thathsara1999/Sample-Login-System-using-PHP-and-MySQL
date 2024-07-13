<?php
    // file upload code goes here
	
	include("config.php");
	
	session_start();
	
	if(isset($_POST["submit"])){
		$file_name = $_FILES["file"]["name"];
		$file_tmp = $_FILES["file"]["tmp_name"];
		$file_type = $_FILES["file"]["type"];
		$file_path = "uploads/" . $file_name;
		
		$accepted_format = array("pdf" => "application/pdf");
		
		if(!file_exists($file_path)){
			//file supportive format
			if(in_array($file_type, $accepted_format)){
				move_uploaded_file($file_tmp, $file_path);
				
				$sql = "INSERT INTO file(file_name, file_path) VALUES('$file_name', '$file_path');";
				
				if(mysqli_query($conn, $sql)){
					$_SESSION["success"] = "File uploaded successfully.";
					header("Location: viewfiles.php");
				}
				else{
					$_SESSION["sqlerror"] = "Unable to upload the file.";
					header("Location: index.php");
				}
			}
			else{
				$_SESSION["fileformaterror"] = "File format is not supported";
				header("Location: index.php");
			}
		}
		else{
			$_SESSION["fileexistserror"] = "File already exists.!";
			header("Location: index.php");
		}
	}
	
	mysqli_close();
?>