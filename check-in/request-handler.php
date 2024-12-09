<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../');
	exit;
}

$IMSID = $_POST['ims-id'];

header('Location: check-in?ims-id=' . $IMSID);

?>