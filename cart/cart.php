<?php
error_reporting(0);
//Setting session start
session_start();

$total=0;
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


//Database connection, replace with your connection string.. Used PDO
/* Original - removed by TCB
$conn = new PDO("mysql:host=localhost;dbname=tutsplanet", 'root', '');		
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

//get action string
$action = isset($_GET['action'])?$_GET['action']:"";

$pid = isset($_GET['pid'])?$_GET['pid']:"";

$id = isset($_GET['id'])?$_GET['id']:"";


$rtn = "success";
//Add to cart
if($action=='addcart') {
	
/* 	$serverName = "ds-sewing-dev-server.database.windows.net"; // update me
    
    $connectionOptions = array(
        "Database" => "dssewing", // update me
        "Uid" => "ds-sewing-dev-server-admin", // update me
        "PWD" => "2020Sucks!" // update me
    );
    
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions); */
	
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

    //if ($res == FALSE){
    //    $rtn = sqlsrv_errors();
    //}

    /*while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
        //echo ($row['PID'] . " " . $row['Description'] . PHP_EOL);
        $price=$row['itmPrice'];
    }*/
    
    //return $rtn;
    

	//Finding the product by code
/* 	$query = "SELECT * FROM products WHERE sku=:sku";
	$stmt = $conn->prepare($query);
	$stmt->bindParam('sku', $_POST['sku']);
	$stmt->execute();
	$product = $stmt->fetch();
	
	$currentQty = $_SESSION['products'][$_POST['sku']]['qty']+1; //Incrementing the product qty in cart
	$_SESSION['products'][$_POST['sku']] =array('qty'=>$currentQty,'name'=>$product['name'],'image'=>$product['image'],'price'=>$product['price']);
	$product='';
	header("Location:shopping-cart.php"); */
}

//Empty All
if($action=='emptyall') {
/* 	$_SESSION['products'] =array();
	header("Location:shopping-cart.php");	
 */}

//Empty one by one
if($action=='empty') {
/* 	$sku = $_GET['sku'];
	$products = $_SESSION['products'];
	unset($products[$sku]);
	$_SESSION['products']= $products;
	header("Location:shopping-cart.php");	
 */}


 
 if($action=='show'){
	global $serverName, $connectionOptions, $conn;

	echo("sessionID=" .$id);

    $tsql = "SELECT pid,description FROM dbo.catalog where pid in(select pid from dbo.cart where sessionID='" . $id ."')";
    $res= sqlsrv_query($conn, $tsql);
    
	echo("Resource=" .$res);

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
	echo("found records");
	while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
		echo ($row['pid'] . " " . $row['description'] . PHP_EOL);
		//$price=$row['itmPrice'];
	}

 }
 //Get all Products
/* $query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP registration form</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="width:600px;">
IT LOADS <?php echo ($action . " " . $rtn); ?>
</DIV>
</body>
</html>