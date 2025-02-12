<?php
session_start();

include('../Classes/dbQS.php');

$username = $_POST['username'];
$userPassword = $_POST['password'];

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($username, $userPassword) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
$user = new account();
$dbPassword = $user->get_password($username);

if (password_verify($userPassword, $dbPassword)) {
    // Verification success! User has logged-in!
    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $username;
    if (isset($_GET['redirect']) && $redirect != '') {
        $redirect = urldecode($_GET['redirect']);
        header('Location: ' . $redirect);
    } else {
        header('Location: ../Overview/home.php');
    }
} else {
    // Incorrect password
    echo 'Incorrect username and/or password!';
};

?>