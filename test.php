<?php
$count = 0;
echo "Count: " . $count . "<br>";
$CompanyName = "Lesawi";
$account = strtoupper(substr($CompanyName, 0, 3)) . "-" . $count;
echo $account . "<br>";
$count += 1;
echo "Count: " . $count . "<br>";
$CompanyName = "Something";
$account = strtoupper(substr($CompanyName, 0, 3)) . "-" . $count;
echo $account . "<br>";
$count += 1;
echo "Count: " . $count . "<br>";
$CompanyName = "home maker";
$account = strtoupper(substr($CompanyName, 0, 3)) . "-" . $count;
echo $account . "<br>";
$count += 1;
echo "Count: " . $count;
?>