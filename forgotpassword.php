<?php
require_once "login.php";
session_start();
if(isset($_POST['ques'])&&isset($_POST['ans'])&&isset($_POST['id']))
{
	$qu=$_POST['ques'];
	$ans=$_POST['ans'];
	$id=$_POST['id'];
}
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$query="select * from users where id='$id' ";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
if($rows==0)
{
	echo "Invalid Username. Try again.";
}
else
{
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $sques=$row['forgot'];
   $sans=$row['answer'];
   $sid=$row['id'];
}
if($qu==$sques)
{
	if($ans==$sans)
	{
		$_SESSION['id']=$id;
		$query="select * from users where id='$id' ";
		$result=$conn->query($query);
		if(!$result) die($conn->error);
		$rows=$result->num_rows;
		for($j=0;$j<$rows;$j++)
		{	
   		$result->data_seek($j);
   		$row=$result->fetch_array(MYSQLI_ASSOC);
   		$name=$row['username'];
		$_SESSION['name']=$name;
		}



		echo<<<_end
		<meta http-equiv="refresh" content="0; URL='onlynewpass.php'"/> 
_end;
	}
	else
	{
		echo "Wrong answer. Try again.";
	}
}
else
{
	echo "Wong question selected. Try again.";
}

}

?>