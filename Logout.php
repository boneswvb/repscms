<?php require_once("includes/Functions.php"); ?>
<?php require_once("includes/Sessions.php"); ?>

<?php
// destroy all sessions
$_SESSION["TrackingURL"] = null;
$_SESSION["UserId"] = null;
$_SESSION["Email"] = null;
$_SESSION["UName"] = null;

session_destroy();

// redirect to login page
Redirect_to("Login.php");
?>