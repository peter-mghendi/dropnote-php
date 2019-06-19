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
    } 

    if (isset($_POST['edit_id'])){
        extract($_POST);

        if (empty ($new_title)) $new_title = '[Untitled]';
        if (empty ($new_dropped_for)) $new_dropped_for = '[Unspecified]';
        else {
            $isql= "SELECT * FROM users WHERE email = '$new_dropped_for'";
            $ires = mysqli_query($db,$isql);
            $irow =mysqli_fetch_row($ires);
            $new_dropped_for = $irow[4];
        }

        if (isset($new_cbAnonymous)) $new_dropped_by = '[Anonymous]';
        else $new_dropped_by = $_SESSION['token'];

        $sql="UPDATE notes SET title = '$new_title', content = '$new_content', dropped_by = '$new_dropped_by', dropped_for = '$new_dropped_for' WHERE id = $edit_id";
        mysqli_query($db, $sql);
        header("location:$this_page");
        exit();
    }