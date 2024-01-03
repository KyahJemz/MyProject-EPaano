<?php
    require "../php/SessionControl.php";
    require "../php/DataHandler.php";
    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    if(empty($username) or empty($password)) {
        header("Location: login.php?error=You Must Log In First"); 
        exit;
    } else {
        setSessionData($username, $password);
        $userid = $_SESSION['userid'];
        $firstname = $_SESSION["firstname"];
        $middlename = $_SESSION["middlename"];
        $lastname = $_SESSION["lastname"];
        $profilename = $_SESSION["profilename"];
        $profileimage = $_SESSION["profileimage"];
        $profilebio = $_SESSION["profilebio"];
    }

    if(isset($_POST['edit'])) {
        if ($_POST['edit'] == "Edit Profile") {
            $editprofile = true;
        } elseif ($_POST['edit'] == "Save") {
            $target= "../images/uploads/";
            $target_file = $target . basename($_FILES["profileimage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["profileimage"]["tmp_name"], $target_file);

            $editprofile = false;
            updateUserData($userid, $_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['profilename'], basename( $_FILES['profileimage']['name']), $_POST['profilebio']);
            if(empty($username) or empty($password)) {
                header("Location: login.php?error=You Must Log In First"); 
                exit;
            } else {
                setSessionData($username, $password);
                $userid = $_SESSION['userid'];
                $firstname = $_SESSION["firstname"];
                $middlename = $_SESSION["middlename"];
                $lastname = $_SESSION["lastname"];
                $profilename = $_SESSION["profilename"];
                $profileimage = $_SESSION["profileimage"];
                $profilebio = $_SESSION["profilebio"];
            }
        } else {
            $editprofile = false;
        }
    } else {
        $editprofile = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-PAANO? - Profile</title>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.ico">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/float.css">
    <link rel="stylesheet" href="../styles/profile.css">
</head>
<body>
    <div id="floaters">
        <div class="floaters-container">
            <a href="../index.php"><img src="../images/icons/facebook_icon.png"></a>
            <a href="../index.php"><img src="../images/icons/instagram_icon.png"></a>
            <a href="../index.php"><img src="../images/icons/twitter_icon.png"></a>
        </div>
    </div>
    <div id="header">
        <div class="header-container">
            <div class="header-logo"><img src="../images/logo.png"></div>
            <div class="header-text">E-PAANO?</div>
            <div class="header-search">
                <form action="search.php" method="get">
                    <input type="text" name="search">
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
        <div class='page-header-profile-container'>
            <div class='page-header-profile'>
                <div class='page-header-profile-text'>Welcome <?php echo $profilename?></div>
                <div class='page-header-profile-image'><img src = '../images/uploads/<?php echo $profileimage?>'></div>
            </div>
        </div>
    </div>
    <div id="menu">
        <div class="menu-container">
            <a href="../index.php"><img class="icon" src="../images/icons/home_icon.png">Home</a> 
            <a class="selected" href=""><img class="icon" src="../images/icons/profile_icon.png">My Profile</a> 
            <a href="about.php"><img class="icon" src="../images/icons/about_icon.png">About Us</a> 
            <a href="donate.php"><img class="icon" src="../images/icons/donate_icon.png">Donate</a> 
            <div class='logout-btn'><a href='login.php'><img class='icon' src='../images/icons/logout_icon.png'>Log Out</a></div>
        </div>
    </div>
    <div id="contents">
        <div class="contents-container">
            <div class="contents-header">
                <div class="contents-Header-container">
                    <div class="page-profile-Header-image">
                    <?php echo "<img src = ../images/uploads/".$profileimage.">" ?>
                    </div>
                    <form action="profile.php" method="post" enctype="multipart/form-data">
                        <div class="page-profile-Header-text">
                            <?php
                            if(!$editprofile) {
                                echo "<p class='profilename'>".$profilename."</p>";
                                echo "<p>".$firstname." ".$middlename." ".$lastname."</p>";
                                echo "<p>".$profilebio."</p>";
                            } else {
                                echo "<p class='info'>Profile Name : <br><input type='text' name='profilename' placeholder='Profile Name' required value='".$profilename."'></p>";
                                echo "<p class='info'>Profile Bio : <br><input type='text' name='profilebio' placeholder='Profile Bio' required value='".$profilebio."'></p>";
                                echo "<p class='info'>First Name : <br><input type='text' name='firstname' placeholder='First Name' require value='".$firstname."'></p>";
                                echo "<p class='info'>Middle Name : <br><input type='text' name='middlename' placeholder='Middle Name' value='".$middlename."'></p>";
                                echo "<p class='info'>Last Name : <br><input type='text' name='lastname' placeholder='Last Name' require value='".$lastname."'></p>";
                                echo "<p class='info'>Username : <br><input type='text' name='username' placeholder='Username' required value='".$username."'></p>";
                                echo "<p class='info'>Password : <br><input type='password' name='password' placeholder='password' required value='".$password."'></p>";
                                echo "<p class='info'>Picture : <br><input type='file' name='profileimage' placeholder='Profile Picture'></p>";
                            }
                            ?>
                        </div>
                        <div class="page-profile-Header-edit-button">
                            <?php
                                if(!$editprofile) {
                                    echo "<button type='submit' value='Edit Profile' name='edit'><img class='btn-image icon'  src='../images/icons/edit_icon.png'>Edit Profile</button>";
                                } else {
                                    echo "<button type='submit' value='Save' name='edit'><img class='btn-image icon' src='../images/icons/save_icon.png'>Save</button>";
                                    echo "<button type='submit' value='Cancel' name='edit'><img class='btn-image icon' src='../images/icons/cancel_icon.png'>Cancel</button>";
                                }
                            ?>
                        </div>
                    </form> 
                </div> 
            </div>
            <div>
                <hr>
            </div>
            <div class="page-contents-contents"> 

                
            </div>
        </div>
    </div>
</body>
</html>