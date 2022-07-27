<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php"; ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/product-line.php"; ?>
<?php
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT TOP 20 SELECT pid, image, image_schematics, description, weight, price FROM [dbo].[catalog]";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" .PHP_EOL);

    $html="<table>";
  

    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     echo ($row['PID'] . " " . $row['Description'] .PHP_EOL);
    

    
    $html .= "<tr>
     <td >" . $row['pid'] . "<br>" . $row['image'] . "<br>" . $row['image_schematics'] ."</td>
     <td >" . $row['description'] . "</td>
     <td >" . $row['weight'] . "</td>
     <td >" . $row['price'] . "</td>
   </tr>";
   

    }
    sqlsrv_free_stmt($getResults);
   $html .= "</table>";
   echo ($html);
?>

