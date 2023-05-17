<?php
// get todays date
$DateToday = date("j F Y");

// Field names
$AppointmentDateError = "";
$AppointmentError = "";
$CommentError = "";

if (isset($_POST["Submit"])) {
  if (empty($_POST["AppointmentDate"])) {
    $AppointmentDate = $DateToday;
  } else {
    $AppointmentDate = Test_User_Input($_POST["AppointmentDate"]);
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
    $CommentError = "This field is required";
  } else {
    $Comment = Test_User_Input($_POST["Comment"]);
    if (!preg_match("/^[A-za-z0-9 .\,\-\_]*$/", $Comment)) {
      $CommentError = "Only spaces and letter allowed";
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

// seperate function at end of form sanitizing 
function Test_User_Input($Data)
{
  return $Data;
}
;

?>