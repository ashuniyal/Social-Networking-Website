<?php
session_start();
require_once "login.php";
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST['newfname'])&&isset($_POST['newlname']))
{
	$fname=$_POST['newfname'];
	$lname=$_POST['newlname'];
    $name=$fname." ".$lname;
	$id=$_SESSION['id'];
	$query1="update users set fname='$fname' where id='$id' ";
    $query2="update users set lname='$lname' where id='$id' ";
    $query3="update users set username='$name' where id='$id' ";
    $conn->query($query1);
	$conn->query($query2);
    $conn->query($query3);
    $_SESSION['name']=$name;
    echo "Name updated </br> New name is ".$name;
    echo<<<_end
    <meta http-equiv="refresh" content="0; URL='first.php'"/>
    <a href="first.php">Click here to continue</a>
_end;
}
else
{
 echo<<<_end
 Please enter both fields. <br> <a href="changename.php">Click here to again fill the fields</a> 
_end;
}
?>