<link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">
<?php

// $json = $_POST['chkarray'];

$json = $_POST['chkarray'];
// echo sizeof($json);

// var_dump(json_decode($json[0]));
// var_dump($json);

foreach ($json as $key => $value) {
	# code...	
	$json[$key] = json_decode($value);	
}
var_dump($json);



//	$idProyecto  = null;
//	$carretera   = $regDato[0][1];
/*	$tramo		 = $registros[0][1];
	$sentido     = $registros[0][2];
	$carril 	 = $registros[0][0];
*/


/*
for ($i=0; $i < sizeof($json) ; $i++) 
{ 

	$jsonNew = json_decode( $json[$i] ) ;

	//var_dump($jsonNew);

	    $idProyecto  = null;
		$tramo		 = $jso;

		// array_unshift($jsonNew, $idProyecto,$tramo,$sentido,$carril);

		$arr = array($tramo);
		var_dump($arr);
		

}

*/
?>