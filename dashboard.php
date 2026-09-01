<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: dashboard.php");
    exit();
}

// Prepare any user-specific or dynamic content
$user_id = $_SESSION["id"];

// Potentially query the database for more user data
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <link rel="icon" type="image/x-icon" href="Media/x-icon.ico">
        <link rel="stylesheet" href="styles.css" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            crossorigin="anonymous" />
        <script defer src="JavaScripts/highlightPage.js"></script>
        <script defer src="JavaScripts/toggleMenu.js"></script>
        <script defer src="JavaScripts/colourBlind.js"></script>
    </head>
    <body>
        <header>
            <div class="headerFlex">
                <div>
                    <a href="index.html">
                        <img
                            class="imgLogo"
                            src="Media/Website_Logo.jpg"
                            alt="York Hiking Logo" />
                    </a>
                </div>
                <a href="login.php"> <i class="fa fa-user"></i></a>
                <a href="javascript:void(0);" class="mobileMenu">
                    <i class="fa fa-bars"> </i>
                </a>
            </div>
            <nav class="navBar">
                <ul>
                    <li><a href="index.html">Home Page</a></li>
                    <li>
                        <a href="HBoots.html">Hiking Boots</a>
                    </li>
                    <li>
                        <a href="Coats.html">Coats</a>
                    </li>
                    <li>
                        <a href="Backpacks.html">Backpacks</a>
                    </li>
                    <li>
                        <a href="Tents.html">Tents</a>
                    </li>
                    <li>
                        <a href="login.php">Register/Login</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
           <h1>Welcome, <?php echo htmlspecialchars(
               $_SESSION["username"]
           ); ?>!</h1>
           <p>This is your dashboard.</p>
           <a href="PHP/logout.php">Logout</a>
        </main>
        <footer>
            <div class="halfLeft">
                <h6>About Us:</h6>
                <ul>
                    <li><a href="#About">About York Hiking</a></li>
                    <li><a href="FAQ.html">FAQ</a></li>
                    <li>
                        <button id="colourBlindToggle">
                            <i id="modeIcon" class="fas fa-sun">Toggle Theme</i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="halfRight">
                <h6>Contact Us:</h6>
                <p>
                    <a href="mailto:connor.gill-mead@yorksj.ac.uk">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a
                        href="https://www.facebook.com"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a
                        href="https://twitter.com"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a
                        href="https://www.instagram.com"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                </p>
                <p><i class="fas fa-copyright"></i> Connor Gill-Mead 2024</p>
            </div>
        </footer>
    </body>
</html>

