<!doctype html>

<html lang="en">
<head>
<meta charset="utf=8">

<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { 
nicEditors.allTextAreas()
});
</script>

<link rel="stylesheet" href="page.css">
<script type="text/javascript" src="wordCount.js"></script>
<?php include('connection.php'); ?>
<?php include('updateEntry.php'); ?>

<title>Nectar</title>
</head>

<body onload="myFunction()">
<?php
global $conn;

mysqli_select_db($conn,"mydb");

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$count = $_GET['count'];
	$i = $_GET['i'];
}

if(isset($_POST['save']))
{
	$id = $_POST['postId'];
	$count = $_POST['countId'];
	$i = $_POST['i'];
}

$sql = "SELECT * FROM posts WHERE Sno='$id'";
$result=mysqli_query($conn,$sql);
$post = mysqli_fetch_assoc($result);

if(isset($post["updated_at"]))
{
$date = date('Y-m-d', strtotime($post["updated_at"]));
$time = date('H:i', strtotime($post["updated_at"]));
}

?>



<div class="page">
<img src="page.svg" class="page">
<form name="myform" method="POST" action="<?php echo 'page.php'; ?>">
<input type="hidden" id="postId" name="postId" value="<?php if(isset($id)){ echo htmlentities ($id);} ?>">
<input type="hidden" id="countId" name="countId" value="<?php if(isset($count)){ echo htmlentities ($count);} ?>">
<input type="hidden" id="i" name="i" value="<?php if(isset($i)){ echo htmlentities ($i);} ?>">
<input type="text" id="title" name="title" value="<?php if(isset($post["title"])){ echo htmlentities ($post["title"]);} ?>" />
<div id="words" >777</div>
<textarea id="articleArea" name="articleArea" style="width:700px;"><?php if(isset($post["body"])){ echo htmlentities ($post["body"]);} ?></textarea>
</div>
<div>
<img id="stickynote" src="stickyWhite.png" class="page">
<button type="submit" id="save" name="save">SAVE</button>
<p id="updated_at" > last updated at </br><?php echo $date."</br>".$time; ?> </p>
</div>
</form>

<div>
<img src="contents.svg" id = "contents">
<a href="toc.php" id ="toc" >Contents</a>
</div>

<?php

if($i > 1)
{
	$i_new = $i - 1;
	$sql = "SELECT * FROM posts WHERE Sno=(select max(Sno) from posts where Sno < '$id')";
$result=mysqli_query($conn,$sql);
$post = mysqli_fetch_assoc($result);
	
echo "<a id='prev_button' href='page.php?id={$post['Sno']}&count={$count}&i={$i_new}'><img id='prev_image' src='prev.svg'></a>";
}
if($i < $count)
{
	$i_new = $i + 1;
	$sql = "SELECT * FROM posts WHERE Sno=(select min(Sno) from posts where Sno > '$id')";
$result=mysqli_query($conn,$sql);
$post = mysqli_fetch_assoc($result);
echo "<a id='next_button' href='page.php?id={$post['Sno']}&count={$count}&i={$i_new}'><img id='next_image' src='next.svg'></a>";
}

?>
</body>

</html>
