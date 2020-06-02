<!doctype html>

<html lang="en">
<head>
<meta charset="utf=8">
<?php include('connection.php'); ?>
</head>

<body>

<?php
global $conn;
mysqli_select_db($conn,"mydb");

if(isset($_POST['save']))
{
	$id = $_POST['postId'];
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$body = mysqli_real_escape_string($conn,$_POST['articleArea']);
	$sql = "UPDATE posts SET title='$title',body='$body' WHERE Sno='$id'";
	$result=mysqli_query($conn,$sql);
}
?>

</body>

</html>