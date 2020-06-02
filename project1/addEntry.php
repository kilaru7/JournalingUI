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
	$i = $_POST['i'];
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$body = mysqli_real_escape_string($conn,$_POST['articleArea']);
	$sql = "INSERT INTO posts (title,body) VALUES ('$title','$body')";
	$result=mysqli_query($conn,$sql);
	$last_id = $conn->insert_id;
	header("Location: page.php?id={$last_id}&count={$i}&i={$i}");
}
?>

</body>

</html>