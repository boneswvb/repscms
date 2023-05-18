<?php
// Var to check for input errors
$CompanyNameError = "";
$ReportingManagerNameError = "";
$ReportingManagerCellError = "";
$ReportingManagerLandlineNumberError = "";
$CompanyAdressError = "";
$TypeOfCompanyError = "";

if (isset($_POST["Submit"])) {
  // check if all field are completed correctly
  if (empty($_POST["CompanyName"])) {
    $CompanyNameError = "Company Name is required";
  } else {
    $CompanyName = Test_User_Input($_POST["CompanyName"]);
    if (!preg_match("/^[A-za-z \.]*$/", $CompanyName)) {
      $CompanyNameError = "Only letters and white spaces allowed";
    }
  }

  if (!empty($_POST["ReportingManagerName"])) {
    $ReportingManagerName = Test_User_Input($_POST["ReportingManagerName"]);
    if (!preg_match("/^[A-za-z \.]*$/", $ReportingManagerName)) {
      $ReportingManagerNameError = "Only letters and white spaces allowed";
    }
  }

  if (!empty($_POST["ReportingManagerCell"])) {
    $ReportingManagerCell = Test_User_Input($_POST["ReportingManagerCell"]);
    if (!preg_match("/^[\+]{0,1}[0-9 \-]{10,15}$/", $ReportingManagerCell)) {
      $ReportingManagerCellError = "Only 10 numbers allowed";
    }
  }

  if (!empty($_POST["ReportingManagerLandlineNumber"])) {
    $ReportingManagerLandlineNumber = Test_User_Input($_POST["ReportingManagerLandlineNumber"]);
    if (!preg_match("/^[\+]{0,1}[0-9 \-]{10,15}$/", $ReportingManagerLandlineNumber)) {
      $ReportingManagerLandlineNumberError = "Only 10 or 11 numbers allowed";
    }
  }

  if (empty($_POST["CompanyAdress"])) {
    $CompanyAdressError = "This field is required";
  } else {
    $CompanyAdress = Test_User_Input($_POST["CompanyAdress"]);
    if (!preg_match("/^[A-za-z0-9 .]{1,150}$/", $CompanyAdress)) {
      $CompanyAdressError = "Only spaces and letter allowed";
    }
  }

  if (empty($_POST["TypeOfCompany"])) {
    $TypeOfCompanyError = "This field is required";
  } else {
    $TypeOfCompany = Test_User_Input($_POST["TypeOfCompany"]);
    if (!preg_match("/[A-za-z \.\,]/", $TypeOfCompany)) {
      $TypeOfCompanyError = "Only spaces and letter allowed";
    }
  }

  // do not use data if not correct
  if (
    !empty($_POST["CompanyName"])
    && !empty($_POST["ReportingManagerName"])
    && !empty($_POST["ReportingManagerCell"])
    && !empty($_POST["ReportingManagerLandlineNumber"])
    && !empty($_POST["CompanyAdress"])
    && !empty($_POST["TypeOfCompany"])
  ) {
    if (
      preg_match("/^[A-za-z \.]*$/", $CompanyName)
      && preg_match("/^[A-za-z \.]*$/", $ReportingManagerName)
      && preg_match("/^[0-9]{10,10}$/", $ReportingManagerCell)
      && preg_match("/^[0-9]{10,11}$/", $ReportingManagerLandlineNumber)
      && preg_match("/^[A-za-z \.\,0-9]{20,150}$/", $CompanyAdress)
      && preg_match("/[A-za-z \.\,]/", $TypeOfCompany)
    ) {
      // send the data to the database and handle errors

      // Form field names
      // CompanyName
      // ReportingManagerName
      // ReportingManagerCell
      // ReportingManagerLandlineNumber
      // CompanyAdress
      // TypeOfCompany

      echo " correct details received";

    }
  }
}


// get and return user data from the form
function Test_User_Input($Data)
{
  return $Data;
}
;
?>