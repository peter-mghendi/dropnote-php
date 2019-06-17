<?php
session_start();
extract($_POST);
include '_connect.php';
$sql = "select * from users where email='$email' and password='$password'";
$res = mysqli_query($db, $sql) or die( mysqli_error($db) );

if (mysqli_num_rows($res)===1){
    $row=mysqli_fetch_row ($res);
    $_SESSION['user'] = $row[1];
    $_SESSION['token'] = $row[4];
    header("location:../index.php");
    exit();
}else{
    echo "Wrong Username/Password";
}