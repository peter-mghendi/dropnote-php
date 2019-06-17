<?php
    $token = $_SESSION['token'];

    // TODO Data authentication
    if(isset($_POST["new_username"])) {
        extract($_POST);
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

    // TODO Data authentication
    if(isset($_POST["old_password"])) {
        extract($_POST);
        $sql="UPDATE users SET password = '$new_password' WHERE token = '$token'";
        mysqli_query($db, $sql) or die(mysqli_error($db));
        header("location:$this_page");
        exit();
    }