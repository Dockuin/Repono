<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
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
$stmt = $con->prepare('SELECT admin FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($admin);
$stmt->fetch();
$stmt->close();

if ($admin != 0) {
    header('Location: https://auth-db1039.hstgr.io/index.php?db=u196840263_phplogin');
	exit;
} else {
    exit('Error Invalid Credentials');
}
?>