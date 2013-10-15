<?php
include_once 'CKeyGen.php';
$xpto = new CKeyGen();
?>
<html>
<head>
	<!-- meta tag to indicate to the browser the content and encoding -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> EURO MILLIONS - KEY GENERATOR </title>
	<link rel="stylesheet" href="em_style.css" />
</head>
<body>
	<h1>EURO MILLIONS - KEY</h1>
	<?php
	echo "<h1>olá</h1>";
	?>
	<!-- list of numbers -->
		<?php
		echo $xpto->keyAsHTML();
		$xpto->genKey();
		echo $xpto->keyAsHTML();
		?>
</body>
		
</html>