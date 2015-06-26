<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/assets/style_success.css">
	<title>Successful Login</title>
</head>
<body>
	<div id="wrapper">
		<h1>Welcome <?= $user['first_name'] ?>!</h1>
		<div class="user">
			<h2>User Information</h2>
			<p>First Name: <?= $user['first_name'] ?></p>
			<p>Last Name: <?= $user['last_name'] ?></p>
			<p>Email Address: <?= $user['email'] ?></p>
		</div>
		<form action="/login/logoff" method="post">
			<input type="submit" value="Log Off">
		</form>
	</div>
</body>
</html>