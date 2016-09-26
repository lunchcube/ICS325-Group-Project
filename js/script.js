tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
if(nyear<1000) nyear+=1900;
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

document.getElementById('clock').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
}

window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}

function formCheck(object) {

    if (document.getElementById("login").value == "" || document.getElementById("login").value == null) {
        document.getElementById('login-alert').innerHTML = " Must not be blank.";
        return false;
    }
    if (document.getElementById("password").value == "" || document.getElementById("password").value == null) {
        document.getElementById("pass-alert").innerHTML = " Must not be blank.";
        return false;
    }
    else if (document.getElementById("password").value.length < 8) {
        document.getElementById("pass-alert").innerHTML = "Must be at least 8 characters.";
        return false;
    }
    if (document.getElementById("edit-submitted-email").value == "" || document.getElementById("edit-submitted-email").value == null) {
        document.getElementById("email-alert").innerHTML = "Must not be blank.";
        return false;
    }
    else if (document.getElementById("edit-submitted-email").value.length > 0) {
        var email = document.getElementById("edit-submitted-email").value;
        var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".");

        if (!(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length))
            return true;
        else {
            document.getElementById("email-alert").innerHTML = "Please enter a valid e-mail address.";
            return false;
        }
    }
    if (document.getElementById("edit-submitted-postal-code").value.length > 0) {
        var zipIsNum = (/^\d+$/.test(document.getElementById("edit-submitted-postal-code").value));
        if (!zipIsNum) {
            document.getElementById("zip-alert").innerHTML = "Please enter 5 digit zip code.";
            return false;
        }
    }
    if (document.getElementById("edit-submitted-phone").value.length > 0) {
        var phoneIsValid = (/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test(document.getElementById("edit-submitted-phone").value));
        if (!phoneIsValid) {
            document.getElementById("phone-alert").innerHTML = "Please enter a valid 10 digit phone number.";
            return false;
        }
    }

        if (document.getElementById("edit-submitted-card-num").value.length > 0) {
        var cardIsValid = (/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test(document.getElementById("edit-submitted-card-num").value));
        if (!cardIsValid) {
            document.getElementById("card-alert").innerHTML = "Please enter a valid 8 digit card number.";
            return false;
        }
    }
}
function clearAlert(arg1){
    document.getElementById(arg1).innerHTML = "";
}