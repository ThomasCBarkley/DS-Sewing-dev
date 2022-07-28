<?php
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT TOP 20 pid, description, price, weight, length, height, image, image_schematics  FROM [dbo].[catalog]";
    $res= sqlsrv_query($conn, $tsql);

    echo ("Reading data from table" .PHP_EOL);

    $html="<table>";
    
    echo ("After HTML -- ");

    echo ($res);

    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo ($row['pid'] . " " . $row['description'] . PHP_EOL);
        $html .= "<tr>";
        $html .= "<td>" . $row['pid'] . "<br>" .$row['image'] . "<br>" . $row['image_schematics'] . "</td>";
        $html .= "<td>" . $row['description'] . "</td>";
        $html .= "<td>" . $row['price'] . "</td>";
        $html .= "</tr>"
    }
    sqlsrv_free_stmt($res);

    $html .= "</table>";
    echo ($html);

?>

