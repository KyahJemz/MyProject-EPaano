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
    <title>E-PAANO? - Donate</title>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.ico">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/float.css">
    <link rel="stylesheet" href="../styles/donate.css">
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
            <a class="selected" href=""><img class="icon" src="../images/icons/donate_icon.png">Donate</a> 
            <?php 
                if ($login) {
                    echo "<div class='logout-btn'><a href='login.php'><img class='icon' src='../images/icons/logout_icon.png'>Log Out</a></div>";
                }
            ?>
        </div>
    </div>
    <div id="contents">
        <div class="contents-container">
            <div class="contents-header">
                <div class="contents-Header-container">
                </div>
            </div>
            <div>
                <hr>
            </div>
        </div>
    </div>
    <div id="contents">
        <div class="contents-container">
            <div class="contents-about">
                <div class="donate-header">
                    <fieldset>
                        <legend>Donate?</legend> 
                        E-Paano website always accepts donation of any kind, this would help our developers to persuade and expand the range of our network, then we could serve more people who lacks access to informations.
                    </fieldset>
                </div>
                <div class="donate-container">
                    <h3>Donations Are Highly Appreciated!</h3>
                    <div class="donate_image">
                        <img src="../images/alex.jpg" alt="alex">
                        <p class="title">Alexander Ray F. Olaes</p>
                        <p class="description">GCash No. +639176905821</p>
                    </div>
                    <div class="donate_image">
                        <img src="../images/kyah.jpg" alt="stephen">
                        <p class="title">Stephen Regan James B. Layson</p>
                        <p class="description">GCash No. +639168777580</p>
                    </div>
                    <div class="donate_image">
                        <img src="../images/roland.jpg" alt="roland">
                        <p class="title">Roland P. Pagonzaga</p>
                        <p class="description">GCash No. +639916909053</p>
                    </div>
                </div>
                <div class="donate-footer">
                    Thank you for your great generosity. We, E-Paano developers, greatly appreciate your donation. 
                </div>
            </div>
        </div>
    </div>       
</body>    
</body>
</html>