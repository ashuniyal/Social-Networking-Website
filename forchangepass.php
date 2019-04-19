<?php
require_once "login.php";
session_start();
$sid=$_SESSION['id'];
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST['password']))
{
	$pass=hash('ripemd128',$_POST['password']);
}

$query="update users set Pass='$pass' where id='$sid' ";
 	      $_SESSION['pass']=$pass;
$conn->query($query); 	      
echo<<<_end
Password Changed Successfully.<br> <a href="frontpage.php">Click Here to continue</a>
_end;





?>