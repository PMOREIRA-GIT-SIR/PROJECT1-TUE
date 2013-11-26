<?php
include_once 'CKeyGen.php';
header("Content-Type: text/xml");
$kg = new CKeyGen();
echo $kg->Key2XML();
?>