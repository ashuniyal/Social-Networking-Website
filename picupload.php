<?php
session_start();
$id=$_SESSION['id'];
$random=$_SESSION['random'];
require_once "login.php";
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
if($_FILES)
{
	$name=$_FILES['picupload']['name'];
    switch($_FILES['picupload']['type'])
    {
    	case 'image/jpeg': $ext="jpg" ; break;
    	case 'image/png':$ext='png'; break;
        case 'image/gif':$ext='gif';break;
        default : $ext="";break;
    }
}   
else
{
	echo "File not selected.";
}

if($ext)
{	
    $name=$_FILES['picupload']['name'];
	move_uploaded_file($_FILES['picupload']['tmp_name'],"image/".$name);
	$addr="image/".$name;

echo" 
	<html><body><span style='font-size: 20px; font-family: Georgia; font-weight:bold;''>Image is uploaded successfully.</span><br> The uploaded image is <img style='border-radius:55%; border:1px solid green' src='image/".$name."' alt='Unable to show image' height='250' width='200'>
";
	echo "<br><a href='first.php'>Click here to continue</a></body></html>";
	$_SESSION['propic']=$addr;
	$query="update users set propic='$addr' where id='$id' ";
	$conn->query($query);
}
else
{
	echo "Image not uploaded. <br> Please upload a image file.";
}

?>