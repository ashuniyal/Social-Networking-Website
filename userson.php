<?php
session_start();
require_once "login.php";
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$random=$_SESSION['random'];
$query="select * from users";
$result=$conn->query($query);
$rows=$result->num_rows;
if($rows==0)
	echo "No other person on this site.";
else
{
	echo<<<_end
	<!DOCTYPE html>
<html>
<head>
<title>All users</title>
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
</style>
<link rel="stylesheet" type="text/css" href="newaccount.css"/>
</head>
<body>
<div id="go" style="border:2px solid; width:100%; padding-left: 10px ; margin-bottom:10px; height:50px;
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

<div class="main-content">
    	 <form class="form-labels-on-top" method="post">

            <div class="form-title-row">
                <h1>Users</h1>
            </div>
            <center>
            
_end;

	for($j=0;$j<$rows;$j++)
	{
   	$result->data_seek($j);
   	$row=$result->fetch_array(MYSQLI_ASSOC);
    $frname=$row['username'];
    $propic=$row['propic'];
    $fid=$row['id'];
    if($fid==$_SESSION['id'])
      continue;

  	  echo<<<_end
  	        <div class="form-row">
                <label>
                    <span style="font-family: cursive;color:green; font-size:25px" onclick="set('$fid','$frname')"><img src="$propic" height="150px" width="150px" style="border-radius:55%;" "/>$frname</span>
                </label>
            </div>
_end;

	}

}

echo<<<_end
</center>
</form>
</div>
<div class="main-content">
<form class="form-labels-on-top" method="POST" action="friendrequest.php">
<div class="form-row">
Friend name
<textarea  id="sel" rows="1" cols="20" required="required"></textarea>
<input type="hidden" name="id" id="select"/>
<div class="form-row">
<input type="submit" value="Send Request"/>
</div>
</form>
</div>
<script type="text/javascript">

function set(fid,frname)
  {
    document.getElementById("select").value=fid;
    document.getElementById("sel").innerHTML=frname; 
  }

</script>
</body>
</html>
_end;
?>