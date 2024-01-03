<?php

function updateUserData ($userid,$username,$password,$firstname,$middlename,$lastname,$profilename,$profileimage,$profilebio){
        require "sqli-config.php";
        
        $sqliQuery = ("UPDATE user_accounts SET 
        `firstname` = '$firstname', 
        `middlename` = '$middlename', 
        `lastname` = '$lastname', 
        `profilename` = '$profilename', 
        `user_username` = '$username', 
        `user_password` = '$password', 
        `profilebio` = '$profilebio', 
        `profileimage` = '$profileimage'
        WHERE userid=$userid");

        mysqli_query($connect,$sqliQuery);
    }

?>