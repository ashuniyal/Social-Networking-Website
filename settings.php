<?php
session_start();
echo<<<_end
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Settings</title>
<style type="text/css">
.heading {
	text-align: center;
}
.heading {
	font-size: 36px;
	font-weight: bold;
}
.data {
	font-size: 36px;
	font-weight: bold;
	color: #03F;
	margin-left: 500px;
	font-family: "Comic Sans MS", cursive;
	float: right;
}
.menu {
	height: 200%;
	width: 400%;
	padding-top: 0px;
	margin-top: 0px;
	position: absolute;
}
.menu #MenuBar1 {
	font-family: Georgia, Times New Roman, Times, serif;
}
.menu #MenuBar1 {
	font-family: Arial Black, Gadget, sans-serif;
}
.menu #MenuBar1 {
	font-family: Tahoma, Geneva, sans-serif;
}
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
</style>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<div id="go" style="border:2px solid; width:100%; margin-bottom:10px; height:50px;
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
<div class="heading">Settings<span class="heading"></span></div>
<br/><br/><br/><br/><br/>

<div class="data">We at NAME provide you with all the solutions you want, at one place. </div>
<div class="menu">
  <div align="justify">
    
  <ul id="MenuBar1" class="MenuBarVertical">
    <li>
      <p align="left"><a href="picupload1.php" >Change Profile Pic</a> 
    </p>
  </li>

  	<li>
  	  <p align="left"><a class="MenuBarItemSubmenu" href="#">Personal Details</a>
	    </p>
  	 	<ul>
          <li>
            <p align="left"><a href="password.php">Change Password</a></p>
          </li>
          <li>
            <p align="left"><a href="username.php">Change Username</a></p>
          </li>
          <li>
            <p align="left"><a href="#">Add/Remove Phone Number</a></p>
          </li>
        </ul>
     
  </li>
  
  <li>
    <p align="left"><a href="deleteaccount.php">Close Account</a>
    </p>
  </li>
  <li>
    <p align="left"><a href="mydetails.php">Bio-Data</a></p>
  </li>
</ul>
<h1>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</h1>
</div>
</div>
</div>
</body>
</html>
_end;
?>