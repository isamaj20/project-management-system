<?php
//block any attempt to the filesystem
include 'db_connection.php';
//$file="";
	$file_id = str_replace("-","'",$_GET['file_id']);
        $sql= mysqli_query($mysqli, "select * from documents where doc_id='$file_id'");
        $result=mysqli_fetch_array($sql);
        $url=$result['doc_URL'];
        $name=$result['name'];
        $filename = "$url";
ob_clean();
//header("Cache-Control: no-store");
//header("Expires: 0");
//header("Cache-Control:  maxage=1");
header("Pragma: public");
header("Content-Type: application/octet-stream");
header("Content-disposition: attachment; filename=\"".basename($url)."\"");
header("Content-Transfer-Encoding: binary");
header('Content-Length: '. filesize($filename));
$status="seen";
$sql1= mysqli_query($mysqli, "UPDATE documents set status='$status' where doc_id='$file_id'");
readfile($filename);
//fopen($filename,"r+");
	?>
