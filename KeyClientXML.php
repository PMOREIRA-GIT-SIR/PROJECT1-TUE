<?
// request the server for a key
$mykey1 = file_get_contents("http://alunos.estg.ipvc.pt/~pmoreira/KEYSERVER/KeyServerXML.php");
$mykey2 = file_get_contents("http://localhost/SIR1213/EM_KEYGEN_MON/KeyServerXML.php");



function XML2HTML($xmlstring) {
	$xmlkey = new SimpleXMLElement($xmlstring);
	
	$xhtml = new SimpleXMLElement("<div/>");
	$ulnoden = $xhtml->addChild("ul");
	$ulnoden -> addAttribute("class","numbers");
	
	$thenumbers = $xmlkey->numbers->num;
	foreach($thenumbers as $thenumber) {
		$ulnoden->addChild("li",$thenumber);
	}
	
	$ulnodes = $xhtml->addChild("ul");
	$ulnodes -> addAttribute("class","stars");
	$thestars = $xmlkey->stars->num;
	foreach($thestars as $thestar) {
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
		echo XML2HTML($mykey2);
		echo XML2HTML($mykey1);
		?>
		 
	</body>
	
</html>