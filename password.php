<?php
session_start();
echo<<<_end
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("psw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
	}
	</script>
<link rel="stylesheet" href="newaccount.css">
<title>Change Password</title>
<!--<style type="text/css">
h1 {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size: xx-large;
	color: #09F;
	margin-left: 30%;
	position: absolute;
	margin-top: 5%;
	left: -34px;
	top: 10px;
}
.old_pass {
	margin-left: 30%;
	position: absolute;
	margin-top: 2%;
	height: 39px;
	color: #C00;
	font-family: Tahoma, Geneva, sans-serif;
	word-spacing: normal;
	left: 36px;
}
.new_pass {
	margin-left: 30%;
	position: absolute;
	margin-top: 2%;
	height: 39px;
	color: #C00;
	font-family: Tahoma, Geneva, sans-serif;
	word-spacing: normal;
	left: 36px;
}
</style>
-->
</head>
<body style="height:100%; background-position:center; background-size:cover; background-attachment:fixed; background-repeat:no-repeat">
<center>
            <div class="form-title-row">
                <span style="font-size:40px; font-weight:bolder; color: hsla(0,100%,48%,1); text-decoration:underline">Change Password</span>
            </div>
            <br/>
</center>
<div class="main-content">
<form class="form-labels-on-top" style=" border-radius: 15% ; background-color: hsla(62,100%,50%,0.3)" method="post" action="passchange.php">
<div class="form-row">
<label class="old_pass">Enter your existing password</label>
<input style="border-radius:10px 20px " name="old_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" id="psw" />
</div>
            <div class="form-row">
                <label>
                   <input type="checkbox" onclick="myFunction()"/><span>Show Password</span>
                </label>
            </div>
<div class="form-row"
<label class="new_pass">Enter your new password</label>
<input style="border-radius:10px 20px " name="new_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" id="psw" />
</div>
            <div class="form-row">
                <label>
                   <input type="checkbox" onclick="myFunction()"/><span>Show Password</span>
                </label>
            </div>
<div class="form-row">
<label class="new_pass">Enter your new password</label>
<input style="border-radius:10px 20px " name="new_pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" id="psw"/>
</div>
            <div class="form-row">
                <label>
                   <input type="checkbox" onclick="myFunction()"/><span>Show Password</span>
                </label>
            </div>
<div class="form-row">
<input style="font-weight:bold ; font-size: 20px ; border-radius:10px 20px; background-color:hsla(217,80%,60%,0.7) " type="submit" value="OK"/>
</div>
</form>
</div>
</body>
</html>
_end;
?>
