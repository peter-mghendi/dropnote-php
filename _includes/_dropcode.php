<?php
extract($_REQUEST);
$query = "SELECT * FROM notes WHERE voucher = '$voucher'";
$result = mysqli_query($db,$query) ;
$row = mysqli_fetch_row($result);
$title = $row[1];
$content = $row[2];
$dropped_on = $row[4];
if ($row[5] !== "[Anonymous]"){
    $tok = $row[5];
    $nusql= "SELECT * FROM users WHERE token = '$tok'";
    $nures = mysqli_query($db,$nusql);
    $nurow =mysqli_fetch_row($nures);
    $drop_by = $nurow[2];
} else {
    $drop_by = $row[5]; 
}