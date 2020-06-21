<?php
function getName($n) { 
    // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
    return $randomString; 
}
$to=$_POST['mail'];
// $subject  = $_POST['sub'];
$subject  = "way2advertize verification";
// $txt  = $_POST['body'];
$code=getName(6);
$txt  = "Your verification code is : ".$code;
// $From = $_POST['from'];
$From = "harshgkanjariya2468@gmail.com";
$headers = "From: ".$From. "\r\n";
if(mail($to,$subject,$txt,$headers))
    echo "success\n".$code;
else
    echo "Error Sending Mail!";
?>