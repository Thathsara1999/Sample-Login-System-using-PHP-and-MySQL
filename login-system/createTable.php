<?php
require_once ('config.php');

$sql = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        upassword VARCHAR(255) NOT NULL,
        uemail VARCHAR(100) NOT NULL
);";

$result = $conn->query($sql);

if ($result){ 
        echo "Table Created Successfully.!" . "<br>";
}


?>