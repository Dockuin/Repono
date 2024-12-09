<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'u196840263_dockuin';
$DATABASE_PASS = 'databaseP45';
$DATABASE_NAME = 'u196840263_inventory';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$IMSID = $_GET['ims-id'];

$stmt = $con->prepare('UPDATE Item_Table SET Checked_In = 0 WHERE IMS_ID="' . $IMSID . '"');

$stmt->execute();
$stmt->close();
header('Location: ./');
?>