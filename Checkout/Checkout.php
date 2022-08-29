<?php

error_reporting(0);

/****************************************************************************************************************** */
// Setting session start
// session_start();
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


<div>
 	<div>
		<div class="CustomerInfoHeader">
		Customer Info
		</div>
			<div class="Customer">
				<div class="CustomerField-div">
					<label for="Text-AcctCompany" class="CustomerField-label">Company Name</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctCompany" access="false" id="text-AcctCompany">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctName" class="CustomerField-label">Contact Name</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctName" access="false" id="text-AcctName">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctAddress1" class="CustomerField-label">Address 1</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctAddress1" access="false" id="text-AcctAddress1">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctAddress2" class="CustomerField-label">Address 2</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctAddress2" access="false" id="text-AcctAddress2">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctCity" class="CustomerField-label">City</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctCity" access="false" id="text-AcctCity">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctState" class="CustomerField-label">State</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctState" access="false" id="text-AcctState">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctZip" class="CustomerField-label">Zip</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctZip" access="false" id="text-AcctZip">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctPhone" class="CustomerField-label">Phone</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctPhone" access="false" id="text-AcctPhone">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctFax" class="CustomerField-label">Fax</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctFax" access="false" id="text-AcctFax">
				</div>
				<div class="CustomerField-div">
					<label for="text-AcctCell" class="CustomerField-label">Cell</label>
					<input type="text" class="CustomerField-TextControl" name="text-AcctCell" access="false" id="text-AcctCell">
				</div>
			</div>
		
	</div>
	<div>
		<div class="ShippingInfoHeader">
		Shipping Info
		</div>
			<div class="Ship">
					<div class="ShipField-div">
						<label for="Text-ShipCompany" class="ShipField-label">Company Name</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipCompany" access="false" id="text-ShipCompany">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipName" class="ShipField-label">Contact Name</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipName" access="false" id="text-ShipName">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipAddress1" class="ShipField-label">Address 1</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipAddress1" access="false" id="text-ShipAddress1">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipAddress2" class="ShipField-label">Address 2</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipAddress2" access="false" id="text-ShipAddress2">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipCity" class="ShipField-label">City</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipCity" access="false" id="text-ShipCity">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipState" class="ShipField-label">State</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipState" access="false" id="text-ShipState">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipZip" class="ShipField-label">Zip</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipZip" access="false" id="text-ShipZip">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipPhone" class="ShipField-label">Phone</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipPhone" access="false" id="text-ShipPhone">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipFax" class="ShipField-label">Fax</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipFax" access="false" id="text-ShipFax">
					</div>
					<div class="ShipField-div">
						<label for="text-ShipCell" class="ShipField-label">Cell</label>
						<input type="text" class="ShipField-TextControl" name="text-ShipCell" access="false" id="text-ShipCell">
					</div>
				</div>
			</div>
	<div>
		<div class="BillingInfoHeader">
 		Billing Info
		 <input type="checkbox" id="billinsameasshipping" name="billing" value="false">check if billing address is the same as the shipping address</input>
		</div>
	</div>
</div>

<div>
	<CENTER><br><br>
		<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php"; ?>
    </CENTER>
</div>	
</body>
</html>