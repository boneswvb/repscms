<?php
$NameError = "";
$EmailError = "";
$PasswordError = "";
$DateTime = date("j F Y h:i:s");
$AddedBy = $_SESSION["UName"];

if (isset($_POST["Submit"])) {
  if (empty($_POST["Name"])) {
    $NameError = "This field is required";
  } else {
    $Name = Test_User_Input($_POST["Name"]);
    if (!preg_match("/^[A-za-z .]*$/", $Name)) {
      $NameError = "Only spaces and letter allowed";
    }
  }

  if (empty($_POST["Email"])) {
    $EmailError = "This field is required";
  } else {
    $Email = Test_User_Input($_POST["Email"]);
    if (!preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $Email)) {
      $EmailError = "Incorrect email Format";
    }
  }

  if (empty($_POST["Password"])) {
    $PasswordError = "This field is required";
  } else {
    $Password = Test_User_Input($_POST["Password"]);
    if (!preg_match("/^(?=.*\d.*\d)(?=.*[A-Z]{1,}[a-z]{1,}[0-9]{1,}[\!\@\#\$\%\*\?\^\&\^]{1,}).{8,}/", $Password)) {
      $PasswordError = "Min 8 characters &dash; Must contain &dash; 1 or more capital letter/s & 1 or more lower cap letter/s & 1 or more number/s & 1 or more special character/s ";
    }
  }


  // get data from db to check if email adress is in db
  $EmailCheck = "";
  $ConnectingDB;
  $sql = "SELECT * FROM login";
  $Execute = $ConnectingDB->query($sql);
  while ($DataRows = $Execute->fetch()) {
    $EmailCheck = $DataRows["email"];

    // advise user is loaded
    if ($EmailCheck == $_POST["Email"]) {
      $_SESSION["ErrorMessage"] = "The email entered is allready in use. Please check.";
      Redirect_to("AddAUser.php");
    }
  }

  // check if data received is correct and add to db
  if (
    !empty($_POST["Name"])
    && !empty($_POST["Email"])
    && !empty($_POST["Password"])
  ) {
    if (
      preg_match("/^[A-za-z .]*$/", $Name)
      && preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $Email)
      && preg_match("/^(?=.*\d.*\d)(?=.*[A-Z]{1,}[a-z]{1,}[0-9]{1,}[\!\@\#\$\%\*\?\^\&\^]{1,}).{8,}/", $Password)
    ) {
      // send the data to the database and handle errors for the db side received
      $ConnectingDB;
      $sql = "INSERT INTO login(dateTime,name,email,password,added_by)";
      $sql .= "VALUES(:dateTimE, :namE, :emaiL, :passworD, :AddedBY)";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':dateTimE', $DateTime);
      $stmt->bindValue(':namE', $Name);
      $stmt->bindValue(':emaiL', $Email);
      $stmt->bindValue(':passworD', $Password);
      $stmt->bindValue(':AddedBY', $AddedBy);
      $Execute = $stmt->execute();

      if ($Execute) {
        $_SESSION["SuccessMessage"] = "User with ID : " . $ConnectingDB->lastInsertId() . " and name " . $Name . " was added.";
        Redirect_to("AddAUser.php");
      } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Please try again.";
        Redirect_to("AddAUser.php");
      }
    }
  }

}

// get user input 
function Test_User_Input($Data)
{
  return $Data;
}
;
?>