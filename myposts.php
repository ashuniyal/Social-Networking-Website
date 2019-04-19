<?php
require_once "login.php";
session_start();
$random=$_SESSION['random'];
$propic=$_SESSION['propic'];
$conn=new mysqli($hn,$un,$pw,$db4);
$query="select * from posts".$random." order by post_on desc ";
echo<<<_end
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Posts</title>
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

<body style=" background-image: url(pbg4.jpg); height:100%; background-position:center; background-size:cover; background-attachment:fixed; background-repeat:no-repeat;">
<div style="border:2px solid; width:100%; padding-left: 10px ; height:50px;
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
	<img style=" margin-top:10px ;border-radius:55%" class="profile" src="$propic" alt="Profile Photo" width="220px" height="270px"/>
</div>
</center>
<br/>
<br/>
<center>
    <div class="form-row">
    	<form style="border-radius:17%; height:570px; padding-right:40px ; background-color: green " class="form-labels-on-top" method ="post" action="my_post.php" enctype="multipart/form-data" id="my_post">
    	<center><span style="font-size:30px " >Upload a post!!!!!</span></center>
    	<textarea style="height:200px; width:300px; border-radius:15%; padding:30px ; font-size: 25px; font-family: cursive; color: green; border:2px groove " value="my_post" name="tpost" placeholder="How was your day ......"
    	style="width:400px; height: 100px"></textarea>
    	<br/>
    	<br/>
    	<span style="font-size:30px " >Add picture :</span> 
    	<input style="border:2px solid; border-radius:20px 30px;font-size:15px;color:black  " type='file' name='ppost' size='10'>
    	</br>
    	<br/>
	<button type="sumbit" style="background-color: blue; border-radius: 5px; width: 100px; height: 40px; color:white; " form="my_post">
	Post
	</button>
	</form>
	</div>
	</br>
	</br> 
</center>
_end;
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
if($rows>0)
{
	echo<<<_end
			<span style="margin-top: 25px; margin-bottom: 25px ; margin-left: 41% ;text-align:center ; font-weight: bolder; font-size: 40px; color: hsla(143,97%,49%,0.8); border-bottom: 5px groove indigo">Previous posts</span><br/><br/><br/>
_end;
	for($j=0;$j<$rows;$j++)
	{
   		$result->data_seek($j);
   		$row=$result->fetch_array(MYSQLI_ASSOC);
   		$tpost=$row['tpost'];
   		$ppost=$row['ppost'];
   		$time=$row['post_on'];
$k=$j+1;
echo<<<_end
		<span style=" margin-top: 20px ;margin-left: 49% ;text-align:center ; font-weight: bold; font-size: 20px; color: hsla(222,97%,24%,0.8); border-bottom: 5px groove indigo">Post $k</span>
_end;
		if($ppost!="NULL" && $tpost!="NULL")
		{
		echo<<<_end
		<div style="border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 30% ; border: 0px ; height:auto ; width: auto; max-width:2000px; max-height:2000px ">
 			<div style=" margin: 30px;  width: auto; max-width: 500px ;height: auto; max-height: 600px ; min-height: 100px ;"><img src="$ppost" height=600px width=500px></div>
 			<div class="post" style="background-color: hsla(289,97%,49%,0.3) ; width: 500px; height: auto; max-height: 400px ; border : 0px ;  font-family: cursive,sans-serif; font-size: 20px ; overflow: scroll; margin: 30px;">$tpost</div>
 		</div>
 			<div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 32% ; font-size:15px">$time</span></div>
 			<hr size="6px" noshade color="black">
_end;
		}

		else if($tpost!="NULL")
		{
		echo<<<_end
		    	<div class="post" style="background-color: hsla(289,97%,49%,0.3) ; border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 32% ; width: 500px; height: 200px; overflow: scroll ; padding: 10px ; border: 0px ; padding: 10px ; font-family: cursive,sans-serif; font-size: 20px;">$tpost</div>
		    	<div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 39% ; font-size:15px">$time</span></div>
		    	 			<hr size="6px" noshade color="black">
_end;
		}
		else if($ppost!="NULL")
		{
		echo<<<_end
 			<div style=" border-radius:5% ; margin-top: 12px; margin-bottom: 2px ; margin-left: 32% ; width: auto; max-width: 500px ;height: auto; max-height: 400px ; min-height: 100px ;"><img src="$ppost" height=400px width=500px></div>
 			<div><span style="margin-top: 0px; margin-bottom: 25px ; margin-left: 32% ; font-size:15px">$time</span></div>
 			 			<hr size="6px" noshade color="black">
_end;
		}

	}
}
echo<<<_end
</body>
</html>
_end;
?>