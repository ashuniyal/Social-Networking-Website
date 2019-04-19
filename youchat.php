<?php
session_start();
$myid=$_SESSION['id'];
$myname=$_SESSION['name'];
$pic=$_SESSION['propic'];
require_once "login.php";
if(isset($_POST['identity']) && isset($_POST['smsMessage']))
{
$fid=$_POST['identity'];
$message=addslashes($_POST['smsMessage']);
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

$query1="insert into chat(my_id,friend_id,message) values('$myid','$fid','$message') ";
$conn->query($query1);
$_SESSION['fid']=$fid;
$query2="select * from chat where (my_id='$myid' and friend_id='$fid') or (my_id='$fid' and friend_id='$myid') order by sent_on";
$result=$conn->query($query2);
if(!$result) die($conn->error);
$rows=$result->num_rows;

echo<<<_end
<!DOCTYPE html>
<html>
<head>
<title>Messages</title>
	<title>Chat Box</title>
	<link rel="stylesheet" type="text/css" href="chat.css"/>
		<style type="text/css">
		a{
			margin-right: 12px;
			color:white;
			text-decoration: none;
		}

		a button{
			display: inline-block;
			height: 50px;
			background-color: black;
			color:white;
			border:0px;
			font-family: sans-serif;
			font-size: 15px;
		}


	</style>
</head>
<body>
<div style="border:2px solid; width:60%; padding-left: 10px ; height:50px;
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
			<div class="chatlogs">
_end;

if($rows>0)
{
	for($j=0;$j<$rows;$j++)
	{
   		$result->data_seek($j);
   		$row=$result->fetch_array(MYSQLI_ASSOC);
   		$getmyid=$row['my_id'];
   		$sms=stripslashes($row['message']);
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
				<input type="hidden" name="identity" value='$fid' />
				<button type="submit">Send</button>
			</div>	
			</form>
		 <meta http-equiv="refresh" content="0; URL='firstchat.php'"/> 
		 </div>			 
</body>
</html>
_end;

}
?>