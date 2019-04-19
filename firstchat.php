<?php
session_start();
$myid=$_SESSION['id'];
$myname=$_SESSION['name'];
$pic=$_SESSION['propic'];
$fid=0;
require_once "login.php";
if(isset($_POST['identity']))
{
$fid=$_POST['identity'];
$_SESSION['fid']=$fid;
}
else if(isset($_SESSION['fid']))
{
$fid=$_SESSION['fid'];
}
if($fid)
{
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);

$query="select * from users where id='$fid' ";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
if($rows>0)
{
	for($j=0;$j<$rows;$j++)
	{
   		$result->data_seek($j);
   		$row=$result->fetch_array(MYSQLI_ASSOC);
   		$fpic=$row['propic'];
   	}
}

$query="select * from chat where (my_id='$myid' and friend_id='$fid') or (my_id='$fid' and friend_id='$myid') order by sent_on";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
echo<<<_end
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  	a{
			margin-right: 12px;
			color:white;
			text-decoration: none;
		}

	a button{
			display: inline-block;
			height: 40px;
			background-color: black;
			color:white;
			border:0px;
			font-family: sans-serif;
			font-size: 15px;
		}


	</style>
<script type="text/javascript">
window.onload=function () {
     var objDiv = document.getElementById("cl");
     objDiv.scrollTop = objDiv.scrollHeight;
}
</script>
	<title>Messages</title>
	<link rel="stylesheet" type="text/css" href="chat.css"/>
</head>
<body>
<div style="border:2px solid; width:100%; padding-left: 10px ; margin-bottom:10px; height:50px;
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
		<div class="chatbox">
			<div class="chatlogs" id='cl' >

_end;

if($rows>0)
{
	for($j=0;$j<$rows;$j++)
	{
   		$result->data_seek($j);
   		$row=$result->fetch_array(MYSQLI_ASSOC);
   		$getmyid=$row['my_id'];
   		$sms=$row['message'];
  		 if($getmyid==$myid)
  			 {

echo<<<_end
		   		<div class="chat self">
		    	    <div class="user-photo"><img src='$pic'/></div>
				    <p class="chat-message">$sms</p>
	    	    </div>
_end;

 			  }

   		else
  			 {

echo<<<_end
				<div class="chat friend">
					<div class="user-photo"><img src='$fpic'/></div>
					<p class="chat-message">$sms</p>
				</div>
_end;

   			 }

	}
}
else
{

echo<<<_end
		   		<div class="chat self">
		    	    <div class="user-photo"></div>
				    <p class="chat-message">No messages for this friend.</p>
	    	    </div>
_end;

}

echo<<<_end
			</div>
			<form action="youchat.php" method="POST">
			<div class="chat-form">
				<textarea name="smsMessage"></textarea>
				<input type="hidden" name="identity" value='$fid'/>
				<button type="submit">Send</button>
			</div>	
			</form>		
		 </div>
		 <span style="position: absolute; margin-left: 78%; margin-top: -30%;">
		 <a href="deletechat.php"><button style="height:40px; width: 100px; background-color: hsla(125,90%,30%,0.6);  color: hsla(246,90%,30%,1); font-weight: 600; font-family: Cursive">Delete chat</button></a>
		 </span>
</body>
</html>
_end;

}
?>