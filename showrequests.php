<?php
session_start();
$myid=$_SESSION['id'];
require_once "login.php";
$conn=new mysqli($hn,$un,$pw,$db);
echo<<<_end
  <!DOCTYPE html>
<html>
<head>
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
<title>Show Request</title>
<link rel="stylesheet" type="text/css" href="newaccount.css"/>
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
<div class="main-content">
       <form class="form-labels-on-top" method="post">

            <div class="form-title-row">
                <h1>Friend Requests</h1>
            </div>
            <center>
            
_end;

if($conn->connect_error) die($conn->connect_error);
$random=$_SESSION['random'];
$query="select * from friend_requests where user_to='$myid' ";
$result=$conn->query($query);
$rows=$result->num_rows;
if($rows==0)
{
        echo<<<_end
                    <span style="font-size:20px ; text-align:center ; font-family: cursive;color:red;">No friend requests for you.</span>
                    <br/>
                
</center>
</form>
</div>
_end;
}	
else
{
	
	for($j=0;$j<$rows;$j++)
  {
   	$result->data_seek($j);
   	$row=$result->fetch_array(MYSQLI_ASSOC);
	$fid=$row['user_from'];
	$conn2=new mysqli($hn,$un,$pw,$db);
	if($conn2->connect_error) die($conn2->connect_error);
	$query2="select * from users where id='$fid'";
	$result2=$conn2->query($query2);
	if(!$result2) die($conn2->error);
	$rows2=$result2->num_rows;
	for($j2=0;$j2<$rows2;$j2++)
	{
 	  $result2->data_seek($j2);
  	  $row2=$result2->fetch_array(MYSQLI_ASSOC);
  	  $frname=$row2['username'];
      $fpic=$row2['propic'];

  	  echo<<<_end
  	        <div class="form-row">
                <label>
                    <span style="font-family: cursive;color:red;" onclick="set('$fid','$frname')"><img src="$fpic" height="150px" width="150px" style="border-radius:55%;" /><br/>&nbsp;&nbsp;&nbsp;$frname</span>
                </label>
            </div>
_end;
  }
}
}
echo<<<_end
</center>
</form>
</div>
<div class="main-content">
<form class="form-labels-on-top" method="POST" action="acceptrequest.php">
<div class="form-row">
Friend name
<input type="text" id="name"/>
<input type="hidden" name="identity" id="select" required>
<div class="form-row">
<input type="submit" value="Accept Request"/>
</div>
</form>
</div>
<form class="form-labels-on-top" method="POST" action="rejectrequest.php">
<div class="form-row">
<input type="hidden" id="sel" name="identity" required/>
<div/>
<div class="form-row">
<input type="submit" value="Reject Request"/>
</div>
</form>

<script type="text/javascript">

function set(frid,fname)
  {
    document.getElementById("name").value=fname;
    document.getElementById("select").value=frid; 
    document.getElementById("sel").value=frid;
  }
</script>
</body>
</html>
_end;
?>