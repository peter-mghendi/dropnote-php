<?php
    if (isset($_GET["note"])) switch($_GET["note"]) {
        case 'delete':
            if (isset($_GET['status'])) extract($_GET);
            if(isset($_GET['id'])){
                $deleted = $_GET['id'];
                $sql= "DELETE from notes WHERE id = $deleted";
            } else $sql="DELETE from notes WHERE status = '$status'";
            $result = mysqli_query($db, $sql);
            header("location:$this_page");
            exit();
        case 'hide':
            if($_GET['status'] == 'visible') $new_status = 'hidden';
            else $new_status = 'visible';
            if(isset($_GET['id'])){
                $hidden = $_GET['id'];
                $sql= "UPDATE notes SET status='$new_status' WHERE id = '$hidden'";
            } else $ssql="UPDATE notes SET status='$new_status'";
            $result = mysqli_query($db, $sql);
            header("location:$this_page");
            exit();
        case 'revoke':
            $len = 16;
            do{
                $new_voucher = getToken($len);
                $vcr_query = "SELECT * FROM notes WHERE voucher = '$new_voucher'";
                $vcr_res = mysqli_query($db, $vcr_query);
                $vcr_count = mysqli_num_rows($vcr_res);
            } while ($vcr_count > 0);
            
            if(isset($_GET['id'])) {
                $revoked = $_GET['id'];
                $sql= "UPDATE notes SET voucher='$new_voucher' WHERE id = '$revoked'";
            }
            //else
            //{
            //    // TODO sequentialy generate new tokens.
            //    $isql="UPDATE notes SET $token='$new token'";
            //}
            
            mysqli_query($db, $sql) or die(mysqli_error($db));
            header("location:$this_page");
            exit();

        // TODO Edit
    } 