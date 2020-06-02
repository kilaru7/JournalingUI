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

<?php include('addEntry.php'); ?>
<title>Nectar</title>
</head>

<body>
<div class="page">
<img src="page.svg" class="page">

<?php
if(isset($_GET['i']))
{
	$i = $_GET['i'];
}
?>

<form name="myform" method="POST" action="<?php echo 'newPage.php'; ?>">
<input type="hidden" id="i" name="i" value="<?php if(isset($i)){ echo htmlentities ($i);} ?>">
<input type="text" id="title" name="title" placeholder="New article" value="<?php if(isset($post["title"])){ echo htmlentities ($post["title"]);} ?>" />
<div id="words"></div>
<textarea id="articleArea" name="articleArea" placeholder="Type text here" ><?php if(isset($post["body"])){ echo htmlentities ($post["body"]);} ?></textarea>
</div>
<div>
<img id="stickynote" src="stickyWhite.png" class="page">
<button type="submit" id="save" name="save">SAVE</button>
</div>
</form>

<div>
<img src="contents.svg" id = "contents">
<a href="toc.php" id ="toc" >Contents</a>
</div>

</body>

</html>
