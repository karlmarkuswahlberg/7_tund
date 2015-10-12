
<?php
	require_once("functions.php"); //selleks, et leiaks üles getAllData fn.
	//kõik mis functions.php tehti, kuvab siia.
	
	//kuulan, kas kasutaja tahab kustutada. aadressiribal ?delete=2 nt. selle järgi.
	if(isset($_GET["delete"])){
		
		//saadan kustutatava auto id
		deleteCarData($_GET["delete"]);
	}
	if(isset($_GET["update"])){
		updateCarData($_GET["car_id"], $_GET["number_plate"], $_GET["color"]);
	}
	
	
	//saadan return andmed siia. kõik autod objektide kujul massiivis. 
	$car_array = getAllData();
	
?>

<h1>Autode tabel</h1>
<table border=1>
<tr>
	<th>ID</th>
	<th>Kasutaja ID</th>
	<th>Auto NR</th>
	<th>Värv</th>
	<th>Kustuta</th>
	<th>Edit</th>
	
</tr>
<?php
	
	//autod ükshaaval läbi käia.
	for($i = 0; $i < count($car_array); $i++){
		
		//trükib nr lauad välja.
		//lihtsalt muutujad saab echoga ka jutumärkide sees. Aga kui juba klassid ja objektid, siis on vaja lõpetada ära ja punktide vahele.
		
		//kasutaja saab rida muuta, kui aadressireale tekib edit.
		if(isset($_GET["edit"]) && $_GET["edit"] ==  $car_array[$i]->id){
			
			echo "<tr>";
			echo "<form action='table.php' method='get'>";
			//input mida välja ei näidata. hidden.
			echo "<input type='hidden' name='car_id' value='".$car_array[$i]->id."'>";
			
			echo "<td>".$car_array[$i]->id."</td>";
			echo "<td>".$car_array[$i]->user_id."</td>";
			echo "<td><input name='number_plate' value='".$car_array[$i]->number_plate."'></td>";
			echo "<td><input name='color' value='".$car_array[$i]->color."'></td>";
			echo "<td><input name='update' type='submit'></td>";
			echo "<td><a href='table.php'>cancel</a></td>";
			echo"</tr>";
			
		}else{
			echo "<tr><td>".$car_array[$i]->id."</td>";
			echo "<td>".$car_array[$i]->user_id."</td>";
			echo "<td>".$car_array[$i]->number_plate."</td>";
			echo "<td>".$car_array[$i]->color."</td>";
			echo "<td><a href='?delete=".$car_array[$i]->id."'>X</a></td>";
			echo "<td><a href='?edit=".$car_array[$i]->id."'>edit</a></td>";
			
			echo "</tr>";
			//echo $car_array[$i]->id."<br>";
			//echo $car_array[$i]->number_plate."<br>";
		}
		
	}
	
?>
</table>