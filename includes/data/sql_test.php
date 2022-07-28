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

    echo ($getResults);

    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        echo ($row['PID'] . " " . $row['Des'] . PHP_EOL);
        //$price=$row['itmPrice'];
    }
    sqlsrv_free_stmt($res);

?>

