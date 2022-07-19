<?php

final class DB {

    public static function init()
    {
        //return new PDO("sqlsrv:Server=localhost;Database=DSSewing", "dssewing_www_service", "!g0ttal3arnt0s3w");
        return new PDO("sqlsrv:
        Server=tcp:ds-sewing-dev-server.database.windows.net,1433;
        Initial Catalog=dssewing;
        Persist Security Info=False;
        User ID=ds-sewing-dev-server-admin;
        Password=2020Sucks!;
        MultipleActiveResultSets=False;
        Encrypt=True;
        TrustServerCertificate=False;
        Connection Timeout=30;
        ");
    }
}

function test123(){
	$conn = DB::init();

	//$sql = "SELECT image, image_schematics  FROM Catalog WHERE PID='" . $pid . "'";
	$sql = "
	UPDATE Catalog
	SET image=''
	WHERE PID = '393'
	";
	//$res = $conn->query($sql)->fetch();

}


function getPrice($pid) {
    $conn = DB::init();
	$res = $conn->query("SELECT Price FROM Catalog WHERE PID='" . $pid . "'")->fetch();

	if ($res) {
	    return number_format($res['Price'],2);
    }

    return 'Unknown';
}

function getWeight($pid) {
    $conn = DB::init();
	$res = $conn->query("SELECT weight FROM Catalog WHERE PID='" . $pid . "'")->fetch();

    if ($res) {
        return number_format($res['weight'],0);
    }

    return 'Unknown';
}

function getImageLinks($pid){
	$conn = DB::init();
	$res = $conn->query("SELECT image, image_schematics  FROM Catalog WHERE PID='" . $pid . "'")->fetch();
	if ($res) {
		return $res;
	}else{
		return [];
	}
}


function getImages($pid) {
	$res = getImageLinks($pid);

    $data = '';
    if ($res) {
        $image = $res['image'];
        $schematic = $res['image_schematics'];
        if ($image != '') {
            $data .=  "<br><a onclick=\"window.open('" . $image . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='". $image. "'>View Picture</a>";
        }
        if ($schematic != '') {
            $data .=  "<br><a onclick=\"window.open('" . $schematic . "','newwindow','location=no,toolbar=no,menubar=no,width=800,height=600,scrollbars=yes,resizable=no,top=0,left=0');return false;\" href='" . $schematic. "'><font color=green>View Schematic</font></a>";
        }

    }

    return $data;
}

function getDescription($pid) {
    $conn = DB::init();
    $res = $conn->query("SELECT description FROM Catalog WHERE PID='" . $pid . "'")->fetch();

    if ($res) {
        return $res['description'];
    }

    return 'Unknown';
}
