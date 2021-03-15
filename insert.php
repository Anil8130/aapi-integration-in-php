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
?>
<center>
<h1>All Data</h1><br>
<div id="show">
<ul style="display: inline-flex;">
		<?php 
			$qget=mysqli_query($con,"SELECT COUNT(id) FROM test1");
			$rock=mysqli_fetch_row($qget);
			$cpage=$rock[0];
			$tp=ceil($cpage/$limit);
			for($i=1;$i<=$tp;$i++){
				?>
				<li style="list-style: none;margin-left:5px;"><a href="insert.php?page=<?php echo $i;?>"><?php echo $i; ?></a>
		<?php
			}
			echo 'Total Data: '.$cpage;
		 ?>
	</ul>
	<table id="">
		<tr>
			<th>Employee Id</th>
			<th>Employee Name</th>
			<th>Employee Salary</th>
			<th>Employee Email</th>
		</tr>
		<?php 
			while ($row=mysqli_fetch_array($que)) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['enaam']; ?></td>
					<td><?php echo $row['salary']; ?></td>
					<td><?php echo $row['mail']; ?></td>
				</tr>
				<?php
			}
		 ?>
	</table>
</div>
	<h3>Insrt Data</h3>
<form id="insert">
	<label>Name</label>
	<input type="text" name="name" required><br>
	<label>salary</label>
	<input type="number" name="salary" required><br>
	<label>Email</label>
	<input type="eamil" name="email" required><br>
	<input type="submit" name="submit" value="Save">
</form>
	<div id="msg" style="display: none;"><h3>Message Save Successfully (*-*)</h3></div>
	</center>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
	$(document).ready(function(){
		$('#insert').on('submit',function(e){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: 'save.php',
				data: $(this).serialize(),
				success: function(data){
					if(data=="success"){
						$('#insert').hide();
						$('#msg').show();
						$('#insert').trigger('reset');
						//loaddata();
						location.reload();
						setTimeout(function() {
                        	$('#msg').hide();
                        	$('#insert').show();
                    		}, 5000);
					}
					else{
						$('#insert').trigger('reset');
						alert(data);
					}
				}
			});
		});
		
	});
	// function loaddata(){
	// 		$.ajax({
	// 			type: 'GET',
	// 			url: 'data.php',
	// 			success: function(data){
	// 				$('#sdata').empty();
	// 				$('#sdata').before($('tr')).html(data);	
	// 			}
	// 		});
	// 	}
</script>