<?php

	require_once("edit_functions.php"); //see on configi fail, mis viitab tabelile, ja edit kasutab seda.
	//edit.php

	//tr�kin aadressirealt muutuja
	
	//siis ei anna errorit kui minna edit.php lehele ja pole l�pus kirjas edit_id
	if(isset($_GET["edit_id"])){
		
		echo $_GET["edit_id"];
		
		//k�sin andmeid.
		//muutuja "car" saab andmed �he auto kohta ja siis hoiab neid k�iki.
		$car = getSingleCarData($_GET["edit_id"]);
		var_dump ($car);
		
	}else{
		
		//kui muutujat pole (on nt juba enne kustutatud)
		
		//suunan tagasi lehele table.php
		header("Location: table.php");
	}
	

?>