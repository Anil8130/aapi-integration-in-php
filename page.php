<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $db="aktest";
    $conn = mysqli_connect($servername, $username, $password,$db);
//$conn=mysqli_connect('localhost','root','','aktest');
$limit = 5;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql1 = "SELECT * FROM test1 ORDER BY name ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql1);  
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Name</th>  
<th>Email</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row =mysqli_fetch_array($rs_result)) {  
?>  
            <tr>  
            <td><?php echo $row["name"]; ?></td>  
            <td><?php echo $row["email"]; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>  