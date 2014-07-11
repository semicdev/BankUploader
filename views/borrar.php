<?php

link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">
<?php
include ('../clases/archivo.php');
$libro = new archivo();


//$json = $_POST['chkarray'];

$ubicacionArchivo = $_POST['nombreArchivo'];
$estado=$_POST['estado'];

$numeroHoja = $_POST['numeroHoja']; //obtenemos el numero de hoja del input radio
$ultimaFiladeHoja = $_POST['ultimaFiladeHoja']; //obtenemos el numero de hoja del input radio


var_dump($ultimaFiladeHoja);

//$json = $libro->getDataSheet($numeroHoja,1,$ultimaFiladeHoja);//11--5 a partir de que columna leera


/*
$arrayRubro = explode( '_', $ubicacionArchivo ) ;
$rubro = $arrayRubro[1];
$estudio = explode( '.', substr($arrayRubro[2],0,3) );
$abrEstudio = array_shift( $estudio );
*/

/*
foreach ($json as $key => $value) {
	$json[$key] = json_decode($value);	
}

for ($cont=0; $cont<sizeof($json); $cont++) 
{
       $idProyecto  = null;
	   $nombreCarretera   = $carretera;
	   $tramo		 = $json[$cont][0];
	   $sentido     = $json[$cont][1];
	   $carril 	 = $json[$cont][2];	

		// anyo 
		$anyo = $datos->getAnyo();

			// geo
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
}*/



///

for ($filai=2; $filai < $ultimaFiladeHoja; $filai++) //establecemes la lectura de la hoja numero de filas a iterar - el total de filas en blanco (encabezados)
					{								 
						echo "<tr>";
						$vacio=1;$lleno=1;
							for ($columnai=0; $columnai < 31; $columnai++) //columnas 13--64
							{ 
							$arr = $registros[$filai];
							echo "<td>".$registros[$filai][$columnai]."</td>"; 
									
								if($registros[$filai][$columnai]==null)
									{ 
									//echo "<br>elemento vacio</br>".$filai.$columnai.'</br>';
									$vacio=$vacio+1;
									//echo $registros[$filai][$columnai].'</br>';
									if($vacio>=32)
									  	{
										echo 'todos los registros de la fila'.$filai.'columna'.$columnai.'estan vacios</br>';
										}	
									}
								else{ 
									//echo "<br/>lleno".$filai.$columnai.'<br>';
									//echo $registros[$filai][$columnai].'</br>';
									$lleno=$lleno+1;
								}
								
							}	
						 echo "</tr>";
					}
