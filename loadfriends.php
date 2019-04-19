<?php
session_start();
require_once "login.php";
$conn=new mysqli($hn,$un,$pw,$db3);
if($conn->connect_error) die($conn->connect_error);
$random=$_SESSION['random'];
$query="select * from f".$random." ";
$result=$conn->query($query);
$rows=$result->num_rows;
if($rows==0)
	echo "No friend to chat.";
else
{
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
<title>Friends</title>

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
    	 <form class="form-labels-on-top" method="post">

            <div class="form-title-row">
                <h1>Select Friend</h1>
            </div>
            <center>
            
_end;
	for($j=0;$j<$rows;$j++)
	{
   	$result->data_seek($j);
   	$row=$result->fetch_array(MYSQLI_ASSOC);
	$fid=$row['friendid'];
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
                    <span style="font-family: cursive;color:red; font-size:25px " onclick="set('$fid','$frname',this)" ><img src="$fpic" height="150px" width="150px" style="border-radius:55%;" "/>$frname</span>
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
<form class="form-labels-on-top" method="POST" action="firstchat.php">
<div class="form-row">
Friend name
<input type="text" id="name" />
<input type="hidden" name="identity" id="select" />
<div class="form-row">.
<input type="submit" value="GO"/>
</div>
</form>
</div>
<script type="text/javascript">

function set(frid,fname,x)
  {
    document.getElementById("name").value=fname;
    document.getElementById("select").value=frid; 
    x.style.color="green"; 
  }

function des(x)
  {
    document.getElementById("name").value="";
    document.getElementById("select").value=""; 
    x.style.color="red"; 
  }

</script>
</body>
</html>
_end;
}

?>