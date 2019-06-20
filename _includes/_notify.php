<?php
    $notification = array("success" => true, "message" => "This is a test notification", "context" => "primary");
    $_SESSION['notify'] = array($notification);
    if (count($_SESSION['notify']) > 0) foreach ($_SESSION['notify'] as $key => $notification): 
        extract($notification);
        unset($_SESSION['notify'][$key]);
        $success = $success?"Success":"Failed";
    ?>
        <div class="alert alert-<?=$context;?> alert-dismissible fade show" role="alert">
            <strong><?=$success;?>!</strong> <?=$message;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endforeach; ?>
        
    
    