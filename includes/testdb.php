<?php
function formatColumnName($columnName)
{
  $formattedColumnName = ucwords(str_replace('_', ' ', $columnName));

  // Handle specific column name changes
  $columnMapping = array(
    'datetime' => 'Date Time',
    'addby' => 'Added By'
  );

  if (array_key_exists($columnName, $columnMapping)) {
    $formattedColumnName = $columnMapping[$columnName];
  }

  return $formattedColumnName;
}

function getTableData($tableName)
{
  global $ConnectingDB;
  $sql = "SELECT * FROM $tableName";
  $statement = $ConnectingDB->query($sql);

  // Get column names
  $columnNames = [];
  $columnCount = $statement->columnCount();
  for ($i = 0; $i < $columnCount; $i++) {
    $columnMeta = $statement->getColumnMeta($i);
    $columnName = $columnMeta['name'];
    $formattedColumnName = formatColumnName($columnName);
    $columnNames[] = $formattedColumnName;
  }
  $columnNames[] = 'Change';
  $columnNames[] = 'Delete';

  // Fetch and display data
  echo '<table class="table table-bordered double-border">';
  echo '<tr>';
  foreach ($columnNames as $columnName) {
    echo '<th class="single-border text-center">' . htmlentities($columnName) . '</th>';
  }
  echo '</tr>';

  while ($DataRows = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    foreach ($columnNames as $columnName) {
      if ($columnName === 'Change') {
        echo '<td><button class="btn btn-outline-warning" style="border-radius: 5px">' . htmlentities($columnName) . '</button></td>';
      } elseif ($columnName === 'Delete') {
        echo '<td><button class="btn btn-outline-danger" style="border-radius: 5px">' . htmlentities($columnName) . '</button></td>';
      } else {
        $columnKey = str_replace(' ', '_', strtolower($columnName));
        echo '<td>' . htmlentities($DataRows[$columnKey] ?? '') . '</td>';
      }
    }
    echo '</tr>';
  }

  echo '</table>';
}

?>