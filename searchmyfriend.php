<?php
session_start();
$random=$_SESSION['random'];
require_once "login.php";
if(isset($_POST['friendname']))
{
	$frname=$_POST['friendname'];
}
$conn=new mysqli($hn,$un,$pw,$db3);
if($conn->connect_error) die($conn->connect_error);
$query="select * from f".$random." ";
$result=$conn->query($query);
if(!$result) die($conn->error);
$rows=$result->num_rows;
echo<<<_end
<ul style="list-style-type: none">
_end;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $fid=$row['friendid'];

   $conn2=new mysqli($hn,$un,$pw,$db);
   if($conn2->connect_error) die($conn2->connect_error);
	$query2="select * from users where id='$fid' and username like '%".$frname."%' ";
	$result2=$conn2->query($query2);
	if(!$result2) die($conn2->error);
	$rows2=$result2->num_rows;
	for($k=0;$k<$rows2;$k++)
	{
   		$result2->data_seek($k);
   		$row2=$result2->fetch_array(MYSQLI_ASSOC);
   		$gfrname=$row2['username'];
   		$picaddress=$row2['propic'];
   		echo<<<_end
   		<li style="height:26px"><span class="form-row" onclick="selectf('$fid','$gfrname')" ><img src="$picaddress" height="25px" width="25px" /> &nbsp; $gfrname</span>
   		</li>
_end;
   	}	

}
echo "</ul>"


?>