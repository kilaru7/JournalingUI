<!doctype html>

<html lang="en">
<head>
<meta charset="utf=8">
<link rel="stylesheet" href="page.css">
<?php include('connection.php'); ?>
<title>Nectar</title>
</head>

<body>
<?php
global $conn;

mysqli_select_db($conn,"mydb");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sql = "DELETE FROM posts WHERE Sno='$id'";
	$result=mysqli_query($conn,$sql);
	header("Location: toc.php");
}
?>

</body>

</html>