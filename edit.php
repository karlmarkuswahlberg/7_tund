<?php

	require_once("edit_functions.php"); //see on configi fail, mis viitab tabelile, ja edit kasutab seda.
	//edit.php

	//tr�kin aadressirealt muutuja
	
	//siis ei anna errorit kui minna edit.php lehele ja pole l�pus kirjas edit_id
	if(isset($_GET["edit_id"])){
		
		echo $_GET["edit_id"];
		
		//k�sin andmeid.
		//muutuja "car" saab andmed �he auto kohta ja siis hoiab neid k�iki.
		//getSingleCarData tuleb k�ik edit_functions lehelt. Seal on selle sisu
		$car = getSingleCarData($_GET["edit_id"]);
		var_dump ($car);
		
	}else{
		
		//kui muutujat pole (on nt juba enne kustutatud)
		
		//suunan tagasi lehele table.php
		header("Location: table.php");
	}
	

?>

<!--Salvestamiseks kasutan table.php rida updateCarData($_GET["car_id"], $_GET["number_plate"], $_GET["color"]); updateCar() -->

<form action="table.php" method="get">
	<input name="car_id" type="hidden" value="<?=$_GET["edit_id"];?>">
	<input name="number_plate" type="text" value="<?=$car->number_plate;?>"><br>
	<input name="color" type="text" value="<?=$car->color;?>"><br>
	<input name="update" type="submit"><br>
	

</form>