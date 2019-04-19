<?php
require_once "login.php";
session_start();
echo<<<_end
<script type="text/javascript">
window.alert("Do you really want to delete the chats!!?");
</script>
_end;
$myid=$_SESSION['id'];
$fid=$_SESSION['fid'];
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="delete from chat where (my_id='$myid' and friend_id='$fid') or (my_id='$fid' and friend_id='$myid') ";
$conn->query($query);
$_SESSION['fid']="NULL";
echo<<<_end
<div style="margin-top:25%; margin-left:37%; color:green; font-weight:bolder ; font-size:20px ">
Chat deleted successfully.
<a href="first.php">Click here to continue.</a>
<div>
_end;
?>