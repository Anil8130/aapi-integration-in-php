<?php 
$con=mysqli_connect('localhost','root','','aktest');
if(!$con){
	echo 'error';
}
 	$name=$_POST['name'];
 	$sal=$_POST['salary'];
 	$mail=$_POST['email'];
 	$sql1="INSERT INTO test1(enaam, salary, mail) VALUES ('$name','$sal','$mail')";
 	$result=mysqli_query($con,$sql1);
 	if($result){
 		echo 'success';
 	}
 	else
 	{
 		echo 'error';
 	}