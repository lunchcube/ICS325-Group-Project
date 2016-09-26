<?php
/*****************************************
Author: Matthew Gabiou, Josh Caruso, Abu Ghanem
Date:   5/23/16
Description:
Contact page for the clothing site
 *****************************************/
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Contact Us</title>

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/script.js"></script>

</head>

<body>

<div class="wrapper">
    <div class="top-bar" >
        <table id="top-bar-table"><tr><td id="clockbox" align="left" colspan="2">Maggie's Boutique</td><td valign="middle"  align="right">
                    <?php
                    require 'session.php';
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div id="header">
        <table  id="header-table" cellpadding="0" cellspacing="1" width="100%"><tr>
                <td align="left"><h2><strong>Contact Us</strong></h2></td>
                <td align="right"><ul class="nav">
                        <li class="active menu-item" id="item-1"><a class=" active" href="index.php" title="Home">Home</a></li>
                        <li class="menu-item" id="item-2"><a href="men.php" title="Men">Men</a></li>
                        <li class="menu-item" id="item-4"><a class="" href="women.php" title="Women">Women</a></li>
                        <li class="menu-item" id="item-5"><a href="Kids.php" title="Kids">Kids</a></li><li class="menu-item" id="item-6"><a href="cart.php" title="Cart">Cart</a></li>
                </td>

            </tr>
        </table>
    </div>

    <table class="main-table" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>
                <table class="content-table">
                    <tr>
                        <td><p>
                            <h1></h1>  </p></td></tr>
                    <tr><td>
                            <!--        <form action="/contact-thankyou.html" onSubmit="return formCheck(this)" accept-charset="UTF-8" method="post" id="webform-client-form-135" class="webform-client-form" enctype="multipart/form-data">-->
<!--                            <form action="registration.php" onSubmit="return formCheck(this)" accept-charset="UTF-8" method="post" id="webform-client-form-135" class="webform-client-form" enctype="multipart/form-data">-->
                                <form action="registration.php" onSubmit="return formCheck(this)" accept-charset="UTF-8" method="post" id="webform-client-form-135" class="webform-client-form" enctype="multipart/form-data">
                                <div>
                                    <div class="form-item" id="form-item-login-id">
                                        <label><font color="red"> *</font>Login ID: </label>
                                        <input id="login" name="rlogin"  type=text" placeholder="Username" maxlength="15" size="60" class="form-text"><span id="login-alert" class="alert"></span>
                                    </div>
                                    <div class="form-item">
                                        <label><font color="red"> *</font>Password: </label>
                                        <input type="password" placeholder="Minimum 8 Characters" id="password" name="rpass" maxlength="64" class="form-text" size="60"><span id="pass-alert" class="alert"></span>
                                    </div>
                                    <div class="form-item" id="form-item-first-name">
                                        <div class="form-item" id="edit-submitted-first-name-wrapper">
                                            <label>First Name: </label>
