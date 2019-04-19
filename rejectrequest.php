<?php 
session_start();
$myid=$_SESSION['id'];
require_once "login.php";
if(isset($_POST['identity']))
{
$fid=$_POST['identity'];
$random=$_SESSION['random'];
$conn=new mysqli($hn,$un,$pw,$db);
$query="delete from friend_requests where user_from='$fid' and user_to='$myid' ";
$conn->query($query);	
echo<<<_end
<center> Friend request rejected.
<a href="first.php">Click here to continue</a>
</center>
_end;
}    
?>