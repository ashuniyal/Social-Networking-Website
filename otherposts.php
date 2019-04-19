<?php
require_once "login.php";
session_start();
$u=0;
$random=$_SESSION['random'];
$propic=$_SESSION['propic'];
$conn=new mysqli($hn,$un,$pw,$db3);
$conn1=new mysqli($hn,$un,$pw,$db);
$conn2=new mysqli($hn,$un,$pw,$db4);
$query="select * from f".$random." ";
echo<<<_end
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Friend's Posts</title>
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
		
.data {
	margin-left: 1.5cm;
	font-weight: bold;
	font-size: 1cm;
	
}
.edit {
	text-decoration-color: blue;
	text-decoration: none;
}
.post {
	border: 50px solid;
	width: 300px;
	border-radius: 5px;
}

.post::-webkit-scrollbar{
	width: 10px;
}

.post::-webkit-scrollbar-thumb{
	border-radius: 5px;
	background: rgba(0,0,0,.1); 

}
</style>
<link rel="stylesheet" href="newaccount.css">
</head>

<body  style=" background-image: url(pbg.jpg); height:100%; background-position:center; background-size:cover; background-attachment:fixed; background-repeat:no-repeat">
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
<div>
<center>
<div id="profile">
	<img style="border-radius:55%" class="profile" src="image/fr.jpg" alt="Profile Photo" width="350px" height="300px"/>
</div>
</center>
</div>
<br/>
<br/>
_end;
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
if($rows>0)
{
	echo<<<_end
			<span style="margin-top: 25px; margin-bottom: 25px ; margin-left: 42% ;text-align:center ; font-weight: bolder; font-size: 40px; color: hsla(143,97%,49%,0.8); border-bottom: 5px groove indigo">Friends posts</span><br/><br/><br/>
_end;
 for($i=0;$i<$rows;$i++)
  {
   		$result->data_seek($i);
   		$row=$result->fetch_array(MYSQLI_ASSOC);
   		$fid=$row['friendid'];
   		$query1="select * from users where id='$fid' ";
   		$result1=$conn1->query($query1);
   		$result1->data_seek(0);
   		$row1=$result1->fetch_array(MYSQLI_ASSOC);
   		$fran=$row1['random'];
   		$fname=$row1['username'];   		
   		$query2="select * from posts".$fran." order by post_on desc ";
   		$result2=$conn2->query($query2);
   		$rows2=$result2->num_rows;
		echo<<<_end
		<span style=" margin-top: 20px ;margin-left: 43% ;text-align:center ; font-weight: bold; font-size: 25px; color: hsla(11,98%,16%,0.7); border-bottom: 5px groove indigo">$fname Posts</span><br/><br/>
_end;
	 for($j=0;$j<$rows2;$j++)
	 {
   			$result2->data_seek($j);
   			$row2=$result2->fetch_array(MYSQLI_ASSOC);
   			$tpost=$row2['tpost'];
   			$ppost=$row2['ppost'];
   			$time=$row2['post_on'];
			$k=$u+1;

		echo<<<_end
		<span style=" margin-top: 20px ;margin-left: 49% ;text-align:center ; font-weight: bold; font-size: 20px; color: hsla(222,97%,24%,0.8); border-bottom: 5px groove indigo">Post $k</span>
_end;

		if($ppost!="NULL" && $tpost!="NULL")
		{

			echo<<<_end
			<div style="border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 30% ; border: 0px ; height:auto ; width: auto; max-width:2000px; max-height:2000px ">
 			<div style=" margin: 30px;  width: auto; max-width: 500px ;height: auto; max-height: 600px ; min-height: 100px ;"><img src="$ppost" height=600px width=500px>
 			</div>
 			<div class="post" style="background-color: hsla(289,97%,49%,0.3) ; width: auto; max-width: 300px ; height: auto; max-height: 400px ; border : 0px ;  font-family: cursive,sans-serif; font-size: 20px ; overflow: scroll; margin: 30px;margin-left:30%">$tpost</div>
 			</div>
 			<div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 32% ; font-size:15px">$time</span></div>
 			<hr size="6px" noshade color="black">
_end;
		}

		else if($tpost!="NULL")
		{
		echo<<<_end
		    	<div class="post" style="background-color: hsla(289,97%,49%,0.3) ; border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 30% ; width: 500px; height: auto; max-height: 400px ; min-height: 100px ; overflow: scroll ; padding: 10px ; border: 0px ; padding: 10px ; font-family: cursive,sans-serif; font-size: 20px;">$tpost</div>
		    	<div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 39% ; font-size:15px">$time</span></div>
		    	 			<hr size="6px" noshade color="black">
_end;
		}

		else if($ppost!="NULL")
		{
		echo<<<_end
 			<div style=" border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 30% ; width: auto; max-width: 500px ;height: auto; max-height: 400px ; min-height: 100px ;"><img src="$ppost" height=400px width=500px></div>
 			<div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 32% ; font-size:15px">$time</span></div>
 			 			<hr size="6px" noshade color="black">
_end;
		}
		else if($rows2==0)
		{
			echo<<<_end
		    	<div class="post" style="background-color: hsla(289,97%,49%,0.3) ; border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 39% ; width: auto; max-width: 300px ;height: auto; max-height: 400px ; min-height: 100px ; overflow: scroll ; padding: 10px ; border: 0px ; padding: 10px ; font-family: cursive,sans-serif; font-size: 20px">No posts from this friend.</div>			
_end;
		}
		
$u=$u+1;
	 }
 }
}
echo<<<_end
</body>
</html>
_end;
?>