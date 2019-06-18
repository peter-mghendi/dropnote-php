<?php
    $len = 12;
    function getToken(int $length) {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyx";
        $codeAlphabet .= "0123456789";
        for($i=0; $i<$length; $i++){
            $token .= $codeAlphabet[random_int(0, strlen($codeAlphabet)-1)];
        }
        return $token;
    }
    
    // TODO Validation
    if (isset($_POST['login'])) {
        extract($_POST);
        $password = md5($password);
        $sql = "select * from users where email='$login' and password='$password'";
        $res = mysqli_query($db, $sql) or die( mysqli_error($db) );

        if (mysqli_num_rows($res)===1){
            $row=mysqli_fetch_row ($res);
            $_SESSION['user'] = $row[1];
            $_SESSION['token'] = $row[4];
            header("location:$this_page");
            exit();
        } else echo "Wrong Username/Password";
    }

    // TODO Validation
    if (isset($_POST['username'])) {
        extract($_POST);
        do{
            $token = getToken($len);
            $tkn_query = "SELECT * FROM users WHERE token = '$token'";
            $tkn_res = mysqli_query($db, $tkn_query);
            $tkn_count = mysqli_num_rows($tkn_res);    
        } while ($tkn_count>0);
        
        $sql = "select * from users where email='$email'";
        $res = mysqli_query($db, $sql);
        if(mysqli_num_rows($res) === 0){  
            $password = md5($password);
            $sql3="INSERT INTO users VALUES (null,'$username','$email','$password', '$token')";
            mysqli_query($db, $sql3);
            $_SESSION['user'] = $username;
            $_SESSION['token'] = $token;
            header("location:$this_page");
            exit();
        } else echo "ERROR: The email address $email already has an account linked to it.";
    }

    if(isset($_GET["logout"])){
        session_destroy();
        header("location:$this_page");
        exit();
    }