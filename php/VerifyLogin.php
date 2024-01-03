<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    require "sqli-config.php";
    require "SessionControl.php";
    
    // Checking Username if Exist
    $usernamecheck = mysqli_query($connect, "SELECT * FROM user_accounts WHERE user_username = '".$username."'");
        if(mysqli_num_rows($usernamecheck)) {
            $passwordcheck = mysqli_query($connect, "SELECT * FROM user_accounts WHERE user_password = '".$password."'");
            if(mysqli_num_rows($passwordcheck)) {
                echo "user login <3";
            } else {
                header('Location: ../pages/login.php?error=Incorrect Password!');
                exit();
            }
        } else {
            header('Location: ../pages/login.php?error=The username and password is Incorrect!');
            exit();
        }

        // Creating Sessions
        setSessionData($username,$password);

        // Redirect to Profile
        header('Location: ../pages/profile.php');
?>