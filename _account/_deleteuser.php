<?php
session_start();
include '../_includes/_connect.php';
$deleted = "{$_SESSION['token']}";
$query1="UPDATE notes SET dropped_for = '[Unspecified]' WHERE dropped_for = '$deleted'";
$query2="DELETE from notes WHERE dropped_by = '$deleted'";
$query3="DELETE from users WHERE token = '$deleted'";
$res1 = mysqli_query($db, $query1);
$res2 = mysqli_query($db, $query2);
$res3 = mysqli_query($db, $query3);
header("location:../_includes/_logout.php");
exit();