<?php
session_start();
echo<<<_end
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
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
</head>

<body>
<div align="center">
		<form action="forchangepass.php" method="post" required="required">
			<p>
			Password:
			<input type="password" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required" />
			</p>
			<p>
			<input type="checkbox" onclick="myFunction()">Show Password
			</p>
			<p>
			<input type="submit" value="Submit"/>
		    </p>
     	</form>
</div>
</body>
</html>
_end;
?>