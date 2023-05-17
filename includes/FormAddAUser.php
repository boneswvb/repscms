<?php
// field names
$NameError = "";
$EmailError = "";
$PasswordError = "";

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

  // do not use data if not correct
  // if (
  //   !empty($_POST["CompanyName"])
  //   && !empty($_POST["ReportingManagerName"])
  // ) {
  //   if (
  //     preg_match("/^[A-za-z \.]*$/", $CompanyName)
  //     && preg_match("/^[A-za-z \.]*$/", $ReportingManagerName)
  //   ) {
  //     // send the data to the database and handle errors for the db side received

  //     echo " correct details received";

  //   }
  // }

}

// get user input 
function Test_User_Input($Data)
{
  return $Data;
}
;
?>