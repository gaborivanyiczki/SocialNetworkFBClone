<?php require_once("templates/config.php") ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Sign-Up & Login</title>
    <link rel="icon" href="img/favicon.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body class="login">
<!-- header starts here -->
<div id="facebook-Bar">
    <div id="facebook-Frame">
        <div id="logo"><img src="img/facebook-logo.png" class="logo" style="width: 150px; height: auto; padding-top: 1em;" alt=""></div>


        <div id="header-main-right">
            <div id="header-main-right-nav">
                <form method="post" action="" id="login_form" name="login_form">
                    <?php login(); ?>
                    <table border="0" style="border:none">
                        <tr>
                            <td ><input type="text" tabindex="1"  id="email" placeholder="Email or Phone" name="login-mail" class="inputtext radius1" value=""></td>
                            <td ><input type="password" tabindex="2" id="pass" placeholder="Password" name="login-pass" class="inputtext radius1" ></td>
                            <td ><input type="submit" class="fbbutton" name="login" value="Login" /></td>
                        </tr>
                        <tr>
                            <td><label><input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"/><span style="color:#ccc;">Keep me logged in</span></label>
                            </td>
                            <td><label><a href="" style="color:#ccc; text-decoration:none">forgot your password?</a></label></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- header ends here -->
<div class="loginbox radius">
    <h2 style="color:#141823; text-align:center;">Welcome to Facebook</h2>
    <div class="loginboxinner radius">
        <div class="loginheader">
            <h4 class="title">Connect with friends and the world around you.</h4>
        </div><!--loginheader-->

        <div class="loginform">

            <form id="register" action="" method="post">
                <?php register();  ?>
                <p>
                    <input type="text" id="username" name="username" placeholder="Username" value="" class="radius mini" />
                </p>
                <p>
                    <input type="text" id="fname" name="fname" placeholder="First Name" value="" class="radius mini" /> <input type="text" id="lname" name="lname" placeholder="Last Name" value="" class="radius mini" />
                </p>
                <p>
                    <input type="text" id="email" name="email" placeholder="Your Email" value="" class="radius" />
                </p>
                <p>
                    <input type="text" id="confemail" name="confemail" placeholder="Re-enter Email" class="radius" />
                </p>
                <p>
                    <input type="password" id="password" name="password" placeholder="Password" class="radius" />
                </p>
                <p>
                    <input type="password" id="confpassword" name="confpass" placeholder="Re-enter Password" class="radius" />
                </p>
                <p>
                    <button class="radius title" name="register">Sign Up for Facebook</button>
                </p>
            </form>
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->

<div id="ad" style="width:100%; margin-top:50px;">
    <center><script type="text/javascript"><!--
            google_ad_client = "ca-pub-5104998679826243";
            /* mysite */
            google_ad_slot = "2922638918";
            google_ad_width = 250;
            google_ad_height = 250;
            //-->
        </script>
        <script type="text/javascript"
                src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
    </center>
</div>




<p style="font-size:12px;">
</p>

</body>

</html>
