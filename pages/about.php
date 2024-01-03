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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-PAANO? - About</title>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.ico">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/float.css">
    <link rel="stylesheet" href="../styles/about.css">
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
                <a class="selected" href=""><img class="icon" src="../images/icons/about_icon.png">About Us</a> 
                <a href="donate.php"><img class="icon" src="../images/icons/donate_icon.png">Donate</a> 
                <?php 
                    if ($login) {
                        echo "<div class='logout-btn'><a href='login.php'><img class='icon' src='../images/icons/logout_icon.png'>Log Out</a></div>";
                    }
                ?>
            </div>
        </div>
        <div id="contents">
            <div class="contents-container">
                <div class="contents-about">
                    <div class="about-header">
                        <fieldset>
                            <legend>Who We Are?</legend> 
                            E-Paano? is website that provides fast, reliable, and credible information to those people who need guidance or assistance and yet have no one to turn be asked.
                        </fieldset>
                    </div>
                    <div class="about-container">
                        <h3>The Developers</h3>
                        <div class="about_image">
                            <img src="../images/alex.jpg" alt="alex">
                            <p class="title">Alexander Ray F. Olaes</p>
                            <p class="description">s.alexander.olaes@sscr.edu</p>
                            <p class="description">Front-End Developer</p>
                        </div>
                        <div class="about_image">
                            <img src="../images/kyah.jpg" alt="stephen">
                            <p class="title">Stephen Regan James B. Layson</p>
                            <p class="description">s.stephen.layson@sscr.edu</p>
                            <p class="description">Full Stack Developer</p>
                        </div>
                        <div class="about_image">
                            <img src="../images/roland.jpg" alt="roland">
                            <p class="title">Roland P. Pagonzaga</p>
                            <p class="description">s.roland.pagonzaga@sscr.edu</p>
                            <p class="description">Back-End Developer</p>
                        </div>
                    </div>
                    <div class="about-footer">
                        Knowledge is Free | Knowledge is Power
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>