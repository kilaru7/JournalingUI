<!doctype html>

<html lang="en">
<head>
<meta charset="utf=8">
<link rel="stylesheet" href="cover.css">
<title>Nectar</title>
</head>
<body>
<?php
if(isset($_POST['submit']))
{
	$pass = $_POST['passcode'];
	if($pass == "coco")
	{
	header("Location: toc.php");
	}
	else
	{
		echo "<p class='incorrect'>Incorrect password</p>";
	}
}
?>
<div>
<img src="book.svg" id="book_cover">
<div id="book_title" >Way Too Opinionated</div>

<form name = "password" method="POST" action="<?php echo 'cover.php'; ?>">
<input name = "passcode" type="text" id = "passwordbox"></input>
<input name="submit" type="submit" value="Enter" id="submit"></input>
 </form>
</div>
</body>
</html>
