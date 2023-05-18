<?php
// Var to check for input errors
$CompanyNameError = "";
$CompanyContactNumberError = "";
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

  if (!empty($_POST["CompanyContactNumber"])) {
    $CompanyContactNumberName = Test_User_Input($_POST["CompanyContactNumber"]);
    if (!preg_match("/^[A-za-z \.]*$/", $CompanyContactNumber)) {
      $CompanyContactNumberError = "Only letters and white spaces allowed";
    }
  }

  if (empty($_POST["CompanyAdress"])) {
    $CompanyAdressError = "This field is required";
  } else {
    $CompanyAdress = Test_User_Input($_POST["CompanyAdress"]);
    if (!preg_match("/^[A-za-z0-9 \.\-\_\/\,]{1,150}$/", $CompanyAdress)) {
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

  // Add data to the db
  if (
    !empty($_POST["CompanyName"])
    && !empty($_POST["CompanyAdress"])
    && !empty($_POST["TypeOfCompany"])
    && !empty($_POST["CompanyContactNumber"])
  ) {
    if (
      preg_match("/^[A-za-z \.]*$/", $CompanyName)
      && preg_match("/^[A-za-z0-9 \.\-\_\/\,]{1,150}$/", $CompanyAdress)
      && preg_match("/[A-za-z \.\,]/", $TypeOfCompany)
      && preg_match("/^[A-za-z \.]*$/", $CompanyContactNumber)
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