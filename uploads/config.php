<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "file_upload_system";

    //configuration code goes here 
	
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	
	if(!$conn){
		die ("Connection failed!" .  $conn->connect_error);
	}
	
	// echo "Successfully connected!";
?>