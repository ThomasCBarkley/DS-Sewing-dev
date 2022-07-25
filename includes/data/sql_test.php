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

    $html='<Table>';

    if ($getResults == FALSE)
        echo (sqlsrv_errors());
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
     //echo ($row['PID'] . " " . $row['Description'] .PHP_EOL);
     $html=$html + '<tr itemscope itemtype="https://schema.org/Product">
     <td ' . ( $clm_size ? ' WIDTH="15%"' : '' ) . ' class="item_sku">' . $row['pid'] . ' ' . $row['image'] . '

     </td>
     <td ' . ( $clm_size ? ' WIDTH="55%"' : '' ) . ' itemprop="name" class="item_description">' . $row['description'] . '</td>
     <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' itemprop="weight"  class="item_weight">' . $row['weight'] . '</td>
     <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' itemprop="offers" itemscope itemtype="https://schema.org/Offer" class="item_price"><span itemprop="priceCurrency" class="item_currency">USD</span>$<span itemprop="price">' . $row['price'] . '</span><link itemprop="availability" href="https://schema.org/InStock" />
     <span itemprop="priceValidUntil" class="hidden">'.$date.'</span></td>
   </tr>'
    }
    sqlsrv_free_stmt($getResults);
    $html=$html+'</table>';
    echo $html;
?>

