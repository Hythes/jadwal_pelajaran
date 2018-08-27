<?php 
require 'config.php';
$api = new Jadwal();
if (isset($_GET) == TRUE) {
if(!$_GET['api']){
	$err['success'] = 0;
	$err['message'] = "Mana API nya bangsat";
	echo json_encode($err);
	exit();
}
if($_GET['api'] == "Mz19Dmsdo21ka10"){
	//Menampilkan data Static
	if($_GET['show']){
		$show = strtolower(strval($_GET['show']));
		if($show == "jadwal"){
			if($_GET['hari']){
				if($_GET['jam']){
					$hari = $api->dayEngToInd($_GET['hari']);
				}
				exit();
			}
			echo json_encode($api->jadwal());
			exit();
		}
		if($show == "guru"){
			echo json_encode($api->guru());
			exit();
		}
		if($show == "pr"){
			echo json_encode($api->pr());
			exit();
		}
		if($show = "ulg"){
			echo json_encode($api->ulg());
			exit();
		}
	}
}
	$err['success'] = 0;
	$err['message'] = "API lu salah goblok";
	echo json_encode($err);
	exit();
}
$row['error'] = "Lu kesini tanpa minta API makdujya gomana";
echo json_encode($row);

 ?>