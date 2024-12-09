<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();echo $_SESSION;
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ./');
	exit;
}
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
        <link rel="stylesheet" href="./homestyle.css">

    </head>
    <body id="grad">
        <nav>
            <li><a href="home"><i class="fas fa-home"></i> Robotics IMS</a></li>
            <li><a href="profile"><i class="fas fa-user-circle"></i> Profile</a></li>
            <li><a href="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </nav>
        <div class="welcome-container">
            <h3 class="welcome-text">Welcome back, <?=$_SESSION['name']?>!</h3>
        </div>
        <div class="master-div">
            <div class="col-1-buttons">
                <button>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <i class="fas fa-plus fa-5x"></i>
                                <h1>Add Part</h1>
                            </div>
                            <div class="flip-card-back">
                                <h1>Add Part</h1>
                                <p>Add A New Part To The Database</p>
                            </div>
                        </div>
                    </div>
                </button>
                <a href="./view-item/" class="button">
                    <button>
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <i class="fas fa-search fa-5x"></i>
                                    <h1>View Item</h1>
                                </div>
                                <div class="flip-card-back">
                                    <h1>View Item</h1>
                                    <p>View An Exisiting Item In The Database</p>
                                </div>
                            </div>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-2-buttons">
                <button>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <i class="fas fa-minus fa-5x"></i>
                                <h1>Remove Part</h1>
                            </div>
                            <div class="flip-card-back">
                                <h1>Remove Part</h1>
                                <p>Remove An Existing Part From The Database.</p>
                            </div>
                        </div>
                    </div>
                </button>
                <button>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <i class="fas fa-database fa-5x"></i>
                                <h1>View Database</h1>
                            </div>
                            <div class="flip-card-back">
                                <h1>View Database</h1>
                                <p>View An Overview Of The Database</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
                <a href="./check-in/" class="button">
                    <div class="col-3-buttons">
                        <button>
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <i class="fas fa-check-square fa-5x"></i>
                                        <h1>Check In</h1>
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>Check In</h1>
                                        <p>Check An Existing Item Into The Database</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </a>
                <button>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <i class="fas fa-info fa-5x"></i>
                                <h1>Database Info</h1>
                            </div>
                            <div class="flip-card-back">
                                <h1>Database Info</h1>
                                <p>View Database Statistics and Information</p>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-4-buttons">
                <a href="./check-out/" class="button">
                    <button>
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <i class="fas fa-square fa-5x"></i>
                                    <h1>Check Out</h1>
                                </div>
                                <div class="flip-card-back">
                                    <h1>Check Out</h1>
                                    <p>Check An Exisiting Item Out Of The Database</p>
                                </div>
                            </div>
                        </div>
                    </button>
                </a>
                <a href="./admin-panel/" class="button">
                    <button>
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <i class="fas fa-lock fa-5x"></i>
                                    <h1>Admin Panel</h1>
                                </div>
                                <div class="flip-card-back">
                                    <h1>Admin Panel</h1>
                                    <p>Access the Admin Panel</p>
                                </div>
                            </div>
                        </div>
                    </button>
                </a>
            </div>
        </div>
    </body>
</html>