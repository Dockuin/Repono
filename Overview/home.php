<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../Home/login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>

		<!-- Tab Styling -->
		<title>Repono - Home</title>
        <link rel="icon" href="../img/logo.png">

        <!-- Responsive Design Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Page Styling -->
		<script src="https://kit.fontawesome.com/7daaf9098f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../styles/home-style.css">
        <link rel="stylesheet" href="../styles/nav-style.css">

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
        $(function(){
        $("#includedContent").load("../nav-bar.htm"); 
        });
        </script>

    </head>
    <body id="grad">
        <div id="includedContent"></div>
        <div class="welcome-container">
            <h3 class="welcome-text">Welcome back, <?=$_SESSION['name']?>!</h3>
        </div>
        
    </body>
</html>