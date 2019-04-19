<?php
require_once "login.php";
session_start();
$random=$_SESSION['random'];
if(isset($_POST['tpost']) || $_FILES )
{
	if(!$_POST['tpost'])
	{
		$tpost="NULL";
	}
	else
	{
		$tpost=addslashes($_POST['tpost']);
	}

	if($_FILES)
	{
			$name=$_FILES['ppost']['name'];
   			 switch($_FILES['ppost']['type'])
	    		{
    			case 'image/jpeg': $ext="jpg" ; break;
    			case 'image/png':$ext='png'; break;
        		case 'image/gif':$ext='gif';break;
	        	default : $ext="";break;
    			}
   
			if($ext)
			{	
    		$name=$_FILES['ppost']['name'];
			move_uploaded_file($_FILES['ppost']['tmp_name'],"image/".$name);
			$ppost="image/".$name;
			}
			else
			{
			  $ppost="NULL";
		    }
	}

$conn=new mysqli($hn,$un,$pw,$db4);
$query="insert into posts".$random."(tpost,ppost) values('$tpost','$ppost') ";
$conn->query($query);

echo<<<_end
Your post has been uploaded successfully.
<a href="myposts.php">Click here to continue.</a>
_end;

}
else
{

echo<<<_end
No post has been uploaded.
Please fill up the fields properly.
<a href="myposts.php">Click here to go back.</a>
_end;

}
?>