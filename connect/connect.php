<?php
  
//connect to db 
$conn = new mysqli("localhost","root","","sql");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>