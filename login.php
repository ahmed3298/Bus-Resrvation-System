<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Login</title>
<link rel="stylesheet" href="sign-in.css">
</head>

<body>
	<div>
		<img src="logo.png" alt="logo" width="150" height="100">
	  	
	  	<form method="POST" action="validation.php">
			<div class="frmd">
				<h2>Login Here</h2><br><br>
				<label for="uname">USERNAME</label>
				<input type="text" name="username" placeholder="Enter Username" required>
				<br><br>
				<label for="pass">PASSWORD</label>
				<input type="password" name="password" placeholder="Enter Password" required>
				<br><br>
				<input type="submit" class="btn btn-primary" value="Login"><br><br>
				<a href="signup.php" class="btn" style="float: right; background-color: whitesmoke"><b>Sign up</b></a>
			</div>
		</form>
			
	</div>
</body>
</html>
