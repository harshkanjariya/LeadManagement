<?php
include 'database.php';
$em=$_POST['email'];
$ps=$_POST['password'];
$sql="select * from lead_users where email='".$em."';";
$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==0){
    echo "wrong email";
}else if(mysqli_num_rows($result)>1){
    echo "sql injection";
}else{
    $result=mysqli_fetch_assoc($result);
    if($result['email']==$em and $result['password']==$ps){
        echo "success";
    }else{
        echo "wrong password";
    }
}
/*
create table lead_users(username varchar(20),email varchar(50) primary key,password varchar(20));
*/
?>