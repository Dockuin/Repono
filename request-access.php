<!DOCTYPE html>
<html>
	<head>

		<!-- Tab Styling -->
		<title>Request Access</title>
        <link rel="icon" href="./img/logo.png">

        <!-- Responsive Design Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Page Styling -->
		<script src="https://kit.fontawesome.com/7daaf9098f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./req-access-stylez.css">

    </head>
    <body id="grad">
        <div class="col-logo-container">
            <img class="logo" src="./img/titlelogo.png"/>
        </div>
        <div class="col-login-container">
            <!-- Login Box -->
			<div class="login-container">
				<h2>Request Access to Robotics IMS</h2>
				<form action="request-access-request-handler" method="post">
                    <div>
				        <label for="email">
				        	<i class="fas fa-envelope"></i>
				        </label>
				        <input type="text" name="email" placeholder="Email Address" id="email" required>
                    </div>
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
					    <label for="confirm-password">
					    	<i class="fas fa-lock"></i>
					    </label>
					    <input type="password" name="confirm-password" placeholder="Confrim Password" id="confirm-password" required>
                    </div>
                    <div>
                        <input type="submit" value="Request Access">
                    </div>
                    <div class="request-access">
                        By clicking Request Access you accept our <a href="./privacypolicy">Privacy Policy</a>
                    </div>
				</form>
			</div>
        </div>
        <div class="footer">  
            <p><a href="https://github.com/The-Iceburg"><img class="iceburg" src="./img/theiceburg.png"/></p>
        </div>  
    </body>
</html>