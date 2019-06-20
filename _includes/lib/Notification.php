<?php 
    class Notification{
        var $success;
        var $message;
        var $context;

        function __construct($success, $message, $context='') {
            $this->success = $success;
            $this->message = $message;
            $this->context = $context!==''?$context:
                $success?'success':'danger';
        }

        function notify(){
            $this->success = $this->success?'Success':'Failed'; ?>
            <div class='alert alert-<?=$this->context;?> alert-dismissible fade show' role='alert'>
                <strong><?=$this->success;?>!</strong> <?=$this->message;?>.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        <?php }
    } 
?>