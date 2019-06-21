<?php
// TODO Show Login modal, and then redirect to original page
session_start();
if (!isset ($_SESSION['token'])) {
    header("location:index.php");
    exit();
}