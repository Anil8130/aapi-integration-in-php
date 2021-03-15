<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $db="aktest";
    $conn = mysqli_connect($servername, $username, $password,$db);
//$conn=mysqli_connect('localhost','root','','aktest');
$limit = 7;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } 
else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql1 = "SELECT * FROM test1 ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql1);  
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Employee Id</th>
<th>Name</th>  
<th>Salary</th>
<th>Email</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row =mysqli_fetch_array($rs_result)) {  
?>  
            <tr>
            <td><?php echo $row["id"]; ?></td>  
            <td><?php echo $row["enaam"]; ?></td> 
            <td><?php echo $row["salary"]; ?></td> 
            <td><?php echo $row["mail"]; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>  