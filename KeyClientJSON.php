<?
// request the server for a key
$mykeylocal = file_get_contents("http://localhost/SIR1213/EM_KEYGEN_MON/KeyServerJSON.php");
$mykeyremote = file_get_contents("http://alunos.estg.ipvc.pt/~pmoreira/KEYSERVER/KeyServerJSON.php");

function JSON2HTML($jsonstring) {
		
	$phpObj = json_decode($jsonstring);
	 	
	$xhtml = new SimpleXMLElement("<div/>");
	$ulnoden = $xhtml->addChild("ul");
	$ulnoden -> addAttribute("class","numbers");
	
	foreach($phpObj->numbers as $thenumber) {
		$ulnoden->addChild("li",$thenumber);
	}
	
	$ulnodes = $xhtml->addChild("ul");
	$ulnodes -> addAttribute("class","stars");
	foreach($phpObj->stars as $thestar) {
		$ulnodes->addChild("li",$thestar);
	}
	return $xhtml->asXML();
}






?>
<html>
	<head>
		<title>Euro Millions</title> 
		<link rel="stylesheet" href="em_style.css"/>
	</head>
	<body>
		
		<h1> The Key :</h1>
		
		<?php 
		echo JSON2HTML($mykeylocal);
		echo JSON2HTML($mykeyremote);

		?>
		 
	</body>
	
</html>