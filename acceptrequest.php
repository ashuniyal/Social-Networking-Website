<?php 
session_start();
$myid=$_SESSION['id'];
require_once "login.php";
if(isset($_POST['identity']))
{
$fid=$_POST['identity'];
$random=$_SESSION['random'];
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="select * from users where id='$fid' ";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $frandom=$row['random'];
}

$conn=new mysqli($hn,$un,$pw,$db3);
if($conn->connect_error) die($conn->connect_error);
    $query2="insert into f".$random." values('$fid') ";	
	$conn->query($query2);
	$query3="insert into f".$frandom." values('$myid') ";	
	$conn->query($query3);

$conn=new mysqli($hn,$un,$pw,$db);
$query4="delete from friend_requests where user_from='$fid' and user_to='$myid' ";
$conn->query($query4);	
echo<<<_end
<center> Friend request accepted.
<a href="first.php">Click here to continue</a>
</center>
_end;
}    
?>