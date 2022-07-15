<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php";
$conn = DB::init();

$sql = "SELECT pid, image, image_schematics FROM [dssewing].[dbo].[catalog] where image like '%merrittproducts.com%' or image_schematics like '%merrittproducts.com%'";

$res = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$fp = fopen('merrit_images.csv', 'w');
foreach ($res as $item) {
	$name = basename($item['image']);
	fputcsv($fp, $item);
}
fclose($fp);


var_dump($res);die;







$handle = fopen('price_update_030522.csv', 'r');

$sql = "UPDATE [dssewing].[dbo].[catalog] SET ";


while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
$update = "price = '" . $data[1] . "'  ";
//$update .= "merritt_price_level_1 = '" . $data[2] . "', ";
//$update .= "merritt_price_level_2 = '" . $data[3] . "', ";


//$update .= "gl_sales_account = '41000', ";
//$update .= "gl_inventory_account = '13000', ";
//$update .= "gl_cogs_salary_account = '50130' ";


$update = $sql . $update . " WHERE pid = '" . trim($data[0]) . "';
";
//file_put_contents('price_update_030522.sql' , $update, FILE_APPEND);
$res = $conn->query($update)->execute();
}
echo 'finish_up';

/*
require_once $_SERVER["DOCUMENT_ROOT"] . "/includes/data/getprice.php";

$conn = DB::init();

$handle = fopen("ups_update.sql", "r");
while (($line = fgets($handle)) !== false) {
	$res = $conn->query($line)->execute();
	//var_dump($line);die;
}

fclose($handle);
echo 'finish_ups';
*/