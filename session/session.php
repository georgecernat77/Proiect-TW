<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login/login.php");
}
$expirationTime = 3600 * 24;
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
  } else if (time() - $_SESSION['created'] > $expirationTime) {
    // Session has expired, destroy the session and log the user out
    session_unset();
    session_destroy();
    // Redirect the user to the login page or display a message
    header("Location: login.php");
    exit;
    }

?>