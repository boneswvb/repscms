<?php
// Field name
// Email
// VehicleType
// VehicleMake
// FuelType
// RegNumber
// CompOwn

// Vars for error handling
$EmailError = "";
$VehicleTypeError = "";
$VehicleMakeError = "";
$FuelTypeError = "";
$RegNumberError = "";
$CompOwnError = "";

if (isset($_POST["Submit"])) {
  if (empty($_POST["Email"])) {
    $EmailError = "This field is required";
  } else {
    $Email = Test_User_Input($_POST["Email"]);
    if (!preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $Email)) {
      $EmailError = "Incorrect email format";
    }
  }

  if (empty($_POST["VehicleType"])) {
    $VehicleTypeError = "This field is required";
  } else {
    $VehicleType = Test_User_Input($_POST["VehicleType"]);
    if (!preg_match("/[A-za-z]/", $VehicleType)) {
      $VehicleTypeError = "Incorrect email format";
    }
  }

  if (empty($_POST["VehicleMake"])) {
    $VehicleMakeError = "This field is required";
  } else {
    $VehicleMake = Test_User_Input($_POST["VehicleMake"]);
    if (!preg_match("/[A-za-z]/", $VehicleMake)) {
      $VehicleMakeError = "Incorrect email format";
    }
  }

  if (empty($_POST["FuelType"])) {
    $FuelTypeError = "This field is required";
  } else {
    $FuelType = Test_User_Input($_POST["FuelType"]);
    if (!preg_match("/[A-za-z]/", $FuelType)) {
      $FuelTypeError = "Incorrect email format";
    }
  }

  if (empty($_POST["RegNumber"])) {
    $RegNumberError = "This field is required";
  } else {
    $RegNumber = Test_User_Input($_POST["RegNumber"]);
    if (!preg_match("/[A-za-z]/", $RegNumber)) {
      $RegNumberError = "Incorrect email format";
    }
  }

  if (empty($_POST["CompOwn"])) {
    $CompOwnError = "This field is required";
  } else {
    $CompOwn = Test_User_Input($_POST["CompOwn"]);
    if (!preg_match("/[A-za-z]/", $CompOwn)) {
      $CompOwnError = "Incorrect email format";
    }
  }

  // do not use data if not correct
  if (
    !empty($_POST["CompanyName"])
    && !empty($_POST["ReportingManagerName"])
  ) {
    if (
      preg_match("/^[A-za-z \.]*$/", $CompanyName)
      && preg_match("/^[A-za-z \.]*$/", $ReportingManagerName)
    ) {
      // send the data to the database and handle errors for the db side received

      echo " correct details received";

    }
  }
}

// seperate function at end of form sanitizing 
function Test_User_Input($Data)
{
  return $Data;
}
;
?>