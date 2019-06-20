<?php
    // TODO Data authentication 
    if(isset($_POST["new_username"])) {
        extract($_POST);
        $token = $_SESSION['token'];
        $sql ="select username, email from users where token = '$token'";
        $res = mysqli_query($db,$sql);
        $row =mysqli_fetch_row($res);
        $new_username==($new_username==="")?$row[0]:$new_username;
        $new_email==($new_email==="")?$row[1]:$new_email;
        $_SESSION['user'] = $new_username;
        $sql="UPDATE users SET username = '$new_username', email = '$new_email' WHERE token = '$token'";
        mysqli_query($db, $sql) or die(mysqli_error($db));
        header("location:$this_page");
        exit();
    }

    if(isset($_POST["old_password"])) {
        extract($_POST);
        $notify;
        if ($new_password !== $con_password) 
            $notify = new Notification(false, "The passwords do not match.", "danger");
        else {
            $token = $_SESSION['token'];
            $old_password = md5($old_password);
            $new_password = md5($new_password);
            $sql = "SELECT password FROM users WHERE token = '$token'";
            $res = mysqli_query($db, $sql);
            $password = mysqli_fetch_row($res)[0];
            if ($old_password !== $password)
                $notify = new Notification(false, "Incorrect current password.", "danger");
            elseif ($new_password === $password)
                $notify = new Notification(false, "Please use a different new password.", "danger");
            else {
                $sql="UPDATE users SET password = '$new_password' WHERE token ='$token'";
                mysqli_query($db, $sql) or die(mysqli_error($db));
                $notify = new Notification(true, "Password changed.", "success");
            }
        }
        
        array_push($_SESSION['notify'], serialize($notify));
        header("location:$this_page");
        exit();
    }