<?php

function generateRandomString($length = 3) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getEmailTemplate($templateHTML, $variablesArr) {
    foreach($variablesArr as $key => $value) {
        $templateHTML = str_replace($key, $value, $templateHTML);
    }
    return $templateHTML;
}

// check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['username']) && !isset($_POST['password'], $_POST['confirm-password'])) {
	// Could not get the data that should have been sent.
	exit('Please fill in all fields!');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit("Invalid email");
}

if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['username']) || !preg_match("/^[a-zA-Z-' ]*$/",$_POST['password'])) {
    exit("You can only use letters and white space in your username and/or passord");
}
if ($_POST['password']!= $_POST['confirm-password']) {
    exit('Passords do not match!');
}

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'u196840263_imasnowbody';
$DATABASE_PASS = 'databaseP45';
$DATABASE_NAME = 'u196840263_requests';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$requestID = generateRandomString();

$encrPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $con->prepare("INSERT INTO `accounts`(`request-id`, `email`, `username`, `password`, `status`) VALUES ('" . $requestID . "','" . $_POST['email'] . "','" . $_POST['username'] . "','" . $encrPassword . "','0')");

$stmt->execute();
$stmt->close();

$data = array('{requestID}' => $requestID, '{email}' => $_POST['email'], '{username}' => $_POST['username']);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
 
$mail = new PHPMailer(true);
 
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.hostinger.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'robotics-ims@theiceburg.net';                 
    $mail->Password   = 'treeboisd0DofE@utube';                        
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port       = 465;
 
    $mail->setFrom('robotics-ims@theiceburg.net', 'Robotics IMS');
    $mail->addReplyTo('robotics-ims@theiceburg.net', 'Robotics IMS');
    $mail->addAddress('ormatist@theiceburg.net', 'Ormatist');
    $mail->AddAddress('dockuin@theiceburg.net', 'Dockuin');
    
    $mail->isHTML(true);                                  
    $mail->Subject = $_POST['username'] . "'s Access Request";
    $mail->Body    = getEmailTemplate(file_get_contents('./message.html'), $data);
    $mail->AltBody = 'Whoops! your client doesnt currently support html emails :( Please load this message in another client';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>