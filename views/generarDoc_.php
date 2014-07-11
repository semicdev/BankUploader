<?php

$col = json_decode($_POST['columnas'],true);

include('../clases/datosAnexos.php');
$datos = new datos();

$json = $_POST['chkarray'];
//$tramo0= $columnas[0];//a
$carretera = $_POST['carretera'];
$nombreArchivo = $_POST['nombreArchivo'];
$claveTramo = $_POST['claveTramo'];

$arrayRubro = explode( '_', $nombreArchivo ) ;
$rubro = $arrayRubro[1];
$estudio = explode( '.', substr($arrayRubro[2],0,3) );
$abrEstudio = array_shift( $estudio );

foreach ($json as $key => $value) {
	$json[$key] = json_decode($value);	
}

for ($cont=0; $cont<sizeof($json); $cont++) 
{
    $idProyecto  	   = null;
	$nombreCarretera   = $carretera;
	//$tramo		 = $json[$cont][$columnas['tramo']];
	$tramo 			   = $json[$cont][$col['tramo']];
	$sentido		   = $json[$cont][$col['sentido']];
	$carril			   = $json[$cont][$col['carril']];	
 	/** anyo **/
	$anyo 			   = $datos->getAnyo();

	/*** geo **/
	$latitud 		   = $json[$cont][$col['latitud']];
	$longitud 	       = $json[$cont][$col['longitud']];
	$elevacion 	       = $json[$cont][$col['elevacion']];
	$x 			       = $json[$cont][$col['x']];
	$y 			       = $json[$cont][$col['y']];
	$rango 		       = null; 
	$tipo 		       = "point";
		
	$geo  = $datos->getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$tipo);
	$campos =  array("IRI izq"=>$json[$cont][12],"IRI der"=>$json[$cont][13],"IRI prom"=>$json[$cont][14]);
	$consecutivo = $cont;

		$arrayFinal = array($idProyecto,$nombreCarretera, $tramo,$sentido,$carril,/*$rubro, $abrEstudio,*/ $anyo, $geo, $campos,$consecutivo);

		$elementName = array("idProyecto","carretera","tramo","sentido","carril",/*"rubro","abrEstudio",*/"anyo","geo","campos","consecutivo");

		$arrayFinal= array_combine ($elementName, $arrayFinal);

		var_dump($arrayFinal);
}




?>