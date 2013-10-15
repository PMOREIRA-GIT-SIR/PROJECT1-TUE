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
	<ul class="numbers">
		<?php
			for($i=0; $i<5; $i++) {
			$number = rand(1,50);
			echo "<li> $number </li>";
			// echo "<li>".$number."</li>";
			}
		?>	
	</ul>
	<!-- list of stars -->
	<ul class="stars">
		<?php
			for($i=0; $i<2; $i++) {
			$star = rand(1,11);
			echo "<li> $star </li>";
			// echo "<li>".$star."</li>";
			}
		?>
	</ul>
</body>
		
</html>