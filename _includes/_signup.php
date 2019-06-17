<?php
function getToken(int $length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyx";
    $codeAlphabet .= "0123456789";
    for($i=0; $i<$length; $i++){
        $token .= $codeAlphabet[random_int(0, strlen($codeAlphabet)-1)];
    }
    return $token;
}
extract($_POST);
include './_connect.php';
$len = 12;

// TODO Code for min. password length
do{
    $token = getToken($len);
    $tkn_query = "SELECT * FROM users WHERE token = '$token'";
    $tkn_res = mysqli_query($db, $tkn_query);
    $tkn_count = mysqli_num_rows($tkn_res);    
} while ($tkn_count>0);

$sql = "select * from users where email='$email'";
$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);
if($count == 0)
{  
    //success
    $sql3="INSERT INTO users VALUES (null,'$username','$email','$password', '$token')";
    mysqli_query($db, $sql3);
    
    //sessions
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['token'] = $token;
    header("location:../index.php");
    exit();
} else echo "<center><p>ERROR: The email address $email already has an account linked to it.</p></center>";
