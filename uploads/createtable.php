<?php
	require_once('config.php');
    // Table ceration file code goes here
	
	$sql = "CREATE TABLE file(
				id INT AUTO_INCREMENT PRIMARY KEY,
				file_name VARCHAR(50) NOT NULL,
				file_path VARCHAR(200) NOT NULL,
				upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
				);";
				
	if($conn->query($sql)){
		echo "Table file created successfully";
	}
	else{
		echo "Error creating table: " . $conn->error;
	}
?>