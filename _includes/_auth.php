<?php
    $len = 12;
    
    if (isset($_POST['login'])) {
        $notify;
        extract($_POST);
        $password = md5($password);
        $sql = "select * from users where email='$login' and password='$password'";
        $res = mysqli_query($db, $sql) or die( mysqli_error($db) );
        if (mysqli_num_rows($res)===1){
            $row=mysqli_fetch_row ($res);
            $_SESSION['user'] = $row[1];
            $_SESSION['token'] = $row[4];
            $notify = new Notification(true, 'You are logged in');
        } else $notify = new Notification(false, 'Wrong email/password');
        array_push($_SESSION['notify'], serialize($notify));
        header("location:$this_page");
        exit();
    }

    // TODO Validation
    if (isset($_POST['username'])) {
        extract($_POST);
        if ($password === $confirm){
            do{
                $token = getToken($len);
                $sql = "SELECT * FROM users WHERE token = '$token'";
                $res = mysqli_query($db, $sql);
            } while (mysqli_num_rows($res) > 0);
            
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $res = mysqli_query($db, $sql);
            if(mysqli_num_rows($res) === 0){  
                $password = md5($password);
                $sql = "INSERT INTO users VALUES (null,'$username','$email','$password', '$token')";
                mysqli_query($db, $sql);
                $_SESSION['user'] = $username;
                $_SESSION['token'] = $token;
                $notify = new Notification(true, 'You have signed up and logged in');
            } else $notify = new Notification(false, 'That email address is already in use');
        } else $notify = new Notification(false, 'The passwords do not match');
        array_push($_SESSION['notify'], serialize($notify));
        header("location:$this_page");
        exit();
    }

    if(isset($_GET["logout"])){
        session_destroy();
        $notify = new Notification(true, 'Logged out');
        array_push($_SESSION['notify'], serialize($notify));
        header("location:$this_page");
        exit();
    }