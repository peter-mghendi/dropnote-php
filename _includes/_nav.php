<?php
if (session_status() == PHP_SESSION_NONE ){session_start(); }
if (!  isset ($_SESSION['email'])){
    include 'nav/public_nav.php';
}else{
    include 'nav/nav.php';
}