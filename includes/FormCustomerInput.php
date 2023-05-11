<?php
$DateError = "";
$NameError = "";
$Contact1Error = "";
$ContactError = "";
$EmailError = "";
$CompanyNameError = "";
$CompanyAdressError = "";
$TypeOfCompanyError = "";
$CompanyTelephonError = "";
$CompanyAccountNumberError = "";
$AppointmentError = "";
$CommentError = "";
// Field names
// Date required
// Name required
// Contact1 required
// Contact2
// Email required
// CompanyName required
// CompanyAdress required
// TypeOfCompany required
// CompanyTelephone
// CompanyAccountNumber required
// Appointment required
// Comment


// PHP for form sanitizing
if (isset($_POST["Submit"])) {
  // add checks here

  // do not use data if not correct

  // Field names
  // Date required
  // Name required
  // Contact1 required
  // Contact2
  // Email required
  // CompanyName required
  // CompanyAdress required
  // TypeOfCompany required
  // CompanyTelephone
  // CompanyAccountNumber required
  // Appointment required
  // Comment

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
  // data testing only - DELETE
  echo $Date;
  echo $Name;
  echo $Contact1;
  echo $Contact;
  echo $Email;
  echo $CompanyName;
  echo $CompanyAdress;
  echo $TypeOfCompany;
  echo $CompanyTelephon;
  echo $CompanyAccountNumber;
  echo $Appointment;
  echo $Comment;
}

// seperate function at end of form sanitizing 
function Test_User_Input($Data)
{
  return $Data;
}
;
?>