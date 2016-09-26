
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Login</title>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/script.js"></script>

</head>

<body>

<div class="wrapper">
    <div class="top-bar" >
        <table id="top-bar-table"><tr><td id="clockbox" align="left" colspan="2"></td>
                <td valign="middle"  align="right">
                    <?php 
                    
                    session_start();

                    //If session 'name' is set, displays username
                    if(isset($_SESSION["name"])){
                        header("Location: index.php");
                        print 'Welcome '.$_SESSION["name"].' |  '.'<a href="logout.php" title="logout">Logout</a>';
                        //If user is admin, display all users instead
                        if(isset($_SESSION["admin"]) == 1) print ' |'.'<a href="admin.php" title="admin">Admin</a>';
                    }
                    else
                    {
                        print '<a href="login.php" title="login">Log in</a>'.' |  '.'<a href="register.php" title="register">Register</a>';
                    }

                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="header">
        <table  id="header-table" cellpadding="0" cellspacing="1" width="100%"><tr>
                <td align="left"><h2><strong>Login</strong></h2></td>
                <td align="right"><ul class="nav">
                        <li class="active menu-item" id="item-1"><a class=" active" href="index.php" title="Home">Home</a></li>
                        <li class="menu-item" id="item-2"><a href="men.php" title="Men">Men</a></li>
                        <li class="menu-item" id="item-4"><a class="" href="women.php" title="Women">Women</a></li>
                        <li class="menu-item" id="item-5"><a href="Kids.php" title="Kids">Kids</a></li><li class="menu-item" id="item-6"><a href="cart.php" title="Cart">Cart</a></li>
                </td>

            </tr>
        </table>
    </div>
    <?php if (isset($_GET['Message'])) {?>
        <table bgcolor="#BCED91" align="center" width="100%"><tr><td><div style="text-align:center;" >
                    <?php print  $_GET['Message'];?>
                </div>
            </td>
        </tr>
        </table>
    <?php }?>
    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>&nbsp;</td></tr>


        <tr>
            <td>
                <table class="content-table">

                    <tr><td><form action="login-process.php" style="width:610px;" accept-charset="UTF-8" method="post" id="webform-client-form-login" class="webform-client-form-login" enctype="multipart/form-data">

                                <div><div class="form-item" id="form-item-user-name"><div class="form-item" id="edit-submitted-user-name-wrapper">
                                            <label>Username: </label>
                                            <input type="text" maxlength="128" name="user_name" id="edit-submitted-user-name" size="60" value="" class="form-text">
                                        </div>
                                        <div><div class="form-item" id="form-item-pass"><div class="form-item" id="edit-submitted-pass-wrapper">
                                                    <label>Password: </label>
                                                    <input type="password" maxlength="128" name="pass" id="edit-submitted-pass" size="60" value="" class="form-text">
                                                </div>



                                            </div>

                                        </div>
                                        <div style="font-size:12px;text-align:right">Don't you have an account? Click here to <a href="register.php" style="font-size:14px">Register</a></div>
                                        <div id="edit-actions" class="form-actions form-wrapper"><input type="submit" name="op" id="edit-submit" value="Submit" class="form-submit">
                                        </div>
                                    </div></form></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div class="footer">
    <table align='center'><tr><td>
                <a class="" href="about.php" title="About us">About Us | </a>
                <a class="" href="careers.php" title="careers">Careers | </a>
                <a class="" href="contactus.php" title="contact us">Contact us | </a>
                <a href="location.php" title="where to find us">Where to find us</a></td>
            <td id="clock"></td>
        </tr>
        <tr > <td>Follow us: &nbsp;&nbsp;<img src="images/social-media.png"  alt="socialmedia" width="142"></td></tr>
    </table></div>
</body>
</html>
