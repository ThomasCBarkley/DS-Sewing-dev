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

    $html="<table BORDER='1' CELLSPACING='0' CELLPADDING='3'>";
    $html .= "
    <TR>
        <TD WIDTH='15%' HEIGHT='50'>
          <P ALIGN='left'><FONT SIZE='2'><STRONG>Part #</STRONG></FONT></P>
        </TD>
        <TD WIDTH='55%'>
          <P ALIGN='left'><STRONG><SMALL>Product Description and</SMALL><BR>
              <SMALL>Dimensions Height x Width</SMALL></STRONG></P>
        </TD>
        <TD WIDTH='10%'>
          <P ALIGN='left'><STRONG><SMALL>Shipping Wt.</SMALL></STRONG></P>
        </TD>
        <TD WIDTH='10%'>
          <P ALIGN='left'><STRONG><SMALL>Price</SMALL></STRONG></P>
        </TD>
        <TD WIDTH='10%'>
          <P ALIGN="left"><STRONG><SMALL>Buy</SMALL></STRONG></P>
        </TD>
      </TR>
    ";
    
    //echo ("After HTML -- ");

    //echo ($res);

    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['pid'] . " " . $row['description'] . PHP_EOL);
        
        $html .= "<tr>";
        $html .= "<td>" . $row['pid'] . "<br>" .$row['image'] . "<br>" . $row['image_schematics'] . "</td>";
        $html .= "<td>" . $row['description'] . "</td>";
        $html .= "<td>" . $row['weight'] . "</td>";
        $html .= "<td>" . $row['price'] . "</td>";
        $html .= "<td><button>buy</button></td>";
        $html .= "</tr>";
    }
    sqlsrv_free_stmt($res);

    $html .= "</table>";
    echo ($html);

    /******************************************************************************** */
        /* $html = '
            <tr itemscope itemtype="https://schema.org/Product">
        <td ' . ( $clm_size ? ' WIDTH="15%"' : '' ) . ' class="item_sku">' . $id . ' ' . getImages( $id ) . '
            <span itemprop="sku" class="hidden">'.$id.'</span>
            <span itemprop="brand" class="hidden">Merritt</span>
            <span itemprop="material" class="hidden">Aluminum</span>
            <span itemprop="itemCondition" class="hidden">NewCondition</span>
        </td>
        <td ' . ( $clm_size ? ' WIDTH="55%"' : '' ) . ' itemprop="name" class="item_description">' . getDescription( $id ) . '</td>
        <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' itemprop="weight"  class="item_weight">' . getWeight( $id ) . '</td>
        <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' itemprop="offers" itemscope itemtype="https://schema.org/Offer" class="item_price"><span itemprop="priceCurrency" class="item_currency">USD</span>$<span itemprop="price">' . getPrice( $id ) . '</span><link itemprop="availability" href="https://schema.org/InStock" />
        <span itemprop="priceValidUntil" class="hidden">'.$date.'</span></td>
        <td ' . ( $clm_size ? ' WIDTH="10%"' : '' ) . ' class="item_button">
            '. product_form($id) .'
            <span itemprop="aggregateRating" class="item_rating" itemscope itemtype="https://schema.org/AggregateRating">Rated: <span itemprop="ratingValue">5</span> based on <span itemprop="ratingCount">'. rand(1, 100).'</span></span>
            <img src="' . $image . '" itemprop="image" class="item_image" />
        </td>
        </tr>
        <script type="application/ld+json">
        {
            "@content"			: "https://schema.org/Product",
            "@type"				: "Product",
            "name"				: ' . json_encode(getDescription( $id )) . ',
            "description"	    : ' . json_encode(getDescription( $id )) . ',
            "sku"               : ' . json_encode($id) . ',
            '.$image_code.'
            "offer"             : {
                                    "@type"             : "Offer",
                                    "price"             : '.json_encode(getPrice( $id )).',
                                    "priceCurrency"     : "USD",
                                    "priceValidUntil"   : '. json_encode($date) .',
                                    "availability"      : "https://schema.org/InStock"
                                    },
            "aggregateRating"   : {
                                    "@type"         : "AggregateRating",
                                    "ratingValue"   : "5",
                                    "ratingCount"   : '. json_encode(rand(1, 100)) .'
                                    }	
            
        }
        </script>
        ';
*/

?>

