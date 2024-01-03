<?php
    require "../php/SessionControl.php";
    endSessionData();

    if (!empty($_GET)) {
        $msg = $_GET['error'];
    }
    else {
        $msg;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-PAANO? - Register</title>
    <link rel="icon" type="image/x-icon" href="../images/icons/favicon.ico">
    <link rel="stylesheet" href="../styles/form.css">
</head>
<body>
    <div id="main">
        <div class="left-side">
            <div id="content">
                <h1>E-PAANO?</h1>
                <h3>The worlds most Informative and Trusted website.</h3>
            </div>
        </div>
        <div class="login-right-side">
            <div id="login-form">
                <div class="form-container">
                    <div class="form-title">
                        <h1>WELCOME</h1>
                    </div>
                    <?php 
                        if (!empty($msg)) {
                            echo "<div class='from_alert'>".$msg."</div>";
                            }
                    ?>
                    <form class="form_" action="../php/VerifyLogin.php" method="post">
                        <input type="text" name="username" placeholder="Username" required><br>
                        <input type="password" name="password" placeholder="Password" required><br>
                        <input type="submit" value="Log in">
                    </form>
                    <div class="form-footer">
                        <p>Don't have an account? <a href="register.php">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <a href="../index.php">Home</a> 
        <a href="about.php">About Us</a> 
        <a href="donate.php">Donate</a> 
    </div>
</body>
</html>