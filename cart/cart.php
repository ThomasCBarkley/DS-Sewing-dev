<?php

error_reporting(0);

/****************************************************************************************************************** */
// Setting session start
session_start();
/****************************************************************************************************************** */


$total=0;
/****************************************************************************************************************** */
// Setup Database Conection
	$serverName = "ds-sewing-dev-server.database.windows.net"; // update me
		
	$connectionOptions = array(
		"Database" => "dssewing", // update me
		"Uid" => "ds-sewing-dev-server-admin", // update me
		"PWD" => "2020Sucks!" // update me
	);

	//Establishes the connection
	$conn = sqlsrv_connect($serverName, $connectionOptions);

// End Connection
/****************************************************************************************************************** */


//Database connection, replace with your connection string.. Used PDO
/* Original - removed by TCB
$conn = new PDO("mysql:host=localhost;dbname=tutsplanet", 'root', '');		
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

/****************************************************************************************************************** */
//get params from url query string
	//?action=
		$action = isset($_GET['action'])?$_GET['action']:"";
	//&pid=
		$pid = isset($_GET['pid'])?$_GET['pid']:"";
	//&id=
		$id = isset($_GET['id'])?$_GET['id']:"";
	//&qty=
		$qty = isset($_GET['qty'])?$_GET['qty']:"";
/****************************************************************************************************************** */


/****************************************************************************************************************** */
// global var for $cart_HTML
$cart_HTML = "";
/****************************************************************************************************************** */

/****************************************************************************************************************** */


/****************************************************************************************************************** */
// Add to cart
/****************************************************************************************************************** */
if($action=='addcart') {
	
	global $serverName, $connectionOptions, $conn;

    $tsql = "INSERT INTO dbo.communicationTest(message) VALUES('" .$pid ."')";
    $res= sqlsrv_query($conn, $tsql);
    
    //$rtn = "success";
	if( $res === false ) {
		if( ($errors = sqlsrv_errors() ) != null) {
			foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
			}
		
		}
	}

    /*while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $price=$row['itmPrice'];
    }*/
}
/****************************************************************************************************************** */
// Add to cart
/****************************************************************************************************************** */
if($action=='updatecart') {
	
	global $serverName, $connectionOptions, $conn;
	global $cart_HTML;

    //$tsql = "INSERT INTO dbo.communicationTest(message) VALUES('" .$pid ."')";
	$tsql = "UPDATE dbo.cart SET qty='" . $qty . "' WHERE sessionID='" . $id . "' and pid='" . $pid ."'";
    $res= sqlsrv_query($conn, $tsql);
    
	$cart_HTML=$tsql;

    //$rtn = "success";
	if( $res === false ) {
		if( ($errors = sqlsrv_errors() ) != null) {
			foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
			}
		
		}
	}
}

/****************************************************************************************************************** */
// Empty entire cart
/****************************************************************************************************************** */
if($action=='emptyall') {
/* 	$_SESSION['products'] =array();
	header("Location:shopping-cart.php");	
 */}


