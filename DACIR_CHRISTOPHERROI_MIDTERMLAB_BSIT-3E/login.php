<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>LOGIN PAGE</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  body {
  background-image: url('https://scontent.fmnl7-1.fna.fbcdn.net/v/t1.6435-9/131377274_1090479128113983_3116698113926354632_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=e3f864&_nc_eui2=AeFQVd9ycOdS2vZP0YzVIk-3VhQ7io-KliZWFDuKj4qWJq2A3HzUJMw_VRne0fnT8lz7rCHkBEW_YiXiSub4L42k&_nc_ohc=ZPJCcLeZ89gAX-z2B6i&_nc_ht=scontent.fmnl7-1.fna&oh=683725fd8cd2e2fe9af2d0ada13d912b&oe=60A222AD');
background-size: 100%;
background-repeat: no-repeat;
height: 100%;
  color: white;
}
	  #buttn{
		  color:#fff;
		  background-color: #ff3300;
	  }
	  </style>
  
</head>

<body>
<?php
include("connection/connect.php"); //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
session_start(); // temp sessions
if(isset($_POST['submit']))   // if button is submit
{
	$username = $_POST['username'];  //fetch records from login form
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   // if records were not empty
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))  // if matching records in the array & if everything is right
								{
                                    	$_SESSION["user_id"] = $row['u_id']; // put user id into temp session
										 header("refresh:1;url=index.php"); // redirect to index.php page
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; // throw error
                                }
	 }
	
	
}
?>
  

<div class="pen-title">
  <h1>Super Bagnet Restaurant</h1>
</div>

<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2><center>Login to your Account</center></h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Username"  name="username"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="submit" id="buttn" name="submit" value="Login" />
    </form>
  </div>
  
  <div class="cta">Not Registered?<a href="registration.php" style="color:#f30;"> Create An Account</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

   



</body>

</html>
