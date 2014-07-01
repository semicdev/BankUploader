<link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">
<?php
include('../clases/datosAnexos.php');
// $json = $_POST['chkarray'];

$json = $_POST['chkarray'];
$carretera = $_POST['carretera'];
 //echo sizeof($json);//aqui quitamos 10

// var_dump(json_decode($json[0]));
// var_dump($json);

foreach ($json as $key => $value) {
	# code...	
	$json[$key] = json_decode($value);	
}

//var_dump($json[0]);


for ($cont=0; $cont<sizeof($json); $cont++) 
{
	   $idCarretera = "bre7t54ht3hj67u5uhjt4g8h";
       $idProyecto  = null;
	   $nombreCarretera   = $carretera;
	   $tramo		 = $json[$cont][0];
	   $sentido     = $json[$cont][1];
	   $carril 	 = $json[$cont][2];	

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
		//$loc = [$latitud,$longitud];
		$tipo ="point";
		$geo  = $datos->getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$tipo);
		///////
		$campos =  array("descripcion"=>$json[$cont][9]);
		$consecutivo = $cont;
				
		$arrayNuevo = array($idCarretera,$idProyecto,$nombreCarretera, $tramo,$sentido,$carril,/*$rubro, $abrEstudio,*/ $anyo, $geo, $campos,$consecutivo);

		$elementName = array("idCarretera","idProyecto","carretera","tramo",
							"sentido","carril","rubro","abrEstudio","anyo","geo","campos","consecutivo");

							var_dump( $registros[$cont]= array_combine ($elementName, $registros[$cont]) );
		var_dump($arrayNuevo);
}
?>