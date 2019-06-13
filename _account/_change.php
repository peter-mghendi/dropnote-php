<?php
extract($_POST);
include '../_includes/_connect.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$changed = $id;
$_SESSION['username'] = $new_username;
$_SESSION['email'] = $new_email;

$sqlq="UPDATE users SET username = '$new_username', email = '$new_email', password = '$new_password' WHERE id = $changed";
mysqli_query($db, $sqlq) or die(mysqli_error($db));
header("location:../profile.php");
exit();
