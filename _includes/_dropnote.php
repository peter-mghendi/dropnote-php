<?php
extract($_POST);
function getToken(int $length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyx";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet);
    for($i=0; $i<$length; $i++){
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }
    return $token;
}
include '_connect.php';
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$len = 16;
do{
    $voucher = getToken($len);
    $vcr_query = "SELECT * FROM notes WHERE voucher = '$voucher'";
    $vcr_res = mysqli_query($db, $vcr_query);
    $vcr_count = mysqli_num_rows($vcr_res);
}while ($vcr_count > 0);
$dropped_on = date('Y-m-d');
if (empty ($title)){$title = '[Untitled]';}
if (empty ($dropped_for)){$dropped_for = '[Unspecified]';
}else{
    $isql= "SELECT * FROM users WHERE email = '$dropped_for'";
    $ires = mysqli_query($db,$isql);
    $row =mysqli_fetch_row($ires);
    $dropped_for = $row[4];
}
if (!isset($_SESSION['username'])){$dropped_by = '[Anonymous]';
} elseif (isset($cbAnonymous)){$dropped_by = '[Anonymous]';
} else {
    $user = "{$_SESSION['email']}";
    $isql= "SELECT * FROM users WHERE email = '$user'";
    $res = mysqli_query($db,$isql);
    $row =mysqli_fetch_row($res);
    $dropped_by = $row[4];
}
$status = 'visible';
$link = "localhost:8080/DropNote/dropcode.php?voucher=$voucher";
$sql="INSERT INTO notes VALUES (null,'$title','$content','$voucher','$dropped_on','$dropped_by','$dropped_for','$status')";
mysqli_query($db, $sql);