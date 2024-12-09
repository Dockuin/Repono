<?php
    $redirect = $_GET['redirect'];
    $url = "./authenticate?redirect=" . $redirect;
?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Tab Styling -->
		<title>Robotics IMS</title>
        <link rel="icon" href="../img/logo.png">

        <!-- Responsive Design Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Page Styling -->
		<script src="https://kit.fontawesome.com/7daaf9098f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../styleing.css">
        
        <!-- Google reCAPTCHA CDN -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script> 

    </head>
    <body id="grad">
        <div class="col-logo-container">
            <img class="logo" src="../img/titlelogo.png"/>
        </div>
        <div class="col-login-container">
            <!-- Login Box -->
			<div class="login-container">
				<h2>Login to Robotics IMS</h2>
				<form action="<?php echo $url ?>" method="post">
                    <div>
				        <label for="username">
				        	<i class="fas fa-user"></i>
				        </label>
				        <input type="text" name="username" placeholder="Username" id="username" required>
                    </div>
                    <div>
					    <label for="password">
					    	<i class="fas fa-lock"></i>
					    </label>
					    <input type="password" name="password" placeholder="Password" id="password" required>
                    </div>
                    <div>
                        <input type="submit" value="Login">
                    </div>
				</form>
                <div class="request-access">
                    <a href="../request-access">Request Access</a>
                </div>
			</div>
        </div>
        <div class="footer">  
            <p><a href="https://github.com/The-Iceburg"><img class="iceburg" src="../img/theiceburg.png"/></p>
        </div>  
    </body>
</html>
