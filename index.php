<?php
    require "php/SessionControl.php";
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
    <title>E-PAANO? - Home</title>
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/float.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <div id="floaters">
        <div class="floaters-container">
            <a href="index.php"><img src="images/icons/facebook_icon.png"></a>
            <a href="index.php"><img src="images/icons/instagram_icon.png"></a>
            <a href="index.php"><img src="images/icons/twitter_icon.png"></a>
        </div>
    </div>
    <div id="header">
        <div class="header-container">
            <div class="header-logo"><img src="images/logo.png"></div>
            <div class="header-text">E-PAANO?</div>
            <div class="header-search">
                <form action="pages/search.php" method="get">
                    <input type="text" name="search">
                    <input type="submit" value="Search">
                    <div class="search-box">
                    </div>
                </form>
            </div>
        </div>
        <?php
            if ($login) {
                echo "<div class='page-header-profile-container'><div class='page-header-profile'>";
                echo "<div class='page-header-profile-text'>Welcome ".$profilename."</div>";
                echo "<div class='page-header-profile-image'><img src ='images/uploads/".$profileimage."'></div>";
                echo "</div></div>";
            } else {
                echo "
                    <div class='page-header-form-container'>
                        <div class='page-header-form'>
                            <a href='pages/login.php'>Log In</a>
                            <a href='pages/register.php'>Register</a>
                        </div>
                    </div>";
            }
        ?>
    </div>
    <div id="menu">
        <div class="menu-container">
            <a class="selected" href=""><img class="icon" src="images/icons/home_icon.png">Home</a> 
            <a href="pages/profile.php"><img class="icon" src="images/icons/profile_icon.png">My Profile</a> 
            <a href="pages/about.php"><img class="icon" src="images/icons/about_icon.png">About Us</a> 
            <a href="pages/donate.php"><img class="icon" src="images/icons/donate_icon.png">Donate</a> 
            <?php 
                if ($login) {
                    echo "<div class='logout-btn'><a href='pages/login.php'><img class='icon' src='images/icons/logout_icon.png'>Log Out</a></div>";
                }
            ?>
        </div>
    </div>
    <div id="contents">
        <div class="contents-container">
            <div class="contents-header">
                <div class="contents-Header-container">
                    <div class="page-contents-Header-image">               
                    </div>
                    <div class="page-contents-Header-text">
                        <h1><i>"Intelligence Follows Curiosity."</i></h1>                      
                    </div>
                </div>
            </div>
            <div>
                <hr>
            </div>


            <div id="flex-container">
                <div id="left-page">
                    <h1>Top Searches </h1>
                        <div class="page-contents-suggested">
                            <?php
                                require "php/sqli-config.php"; 

                                $sql = "SELECT post_id,post_title,post_image,post_rating FROM user_post where post_suggested=1";
                                $getdata = mysqli_query($connect, $sql);

                                $data = array();
                                while ($x = mysqli_fetch_assoc($getdata)){
                                    $data[] = $x;
                                    echo "<div class='page-contents-data-container'>";
                                    echo "<a href='pages/content.php?post_id=".$x['post_id']."'>";
                                    echo "<div class='page-contents-data-image'>";
                                    echo "<img src='images/uploads/".$x['post_image']."'>";
                                    echo "</div>";
                                    echo "<div class='page-contents-data-text'>";
                                    echo "<p>".$x['post_title']."</p>";
                                    echo "</div>";
                                    echo "<div class='page-contents-data-rating'>";
                                    echo "<img src='images/ratings/star_".$x['post_rating'].".png'>";
                                    echo "</div></a></div>";
                                }
                            ?>
                        </div>
                </div>

                <div id="right-page">
                    <div class="page-contents-category">
                        <div class="page-contents-category-list">
                            <h1>Category</h1>
                            <form action="pages/search.php?search" method="post"></form>
                                <a href="pages/search.php?search=technology">
                                <div class="input-technology">
                                    <input type="submit" value="Technology" name="category">
                                    <div class="technology subview">Computer & Electronics</div>
                                </div>
                                </a>                                   
                                <a href="pages/search.php?search=lifestyle">
                                <div class="input-lifestyle">
                                    <input type="submit" value="Lifestyle" name="category">
                                    <div class="lifestyle subview">Food & Event Planning</div>
                                </div>
                                </a>                            
                                <a href="pages/search.php?search=entertainment">
                                <div class="input-entertainment">
                                    <input type="submit" value="Entertainment" name="category">
                                    <div class="entertainment subview">Music & Sports</div>
                                </div>
                                </a>                           
                                <a href="pages/search.php?search=money">
                                <div class="input-money">
                                    <input type="submit" value="Money" name="category">
                                    <div class="money subview">Personal Finance & Business</div>
                                </div>
                                </a>                            
                                <a href="pages/search.php?search=animals">
                                <div class="input-animals">
                                    <input type="submit" value="Animals" name="category">
                                    <div class="animals subview">Animal Facts & Pets About</div>
                                </div>
                                </a>                           
                                <a href="pages/search.php?search=healt">
                                <div class="input-health">
                                    <input type="submit" value="Health" name="category">
                                    <div class="health subview">Skin Care & Wellness</div>
                                </div>
                                </a>                       
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="contact">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td>Name :</td>
                                    <td><input type="text" placeholder="Name..." required name="name"></td>
                                </tr>
                                <tr>
                                    <td>Phone Number : </td>
                                    <td><input type="text" placeholder="Phone Number..." required name="phonenumber"></td>
                                </tr>
                                <tr>
                                    <td>Email Address : </td>
                                    <td><input type="text" placeholder="Email Address..." required name="email"></td>
                                </tr>
                                <tr>
                                    <td>Comments : </td>
                                    <td><textarea name="" id="" cols="31" rows="5" required ></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Submit" name="contact"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>