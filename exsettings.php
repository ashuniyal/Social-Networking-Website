<?php
echo<<<_end
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
   #go a{
      margin-right: 12px;
      color:white;
      text-decoration: none;
    }

 #go a button{
      display: inline-block;
      height: 40px;
      background-color: black;
      color:white;
      border:0px;
      font-family: sans-serif;
      font-size: 15px;
    }

	ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 330px;
}

li
{ height:60px;
  font-size:35px;
  margin-top:4px;	
}

li a {
    display: block;
    color: hsla(240,97%,22%,1);
    padding: 8px 16px;
    text-decoration: none;
}

li a:hover {
    background-color:  hsla(39,40%,78%,0.4);
    color: hsla(307,97%,7%,0.8) ;
}
</style>
<title>Settings</title>
</head>

<body style="background-image: url(setttings.jpg); height:100%; background-position:center; background-size:cover; background-attachment:fixed; background-repeat:no-repeat">
<div id="go" style="border:2px solid; padding-left: 10px ; width:100%; margin-bottom:10px; height:50px;
background-color: black" >
  <a href="first.php"><button>Home</button></a>
  <a href="allfriends.php"><button>Friends</button></a>
  <a href="userson.php"><button>All Users</button></a>
  <a href="loadfriends.php"><button>Messages</button></a>
  <a href="myposts.php"><button>My Posts</button></a>
  <a href="otherposts.php"><button>Other Posts</button></a>
  <a href="exsettings.php"><button>Settings</button></a>
  <a href="logout.php"><button>Logout</button></a>
</div>
<center>
  <span style="font-size:80px; font-weight:bolder ; color: hsla(200,97%,19%,1) ; border-bottom:3px groove #006; ">SETTINGS</span>
</center>
<br />
<br />
<center>
<div style="font-size:50px; width:40% ; background-color:hsla(71,100%,50%,0.5) ; border-radius:15%">
<ul>
  <li><a class="active" href="mydetails.php">Bio-Data</a></li>
  <br/>
  <li><a href="password.php">Change Password</a></li>
  <br/>
  <li><a href="username.php">Change Username</a></li>
  <br/>
  <li><a href="picupload1.php">Change Profile Pic</a></li>
  <br/>
  <li><a href="deleteaccount.php" style="color:red">Close Account</a></li>
</ul>
</div>
</center>
</body>
</html>
_end;
?>
