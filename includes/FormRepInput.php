<?php
// get data from db to check if email adress is in db
$EmailCheck = "";
$ConnectingDB;
$sql = "SELECT email FROM rep_info LIMIT 1";
$Execute = $ConnectingDB->query($sql);
while ($DataRows = $Execute->fetch()) {
  $EmailCheck = $DataRows["email"];
}
?>
<?php
// vars for errors fields
$FullNameError = "";
$CellNumberError = "";
$BioError = "";
$ImageError = "";
$DateTime = date("j F Y h:i:s");
$FullName = $_SESSION["UName"];
$AddedBy = $_SESSION["UName"];
$Email = $_SESSION["Email"];
$UserId = $_SESSION["UserId"];

if (isset($_POST["Submit"])) {
  // uploading of image to uploads file
  $Image = $_FILES["Image"]["name"];
  $Target = "uploads/" . basename($_FILES["Image"]["name"]);

  // sanatizing fields
  if (empty($_POST["CellNumber"])) {
    $CellNumberError = "This field is required";
  } else {
    $CellNumber = Test_User_Input($_POST["CellNumber"]);
    if (!preg_match("/^[0-9]{10,10}$/", $CellNumber)) {
      $CellNumberError = "Only numbers allowed";
    }
  }

  if (empty($_POST["Bio"])) {
    $BioError = "This field is required";
  } else {
    $Bio = Test_User_Input($_POST["Bio"]);
    if (
      !preg_match("/^[A-za-z0-9 .\,\-\_\?\!\@\#\$\%\&\*\(\)\
    ]{1,10000}$/", $Bio)
    ) {
      $BioError = "Only numbers, letters, spaces and (-,_) allowed";
    }
  }

  if (!empty($_POST["Image"])) {
    $Image = Test_User_Input($_POST["Image"]);
  }

  if ($EmailCheck == $Email) {
    // check if a bio exist
    $_SESSION["ErrorMessage"] = "You have already added your bio. You can just update it from the dashboard.";
    Redirect_to("RepInput.php");
  } else if (
    // check if data received are correct
    !empty($_POST["CellNumber"])
    && !empty($_POST["Bio"])
  ) {
    if (
      preg_match("/^[0-9]{10,10}$/", $CellNumber)
      && preg_match("/^[A-za-z0-9 .\,\-\_\?\!\@\#\$\%\&\*\(\)\
      ]{1,10000}$/", $Bio)
    ) {
      // send the data to the database and handle errors for the db side received
      $ConnectingDB;
      if ($Image) {
        $sql = "INSERT INTO rep_info(datetime,name,cell,email,bio,image,addby,logonid)";
        $sql .= "VALUES(:datetimE, :namE, :celL, :emaiL, :biO, :imagE, :addbY, :logoniD )";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':datetimE', $DateTime);
        $stmt->bindValue(':namE', $FullName);
        $stmt->bindValue(':celL', $CellNumber);
        $stmt->bindValue(':emaiL', $Email);
        $stmt->bindValue(':biO', $Bio);
        $stmt->bindValue(':imagE', $Image);
        $stmt->bindValue(':addbY', $AddedBy);
        $stmt->bindValue(':logoniD', $UserId);
      } else {
        $sql = "INSERT INTO rep_info(datetime,name,cell,email,bio,addby,logonid)";
        $sql .= "VALUES(:datetimE, :namE, :celL, :emaiL, :biO, :addbY, :logoniD )";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':datetimE', $DateTime);
        $stmt->bindValue(':namE', $FullName);
        $stmt->bindValue(':celL', $CellNumber);
        $stmt->bindValue(':emaiL', $Email);
        $stmt->bindValue(':biO', $Bio);
        $stmt->bindValue(':addbY', $AddedBy);
        $stmt->bindValue(':logoniD', $UserId);
      }

      $Execute = $stmt->execute();

      //Saving the uploaded file to a folder specified
      move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

      if ($Execute) {
        $_SESSION["SuccessMessage"] = "Bio updated successfully";
        Redirect_to("Dashboard.php");
      } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Please try again.";
        Redirect_to("RepInput.php");
      }
    }
  }
}

function Test_User_Input($Data)
{
  return $Data;
}
;
?>