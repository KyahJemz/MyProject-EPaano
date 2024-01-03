<?php
    require "../php/SessionControl.php";
    session_start();

    if(empty($_SESSION['username']) or empty($_SESSION['password'])) {
        $login = false;
    } else {
        $login = true;
        setSessionData($_SESSION['username'], $_SESSION['password']);
        $userid = $_SESSION['userid'];
        $firstname = $_SESSION["firstname"];
        $middlename = $_SESSION["middlename"];
        $lastname = $_SESSION["lastname"];
        $profilename = $_SESSION["profilename"];
        $profileimage = $_SESSION["profileimage"];
        $profilebio = $_SESSION["profilebio"];
    }
    $id = $_GET['post_id'];

    require "../php/sqli-config.php"; 
    $sql = "SELECT post_id,post_title,post_cover,post_text,post_creator FROM user_post WHERE post_id= $id" ;
    $getdata = mysqli_query($connect, $sql);
    $getdata = mysqli_fetch_assoc($getdata);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-PAANO? - Content</title>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.ico">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/float.css">
    <link rel="stylesheet" href="../styles/content.css">
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
        <?php
            if ($login) {
                echo "<div class='page-header-profile-container'><div class='page-header-profile'>";
                echo "<div class='page-header-profile-text'>Welcome ".$profilename."</div>";
                echo "<div class='page-header-profile-image'><img src ='../images/uploads/".$profileimage."'></div>";
                echo "</div></div>";
            } else {
                echo "
                    <div class='page-header-form-container'>
                        <div class='page-header-form'>
                            <a href='login.php'>Log In</a>
                            <a href='register.php'>Register</a>
                        </div>
                    </div>";
            }
        ?>
    </div>
    <div id="menu">
        <div class="menu-container">
            <a href="../index.php"><img class="icon" src="../images/icons/home_icon.png">Home</a> 
            <a href="profile.php"><img class="icon" src="../images/icons/profile_icon.png">My Profile</a> 
            <a href="about.php"><img class="icon" src="../images/icons/about_icon.png">About Us</a> 
            <a href="donate.php"><img class="icon" src="../images/icons/donate_icon.png">Donate</a> 
            <?php 
                if ($login) {
                    echo "<div class='logout-btn'><a href='login.php'><img class='icon' src='../images/icons/logout_icon.png'>Log Out</a></div>";
                }
            ?>
        </div>
    </div>
    <div id="content">
        <div class="content-title">
            <?php echo $getdata['post_title'];?>
        </div>
        <div class="content-about">
            <?php echo $getdata['post_creator'];?>
        </div>
        <div class="content-image">
            <img src="../images/uploads/<?php echo $getdata['post_cover'];?>">
        </div>
        <div class="content-text">
            <?php echo $getdata['post_text'];?>
        </div>
    </div>
</body>
</html>