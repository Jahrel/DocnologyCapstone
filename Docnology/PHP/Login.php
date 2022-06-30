<?php

//Script to connect to Docnology database
include_once('../PHP/dbconnect.php');

//Signing in user based on valid credentials within databse
if(isset($_POST['login_btn'])){
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
	$user_info = mysqli_fetch_assoc($result);
    if($result->num_rows>0 and password_verify($password,$user_info['upassword'])===true){
		$sql_two = "SELECT * FROM patients WHERE id=" . $user_info["id"] . "";
		$patient = $conn->query($sql_two);
		if ($result->num_rows>0){
			echo "<script> window.location.href = 'patientlanding.php'; </script>";
		} else {
			echo "<script> window.location.href = 'docdashboard.php'; </script>";
		}
    }else{
        echo "<script>alert('Invalid Details');</script>";
    }
	$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form </title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://infiniteiotdevices.com/images/logo.png" rel="icon" sizes="16x16" type="image/gif" />
	<link rel="stylesheet" type="text/css" href="../Styles/Login.css">
</head>
<body>
	<div class="form">
		<form action="../PHP/Login.php" method="post">
			<h2>Docnology</h2>
			<div class="input-box">
				<i class="fa fa-user"></i>
				<input type="text" name="username" placeholder="Username" required="">
			</div>
			<div class="input-box">
				<i class="fa fa-lock"></i>
				<input type="password" name="password" placeholder="Password" required="">
			</div>
			<div class="input-box">
				<input type="submit" name="login_btn" value="Login">
			</div>
			<a href="#" class="a">Forget Password</a>
			<h5>Sign Up Using</h5>
			<ul>
				<li>
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span class="fa fa-facebook"></span>
				</a>
				</li>
				<li>
				<a href="#">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span class="fa fa-google"></span>
				</a>
				</li>
			</ul>
			<h4>Create account? <a href="#">Sign Up</a></h4>
		</form>
	</div>
</body>
</html>