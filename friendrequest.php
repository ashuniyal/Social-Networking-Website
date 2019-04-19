<?php
session_start();
require_once "login.php";

if(isset($_POST['id']))
{
$user_from=$_SESSION['id'];
$user_to=$_POST['id'];
$random=$_SESSION['random'];

$conn=new mysqli($hn,$un,$pw,$db3);
if($conn->connect_error) die($conn->connect_error);

$query="select * from f".$random." ";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
$flag=1;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $id=$row['friendid'];
   if($id==$user_to)
   {
    $flag=0;
    break;
   }
}
if($flag==0)
{
echo<<<_end

<!DOCTYPE html>
<html>
<head>
<title>Friend Request</title>

<link rel="stylesheet" type="text/css" href="newaccount.css"/>
</head>
<body>
<div class="main-content">
         <form class="form-labels-on-top" method="post" action="first.php">

            <div class="form-title-row">
                <h1>Users</h1>
            </div>
            <center>
 <div class="form-row">
                <label>
                    <span style="color:green; font-size:40px">Already a friend.
                    </span>
                </label>
            </div>
_end;
}
else
{
$conn=new mysqli($hn,$un,$pw,$db);
$query="select * from friend_requests where user_from='$user_from' and user_to='$user_to' ";
$result=$conn->query($query);
$rows=$result->num_rows;

$query1="select * from friend_requests where user_from='$user_to' and user_to='$user_from' ";
$result1=$conn->query($query1);
$rows1=$result1->num_rows;


if($rows>0)
{
echo<<<_end

<!DOCTYPE html>
<html>
<head>
<title>Friend Request</title>

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

<link rel="stylesheet" type="text/css" href="newaccount.css"/>
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
<div class="main-content">
         <form class="form-labels-on-top" method="post" action="first.php">

            <div class="form-title-row">
                <h1>Users</h1>
            </div>
            <center>
 <div class="form-row">
                <label>
                    <span style="color:green; font-size:40px">Friend Request already sent.
                    </span>
                </label>
            </div>
_end;

}
else if($rows1>0)
{
echo<<<_end

<!DOCTYPE html>
<html>
<head>
<title>Friend Request</title>
<link rel="stylesheet" type="text/css" href="newaccount.css"/>
</head>
<body>
<div class="main-content">
       <form class="form-labels-on-top" method="post" action="first.php">

            <div class="form-title-row">
                <h1>Users</h1>
            </div>
            <center>
 <div class="form-row">
                <label>
                    <span style="color:green; font-size:40px">Friend request already received.
                    </span>
                </label>
            </div>
_end;
}
else
{
$query="insert into friend_requests(user_from,user_to) values('$user_from','$user_to') ";
$conn->query($query);
echo<<<_end

<!DOCTYPE html>
<html>
<head>
<title>Friend Request</title>
<link rel="stylesheet" type="text/css" href="newaccount.css"/>
</head>
<body>
<div class="main-content">
    	 <form class="form-labels-on-top" method="post" action="first.php">

            <div class="form-title-row">
                <h1>Users</h1>
            </div>
            <center>
 <div class="form-row">
                <label>
                    <span style="color:green; font-size:40px">Friend request successfully sent.
                    </span>
                </label>
            </div>
_end;
}
}
}
else
{
	echo<<<_end
             <div class="form-row">
                <label>
                    <span style="color:green; font-size:40px">No user selected.
                    </span>
                </label>
            </div>
_end;
}
echo<<<_end
            <div class="form-row" action="first.php">
                <label>
                 <button style="color:blue; height:50px; width:200px;" type="submit">Go back</button> 
                </label>
            </div>

</center>
</form>
</div>
</body>
</html>
_end;
?>