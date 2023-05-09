<?php
$NameError = "";
$EmailError = "";
$GenderError = "";
$WebsiteError = "";

// check if the form fields are completed and fields have valid input
if (isset($_POST["Submit"])) {
  if (empty($_POST["Name"])) {
    $NameError = "Name is required";
  } else {
    $Name = Test_User_Input($_POST["Name"]);
    if (!preg_match("/^[A-za-z \.]*$/", $Name)) {
      $NameError = "Only letters and white spaces allowed";
    }
  }

  if (empty($_POST["Email"])) {
    $EmailError = "Email is required";
  } else {
    $Email = Test_User_Input($_POST["Email"]);
    if (!preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $Email)) {
      $EmailError = "Invalid email format";
    }
  }

  if (empty($_POST["Gender"])) {
    $GenderError = "Gender is required";
  } else {
    $Gender = Test_User_Input($_POST["Gender"]);
  }
  if (empty($_POST["Website"])) {
    $WebsiteError = "Website is required";
  } else {
    $Website = Test_User_Input($_POST["Website"]);
    if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-\/?\$\=\~]+\.[a-zA-Z0-9.\-\/?\$\=\~]*/", $Website)) {
      $WebsiteError = "Invalid website adress format";
    }
  }

  if (!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Gender"]) && !empty($_POST["Website"])) {
    if (
      (preg_match("/^[A-za-z \.]*$/", $Name)) == true
      && (preg_match("/[A-za-z0-9._-]{3,}@[A-za-z0-9._-]{3,}[.]{1}[A-za-z0-9._-]{2,}/", $Email)) == true
      && (preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-\/?\$\=\~]+\.[a-zA-Z0-9.\-\/?\$\=\~]*/", $Website)) == true
    ) {
      echo "<h2>Your Submitted Information</h2> <br>";
      echo "Name: " . ucwords($_POST["Name"]) . "<br>";
      echo "Email: {$_POST["Email"]} <br>";
      echo "Gender: {$_POST["Gender"]} <br>";
      echo "Website: {$_POST["Website"]} <br>";
      echo "Comments: {$_POST["Comment"]} <br>";

      $emailTo = "boneswvb@gmail.com";
      $subject = "Web form info received";
      $body = "Name: " . $_POST["Name"] . "<br>" . "Email: " . $_POST["Email"] . "<br>"
        . "Gender: " . $_POST["Gender"] . "<br>" . "Website: " . $_POST["Website"]
        . "Comments: " . $_POST["Comment"];
      $Sender = "From:info@lesawi.co.za";

      if (mail($emailTo, $subject, $body, $Sender)) {
        echo "Mail was send";
      } else {
        echo "Mail not send";
      }
    } else {
      echo '<span class="error">Please resubmit your form with the correct details</span>';
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
    input[type=text],
    input[type=email],
    textarea {
      border: 1px solid_dashed;
      background-color: rgb(221, 226, 212);
      width: 600px;
      padding: .5em;
      font-size: 1.0em;
    }

    .error {
      color: red;
    }
  </style>
</head>

<body>

  <h2>Form Validation with PHP.</h2>

  <form action="FormValidationProject.php" method="post">
    <legend>* Please Fill Out the following Fields.</legend>
    <fieldset>
      Name:<br>
      <input class="input" type="text" Name="Name" value="">
      <span class="error">*
        <?php echo $NameError ?>
      </span>
      <br>
      E-mail:<br>
      <input class="input" type="text" Name="Email" value="">
      <span class="error">*
        <?php echo $EmailError ?>
      </span>
      <br>
      Gender:<br>
      <input class="radio" type="radio" Name="Gender" value="Female">Female
      <input class="radio" type="radio" Name="Gender" value="Male">Male
      <span class="error">*
        <?php echo $GenderError ?>
      </span>
      <br>
      Website:<br>
      <input class="input" type="text" Name="Website" value="">
      <span class="error">*
        <?php echo $WebsiteError ?>
      </span>
      <br>
      Comment:<br>
      <textarea Name="Comment" rows="5" cols="25"></textarea>
      <br>
      <br>
      <input type="Submit" Name="Submit" value="Submit Your Information">
    </fieldset>
  </form>
</body>

</html>