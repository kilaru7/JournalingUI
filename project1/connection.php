<!doctype html>

<html lang="en">
<head>
<meta charset="utf=8">
<link rel="stylesheet" href="toc.css">
<title>Nectar</title>
</head>

<body>

<?php

if(!isset($_SESSION)){
 session_start();
}

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

</body>

</html>