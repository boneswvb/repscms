<?php
// vars for errors fields
$FullNameError = "";
$AdressError = "";
$CellNumberError = "";
$LandNumberError = "";
$EmailError = "";
$ImageError = "";

if (isset($_POST["Submit"])) {
  // uploading of image to uploads file
  $Image = $_FILES["Image"]["name"];
  $Target = "uploads/" . basename($_FILES["Image"]["name"]);

  // sanatizing fields
  if (empty($_POST["FullName"])) {
    $FullNameError = "This field is required";
  } else {
    $FullName = Test_User_Input($_POST["FullName"]);
    if (!preg_match("/^[A-za-z .]*$/", $FullName)) {
      $FullNameError = "Only spaces and letter allowed";
    }
  }

  if (!empty($_POST["Adress"])) {
    $Adress = Test_User_Input($_POST["Adress"]);
    if (!preg_match("/^[A-za-z \.\,0-9]{20,150}$/", $Adress)) {
      $AdressError = "Min 20 and Max 150 Characters. No special characters";
    }
  }

  if (empty($_POST["CellNumber"])) {
    $CellNumberError = "This field is required";
  } else {
    $CellNumber = Test_User_Input($_POST["CellNumber"]);
    if (!preg_match("/^[0-9]{10,10}$/", $CellNumber)) {
      $CellNumberError = "Only numbers allowed";
    }
  }

  if (!empty($_POST["LandNumber"])) {
    $LandNumber = Test_User_Input($_POST["LandNumber"]);
    if (!preg_match("/^[0-9]{10,11}$/", $LandNumber)) {
      $LandNumberError = "Only 10 numbers allowed";
    }
  }

  if (empty($_POST["Email"])) {
    $EmailError = "This field is required";
  } else {
    $Email = Test_User_Input($_POST["Email"]);
    if (!preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $Email)) {
      $EmailError = "Incorrect email format";
    }
  }

  if (!empty($_POST["Image"])) {
    $Image = Test_User_Input($_POST["Image"]);
  }

  // do not use data if not correct
  if (
    !empty($_POST["FullName"])
    && !empty($_POST["CellNumber"])
    && !empty($_POST["Email"])
  ) {
    if (
      preg_match("/^[A-za-z .]*$/", $FullName)
      && preg_match("/^[0-9]{10,10}$/", $CellNumber)
      && preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $Email)
    ) {
      // send the data to the database and handle errors for the db side received
      echo " correct details received";

      // move pic to folder while updating the db
      move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
    }
  }
}

function Test_User_Input($Data)
{
  return $Data;
}
;
?>