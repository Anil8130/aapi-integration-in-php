<?php 
$con=mysqli_connect('localhost','root','','aktest');
if(!$con){
	echo 'error';
}
$limit=4;
if (isset($_GET['page'])) {
	# code...
	$page=$_GET['page'];
}
else{
	$page=1;
}
$start=($page-1)*$limit;
$res=mysqli_query($con,"SELECT * FROM test1 ORDER BY id LIMIT $start,$limit");
?>
<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>salary</th>
		<th>email</th>
	</tr>
	<?php 
while ($row=mysqli_fetch_array($res)) {
	echo "<tr>
	<th>".$row['id']."</th>
	<th>".$row['enaam']."</th>
	<th>".$row['salary']."</th>
	<th>".$row['mail']."</th>
	</tr>";
}?>
<ul style="display: inline-flex;">
	<?php 
$re=mysqli_query($con,"SELECT COUNT(id) FROM test1");
$w=mysqli_fetch_row($re);
//echo $tottalp;
$tottalp=$w[0];
$ctotal=ceil($tottalp/$limit);
for($i=1;$i<=$ctotal;$i++){
	?>
	<li style="list-style: none;margin:15px;"><a styele="text-decoration:none;padding:15px;" href="pagination.php?page=<?php echo $i;?>"><?php echo    $i; ?></a></li>
	<?php
}

	?>
</ul>
