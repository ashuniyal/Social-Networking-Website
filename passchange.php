<?php
require_once "login.php";
session_start();
$sid=$_SESSION['id'];
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST['old_pass']))
  $pass=hash('ripemd128',$_POST['old_pass']);
$query="select * from users where Pass='$pass' and id='$sid' ";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
   $result->data_seek($j);
   $row=$result->fetch_array(MYSQLI_ASSOC);
   $spass=$row['Pass'];
}
if($spass)
{
  if(isset($_POST['new_pass'])&&isset($_POST['new_pass1']))
   {
 	    if($_POST['new_pass']==$_POST['new_pass1'])
        {
 	      $newpass=hash('ripemd128',$_POST['new_pass']);
 	      $query1="update users set Pass='$newpass' where Pass='$pass' and id='$sid' ";
 	      $_SESSION['pass']=$pass;
 	      echo<<<_end
        Password Changed Successfully.<br> <a href="first.php">Click Here to continue</a>
_end;
        } 
       else
        {
        echo<<<_end
        Entered passwords in both fields not match. <br><a href="password.php">Click here to enter fields again.</a>
_end;
        } 
    }
  else
    {
    echo<<<_end
      Enter passwords in both fields. <br><a href="password.php">Click here to enter fields again.</a>
_end;
    }
}
else
{
echo<<<_end
    Incorrect Password <br><a href="password.php">Click here to 
 		enter fields again.</a>
_end;
}

?>