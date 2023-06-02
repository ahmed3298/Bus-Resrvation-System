<?php
session_start();
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="sign-up.css">
	
</head>

<body>
	<div>
		<img src="logo.png" alt="logo" width="150" height="100">
	  	<form class="form" action="registration.php" method="POST" name="form" onsubmit="return validateForm()">
			<div class="frmd">
				<h3>Register Here</h3><br>
				<div>
					<label for="email">Email :</label>
					<input type="email" name="email" placeholder="Enter Email" required>
					<span class="formerror"></span>
				</div>
				<div>
					<label for="username">Username :</label>
					<input type="text" name="username" placeholder="Enter Username" required><br>
					<span class="formerror"></span>
					<?php
					if(isset($_SESSION['exist']) && $_SESSION['exist'] !=''){
						echo '<span style="color: white;">'.$_SESSION['exist'].'<span>';
						unset($_SESSION['exist']);
					}
					?>
				</div>
				<div id="pass">
					<label for="password">Password :</label>
					<input type="password" name="password" placeholder="Enter Password" required>
					<span class="formerror"></span>
				</div>
				
				<br><br>
				<input type="submit" class="btn btn-primary" value="Register">
			</div>
		</form>
	</div>
	<script>
        function clearErrors(){
            error = document.getElementsByClassName('formerror');
            for(Let item of errors){
                item.innerHTML = '';
            }
        }
        function seterror(id , error){
            element = document.getElementById(id);
            element.getElementsByClassName('formerror')[0].innerHTML = error;
        }
        function validateForm(){
            var returnval = true;
            var email = document.forms['form']['email'].value;
            if(email.length == 0){
                seterror("email" , "Email cannot be empty")
                returnval = false;
            }
            if(email.length < 20){
                seterror("email" , "Email length is too long")
                returnval = false;
            }
			var uname = document.forms['form']['username'].value;
            if(uname.length == 0){
                seterror("username" , "Username cannot be empty")
                returnval = false;
            }
            if(uname.length < 20){
                seterror("username" , "Username length is too long")
                returnval = false;
            }
			var username = document.forms['form']['username'].value;
            var password = document.forms['form']['password'].value;
            if(password.length == 0){
                seterror("password" , "Password cannot be empty")
                returnval = false;
            }
            if(password.length > 6){
                seterror("password" , " Password length is Short")
                returnval = false;
            }
            return returnval;
        }
    </script>
</body>
</html>