<?php
// create variables that can add info dinamicaly to the sql query.
$TableName = "rep_info";


// get data from db to check if data exist in db
$ConnectingDB;
$sql = "SELECT * FROM rep_info LIMIT 1";
$Execute = $ConnectingDB->query($sql);
while ($DataRows = $Execute->fetch()) {
  $EmailCheck = $DataRows["email"];
}
?>