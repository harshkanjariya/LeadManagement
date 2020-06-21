<?php
include 'database.php';
$unm=$_POST['username'];
$em=$_POST['email'];
$ps=$_POST['password'];
$uid=$_POST['uid'];
$sql="insert into lead_users values('".$uid."','".$unm."','".$em."','".$ps."');";
if(mysqli_query($db,$sql)){
	echo "success";
}else{
	$er=mysqli_error($db);
	if(strlen($er)>0){
		echo $er;
	}else{
		echo "Server Error!";
	}
}
/*
create table lead_users(id varchar(20) primary key,username varchar(20),email varchar(50) unique key not null,password varchar(20));
*/
?>