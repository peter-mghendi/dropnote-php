<?php
extract($_POST);
include '_connect.php';
$sql ="select * from users where email='$email' and password='$password'";
$result=mysqli_query($db, $sql) or die( mysqli_error($db) );
$count= mysqli_num_rows ($result);

if ($count>=1){
    //success
    $row=mysqli_fetch_row ($result);
    $id = $row[0];
    $username = $row[1];
    $token = $row[4];
    //sessions
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['token'] = $token;
    header("location:../index.php");
    exit();
}else{
    echo "Wrong Username/Password";
}