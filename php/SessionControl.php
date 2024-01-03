<?php
    function setSessionData($username, $password) {
        require "sqli-config.php";
        
        $userid = mysqli_query($connect, "SELECT userid FROM user_accounts  where user_username like '$username' and user_password like '$password'");
        $userid = mysqli_fetch_assoc($userid);
        $userid = $userid['userid'];

        // Getting User Data
        $sql = "SELECT userid,firstname,middlename,lastname,profilename,profileimage,profilebio FROM user_accounts where userid='$userid'";

        // Transcripting User Data
        $getuserdata = mysqli_query($connect, $sql);
        $getuserdata = mysqli_fetch_assoc($getuserdata);

        // Setting User Data
        $firstname = $getuserdata["firstname"];
        $middlename = $getuserdata["middlename"];
        $lastname = $getuserdata["lastname"];
        $profilename = $getuserdata["profilename"];
        $profileimage = $getuserdata["profileimage"];
        $profilebio = $getuserdata["profilebio"];

        if(session_id() == ''){
            session_start();
         }
        $_SESSION["userid"] = $userid;
        $_SESSION["username"] = $username;
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["firstname"] = $firstname;
        $_SESSION["middlename"] = $middlename;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["profilename"] = $profilename;
        $_SESSION["profileimage"] = $profileimage;
        $_SESSION["profilebio"] = $profilebio;
    }

    function endSessionData() {
        session_start();
        session_destroy();
    }
?>