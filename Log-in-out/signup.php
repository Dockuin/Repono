<?php
    $redirect = $_GET['redirect'];
    $url = "./authenticate?redirect=" . $redirect;
?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Tab Styling -->
		<title>Repono</title>
        <link rel="icon" href="../img/logo.png">

        <!-- Responsive Design Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Page Styling -->
		<script src="https://kit.fontawesome.com/7daaf9098f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../styles/login-signup-style.css">
        
    </head>
    <body id="background">
        <!-- Login Box -->
		<div class="info-container">
            <div class="change-page">
                <a href="./login.php?redirect=<?php echo $redirect ?>">Login</a>
                <a style="background-color: #363636;">Sign up</a>
            </div>
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
		</div>
        </div>
        <div class="footer">  
            <p><a href="https://github.com/The-Iceburg"><img class="iceburg" src="../img/theiceburg.png"/></p>
        </div>  
    </body>
</html>
