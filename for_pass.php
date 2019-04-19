<?php
session_start();
echo<<<_end
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Forgot Password</title>
</head>

<body>
<div align="center">
		<form action="forgotpassword.php" method="post" required="required">
			<p style="margin-left:1cm">
			Enter your Username:
			<input type="text" name="id" id="usrname1" required="required" />
			</p>
            Select Correct Security Question:
			<select name="ques">
				
				<option value="1">What is your first teacher's name?</option>
				<option value="2">What is your mother's birth place?</option>
				<option value="3">Who is your favorite actor, musician, or artist?</option>
				<option value="4">In what city or town did your mother and father meet?</option>
				<option value="5">What is your maternal grandmother's maiden name?</option>
				<option value="6">In what city or town was your first job?</option>
			</select>
			Select Correct Ans:
			<input type="text" name="ans" />
			<p>
			<input type="submit" value="Submit"/>
		    </p>
		</form>
</div>
</body>
</html>
_end;
?>