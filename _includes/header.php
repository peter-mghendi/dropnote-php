<?php if (session_status() === PHP_SESSION_NONE ) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Drop Code</title>
    <link rel="stylesheet" href="_assets/vendor/bootstrap-4.3.1-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="_assets/vendor/fontawesome-free-5.9.0-web/css/all.min.css"/>
    <link rel="stylesheet" href="_assets/vendor/datatables/datatables.min.css"/>
    <link rel="stylesheet" href="_assets/css/custom.css">
</head>
<body>
<?php
include '_includes/_nav.php';
include '_includes/_modal.php';
include './_includes/_connect.php';
?>