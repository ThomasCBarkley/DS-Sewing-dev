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
function getItem($pid)
{
}
*/


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
    $tsql= "SELECT TOP 20 pid, description, price, weight, length, height, image, image_schematics  FROM [dbo].[catalog] WHERE PID='" . $pid . "'";
    $res= sqlsrv_query($conn, $tsql);

    //echo ("Reading data from table - PID= " .$pid);

    //$html='';
    $rtn="";
    
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
        
        $rtn .= "<tr>";
        //conditional for image and schmatics
        $rtn .= '<td  class="item_sku">' . $PID;
        if ($IMAGE !=''){
            $rtn .= "<br>";
            $rtn .= "<a onclick=\"window.open('" .$IMAGE . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='" .$IMAGE . "'>View Picture</a>";
            //onclick=\"window.open('" .$IMAGE . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\"

        }
        if ($SCHEMATICS != ''){
            $rtn .= "<br>";
            $rtn .= "<a onclick=\"window.open('" . $SCHEMATICS . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='" . $SCHEMATICS . "'><font color=green>View Schematic</font></a>";

        }
        $rtn .= '</td>';
        $rtn .= '<td class="item_description">' . $DESC . '</td>';
        $rtn .= '<td class="item_weight">' . number_format($WEIGHT,0) . '</td>';
        $rtn .= '<td class="item_price" >$' . number_format($PRICE,2) . '</td>';
        $rtn .= '<td class="item_button"><button>buy</button></td>';
        $rtn .= '</tr>';
    }
    //sqlsrv_free_stmt($res);

    //echo ($rtn);
    return $rtn;
    
}


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