<!--                                            <input type="text" maxlength="128" name="first_name" id="edit-submitted-first-name" size="60" value="" class="form-text">-->
                                            <input type="text" maxlength="128" name="rfirst_name" id="edit-submitted-first-name" size="60" class="form-text">
                                            <span id="fname-alert" class="alert"
                                        </div>
                                    </div>
                                    <div class="form-item" id="form-item-last-name"><div class="form-item" id="edit-submitted-last-name-wrapper">
                                            <label >Last Name: </label>
                                            <input type="text" maxlength="128" name="rlast_name" id="edit-submitted-last-name" size="60" value="" class="form-text">
                                        </div>
                                    </div>
                                    <div class="form-item" id="form-item-email"><div class="form-item" id="edit-submitted-email-wrapper">
                                            <label><font color="red"> *</font>Email: </label>
                                            <input type="text" maxlength="128" name="remail" id="edit-submitted-email" placeholder="someone@email.com"size="60" value="" class="form-text  email">
                                        </div>
                                    </div>
                                    <div class="form-item" id="form-item-address"><div class="form-item" id="edit-submitted-address-wrapper">
                                            <label>DOB: </label>
                                            <input type="text" maxlength="128" name="rdob" id="edit-submitted-dob" placeholder="MM/DD/YYYY" size="60" value="" class="form-text ">
                                        </div>
                                    </div>
                                    <div class="form-item" id="form-item-address"><div class="form-item" id="edit-submitted-address-wrapper">
                                            <label>Address: </label>
                                            <input type="text" maxlength="128" name="raddress" id="edit-submitted-address" placeholder="" size="60" value="" class="form-text ">
                                        </div>
                                    </div>
                                    <div class="form-item" id="form-item-city"><div class="form-item" id="edit-submitted-city-wrapper">
                                            <label>City:</label>
                                            <input type="text" placeholder="Brooklyn" maxlength="128" name="rcity" id="edit-submitted-city" size="60" value="" class="form-text ">
                                        </div>
                                    </div>
                                    <div class="form-item" id="form-item-state"><div class="form-item" id="edit-submitted-state-wrapper">
                                            <label>State / Province: </label>
    <span class="a" style="width:500px">
 <select name="rselect">
     <optgroup label="USA">
         <option selected="Select">Select</option>
         <option value="AL"> Alabama(AL)</option>
         <option value="AK"> Alaska(AK)</option>
         <option value="AZ"> Arizona(AZ)</option>
         <option value="AR"> Arkansas(AR)</option>
         <option value="CA"> California(CA)</option>
         <option value="CO"> Colorado(CO)</option>
         <option value="CT"> Connecticut(CT)</option>
         <option value="DE"> Delaware(DE)</option>
         <option value="FL"> Florida(FL)</option>
         <option value="GA"> Georgia(GA)</option>
         <option value="HI"> Hawaii(HI)</option>
         <option value="ID"> Idaho(ID)</option>
         <option value="IL"> Illinois(IL)</option>
         <option value="IN"> Indiana(IN)</option>
         <option value="IA"> Iowa(IA)</option>
         <option value="KS"> Kansas(KS)</option>
         <option value="KY"> Kentucky(KY)</option>
         <option value="LA"> Louisiana(LA)</option>
         <option value="ME"> Maine(ME)</option>
         <option value="MD"> Maryland(MD)</option>
         <option value="MA"> Massachusetts(MA)</option>
         <option value="MI"> Michigan(MI)</option>
         <option value="MN"> Minnesota(MN)</option>
         <option value="MS"> Mississippi(MS)</option>
         <option value="MO"> Missouri(MO)</option>
         <option value="MT"> Montana(MT)</option>
         <option value="NE"> Nebraska(NE)</option>
         <option value="NV"> Nevada(NV)</option>
         <option value="NH"> New Hampshire(NH)</option>
         <option value="NJ"> New Jersey(NJ)</option>
         <option value="NM"> New Mexico(NM)</option>
         <option value="NY"> New York(NY)</option>
         <option value="NC"> North Carolina(NC)</option>
         <option value="ND"> North Dakota(ND)</option>
         <option value="OH"> Ohio(OH)</option>
         <option value="OK"> Oklahoma(OK)</option>
         <option value="OR"> Oregon(OR)</option>
         <option value="PA"> Pennsylvania(PA)</option>
         <option value="RI"> Rhode Island(RI)</option>
         <option value="SC"> South Carolina(SC)</option>
         <option value="SD"> South Dakota(SD)</option>
         <option value="TN"> Tennessee(TN)</option>
         <option value="TX"> Texas(TX)</option>
         <option value="UT"> Utah(UT)</option>
         <option value="VT"> Vermont(VT)</option>
         <option value="VA"> Virginia(VA)</option>
         <option value="WA"> Washington(WA)</option>
         <option value="WV"> West Virginia(WV)</option>
         <option value="WI"> Wisconsin(WI)</option>
         <option value="WY"> Wyoming(WY)</option>
     </optgroup>
     <optgroup label="CANADA">
         <option value="AB"> Alberta(AB)</option>
         <option value="BC"> British Columbia(BC)</option>
         <option value="MB"> Manitoba(MB)</option>
         <option value="NB"> New Brunswick(NB)</option>
         <option value="NL"> New Foundland(NL)</option>
         <option value="NS"> Nova Scotia(NS)</option>
         <option value="ON"> Ontario(ON)</option>
         <option value="PE"> Prince Edward Island(PE)</option>
         <option value="QC"> Quebec(QC)</option>
         <option value="SK"> Saskatchewan(SL)</option>
     </optgroup>
 </select>
 </span></div>
                                    </div>
                                    <div class="form-item" id="form-item-postal-code"><div class="form-item" id="edit-submitted-postal-code-wrapper">
                                            <label>Postal Code: </label>
                                            <input type="text" maxlength="128" name="rpostal_code" placeholder="55434" id="edit-submitted-postal-code" size="60" value="" class="form-text ">
                                        </div>
                                    </div>
                                    <div class="form-item" id="form-item-phone"><div class="form-item" id="edit-submitted-phone-wrapper">
                                            <label>Phone: </label>
                                            <input type="text" maxlength="128" name="rphone" placeholder="952-555-3654" id="edit-submitted-phone" size="60" value="" class="form-text ">
                                        </div>
                                    </div>
                                    <div class="-component-textarea" id="component-comments">
                                        <div class="form-item" >
                                            <label>Terms and Conditions: </label>
    <textarea readonly cols="60" rows="5" name="rcomments" id="edit-submitted-comments" class="form-textarea ">Do you agree to the terms and conditions? Please check the box.
    </textarea>
                                        </div>
                                    </div>
                                    <div class="form-item">
                                        <label>Click if you agree.</label>
                                        <input type="checkbox" required name="cb1" value="NO">
                                    </div>
                                    <div class="form-item">
                                        <label>Gender: </label>
                                        <input type="radio" name="rgender" value="male" checked="yes">Male
                                        <input type="radio" name="rgender" value="female">Female</br>
                                    </div>

                                    <div id="edit-actions" class="form-actions form-wrapper"><input type="submit" name="op" id="edit-submit" value="Submit" class="form-submit">
                                    </div>
                                </div></form></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div class="footer">
    <div><table><td id="clock"></td></table></div>
    <a class="" href="about.php" title="About us">About Us  </a>|
    <a class="" href="careers.php" title="careers">Careers  </a>|
    <a class="" href="contactus.php" title="contact us">Contact us  </a>|
    <a href="location.php" title="where to find us">Where to find us</a>
</div>
</body>
</html>
