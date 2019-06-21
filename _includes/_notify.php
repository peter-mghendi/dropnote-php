<?php
    if (count($_SESSION['notify']) > 0) 
        foreach ($_SESSION['notify'] as $k => $n){
            unset($_SESSION['notify'][$k]); 
            unserialize($n)->notify();
        }
?>
        
    
    