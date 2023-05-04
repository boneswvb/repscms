<?php require_once("includes/DB.php"); ?>

<?php
// redirect from 1 page to another
function Redirect_to($new_Location)
{
  header("Location:" . $new_Location);
  exit;
}

// check if a user is in the database
function CheckIfUserNameExist($UserName)
{
  global $ConnectingDB; //use global in functions or the functon will give error
  $sql = "SELECT username FROM admins WHERE username=:usernamE";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue('usernamE', $UserName);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result == 1) {
    return true;
  } else {
    return false;
  }
}

// log user on if valid credentials received
function Login_Attempt($Email, $Password)
{
  global $ConnectingDB;
  $sql = "SELECT * FROM login WHERE email = :emaiL AND password = :passworD LIMIT 1";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':emaiL', $Email);
  $stmt->bindValue(':passworD', $Password);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result == 1) {
    return $Found_Account = $stmt->fetch();
  } else {
    return null;
  }
}

// check if the user is loged on to access private pages
function Confirm_Login()
{
  if (isset($_SESSION["UserId"])) {
    return true;
  } else {
    $_SESSION["ErrorMessage"] = "Login Required";
    Redirect_to("Login.php");
  }
}
?>

<?php
// $_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
// Confirm_Login()
?>