/****************************************************************************************************************** */
// Remove item
/****************************************************************************************************************** */
if($action=='remove') {
	global $serverName, $connectionOptions, $conn;
	global $cart_HTML;

    //$tsql = "INSERT INTO dbo.communicationTest(message) VALUES('" .$pid ."')";
	$tsql = "DELETE FROM dbo.cart WHERE sessionID='" . $id . "' and pid='" . $pid ."'";
    $res= sqlsrv_query($conn, $tsql);
    
	$cart_HTML=$tsql;

    //$rtn = "success";
	if( $res === false ) {
		if( ($errors = sqlsrv_errors() ) != null) {
			foreach( $errors as $error ) {
				echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
				echo "code: ".$error[ 'code']."<br />";
				echo "message: ".$error[ 'message']."<br />";
			}
		
		}
	}
}


 
/****************************************************************************************************************** */
// Show Cart
/****************************************************************************************************************** */
if($action=='show'){
	global $serverName, $connectionOptions, $conn;

	//echo("sessionID=" .$id);

	//Build Query 
		$tsql="SELECT 
			dbo.catalog.pid as PID, 
			dbo.catalog.description as DSC, 
			dbo.catalog.price as PRC, 
			dbo.catalog.weight as WGT, 
			dbo.catalog.length as LEN, 
			dbo.catalog.height as HGT, 
			dbo.cart.qty as QTY
		FROM dbo.catalog
		INNER JOIN dbo.cart on dbo.catalog.pid=dbo.cart.pid
		WHERE dbo.cart.sessionID='" . $id ."'";

		//$tsql = "SELECT dbo.catalog.pid, dbo.catalog.description, dbo.catalog.price, dbo.catalog.weight, dbo.catalog.length, dbo.catalog.height dbo.cart.qty FROM dbo.catalog where pid in(select pid as cartQTY from dbo.cart where sessionID='" . $id ."') inner join on dbo.catalog.pid = dbo.cart.pid";
		
	//Open Query
		$res= sqlsrv_query($conn, $tsql);
    
	//echo("Resource=" .$res);

    //Process Results
		//if Error
			if( $res === false ) {
				if( ($errors = sqlsrv_errors() ) != null) {
					foreach( $errors as $error ) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message: ".$error[ 'message']."<br />";
					}
				}		
			}
		//else no error
			//echo("found records");
			global $cart_HTML;

			//set table and header
			$cart_HTML = build_cartHeader();

			$row_ID = 0;

			//echo($cart_HTML); 
				
			//build rows
				while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
					//echo ($row['pid'] . " " . $row['description'] . PHP_EOL);
					
					$row_ID++;
					        					
					$PID=$row['PID'];
					$DESC=$row['DSC'];
					$WEIGHT=$row['WGT'];
					$PRICE=$row['PRC'];
					$QTY=$row['QTY'];

					$ShowPRICE = $PRICE*$QTY;
					//echo($ShowPRICE);

 					$cart_HTML .= '<tr>';
					$cart_HTML .= '<td class="item_sku">' ;  
					$cart_HTML .= '<input style="width:25px;" type="text" id="text_QTY' . $row_ID .'" value="' . $QTY . '">';
					//$cart_HTML .= '<INPUT TYPE="NUMBER" MIN="0" MAX="10" STEP="1" VALUE="' . $QTY . '" SIZE="6">';
					//$cart_HTML .= "&nbsp;<button type=\"button\" onclick=\"updateButton('" . $PID . "','text_QTY" . $row_ID ."');\">Update QTY</button>";
					$cart_HTML .= '</td>';
					$cart_HTML .= '<td class="item_sku" id="text_PID' . $row_ID .'">' . $PID;		
					$cart_HTML .= '</td>';
					$cart_HTML .= '<td class="item_description">' . $DESC . '</td>';
					$cart_HTML .= '<td class="item_weight" >' . number_format($WEIGHT,0) . '</td>';
					$cart_HTML .= '<td class="item_price" id="text_PRICE' . $row_ID .'">$' . number_format($PRICE,2) . '</td>';
					$cart_HTML .= '<td class="item_price" id="text_TOTALPRICE' . $row_ID .'">$' . number_format($ShowPRICE,2) . '</td>';
					//$cart_HTML .= '<input type="text" id="country" name="country" value="Norway" readonly>';
					$cart_HTML .= '</tr>';  
					
				}

			$cart_HTML .="</table>";
			$cart_HTML .="<div>";
			$cart_HTML .= "&nbsp;<button type=\"button\" onclick=\"updateButton('" . $PID . "','" . $row_ID ."','" . $id . "');\">Update Cart</button>";
					
		//echo($cart_HTML);
 }
 function build_cartRow($PID,$DESC,$WEIGHT,$PRICE,$QTY,$ROW) {
	global $cart_HTML;
	$ShowPRICE = $PRICE*$QTY;
 }
 function build_cartHeader(){
	$rtn_HTML = '<table class="cart_Table" BORDER="1" CELLSPACING="0" CELLPADDING="3">';
	$rtn_HTML .= "<tr class=\"cart_Header_TR\">";
	$rtn_HTML .= "<td>Qty</td>";
	$rtn_HTML .= "<td>Item Number</td>";
	$rtn_HTML .= "<td>Description</td>";
	$rtn_HTML .= "<td>Weight</td>";
	$rtn_HTML .= "<td> Item Price</td>";
	$rtn_HTML .= "<td> Total Price</td>";
	$rtn_HTML .= "</tr>";

	return $rtn_HTML;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DS-Sewing Cart</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="EventHandler.js"></script>

	<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/head.php"; ?>
</head>
<body>
<DIV ALIGN="center">
    <CENTER><?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/header.php"; ?></CENTER>
</DIV>
<div class="container" style="width:600px;">
</DIV>
<div>
	<CENTER>
		<?php echo($cart_HTML); ?>
	</CENTER>
</div>
<!-- 
	<div>
		<CENTER><br><br>
			<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
		</CENTER>
	</div>
 -->
</body>
</html>