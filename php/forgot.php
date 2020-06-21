<?php
include 'database.php';
$to=$_POST['mail'];
$result=mysqli_query($db,"select password from lead_users where email='".$to."';");
if(mysqli_num_rows($result)==1){
    $result=mysqli_fetch_assoc($result);
    // $subject  = $_POST['sub'];
    $subject  = "way2advertize password";
    // $txt  = $_POST['body'];
    $txt  = "Your password is : ".$result['password'];
    // $From = $_POST['from'];
    $From = "harshgkanjariya2468@gmail.com";
    $headers = "From: ".$From. "\r\n";
    if(mail($to,$subject,$txt,$headers))
        echo "success";
    else
        echo "Error Sending Mail!";
}else{
    echo "wrong email";
}
?>