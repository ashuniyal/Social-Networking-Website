<?php
require_once "login.php";
session_start();
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['id']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['dob']) && isset($_POST['sques']))
{
	$fname=addslashes($_POST['fname']);
	$lname=addslashes($_POST['lname']);
	$id=addslashes($_POST['id']);
	$password=hash('ripemd128',$_POST['password']);
	$gender=$_POST['gender'];
	$date=strtotime($_POST['dob']);
	$dob=date('Y-m-d',$date);
	$forgot=$_POST['sques'];
  $answer=$_POST['ans'];
  $random=rand(0,1000);
  $username=$fname." ".$lname;
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="select * from users";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $checkran=$row['random'];
   if($random==$checkran)
   {
   	$random=rand(0,1000);
   	$j=-1;
   }
}
$query="insert into users values('$fname','$lname','$username','$id','$password','$gender','$dob','$forgot','$answer','$random','')";
$result=$conn->query($query);

$query2="create table f".$random."(friendid text)";
$conn2=new mysqli($hn,$un,$pw,$db3);
if($conn2->connect_error) die($conn2->connect_error);
$conn2->query($query2);

$query3="create table posts".$random."(Sno int unsigned not null AUTO_INCREMENT KEY,tpost text,ppost text,post_on timestamp) ";
$conn3=new mysqli($hn,$un,$pw,$db4);
if($conn3->connect_error) die($conn3->connect_error);
$conn3->query($query3);

if($result)
{
  $_SESSION['id']=$id;
  $_SESSION['pass']=$password;
  $_SESSION['name']=$username;
  $_SESSION['random']=$random;
  $_SESSION['fname']=$fname;
  $_SESSION['lname']=$lname;
  $_SESSION['dob']=$dob;
  $_SESSION['gender']=$gender;
  $_SESSION['forgot']=$forgot;
  $_SESSION['answer']=$answer;
    echo "WELCOME";
    echo <<<_end
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Bio Data</title>
  <link rel="stylesheet" href="newaccount.css">

</head>

<body>
    <div class="main-content">
       <form class="form-labels-on-top" method="post" action="picupload1.php">

            <div class="form-title-row">
                <h1>Enter Your Details</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Email</span>
                    <input type="email" name="email"/>
                </label>
            </div>

      <div class="form-row">
                <label>
                    <span>Phone</span>
                    <input type="digit" name="phone" maxlength="10" min="1000000000" max="9999999999" size="20"/>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Hometown</span>
                    <input type="text" name="home" required/>
                </label>
            </div>
      
           
      
            <div class="form-row">
                <label>
                    <span>Current City</span>
                    <input type="text" name="current" required/>
                </label>
            </div>
            
            <div class="form-row">
                <label>
                    <span>Work at:</span>
                    <input type="text" name="work" required/>
                </label>
            </div>

            <div class="form-row">
                <button type="submit" value="submit">Sign Up</button>
            </div>

        </form>

    </div>

</body>

</html>
_end;
}
}
$conn->close();
?>