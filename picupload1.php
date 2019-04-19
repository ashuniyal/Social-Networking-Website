<?php
session_start();
require_once "login.php";
if(isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['home'])&&isset($_POST['current'])&&isset($_POST['work']))
{
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $home=$_POST['home'];
  $current=$_POST['current'];
  $work=$_POST['work'];
  $id=$_SESSION['id'];
  $dob=$_SESSION['dob'];
  $today = date("Y-m-d");
  $diff = date_diff(date_create($dob), date_create($today));
  $age=$diff->format('%y');
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="insert into biodata values('$id','$email','$phone','$home','$current','$work','$age','member')";
$conn->query($query);
}
echo<<<_end
<html>
<head>
<style type="text/css">
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
	<title>Upload your Profile Photo</title>
	<link rel="stylesheet" href="newaccount.css">
</head>
<body>
<center>
<div class="main-content">
<form class="form-labels-on-top" method ="post" action="picupload.php" enctype="multipart/form-data">
<div class="form-row" >
Please choose your profile picture : <input type='file' name='picupload' size='10'></br>
</div>
<div class="form-row" >
<input type="submit" value="upload">
</div>
</form>
</div>
</br>
</br>
</center>
</body>
</html>
_end;
?>