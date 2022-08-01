<?php
session_start();

final class DB {

    public static function init()
    {
        //return new PDO("sqlsrv:Server=localhost;Database=DSSewing", "dssewing_www_service", "!g0ttal3arnt0s3w");
        //return new PDO("sqlsrv:Server=tcp:ds-sewing-dev-server.database.windows.net,1433;Initial Catalog=dssewing;Persist Security Info=False;User ID=ds-sewing-dev-server-admin;Password=2020Sucks!;MultipleActiveResultSets=False;Encrypt=True;TrustServerCertificate=False;Connection Timeout=30;");
        return new PDO("sqlsrv:Server=tcp:ds-sewing-dev-server.database.windows.net,1433;Initial Catalog=dssewing","ds-sewing-dev-server-admin","2020Sucks!");
        
    }
}

function test123(){
	//$conn = DB::init();

	//$sql = "SELECT image, image_schematics  FROM Catalog WHERE PID='" . $pid . "'";
	$sql = "
	UPDATE Catalog
	SET image=''
	WHERE PID = '393'
	";
	//$res = $conn->query($sql)->fetch();

}

//Added by TCB
function addToCart($pid, $price, $weight, $qty, $length, $width, $height){
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql = "INSERT INTO dbo.cart(sessionID, pid, price, weight, qty, Length, width, height)
    VALUES (session_id(), $pid, $weight, $qty, $length, $width, $height)";
    $res= sqlsrv_query($conn, $tsql);
    
    $rtn = "success";
    if ($res == FALSE){
        $rtn = sqlsrv_errors();
    }

    /*while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $price=$row['itmPrice'];
    }*/
    
    return $rtn;
    
}

function getPrice($pid) {
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    $tsql= "SELECT c.price as itmPrice FROM [dbo].[catalog] c WHERE c.pid ='" . $pid . "'";
    $res= sqlsrv_query($conn, $tsql);
    
    if ($res == FALSE)
        $price = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $price=$row['itmPrice'];
    }
    
    return number_format($price,2);
    
    //Removed by Tom Barkley 7/21/2022
    /*
    $conn = DB::init();
    $res = $conn->query("SELECT Price FROM Catalog WHERE PID='" . $pid . "'")->fetch();
    
	if ($res) {
	    //return number_format($res['Price'],2);
        //return number_format("100",2);
        return $res['c.price'];
    }
    
    return 'Unknown';
    */
}

function getWeight($pid) {
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
	$tsql= "SELECT weight FROM dbo.Catalog WHERE PID='" . $pid . "'";
    $res= sqlsrv_query($conn, $tsql);
    
    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $rtn=$row['weight'];
    }
    return number_format($rtn,0);

    //Removed by Tom Barkley 7/21/2022
    /*
    //$conn = DB::init();
    //$res = $conn->query("SELECT weight FROM Catalog WHERE PID='" . $pid . "'")->fetch();
    if ($res) {
        return number_format($res['weight'],0);
    }

    return 'Unknown';
    */
}


function getImageLinks($pid){
	
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
	$tsql= "SELECT image, image_schematics  FROM dbo.Catalog WHERE PID='" . $pid . "'";
    $res= sqlsrv_query($conn, $tsql);
    /*
    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $rtn=$row['image']$row['image_schematics'];
    }
    return $row;
    */
    //Removed by Tom Barkley 7/21/2022
    /*
    $conn = DB::init();
    $res = $conn->query("SELECT image, image_schematics  FROM Catalog WHERE PID='" . $pid . "'")->fetch();
    
    if ($res) {
		return $res;
	}else{
		return [];
	}
    */
}

//Function getItem($pid) added by Tom Barkley
// 07/25/2022
/*
    This was added to reduce the individual Azure SQL calls from 5 call per row to 1 per row
*/
/*
function getItem($pid)
{
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
	$tsql= "SELECT pid, image, image_schematics, description, weight, price FROM dbo.Catalog WHERE PID='" . $pid . "'";
    $res= sqlsrv_query($conn, $tsql);
    
    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) 
    
    {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        
        $data = '';
        $image = $row['image'];
        $schematic = $row['image_schematics'];
        
        /*if ($image != '') {
            $data .=  "<br><a onclick=\"window.open('" . $image . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='". $image. "'>View Picture</a>";
        }
        if ($schematic != '') {
            $data .=  "<br><a onclick=\"window.open('" . $schematic . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='" . $schematic. "'><font color=green>View Schematic</font></a>";
        }


    }
    return $data;
}
*/

/*
function getDetailLine($pid)
{
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
    "
    
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

}
*/

function getImages($pid) {
	//$res = getImageLinks($pid);
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
	$tsql= "SELECT image, image_schematics  FROM dbo.Catalog WHERE PID='" . $pid . "'";
    $res= sqlsrv_query($conn, $tsql);
    
    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $data = '';
        $image = $row['image'];
        $schematic = $row['image_schematics'];
        if ($image != '') {
            $data .=  "<br><a onclick=\"window.open('" . $image . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='". $image. "'>View Picture</a>";
        }
        if ($schematic != '') {
            $data .=  "<br><a onclick=\"window.open('" . $schematic . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='" . $schematic. "'><font color=green>View Schematic</font></a>";
        }
    }
    /*
    $data = '';
    if ($res) {
        //$image = $res['image'];
        //$schematic = $res['image_schematics'];
        if ($image != '') {
            $data .=  "<br><a onclick=\"window.open('" . $image . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='". $image. "'>View Picture</a>";
        }
        if ($schematic != '') {
            $data .=  "<br><a onclick=\"window.open('" . $schematic . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='" . $schematic. "'><font color=green>View Schematic</font></a>";
        }

    }
    */
    return $data;
}

function getDescription($pid) {
    
    $serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $tsql= "SELECT description FROM dbo.Catalog WHERE PID='" . $pid . "'";
    $res= sqlsrv_query($conn, $tsql);
    if ($res == FALSE)
        $rtn = sqlsrv_errors();
    while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $rtn=$row['description'];
    }
    return $rtn;

    //Removed by Tom Barkley 7/21/2022
    /*
    $conn = DB::init();
    $res = $conn->query("SELECT description FROM Catalog WHERE PID='" . $pid . "'")->fetch();
    
    if ($res) {
        return $res['description'];
    }

    return 'Unknown';
    */
}
