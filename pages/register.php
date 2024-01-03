<?php
    require "../php/SessionControl.php";
    endSessionData();
    if (!empty($_GET)) {
        $msg = $_GET['error'];
    }
    else { $msg; }
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
        <div class="right-side">
            <div id="form">
                <div class="form-container">
                    <div class="form-title">
                        <h1>WELCOME</h1>
                    </div>
                    <?php 
                        if (!empty($msg)) { echo "<div class='from_alert'>".$msg."</div>"; }
                    ?>
                    <form class="form_" action="../php/VerifyRegister.php" method="post">
                        <fieldset>
                            <legend>Registration</legend>
                            <input type="text" name="firstname" placeholder="First Name" required><br>
                            <input type="text" name="middlename" placeholder="Middle Name" required><br>
                            <input type="text" name="lastname" placeholder="Last Name" required><br>
                            <input type="text" name="profilename" placeholder="Profile Name" required><br>
                            <input type="text" name="username" placeholder="Username" required><br>
                            <input type="password" name="password" placeholder="Password" required><br>
                            <input type="password" name="retypepassword" placeholder="Re-type Password" required><br>
                            <input type="checkbox" name="terms" required> I Accept The Terms & Conditons.<br>
                        </fieldset>
                            <input type="submit" value="Register">
                        </fieldset>
                    </form>
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