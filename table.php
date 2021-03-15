<?php 
$con=mysqli_connect('localhost','root','','aktest');
if (!$con) {
	echo 'error';
}
if (isset($_POST['submit'])) {
	# code...
	$name=$_POST['uname'];
$sql="CREATE TABLE ".$name." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";
if (mysqli_query($con,$sql)) {
	# code...
	echo 'table create successfully';
}
else
{
	echo 'error to create';
 }
}
?>
<h1>Form</h1>
<form method="post">
	<label>enter name</label>
	<input type="text" name="uname">
	<input type="submit" name="submit" value="create">
</form>
