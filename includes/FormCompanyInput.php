<?php
// Var to check for input errors
$CompanyNameError = "";
$CompanyContactNumberError = "";
$CompanyAdressError = "";
$TypeOfCompanyError = "";
$DateTime = date("j F Y h:i:s");
$AddedBy = $_SESSION["UName"];

if (isset($_POST["Submit"])) {
  // check if all field are completed correctly
  if (empty($_POST["CompanyName"])) {
    $CompanyNameError = "This field is required";
  } else {
    $CompanyName = Test_User_Input($_POST["CompanyName"]);
    if (!preg_match("/^[A-za-z \.]*$/", $CompanyName)) {
      $CompanyNameError = "Only letters and white spaces allowed";
    }
  }

  if (empty($_POST["CompanyContactNumber"])) {
    $CompanyContactNumberError = "This field is required";
  } else {
    $CompanyContactNumber = Test_User_Input($_POST["CompanyContactNumber"]);
    if (!preg_match("/^[\+]{0,1}[0-9 \-]{10,15}$/", $CompanyContactNumber)) {
      $CompanyContactNumberError = "Only +, numbers and white spaces allowed";
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
    && !empty($_POST["CompanyContactNumber"])
    && !empty($_POST["CompanyAdress"])
    && !empty($_POST["TypeOfCompany"])
  ) {
    if (
      preg_match("/^[A-za-z \.]*$/", $CompanyName)
      && preg_match("/^[\+]{0,1}[0-9 \-]{10,15}$/", $CompanyContactNumber)
      && preg_match("/^[A-za-z0-9 \.\-\_\/\,]{1,150}$/", $CompanyAdress)
      && preg_match("/[A-za-z \.\,]/", $TypeOfCompany)
    ) {
      // add data to the db
      $ConnectingDB;
      $sql = "INSERT INTO comp_info(datetime,companyname,companycontactnumber,companyadress,typeofcompany,addby)";
      $sql .= "VALUES(:datetimE, :companynamE, :companycontactnumbeR, :companyadresS, :typeofcompanY, :addbY)";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':datetimE', $DateTime);
      $stmt->bindValue(':companynamE', $CompanyName);
      $stmt->bindValue(':companycontactnumbeR', $CompanyContactNumber);
      $stmt->bindValue(':companyadresS', $CompanyAdress);
      $stmt->bindValue(':typeofcompanY', $TypeOfCompany);
      $stmt->bindValue(':addbY', $AddedBy);
      $Execute = $stmt->execute();

      if ($Execute) {
        $_SESSION["SuccessMessage"] = "Company with ID : " . $ConnectingDB->lastInsertId() . " name: " . $CompanyName . " was added";
        Redirect_to("CompanyInput.php");
      } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Please try again.";
        Redirect_to("CompanyInput.php");
      }

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