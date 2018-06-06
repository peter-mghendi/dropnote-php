<?php
extract($_POST);
include '_connect.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$edited = $id;

if (empty ($new_title)){
    $new_title = '[Untitled]';
}
if (empty ($new_dropped_for)){
    $new_dropped_for = '[Unspecified]';
} else {
    $isql= "SELECT * FROM users WHERE email = '$new_dropped_for'";
    $ires = mysqli_query($db,$isql);
    $irow =mysqli_fetch_row($ires);
    $new_dropped_for = $irow[4];
}

if (!isset($_SESSION['username'])){
    $new_dropped_by = '[Anonymous]';
} elseif (isset($new_cbAnonymous)){
    $new_dropped_by = '[Anonymous]';
} else {
    $user = "{$_SESSION['email']}";
    $msql= "SELECT * FROM users WHERE email = '$user'";
    $mres = mysqli_query($db,$msql);
    $mrow =mysqli_fetch_row($mres);
    $new_dropped_by = $mrow[4];
}

$sql="UPDATE notes SET title = '$new_title', content = '$new_content', dropped_by = '$new_dropped_by', dropped_for = '$new_dropped_for' WHERE id = $edited";
mysqli_query($db, $sql);
header("location:../drops.php");