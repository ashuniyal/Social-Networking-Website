<?php
require_once "login.php";
session_start();
$myid=$_SESSION['id'];
$name=$_SESSION['name'];
$conn=new mysqli($hn,$un,$pw,$db);
$query="select * from biodata where id='$myid' ";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
	$result->data_seek($j);
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$hometown=$row['hometown'];
	$currentcity=$row['currentcity'];
	$work=$row['work'];
	$phone=$row['phone'];
	$hometown=$row['hometown'];
	$email=$row['email'];
	$age=$row['age'];

}
echo<<<_end
<!DOCTYPE html>
<html>
<head>
	<title>Biodata</title>
	<style type="text/css">
		.data {
	font-weight: bold;
	font-size: 40px;
	}
	.data button{
		position:relative;
		margin-left:100%;
		margin-bottom:5%;
	}
	.heading {
	font-size: 50px;
	font-weight: 700;
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
</head>
<body style=" background-image: url(9.jpg); height:100%; background-position:center; background-size:cover; background-attachment:fixed; background-repeat:no-repeat">
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
<center>
	<div class="heading" style="margin-top:30px; color:#FAB303 ;border-radius:15% ; background-color:hsla(5,92%,54%,0.2); width:20% ; height:60px" >
		My Details
		<br/><br/>
	</div>
	<div class="data" style="margin-top:20px; color:#FF0017; border-radius:15% ; background-color:hsla(292,92%,54%,0.2); width:50%" >
	Name: $name
	<br/><br/><br/>
	Hometown: $hometown
	<br/><br/><br/>
    Current City: $currentcity
	<br/><br/><br/>
	Work At: $work
	<br/><br/><br/>
	Phone No: $phone
	<br/><br/><br/>
	Email: $email
	<br/><br/><br/>
    </div>
</center>
</script>
</body>
</html>
_end;
?>