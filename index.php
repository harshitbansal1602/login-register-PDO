<?php
include "config.php" ;
include "userClass.php" ;
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';
if (!empty($_POST['loginSubmit']))
{
	$usernameEmail=$_POST['usernameEmail'];
	$password=$_POST['password'];
	if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
	{
		$uid=$userClass->userLogin($usernameEmail,$password);
		if($uid)
		{
			$url=BASE_URL.'home.php';
			header("Location: $url"); 
		}
		else
		{
			$errorMsgLogin="Please check login details.";
		}
	}
}


if (!empty($_POST['signupSubmit']))
{
	$username=$_POST['usernameReg'];
	$name=$_POST['nameReg'];
	$password=$_POST['passwordReg'];
	$address=$_POST['addressReg'];

	$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

	if($username_check && $password_check && strlen(trim($name))>0)
	{
		$uid=$userClass->userRegistration($username,$password,$name,$address);
		if($uid)
		{
			$url=BASE_URL.'home.php';
			header("Location: $url"); }

			else
			{
				$errorMsgReg="Username or Email already exists.";
			}
		}
	}

	?>


	<head>
		<title></title>

		<link rel="stylesheet" type="text/css" href="main.css">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="main.js"></script>

	</head>
	<body>
		<div id="login">
			<h3>Login</h3>
			<form method="post" action="" name="login">
				<label>Username or Email</label>
				<input type="text" name="usernameEmail" autocomplete="off" />
				<label>Password</label>
				<input type="password" name="password" autocomplete="off"/>
				<div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
				<input type="submit" class="button" name="loginSubmit" value="Login">
			</form>
			<span id="registerClick">Click here to Register</span>
		</div>


		<div id="signup">
			<h3>Registration</h3>
			<form method="post" action="" name="signup">
				<label>Name</label>
				<input type="text" name="nameReg" autocomplete="off" />
				<label>Address</label>
				<input type="text" name="addressReg" autocomplete="off" />
				<label>Username</label>
				<input type="text" name="usernameReg" autocomplete="off" />
				<label>Password</label>
				<input type="password" name="passwordReg" autocomplete="off"/>
				<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
				<input type="submit" class="button" name="signupSubmit" value="Signup">
			</form>
			<span id="loginClick">Click here to Login</span>
		</div>	
	</body>
