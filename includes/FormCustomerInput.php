<?php
// get todays date
$DateToday = date("j F Y");

// vars for error handling 
$DateError = "";
$NameError = "";
$Contact1Error = "";
$Contact2Error = "";
$CompEmailError = "";
$CompanyNameError = "";
$CompanyAdressError = "";
$TypeOfCompanyError = "";
$CompanyAccountNumberError = "";
$AppointmentError = "";
$CommentError = "";


// sanitizing field info
if (isset($_POST["Submit"])) {
  if (empty($_POST["Date"])) {
    $Date = $DateToday;
  } else {
    $Date = Test_User_Input($_POST["Date"]);
  }

  if (empty($_POST["Name"])) {
    $NameError = "This field is required";
  } else {
    $Name = Test_User_Input($_POST["Name"]);
    if (!preg_match("/^[A-za-z .]*$/", $Name)) {
      $NameError = "Only spaces and letter allowed";
    }
  }

  if (empty($_POST["Contact1"])) {
    $Contact1Error = "This field is required";
  } else {
    $Contact1 = Test_User_Input($_POST["Contact1"]);
    if (!preg_match("/^[\+]{0,1}[0-9 \-]{10,15}$/", $Contact1)) {
      $Contact1Error = "Only numbers, dashes and spaces allowed";
    }
  }

  if (empty($_POST["Contact2"]) && !empty($_POST["Contact1"])) {
    $Contact2 = $Contact1;
  } else {
    $Contact2 = Test_User_Input($_POST["Contact2"]);
    if (!preg_match("/^[\+]{0,1}[0-9 \-]{10,15}$/", $Contact2)) {
      $Contact2Error = "Only numbers, dashes and spaces allowed";
    }
  }

  if (empty($_POST["CompEmail"])) {
    $CompEmailError = "This field is required";
  } else {
    $CompEmail = Test_User_Input($_POST["CompEmail"]);
    if (!preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $CompEmail)) {
      $CompEmailError = "Incorrect email format";
    }
  }

  if (empty($_POST["CompanyName"])) {
    $CompanyNameError = "This field is required";
  } else {
    $CompanyName = Test_User_Input($_POST["CompanyName"]);
    if (!preg_match("/^[A-za-z0-9 .\/]*$/", $CompanyName)) {
      $CompanyNameError = "Only spaces, numbers and letter allowed";
    }
  }

  if (empty($_POST["CompanyAdress"])) {
    $CompanyAdressError = "This field is required";
  } else {
    $CompanyAdress = Test_User_Input($_POST["CompanyAdress"]);
    if (!preg_match("/^[A-za-z0-9 .\,]*$/", $CompanyAdress)) {
      $CompanyAdressError = "Only spaces, numbers and letter allowed";
    }
  }

  if ($_POST["TypeOfCompany"] == "Unknown") {
    $TypeOfCompanyError = "Please select an option";
  } else {
    $TypeOfCompany = Test_User_Input($_POST["TypeOfCompany"]);
    if (!preg_match("/^[A-za-z0-9 .\,]*$/", $TypeOfCompany)) {
      $TypeOfCompanyError = "Only spaces, numbers and letter allowed";
    }
  }

  if ($_POST["Appointment"] == "Unknown") {
    $AppointmentError = "Please select an option";
  } else {
    $Appointment = Test_User_Input($_POST["Appointment"]);
    if (!preg_match("/^[A-za-z0-9 .\,]*$/", $Appointment)) {
      $AppointmentError = "Only spaces, numbers and letter allowed";
    }
  }

  if (empty($_POST["Comment"])) {
    $Comment = "Added by: [Your Name] on [Date] at [Time]";
  } else {
    $Comment = Test_User_Input($_POST["Comment"]);
    if (!preg_match("/^[A-za-z0-9 .\,\-\_]*$/", $Comment)) {
      $CommentError = "No special characters allowed. Max 1500 characters";
    }
  }

  // Field names
  // Date 
  // Name required
  // Contact1 required
  // Contact2
  // CompEmail required
  // CompanyName required
  // CompanyAdress required
  // TypeOfCompany required
  // Appointment required
  // Comment

  //  check the correctness of data before sending to db
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
  echo $Comment;
}

// get customer input from form
function Test_User_Input($Data)
{
  return $Data;
}
;
?>