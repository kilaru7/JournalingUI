<!doctype html>

<html lang="en">
<head>
<meta charset="utf=8">
<link rel="stylesheet" href="toc.css">
<?php include('connection.php'); ?>
<title>Nectar</title>
</head>

<body>

<div class="page">
<img src="page.svg" class="page">

<?php

global $conn;

mysqli_select_db($conn,"mydb");
$sql = "SELECT * FROM posts";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);

?>

<p id="title"> Table of Contents </p>
<table>

<?php 

$i=1;
while($post = mysqli_fetch_assoc($result))
{
	echo "<tr>";
echo "<td class='sno'>". $i."</td>";
echo "<td class='name'>".$post["title"]."</td>";
echo "<td class='edit'><a href='page.php?id={$post['Sno']}&count={$rowcount}&i={$i}'>edit</a></td>";
echo "<td class='delete'><a href='deleteEntry.php?id={$post['Sno']}'>delete</a></td>";
echo "<tr>";
$i++;
}
$counter = $rowcount +1;
 ?>
</table>
</div>

<div>
<img src="contents.svg" id = "contents">
<a href='newPage.php?i=<?php echo $counter ?>' id ="toc" >NEW</a>
</div>

</body>

</html>