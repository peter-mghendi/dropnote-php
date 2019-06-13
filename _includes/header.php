<?php if (session_status() === PHP_SESSION_NONE ) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Drop Code</title>
    <link rel="stylesheet" href="_config/css/bootstrap.css"/>
    <link rel="stylesheet" href="_config/css/custom.css">
    <link rel="stylesheet" href="_config/css/dataTables.css"/>

</head>
<body>
<?php
include '_includes/_nav.php';
include '_includes/_modal.php';
include './_includes/_connect.php';
?>