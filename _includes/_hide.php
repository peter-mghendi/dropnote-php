<?php
include '_connect.php';
if($_GET['status'] == 'visible'){
    $new_status = 'hidden';
} else {
    $new_status = 'visible';
}
if(isset($_GET['id'])){
    $hidden = $_GET['id'];
    $isql= "UPDATE notes SET status='$new_status' WHERE id = '$hidden'";
}
else
{
    $isql="UPDATE notes SET status='$new_status'";
}
$result = mysqli_query($db, $isql);
header("location:../drops.php");