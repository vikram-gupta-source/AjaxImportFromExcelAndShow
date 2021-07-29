<?php

$conn = mysqli_connect("localhost", "root", "", "creaademo");  
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}

?>