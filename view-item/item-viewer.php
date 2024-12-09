<?php

$IMSID = $_GET['ims-id'];
echo $IMSID;
$url = urlencode('./view-item/item-viewer?ims-id=' . $IMSID);

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
// 	header("Location: ../?redirect=" . $url);
// 	exit;
// }
$DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'u196840263_dockuin';
// $DATABASE_PASS = 'databaseP45';
// $DATABASE_NAME = 'u196840263_inventory';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'inventory';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT Part_ID, Checked_In, Missing FROM Parts_Table WHERE Barcode="' . $IMSID . '"');

$stmt->execute();
$stmt->bind_result($partID, $checkedIN, $missing);
$stmt->fetch();
$stmt->close();

$stmt = $con->prepare('SELECT Part_Description, QTY, Part_Type FROM Parts_Table WHERE Part_ID="' . $partID . '"');

$stmt->execute();
$stmt->bind_result($partDesc, $QTY, $partType);
$stmt->fetch();
$stmt->close();

if ($checkedIN != 0) {
    $checkedInText = "Item is Checked In";
} else {
    $checkedInText = "Item is Checked Out";
}

if ($missing == 0) {
    $missingText = "Item is accounted for";
} else {
    $missingText = "Item is missing";
}
?>


<!DOCTYPE html>
<html>
	<head>

		<!-- Tab Styling -->
		<title>Robotics IMS - View Item</title>
        <link rel="icon" href="../img/logo.png">

        <!-- Responsive Design Tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- Page Styling -->
		<script src="https://kit.fontawesome.com/7daaf9098f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./style.css">

    </head>
    <body id="grad">
        <nav>
            <li><a href="../home"><i class="fas fa-home"></i> Robotics IMS</a></li>
            <li><a href="../profile"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="../logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            <li><a href="./"><i class="fas fa-arrow-left"></i> Go Back</a></li>
        </nav>
        <div class="welcome-container">
            <h3 class="welcome-text">Item <?=$IMSID?></h3>
        </div>
		<div class="account-info-container">
            <h3 class="account-info-text">Item details are below:</h3>
			<table class="account-info-text">
                <tr>
					<td>Part ID:</td>
					<td><?=$partID?></td>
				</tr>
                <tr>
					<td>Description:</td>
					<td><?=$partDesc?></td>
				</tr>
                <tr>
					<td>Quantity:</td>
					<td><?=$QTY?></td>
				</tr>
                <tr>
					<td>Part Type:</td>
					<td><?=$partType?></td>
				</tr>
				<tr>
					<td>Checked In:</td>
					<td><?=$checkedInText?></td>
				</tr>
				<tr>
					<td>Missing?:</td>
					<td><?=$missingText?></td>
				</tr>
			</table>
        </div>
    </body>
</html>