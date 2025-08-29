<?php
session_start();
?>
<!DOCTYPE html>
<html>    
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
                    <img src=""  width="250" height="250" >
					</div>
				</div>
				
				<div class="d-flex justify-content-center form_container">
				<form method = "POST" action = "check.php" id="login">
                    <div style="background-color:blanchedalmond; width: 250px; height: 200px; border-radius: 24px; padding: 45px 16px  77px 16px;" class="mx-auto" align-self-center>
					
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" placeholder="username" Required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" class="form-control input_pass" placeholder="password" Required>
						</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
							<input type="submit" name="submit" value="Login" class ="btn btn-primary" >
		
							</form>
				   </div>	
				</div>
		
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>
