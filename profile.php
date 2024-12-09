<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ./');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'u196840263_ormatist';
$DATABASE_PASS = 'databaseP45';
$DATABASE_NAME = 'u196840263_phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>

		<!-- Tab Styling -->
		<title>Robotics IMS - Home</title>
        <link rel="icon" href="./img/logo.png">

        <!-- Responsive Design Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Page Styling -->
		<script src="https://kit.fontawesome.com/7daaf9098f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./profilestyle.css">

    </head>
    <body id="grad">
        <nav>
            <li><a href="home"><i class="fas fa-home"></i> Robotics IMS</a></li>
            <li><a href="profile"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </nav>
        <div class="welcome-container">
            <h3 class="welcome-text"><?=$_SESSION['name']?>'s Profile</h3>
        </div>
		<div class="account-info-container">
            <h3 class="account-info-text">Your account details are below:</h3>
			<table class="account-info-text">
				<tr>
					<td>Username:</td>
					<td><?=$_SESSION['name']?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?=$email?></td>
				</tr>
			</table>
			<p>At this current time, if you wish to have any of your account details changed contact: enquires@theiceburg.net</p>
        </div>
    </body>
</html>