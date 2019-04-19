<?php
echo<<<_end
<html>
<head>
<script type="text/javascript">
var a=window.confirm("Do you really want to close your account?");
if(!a)
{
	window.stop();
}
</script>
</head>
</html>
_end;
require_once "login.php";
session_start();
$id=$_SESSION['id'];
$random=$_SESSION['random'];

$conn=new mysqli($hn,$un,$pw,$db3);
$conn1=new mysqli($hn,$un,$pw,$db);
$conn2=new mysqli($hn,$un,$pw,$db4);
$query="select * from f".$random." ";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
if($rows>0)
{
	for($i=0;$i<$rows;$i++)
  {
   		$result->data_seek($i);
   		$row=$result->fetch_array(MYSQLI_ASSOC);
   		$fid=$row['friendid'];
   		$query1="select * from users where id='$fid' ";
   		$result1=$conn1->query($query1);
   		$result1->data_seek(0);
   		$row1=$result1->fetch_array(MYSQLI_ASSOC);
   		$fran=$row1['random'];
   		$query2="delete from f".$fran." where friendid='$id' ";
   		$conn->query($query2);
  }
}

$conn=new mysqli($hn,$un,$pw,$db2);
if($conn->connect_error) die($conn->connect_error);
$query="drop table p".$random."";
$conn->query($query);

$conn=new mysqli($hn,$un,$pw,$db3);
if($conn->connect_error) die($conn->connect_error);
$query="drop table f".$random."";
$conn->query($query);

$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="update biodata set status='not a member' where id='$id' ";
$result=$conn->query($query);


$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="delete from users where id='$id' ";
$result=$conn->query($query);

$conn=new mysqli($hn,$un,$pw,$db4);
if($conn->connect_error) die($conn->connect_error);
$query="drop table posts".$random."";
$conn->query($query);

if(!$result)
 die($conn->error);
else
	echo "Account deleted successfully.<br/><a href='frontpage1.php'>Click here to go to homepage</a>";

?>