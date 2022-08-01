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

    //echo ("Reading data from table" .PHP_EOL);

    $html='<table BORDER="1" CELLSPACING="0" CELLPADDING="3">';
    /* BORDER='1' CELLSPACING='0' CELLPADDING='3'>";*/
    
    $html .= '<TR>
        <TD WIDTH="15%" HEIGHT="50">
          <P ALIGN="left"><FONT SIZE="2"><STRONG>Part #</STRONG></FONT></P>
        </TD>
        <TD WIDTH="55%">
          <P ALIGN="left"><STRONG><SMALL>Product Description and</SMALL><BR>
              <SMALL>Dimensions Height x Width</SMALL></STRONG></P>
        </TD>
        <TD WIDTH="10%">
          <P ALIGN="left"><STRONG><SMALL>Shipping Wt.</SMALL></STRONG></P>
        </TD>
        <TD WIDTH="10%">
          <P ALIGN="left"><STRONG><SMALL>Price</SMALL></STRONG></P>
        </TD>
        <TD WIDTH="10%">
          <P ALIGN="left"><STRONG><SMALL>Buy</SMALL></STRONG></P>
        </TD>
      </TR>';
    
    //echo ("After HTML -- ");

    //echo ($res);

    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['pid'] . " " . $row['description'] . PHP_EOL);

        $PID=$row['pid'];
        $IMAGE=$row['image'];
        $SCHEMATICS=$row['image_schematics'];
        $DESC=$row['description'];
        $WEIGHT=$row['weight'];
        $PRICE=$row['price'];
        
        $html .= "<tr>";
        $html .= "<td>" . $PID . "<br>" .$IMAGE . "<br>" . $SCHEMATICS . "</td>";
        $html .= "<td>" . $DESC . "</td>";
        $html .= "<td>" . number_format($WEIGHT,0) . "</td>";
        $html .= "<td>" . number_format($PRICE,2) . "</td>";
        $html .= "<td><button>buy</button></td>";
        $html .= "</tr>";
    }
    sqlsrv_free_stmt($res);

    $html .= "</table>";
    echo ($html);

   

?>

