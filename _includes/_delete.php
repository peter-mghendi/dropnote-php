<?php
include '_connect.php';
if (isset($_GET['status'])){
    extract($_GET);
}
if(isset($_GET['id'])){
    $deleted = $_GET['id'];
    $isql= "DELETE from notes WHERE id = $deleted";
}
else
{
    $isql="DELETE from notes WHERE status = '$status'";
}
$result = mysqli_query($db, $isql);
header("location:../drops.php");
