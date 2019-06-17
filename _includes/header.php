<?php 
    if (session_status() === PHP_SESSION_NONE) session_start(); 
    $this_page = basename($_SERVER["PHP_SELF"]);

    include('./_includes/phpqrcode/qrlib.php'); 

    include './_includes/_connect.php';
    include '_account/_edit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Drop Code</title>
    <link rel="stylesheet" href="_assets/vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="_assets/vendor/fontawesome-free-5.9.0-web/css/all.min.css"/>
    <link rel="stylesheet" href="_assets/vendor/datatables/datatables.min.css"/>
    <link rel="stylesheet" href="_assets/css/style.css?<?=time();?>">
</head>
<body>
<?php include '_includes/navbar.php'; ?>