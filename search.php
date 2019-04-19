<?php
session_start();
require_once "login.php";
if(isset($_POST['sname']))
{
  $sname=addslashes($_POST['sname']);
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$random=$_SESSION['random'];
$query="select * from users where username like '%".$sname."%' ";

echo<<<_end
<!DOCTYPE html>
<html>
<head>
<title>Search</title>
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

<link rel="stylesheet" type="text/css" href="newaccount.css"/>
</head>
<body>
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
<div class="main-content">
       <form class="form-labels-on-top" method="post">

            <div class="form-title-row">
                <h1>Search Results</h1>
            </div>
            <center>
            
_end;

$result=$conn->query($query);
$rows=$result->num_rows;
if($rows==0)
{
        echo<<<_end
            <div class="form-row">
                <label>
                    <span style="font-family: cursive; color:green; font-size:20px" >No person with such name.</span>
                </label>
            </div>
_end;
}
else
{

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
                    <span style="font-family: cursive;color:green; font-size:30px" onclick="set('$fid','$frname')"><img src="$propic" height="150px" width="150px" style="border-radius:55%;" "/>$frname</span>
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
<input type="text" id="name" />
<input type="hidden" name="id" id="select" />
</div>
<div class="form-row">
<input type="submit" value="Send Request"/>
</div>
</form>
</div>
<script type="text/javascript">
function set(fid,fname)
  {  
    document.getElementById("name").value=fname;
    document.getElementById("select").value=fid; 
  }
</script>
</body>
</html>
_end;
}
?>