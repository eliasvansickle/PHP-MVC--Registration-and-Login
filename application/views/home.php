<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/assets/style_home.css">
	<title>Login and Registration</title>
</head>
<body>
	<div id="wrapper">
		<div id="register">
			<h2>Register</h2>
			<form action="/login/validate_register" method="post">
				<input type="text" name="first_name" placeholder="First Name">
				<input type="text" name="last_name" placeholder="Last Name">
				<input type="text" name="email" placeholder="Email Address">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="passconf" placeholder="Password Confirmation">
				<input type="submit" value="Register">
				<?= $this->session->flashdata('registration_errors'); ?>
				<?= $this->session->flashdata('registration_success'); ?>
			</form>
		</div>
		<div id="login">
			<h2>Login</h2>
			<form action="/login/validate_login" method="post">
				<input type="text" name="email" placeholder="Email Address">
				<input type="password" name="password" placeholder="Password">
				<input type="submit" value="Log In">
				<?= $this->session->flashdata('login_errors'); ?>
				<?= $this->session->flashdata('login_fail'); ?>
				<?= $this->session->flashdata('logoff'); ?>
			</form>
		</div>
	</div>
</body>
</html>