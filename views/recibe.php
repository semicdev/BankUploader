<link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">
<?php
include('../clases/datosAnexos.php');
// $json = $_POST['chkarray'];

$json = $_POST['chkarray'];
// echo sizeof($json);

// var_dump(json_decode($json[0]));
// var_dump($json);

foreach ($json as $key => $value) {
	# code...	
	$json[$key] = json_decode($value);	
}

//var_dump($json[0]);


for ($cont=0; $cont<=sizeof($json); $cont++) 
{
	   $idCarretera = "bre7t54ht3hj67u5uhjt4g8h";
       $idProyecto  = null;
	   $carretera   = $json[0][1];
	   $tramo		 = $json[1][0];
	   $sentido     = $json[1][1];
	   $carril 	 = $json[1][2];	

/*
		$rubro 		 = substr($ubicacionArchivo, 12,1);
     	$abrEstudio  = substr($ubicacionArchivo, 14,3);
*/
	// anyo 

		$datos = new datos();
		$anyo = $datos->getAnyo();

		/*** geo **/
		$latitud = $json[$cont][4];
		$longitud = $json[$cont][5];
		$elevacion = $json[$cont][6];
		$x = $json[$cont][7];
		$y = $json[$cont][8];
		$rango = null; 
		$loc = [$latitud,$longitud];
		$tipo ="point";
		$geo  = $datos->getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$loc,$tipo);
		///////
		$campos =  array("descripcion"=>$json[$cont][9]);
		$consecutivo = $cont;
	
		array_unshift($json[$cont], $idCarretera,$idProyecto,$carretera,
														 $tramo,$sentido,$carril,/*$rubro, 
														 $abrEstudio,*/ $anyo, $geo, 
														 $campos,$consecutivo);
		
		for ($i=10; $i<=23 ; $i++) 
		{ 
			unset($json[$cont][$i]);	
		}

		var_dump($json[$cont]);
}
?>