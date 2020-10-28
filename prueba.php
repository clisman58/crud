<?php
	include_once ("PA.php");
	$pa = new PA();
	$pas = $pa->mostrarPAs();
	foreach ($pas as $programa) {
			echo $programa["nombre"]."<br>";
		}	
?>