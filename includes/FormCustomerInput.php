<?php
// get todays date
$DateToday = date("j F Y");

// loged in user details
$addby = $_SESSION["UName"];
$addbyEmail = $_SESSION["Email"];
$UserName = $_SESSION["UName"];

// allocate a accountnumber to new Company
$count = 1;
$CompanyName = "Not Provided";

if (!empty($_POST["CompanyName"])) {
  $CompanyName = $_POST["CompanyName"];
  $account = strtoupper(substr($CompanyName, 0, 3)) . $count;
  $count += 1;
}

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

  if (!empty($_POST["Comment"])) {
    $Comment = Test_User_Input($_POST["Comment"]);
    if (
      !preg_match("/[A-za-z0-9 .\,\-\_
    ]{20,1500}/", $Comment)
    ) {
      $CommentError = "No special characters allowed. Min 20 and Max 1500 characters";
    }
  }

  // Check if the company name already exists
  $ConnectingDB;
  $sql = "SELECT * FROM customer_info WHERE companyname = :companY";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':companY', $_POST["CompanyName"]);
  $stmt->execute();
  $result = $stmt->fetch();
  if ($result) {
    $_SESSION["ErrorMessage"] = "Company name already exists";
    Redirect_to("CustomerInput.php");
  }

  // check the correctness of data before sending to db excluding comments
  if (
    !empty($_POST["Date"])
    && !empty($_POST["Name"])
    && !empty($_POST["Contact1"])
    && !empty($_POST["CompEmail"])
    && !empty($_POST["CompanyName"])
    && !empty($_POST["CompanyAdress"])
    && !empty($_POST["TypeOfCompany"])
    && !empty($_POST["Appointment"])
  ) {
    if (
      preg_match("/^[0-9]{2,4}[ \-\.]{1}[a-zA-z0-9]{2,3}[ \-\.]{1}[0-9]{2,4}$/", $Date)
      && preg_match("/^[A-za-z .]*$/", $Name)
      && preg_match("/^[\+]{0,1}[0-9 \-]{10,15}$/", $Contact1)
      && preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $CompEmail)
      && preg_match("/^[A-za-z0-9 .\/]*$/", $CompanyName)
      && preg_match("/^[A-za-z0-9 .\,]*$/", $CompanyAdress)
      && preg_match("/^[A-za-z0-9 .\,]*$/", $TypeOfCompany)
      && preg_match("/^[A-za-z0-9 .\,]*$/", $Appointment)
    ) {
      // add data to the db
      $ConnectingDB;
      $sql = "INSERT INTO customer_info(datetime,date,name,compaccno,contact_1,contact_2,compemail,companyname,companyadress,typeofcompany,appointment,addby)";
      $sql .= "VALUES(:datetimE, :datE, :namE, :compaccnO, :contacT_1, :contacT_2, :compemaiL, :companynamE, :companyadresS, :typeofcompanY, :appointmenT, :addbY)";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':datetimE', $DateToday);
      $stmt->bindValue(':datE', $Date);
      $stmt->bindValue(':namE', $Name);
      $stmt->bindValue(':compaccnO', $account);
      $stmt->bindValue(':contacT_1', $Contact1);
      $stmt->bindValue(':contacT_2', $Contact2);
      $stmt->bindValue(':compemaiL', $CompEmail);
      $stmt->bindValue(':companynamE', $CompanyName);
      $stmt->bindValue(':companyadresS', $CompanyAdress);
      $stmt->bindValue(':typeofcompanY', $TypeOfCompany);
      $stmt->bindValue(':appointmenT', $Appointment);
      $stmt->bindValue(':addbY', $addby);
      $Execute = $stmt->execute();

      if ($Execute) {
        $_SESSION["SuccessMessage"] = "Customer added successfully";
        // add comments to the comments db
        if (
          !empty($_POST["Comment"])
        ) {
          // add data to the db
          $ConnectingDB;
          $sql = "INSERT INTO comments(datetime,addby,companyname,comment)";
          $sql .= "VALUES(:datetimE, :addbY, :companynamE, :commenT)";
          $stmt = $ConnectingDB->prepare($sql);
          $stmt->bindValue(':datetimE', $DateToday);
          $stmt->bindValue(':addbY', $addbyEmail);
          $stmt->bindValue(':companynamE', $CompanyName);
          $stmt->bindValue(':commenT', $Comment);
          $Execute = $stmt->execute();
        }

      } else {
        $_SESSION["ErrorMessage"] = "Failed to add customer";
      }
      Redirect_to("CustomerInput.php");
    }
  }


}

// get customer input from form
function Test_User_Input($Data)
{
  return $Data;
}
;
?>