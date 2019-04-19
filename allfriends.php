<?php
session_start();
	echo<<<_end
	<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="newaccount.css"/>
<style type="text/css">
    ul {
    list-style-type: none;
}

li
{ height:60px;
  font-size:35px;
  margin-top:4px;   
}

li a {
    display: block;
    color: hsla(240,97%,22%,1);
    padding: 8px 10px;
    text-decoration: none;
}

li a:hover {
    background-color:  hsla(39,40%,78%,0.4);
    color: hsla(307,97%,7%,0.8) ;
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
<title>All Friends</title>
</head>
<body>
<div id="go" style="border:2px solid; width:100%; padding-left: 10px ; margin-bottom:10px; height:60px;
background-color: black" >
  <a href="first.php"><button>Home</button></a>
  <a href="allfriends.php"><button>Friends</button></a>
  <a href="userson.php"><button>All Users</button></a>
  <a href="loadfriends.php"><button>Messages</button></a>
  <a href="myposts.php"><button>My Posts</button></a>
  <a href="otherposts.php"><button>Other Posts</button></a>
  <a href="exsettings.php"><button>Settings</button></a>
  <a href="logout.php"><button>Logout</button></a>
  <img src="logo.jpg"  style="height: 40px; width:60px"/>
</div>
<div class="main-content" style="width:50%; margin-left:25%; margin-top: 5% ;">
    	 <form class="form-labels-on-top" style="height:400px; width: 600px; border-radius: 40% ; background-color: hsla(255,60%,51%,0.3)" method="post">

            <div class="form-title-row">
                <span style="font-size:40px; font-weight:bolder; color:hsla(30,100%,50%,1); text-decoration:underline">FRIENDS</span>
            </div>
            <center>
            <ul style="margin-left:-37px">
                  <li><a href="chkfriends.php">My friends</a></li>
                  <br/>
                  <li><a href="showrequests.php">Friend Requests</a></li>
                  <br/>
            </ul>
            </center>
</form>
</div>
</body>
</html>
_end;
?>