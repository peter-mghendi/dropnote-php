<?php
if (!  isset ($_SESSION['email']))
{
    include 'boot/css/public_custom.css';
}
else
{
    include 'boot/css/custom.css';
}