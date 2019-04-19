<?php
echo<<<_end
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Log-in</title>

    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <style type="text/css">
    #in
    {
    border-radius: 15px 50px;
    padding: 20px; 
    width: 400px;
    height: 15px; 
    }

    </style>


</head>

<body style=" background-image: url(2.jpg); height:100%; background-position:center; background-size:cover; background-attachment:fixed; background-repeat:no-repeat">
<div>
 <center>
    <img src="logo.jpg" style="height:200px; width:400px; margin-top:3%"/>
 </center>
</div>
  <div class="login-card" style="margin-top:1%; background-color:hsla(196,90%,12%,0.4);border: 1px solid hsla(275,90%,29%,0.6) ; border-radius: 20px 50px; height:25% ; width:35% ;">
  <center><span style="font-size:50px; font-weight:600; font-family:American-Typewriter,serif">Log-in</span></center><br>
  <form action="frontpage.php" method="post">
    <center>
    <input style="font-size:20px; font-family:cursive; color: hsla(331,98%,19%,0.9) ; "  id="in" type="text" name="id" placeholder="Username"  required="required">
    <br/><br/>
    <input style="font-size:20px; font-family:cursive; color: hsla(331,98%,19%,0.9) ; " id="in" type="password" name="password" placeholder="Password" required="required">
    <br/>
    <br/>
    <input style="border-radius: 15px 50px; width:400px ; font-weight:700; font-size:20px" type="submit" name="login" class="login login-submit" value="Login">
    </center>
  </form>

  <div class="login-help">
    <a style="color: hsla(95,92%,38%,0.8)" href="exnewaccount1.php"><button style="border-radius: 15px 50px; height:50px; width: 100px; background-color:hsl(95,93%,44%)">Sign up</button></a> • <a style="color: hsla(181,97%,49%,0.8)" href="for_pass.php">Forgot Password...?</a>
  </div>
</div>

</body>

</html>
_end;
?>