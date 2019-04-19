<?php
echo<<<_end
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
<style type="text/css">
	
	form span{
		margin: 21%;
		font-size: 20px ;
		 font-family: Georgia;
		 font-weight:bold;
	}
	form input{
		 letter-spacing: 2px ;
		font-size:17px;
		font-family: cursive;
		color: hsla(331,98%,19%,0.9) ;
		padding-left: 20px ;
		margin-left: 21%;
		margin-top: 0px;
		margin-bottom: 30px;
		border:2px inset green;
		height:35px;
		width:300px;
		border-radius: 10px 30px;
	}

	#select{
		padding-left:0px;
		margin-left: 21%;
		margin-top: 0px;
		margin-bottom: 30px;
		border:2px inset green;
		height:35px;
		width:300px;
		border-radius: 10px 30px;		
	}


</style>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Create New Account</title>
	<script type="text/javascript">
	function myFunction() {
    var x = document.getElementById("psw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
	}

    function exist()
    {
      document.getElementById("btn").disabled=true;
      document.getElementById("warn").innerHTML="Id already exists.Please set a different id.";
    }
    function notexist()
    {
      document.getElementById("btn").disabled=false;
      document.getElementById("warn").innerHTML="Its alright.";
    }




  var XMLHttpRequestObject = false;   
    if (window.XMLHttpRequest)
     { 
      XMLHttpRequestObject = new XMLHttpRequest();
     } 
     else if (window.ActiveXObject)
      { 
        XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
      }  
      function getData(dataSource)
      {
        var a=document.getElementById("identity").value;

        if(XMLHttpRequestObject) 
            {
              XMLHttpRequestObject.open("POST", dataSource);
            XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');   

            XMLHttpRequestObject.onreadystatechange =function()    
             { 
               if (XMLHttpRequestObject.readyState == 4 &&
                XMLHttpRequestObject.status == 200)
                 { 
                   var b = XMLHttpRequestObject.responseText;
                   if(b==1)
                   {
                    notexist();
                   }
                   else if(b==0)
                   {
                    exist();
                   }
                 } 
             }   
          XMLHttpRequestObject.send("id="+a);       
             } 
       }  
	</script>
</head>
<body style=" background-image: url(6.jpg); height:100%; background-position:center; background-size:cover; background-attachment:fixed; background-repeat:no-repeat">

<div style=" background-color: hsla(170,88%,54%,0.4) ;border: 2px groove green; height:1000px; width:40%; margin-left: 400px ; margin-top: 40px; border-radius: 5% ; padding: 30px ">
 <form method="post" action="newaccount.php">

 	<span style=" font-family: Florence,cursive ; padding: 10px ; font-size:50px ; margin-left:35%; border-bottom: 7px solid hsla(245,95%,16%,0.9)" >Sign Up</span><br/><br/><br/><br/><br/>
	<span>First Name</span><br/>
                    <input type="text" name="fname"/><br/>
    <span>Last Name</span><br/>
                    <input type="text" name="lname"/><br/>
    <span>ID:</span><br/>
                    <input type="text" name="id" id="identity" onblur="getData('uniqueid.php')" required="required"/>
    <div style=" margin-left:32% ; color: hsla(331,98%,19%,0.9) ;font-size:17px;font-family: cursive; letter-spacing: 2px" id="warn">
    </div><br/>
    <span>Password:</span><br/>
                    <input type="password" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /input type="text" name="id" required="required"/><br/>
    <input style="height: 20px; width: 20px;" type="checkbox" onclick="myFunction()"/><span style=" font-size: 20px; margin-left:0px">Show Password</span><br/><br/>
    <span>Birthday:</span><br/>
                    <input style="color: hsla(331,98%,19%,0.9) ;font-size:17px;font-family: cursive; letter-spacing: 2px " type="date" name="dob" value="1960-01-01"/><br/>
    <span>Security Question</span><br/>
                    <div id="select">
                    <select style="color: hsla(331,98%,19%,0.9) ; font-family: Georgia;padding-top:3px ;font-size:17px; border:0px; border-radius: 10px 30px; height:35px; width:300px; " name="sques">
                        <option value="1">What is your first teacher's name?</option>
                        <option value="2">What is your mother's birth place?</option>
                        <option value="3">Who is your favorite actor, musician, or artist?</option>
                        <option value="4">In what city or town did your mother and father meet?</option>
                        <option value="5">What is your maternal grandmother's maiden name?</option>
                        <option value="6">In what city or town was your first job?</option>
                    </select>
                    </div>
    <span>Ans:</span><br/>
                    <input type="text" name="ans"/><br/>
    <span style=" margin-right: 30px ; ">Gender:</span>      
                    <input style="height: 15px; margin-left:0px ; width: 15px;" type="radio" name="gender" value="male"/>
                            <span style=" font-size: 15px; margin-left:0px; margin-right: 20px ; " >Male</span>
                      <input style=" margin-left:0px ; height: 15px; width: 15px;" type="radio" name="gender" value="female" />
                            <span style=" font-size: 15px; margin-left:0px" >Female</span><br/>
    <button style="font-size: 27px; font-weight: bolder;  height:60px; width:150px ;margin-left: 37% ; background-color: hsla(112,96%,40%,0.6) "  type="submit" id="btn" value="submit">Sign Up</button>

    </form>

</div>

</body>
</html>
_end;
?>