<?php
// Vars for error handling
$AddedBy = $_SESSION["UserId"];
$Email = $_SESSION["Email"];
$UserName = $_SESSION["UName"];
$DateTime = date("j F Y h:i:s");
$VehicleTypeError = "";
$VehicleMakeError = "";
$FuelTypeError = "";
$RegNumberError = "";
$CompOwnError = "";

if (isset($_POST["Submit"])) {
  if (empty($_POST["VehicleType"])) {
    $VehicleTypeError = "This field is required";
  } else {
    $VehicleType = Test_User_Input($_POST["VehicleType"]);
    if (!preg_match("/^[A-za-z ]*$/", $VehicleType)) {
      $VehicleTypeError = "Only letter and spaces allowed";
    }
  }

  if (empty($_POST["VehicleMake"])) {
    $VehicleMakeError = "This field is required";
  } else {
    $VehicleMake = Test_User_Input($_POST["VehicleMake"]);
    if (!preg_match("/^[A-za-z ]*$/", $VehicleMake)) {
      $VehicleMakeError = "Only letter and spaces allowed";
    }
  }

  if ($_POST["FuelType"] == "Unknown") {
    $FuelTypeError = "Select an option";
  } else {
    $FuelType = Test_User_Input($_POST["FuelType"]);
    if (!preg_match("/^[A-za-z ]*$/", $FuelType)) {
      $FuelTypeError = "Please select an option from the list";
    }
  }

  if (empty($_POST["RegNumber"])) {
    $RegNumberError = "This field is required";
  } else {
    $RegNumber = Test_User_Input($_POST["RegNumber"]);
    if (!preg_match("/^[A-za-z0-9 -]*$/", $RegNumber)) {
      $RegNumberError = "Only letter, dashes, numbers and spaces allowed";
    }
  }

  if ($_POST["CompOwn"] == "Unknown") {
    $CompOwnError = "select an option";
  } else {
    $CompOwn = Test_User_Input($_POST["CompOwn"]);
    if (!preg_match("/^[A-za-z ]*$/", $CompOwn)) {
      $CompOwnError = "Please select an option from the list";
    }
  }

  // get data from db to check if email adress is in db
  $RegNum = "";
  $ConnectingDB;
  $sql = "SELECT * FROM vehicle_input";
  $Execute = $ConnectingDB->query($sql);
  while ($DataRows = $Execute->fetch()) {
    $RegNum = $DataRows["regnum"];
    echo $RegNum;
    // advise user vehicle is registered
    if ($RegNum == strtoupper($_POST["RegNumber"])) {
      $_SESSION["ErrorMessage"] = strtoupper($RegNum) . " is registered on the system.";
      Redirect_to("VehicleInput.php");
    }
  }


  if (
    !empty($_POST["VehicleType"])
    && !empty($_POST["VehicleMake"])
    && !empty($_POST["FuelType"])
    && !empty($_POST["RegNumber"])
    && !empty($_POST["CompOwn"])
  ) {
    if (
      preg_match("/^[A-za-z ]*$/", $VehicleType)
      && preg_match("/^[A-za-z ]*$/", $VehicleMake)
      && preg_match("/^[A-za-z ]*$/", $FuelType)
      && preg_match("/^[A-za-z0-9 -]*$/", $RegNumber)
      && preg_match("/^[A-za-z ]*$/", $CompOwn)
    ) {

      // add data to the db
      $ConnectingDB;
      $sql = "INSERT INTO vehicle_input(dateTime,email,uname,vehicletype,vehiclemake,fueltype,regnum,compown,addedby)";
      $sql .= "VALUES(:dateTime, :emaiL, :unamE, :vehicletypE, :vehiclemakE, :fueltypE, :regnuM, :compowN, :addedbY)";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':dateTime', $DateTime);
      $stmt->bindValue(':emaiL', $Email);
      $stmt->bindValue(':unamE', $UserName);
      $stmt->bindValue(':vehicletypE', $VehicleType);
      $stmt->bindValue(':vehiclemakE', $VehicleMake);
      $stmt->bindValue(':fueltypE', $FuelType);
      $stmt->bindValue(':regnuM', strtoupper($RegNumber));
      $stmt->bindValue(':compowN', $CompOwn);
      $stmt->bindValue(':addedbY', $AddedBy);
      $Execute = $stmt->execute();

      if ($Execute) {
        $_SESSION["SuccessMessage"] = "Vehicle with registration number : " . strtoupper($RegNumber) . " and ID " . $ConnectingDB->lastInsertId() . " was added";
        Redirect_to("Dashboard.php");
      } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Please try again.";
        Redirect_to("VehicleInput.php");
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