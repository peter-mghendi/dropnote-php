<?php
include '_connect.php';
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
$len = 16;
do{
    $new_voucher = getToken($len);
    $vcr_query = "SELECT * FROM notes WHERE voucher = '$new_voucher'";
    $vcr_res = mysqli_query($db, $vcr_query);
    $vcr_count = mysqli_num_rows($vcr_res);
}while ($vcr_count > 0);

if(isset($_GET['id'])){
    $revoked = $_GET['id'];
}
//else
//{
//    // TODO sequentialy generate new tokens.
//    $isql="UPDATE notes SET $token='$new token'";
//}
$isql= "UPDATE notes SET voucher='$new_voucher' WHERE id = '$revoked'";
mysqli_query($db, $isql) or die(mysqli_error($db));
header("location:../drops.php");
exit();
