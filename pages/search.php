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
    <title>E-PAANO? - Search</title>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.ico">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/search.css">
    <link rel="stylesheet" href="../styles/float.css">
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
        <div class="search-box">
            <form action="search.php" method="get">
                <h2>Search Box</h2>
                <input type="text" name="search" type="submit" placeholder="Search...">
            </form>
        </div>
        <div class="search-result"> 
            <?php
                require "../php/sqli-config.php"; 
                $search = $_GET['search'];

                if (!empty($_GET['search'])) {
                    $sql = "SELECT * FROM user_post WHERE (post_category LIKE '%".$search."%') or (post_title LIKE '%".$search."%') or (post_text LIKE '%".$search."%')";
                } else {
                    $sql = "SELECT post_id,post_title,post_image,post_rating FROM user_post";
                }

                $getdata = mysqli_query($connect, $sql);

                while ($x = mysqli_fetch_assoc($getdata)){
                    echo "<div class='search-result-container'>";
                    echo "<a href=''>";
                    echo "<div class='result-image'>";
                    echo "<img src='../images/uploads/".$x['post_image']."'>";
                    echo "</div>";
                    echo "<div class='result-title'>";
                    echo "<p>".$x['post_title']."</p>";
                    echo "</div>";
                    echo "<div class='result-rating'>";
                    echo "<img src='../images/ratings/star_".$x['post_rating'].".png'>";
                    echo "</div></a></div>";
                }
            ?>
        </div>
    </div>
</body>
</html>