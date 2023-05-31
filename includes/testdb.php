<?php
require_once("includes/DB.php");
require_once("includes/Functions.php");
require_once("includes/Sessions.php");
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login();
if (isset($_POST["Submit"])) {
  $firstName = $_POST["FirstName"];
  $lastName = $_POST["LastName"];
  $email = $_POST["Email"];
  $phone = $_POST["Phone"];
  $company = $_POST["Company"];
  $comments = $_POST["Comments"];

  if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($company) || empty($comments)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled out";
    Redirect_to("FormCustomerInput.php");
  } else {
    // Insert data into the customer_info table
    global $connectingDB;
    $sql = "INSERT INTO customer_info (first_name, last_name, email, phone, company) VALUES (:firstName, :lastName, :email, :phone, :company)";
    $stmt = $connectingDB->prepare($sql);
    $stmt->bindValue(':firstName', $firstName);
    $stmt->bindValue(':lastName', $lastName);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':company', $company);
    $execute = $stmt->execute();

    if ($execute) {
      $customerId = $connectingDB->lastInsertId();

      // Insert data into the comments table
      $sql = "INSERT INTO comments (customer_id, comments) VALUES (:customerId, :comments)";
      $stmt = $connectingDB->prepare($sql);
      $stmt->bindValue(':customerId', $customerId);
      $stmt->bindValue(':comments', $comments);
      $execute = $stmt->execute();

      if ($execute) {
        $_SESSION["SuccessMessage"] = "Customer added successfully";
      } else {
        $_SESSION["ErrorMessage"] = "Failed to add comments";
      }
    } else {
      $_SESSION["ErrorMessage"] = "Failed to add customer";
    }
    Redirect_to("FormCustomerInput.php");
  }
}
?>