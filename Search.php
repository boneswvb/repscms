<?php
require_once("includes/db.php");
require_once("includes/functions.php");

if (isset($_POST["submit"])) {
  $searchTerm = $_POST["search_term"];

  performSearch($searchTerm);
}
?>

<?php
function getTableColumnNames($tableName)
{
  global $ConnectingDB;
  $sql = "SHOW COLUMNS FROM $tableName";
  $statement = $ConnectingDB->query($sql);
  $columnNames = [];

  while ($column = $statement->fetch(PDO::FETCH_ASSOC)) {
    $columnNames[] = $column['Field'];
  }

  return $columnNames;
}

function performSearch($searchTerm)
{
  global $ConnectingDB;

  // Construct the SQL query
  $sql = "SELECT * FROM appointments WHERE ";

  // Add conditions based on the provided search term
  if (!empty($searchTerm)) {
    $columnNames = getTableColumnNames('appointments');
    $conditions = [];
    foreach ($columnNames as $columnName) {
      $columnKey = str_replace(' ', '_', $columnName);
      $conditions[] = "$columnKey LIKE '%$searchTerm%'";
    }
    $sql .= implode(" OR ", $conditions);
  } else {
    // If no search term provided, retrieve all data
    $sql .= "1";
  }

  $statement = $ConnectingDB->query($sql);

  // Fetch and display data
  echo '<table class="table table-bordered double-border">';
  echo '<tr>';

  // Display table headers
  $columnNames = getTableColumnNames('appointments');
  foreach ($columnNames as $columnName) {
    // Skip displaying the id and datetime columns
    if ($columnName === 'id' || $columnName === 'datetime') {
      continue;
    }
    echo '<th class="single-border text-center">' . htmlentities($columnName) . '</th>';
  }

  echo '</tr>';

  while ($DataRows = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';

    foreach ($columnNames as $columnName) {
      // Skip displaying the id and datetime columns
      if ($columnName === 'id' || $columnName === 'datetime') {
        continue;
      }
      if ($columnName === 'Change') {
        echo '<td><button class="btn btn-outline-warning" style="border-radius: 5px">' . htmlentities($columnName) . '</button></td>';
      } elseif ($columnName === 'Delete') {
        echo '<td><button class="btn btn-outline-danger" style="border-radius: 5px">' . htmlentities($columnName) . '</button></td>';
      } else {
        $columnKey = str_replace(' ', '_', $columnName);
        echo '<td>' . htmlentities($DataRows[$columnKey]) . '</td>';
      }
    }

    echo '</tr>';
  }

  echo '</table>';
}
?>