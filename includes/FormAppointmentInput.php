<?php
// get todays date
$DateTime = date("j F Y");

// loged in user details
$addby = $_SESSION["UName"];

// Field names
$AppointmentDateError = "";
$CompNameError = "";
$AppointmentError = "";
$CommentError = "";

if (isset($_POST["Submit"])) {
  if (empty($_POST["AppointmentDate"])) {
    $AppointmentDate = $DateTime;
  } else {
    $AppointmentDate = Test_User_Input($_POST["AppointmentDate"]);
  }

  if (empty($_POST["CompName"])) {
    $CompNameError = "This field is required";
  } else {
    $CompName = Test_User_Input($_POST["CompName"]);
    if (!preg_match("/^[A-za-z0-9 .\/]*$/", $CompName)) {
      $CompNameError = "Only spaces, numbers and letter allowed";
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

  if (!empty($_POST["Comment"])) {
    $Comment = Test_User_Input($_POST["Comment"]);
    if (
      !preg_match("/[A-za-z0-9 .\,\-\_
    ]{20,1500}/", $Comment)
    ) {
      $CommentError = "No special characters allowed. Min 20 and Max 1500 characters";
    }
  }

  if (!empty($_POST["Comment"])) {
    $Comment = Test_User_Input($_POST["Comment"]);
    if (
      !preg_match("/[A-za-z0-9 .\,\-\_
    ]{20,1500}/", $Comment)
    ) {
      $CommentError = "No special characters allowed. Min 20 and Max 1500 characters";
    }
  }

  // do not use data if not correct
  if (
    !empty($_POST["AppointmentDate"])
    && !empty($_POST["CompName"])
    && !empty($_POST["Appointment"])
    && !empty($_POST["Comment"])
  ) {
    if (
      preg_match("/^[A-za-z0-9 .\/]*$/", $CompName)
      && preg_match("/^[A-za-z0-9 .\,]*$/", $Appointment)
      && preg_match("/[A-za-z0-9 .\,\-\_
      ]{20,1500}/", $Comment)
    ) {

      // add data to the db
      $ConnectingDB;
      $sql = "INSERT INTO appointments(datetime,appointment_date,company_name,appointment_type,comment,addedby)";
      $sql .= "VALUES(:datetimE, :appointmentdatE, :companynamE, :appointmenttypE, :commenT, :addedbY)";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':datetimE', $DateTime);
      $stmt->bindValue(':appointmentdatE', $AppointmentDate);
      $stmt->bindValue(':companynamE', $CompName);
      $stmt->bindValue(':appointmenttypE', $Appointment);
      $stmt->bindValue(':commenT', $Comment);
      $stmt->bindValue(':addedbY', $addby);
      $Execute = $stmt->execute();

      //Saving the uploaded file to a folder specified
      move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

      if ($Execute) {
        $_SESSION["SuccessMessage"] = "Appointment for " . $CompName . " added";
        Redirect_to("AppointmentInput.php");
      } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Please try again.";
        Redirect_to("AppointmentInput.php");
      }
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