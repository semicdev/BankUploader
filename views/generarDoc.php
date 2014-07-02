<link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">
<?php
include('../clases/datosAnexos.php');
$datos = new datos();

$json = $_POST['chkarray'];
$carretera = $_POST['carretera'];
$ubicacionArchivo = $_POST['nombreArchivo'];
$claveTramo = $_POST['claveTramo'];

$arrayRubro = explode( '_', $ubicacionArchivo ) ;
$rubro = $arrayRubro[1];
$estudio = explode( '.', substr($arrayRubro[2],0,3) );
$abrEstudio = array_shift( $estudio );

foreach ($json as $key => $value) {
	$json[$key] = json_decode($value);	
}

if($claveTramo=="L" || $claveTramo=="A"){

for ($cont=0; $cont<sizeof($json); $cont++) 
{
       $idProyecto  = null;
	   $nombreCarretera   = $carretera;
	   $tramo		 = $json[$cont][0];
	   $sentido     = $json[$cont][1];
	   $carril 	 = $json[$cont][2];	

		/** anyo **/
		$anyo = $datos->getAnyo();

			/*** geo **/
			$latitud = $json[$cont][5];
			$longitud = $json[$cont][6];
			$elevacion = $json[$cont][7];
			$x = $json[$cont][8];
			$y = $json[$cont][9];
			$rango = null; 
			$tipo ="point";
		
		$geo  = $datos->getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$tipo);
		$campos =  array("IRI izq"=>$json[$cont][10],"IRI der"=>$json[$cont][11],"IRI prom"=>$json[$cont][12]);
		$consecutivo = $cont;

		$arrayFinal = array($idProyecto,$nombreCarretera, $tramo,$sentido,$carril,$rubro, $abrEstudio, $anyo, $geo, $campos,$consecutivo);

		$elementName = array("idProyecto","carretera","tramo","sentido","carril","rubro","abrEstudio","anyo","geo","campos","consecutivo");

		$arrayFinal= array_combine ($elementName, $arrayFinal);

		var_dump($arrayFinal);
}

}else{

for ($cont=0; $cont<sizeof($json); $cont++) 
{
       $idProyecto  = null;
	   $nombreCarretera   = $carretera;
	   $tramo		 = $json[$cont][0];
	   $sentido     = $json[$cont][1];
	   $carril 	 = $json[$cont][2];	

		/** anyo **/
		$anyo = $datos->getAnyo();

			/*** geo **/
			$latitud = $json[$cont][7];
			$longitud = $json[$cont][8];
			$elevacion = $json[$cont][9];
			$x = $json[$cont][10];
			$y = $json[$cont][11];
			$rango = null; 
			$tipo ="point";
		
		$geo  = $datos->getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$tipo);
		$campos =  array("IRI izq"=>$json[$cont][12],"IRI der"=>$json[$cont][13],"IRI prom"=>$json[$cont][14]);
		$consecutivo = $cont;

		$arrayFinal = array($idProyecto,$nombreCarretera, $tramo,$sentido,$carril,$rubro, $abrEstudio, $anyo, $geo, $campos,$consecutivo);

		$elementName = array("idProyecto","carretera","tramo","sentido","carril","rubro","abrEstudio","anyo","geo","campos","consecutivo");

		$arrayFinal= array_combine ($elementName, $arrayFinal);

		var_dump($arrayFinal);
}


}


?>