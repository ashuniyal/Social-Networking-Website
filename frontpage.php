<?php 
require_once "login.php";
session_start();
if(isset($_SESSION['id'])&&isset($_SESSION['pass']))
{
  $id=$_SESSION['id'];
  $pass=$_SESSION['pass'];
}
if(isset($_POST['id']) && isset($_POST['password']))
{
	$id=addslashes($_POST['id']);
	$p=$_POST['password'];
	$pass=hash('ripemd128',$_POST['password']);
}
$sid="NULL";
$spass="NULL";
    $conn=new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error) die($conn->connect_error);
    $query="select * from users where id='$id' and Pass='$pass' ";
    $result=$conn->query($query);
    if(!$result) die($conn->error);
    $rows=$result->num_rows;
       for($j=0;$j<$rows;$j++)
        {
          $result->data_seek($j);
          $row=$result->fetch_array(MYSQLI_ASSOC);
          $fname=$row['fname'];
          $lname=$row['lname'];
          $name=$row['fname']. " " .$row['lname'];
          $sid=$row['id'];
          $spass=$row['Pass'];
          $random=$row['random'];
          $gender=$row['gender'];
          $dob=$row['dob'];
          $forgot=$row['forgot'];
          $answer=$row['answer'];
          $propic=$row['propic'];
        }

        if(($id==$sid) && ($pass==$spass))
        {
        	$_SESSION['id']=$sid;
 	        $_SESSION['pass']=$spass;
 	        $_SESSION['name']=$name;
          $_SESSION['random']=$random;
          $_SESSION['fname']=$fname;
          $_SESSION['lname']=$lname;
          $_SESSION['dob']=$dob;
          $_SESSION['gender']=$gender;
          $_SESSION['forgot']=$forgot;
          $_SESSION['answer']=$answer;
          $_SESSION['propic']=$propic;
	        echo "Welcome $name ! ";
	        echo<<<_end
          <meta http-equiv="refresh" content="0; URL='first.php'"/> 
 	        <a href="first11.php">Click here to continue.</a>
_end;  
        }

        else if(($id!=$sid) || ($pass!=$spass))
        {

          echo<<<_end
          Invalid UserName or Password.
	        <a href="frontpage1.php">Back to login page.</a>
_end;

        }
$conn->close();
$result->close();
?>