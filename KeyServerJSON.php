<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include_once 'CKeyGen.php';
//header("Content-Type: text/xml");
$kg = new CKeyGen();
sleep(3);
echo $kg->KeyAsJSON();
?>