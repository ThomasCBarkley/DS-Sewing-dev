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
    $tsql= "SELECT TOP 20 SELECT pid, description FROM [dbo].[catalog]";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Reading data from table" .PHP_EOL);

    $html="<table>";
    
    echo ("After HTML -- ");

    echo ($getResults);

    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        echo ("in Row");
        echo ($row);
        //echo ($row['pid'] . " " . $row['description'] .PHP_EOL);
    /*
    $html .= "<tr>";
    $html .= "<td >" . $row['pid'] . "<br>" . $row['image'] . "<br>" . $row['image_schematics'] ."</td>";
    $html .= "<td >" . $row['description'] . "</td>";
    $html .= "<td >" . $row['weight'] . "</td>";
    $html .= "<td >" . $row['price'] . "</td>";
    $html .= "</tr>";
   */
    }
    sqlsrv_free_stmt($getResults);
   $html .= "</table>test";
   echo ($html);
?>

