<?php
// date and user
$DateTime = $DateTime = date("j F Y h:i:s");
$AddedBy = $_SESSION["UName"];

// error handling vars
$CompanyTypeInputError = "";

if (isset($_POST["Submit"])) {
  // Check if the company type already exists
  $ConnectingDB;
  $sql = "SELECT * FROM companytypeinput WHERE companytype = :companytypE";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':companytypE', $_POST["CompanyTypeInput"]);
  $stmt->execute();
  $result = $stmt->fetch();
  if ($result) {
    $_SESSION["ErrorMessage"] = "Company type already exists";
    Redirect_to("CompanyTypeInput.php");
  }

  if (empty($_POST["CompanyTypeInput"])) {
    $CompanyTypeInputError = "This field is required";
  } else {
    $CompanyTypeInput = Test_User_Input($_POST["CompanyTypeInput"]);
    if (!preg_match("/^[A-za-z .]*$/", $CompanyTypeInput)) {
      $CompanyTypeInputError = "Only spaces and letter allowed";
    }
  }

  // do not use data if not correct
  if (
    !empty($_POST["CompanyTypeInput"])
  ) {
    if (
      preg_match("/^[A-za-z ]*$/", $CompanyTypeInput)
    ) {
      // add data to the db
      $ConnectingDB;
      $sql = "INSERT INTO companytypeinput(datetime,addby,companytype)";
      $sql .= "VALUES(:datetimE, :addbY, :companytypE)";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':datetimE', $DateTime);
      $stmt->bindValue(':addbY', $AddedBy);
      $stmt->bindValue(':companytypE', $CompanyTypeInput);
      $Execute = $stmt->execute();

      if ($Execute) {
        $_SESSION["SuccessMessage"] = "Company type added";
        Redirect_to("CompanyTypeInput.php");
      } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Please try again.";
        Redirect_to("CompanyTypeInput.php");
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