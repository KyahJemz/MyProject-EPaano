<?php
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $profilename = $_POST['profilename'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['retypepassword'];

    if ($confirm_password != $password) {
        header('Location: ../pages/register.php?error=Password did not Match. Try again');
        exit;
    }

    require "sqli-config.php";

    // Checking Username if Exist
    $select = mysqli_query($connect, "SELECT * FROM user_accounts WHERE user_username = '".$username."'");
        if(mysqli_num_rows($select)) {
             header('Location: ../pages/register.php?error=This username already exists!<br>Try new one. ');
             exit('This username already exists');
        }

    // Registring the Account
    $register_account = "insert into user_accounts(firstname,middlename,lastname,profilename,user_username,user_password)values('$firstname','$middlename','$lastname','$profilename','$username','$password')";

    // Check if Success
    if (mysqli_query($connect, $register_account)) {
        // Creating Sessions
        require "SessionControl.php";
        setSessionData($username,$password);
        
        // Redirect to Profile
        header('Location: ../pages/profile.php');
    } else {
        // Redirect to login
        header('Location: ../pages/register.php');
    }
?>