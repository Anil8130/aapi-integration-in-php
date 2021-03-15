<?php 
$con=mysqli_connect('localhost','root','','aktest');
if (!$con) {
	# code...
	echo "error";
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
	$que=mysqli_query($con,"SELECT * FROM test1 ORDER BY id ASC LIMIT $start,$limit");
$data='';
?><ul style="display: inline-flex;">
		<?php 
			$qget=mysqli_query($con,"SELECT COUNT(id) FROM test1");
			$rock=mysqli_fetch_row($qget);
			$cpage=$rock[0];
			$tp=ceil($cpage/$limit);
			for($i=1;$i<=$tp;$i++){
			
			$data .='<li style="list-style: none;margin-left:5px;"><a href="data.php?page=<?php echo $i;?>"><?php echo $i; ?></a>';
		
			}
		 ?>
	</ul>
	<?php 
while ($row=mysqli_fetch_array($que)) {
	$data .= "<tr>
	<th>".$row['id']."</th>
	<th>".$row['enaam']."</th>
	<th>".$row['salary']."</th>
	<th>".$row['mail']."</th>
	</tr>";
}
echo $data;