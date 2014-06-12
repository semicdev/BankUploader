	<?php
	//$regDato = $libro->getDataSheet($numHoja,9);
					 	$registros = $libro->getDataSheet($numHoja,9,$numfilas);

					 	//$ult = $libro->getUltimaCol(); 
					 	//$filas = $libro->getNumeroFilas();

					 //	var_dump($ult);
					 //	var_dump($filas);
							for ($filai=0; $filai < ($numfilas-8); $filai++) 
							{								 
								echo "<tr>";
								for ($columnai=0; $columnai < 10; $columnai++) 
								{ 
									 if ($columnai == 0)
									  {
 										 $valorCelda = $registros[$filai][$columnai];
										 echo "<td><input type='checkbox' checked ='true' name='chkarray' value=''> ".$valorCelda."</td>"; 
									  }else{
 										$valorCelda = $registros[$filai][$columnai];
									  	 echo "<td> ".$valorCelda."</td>";		
									  }
								}		
								 echo "</tr>";	
							}

					   // $idCarretera = substr($nombreArchivo, 0, 2);
					/*	for ($cont=0; $cont<=($totalFilas-12); $cont++) 
						{
						    $idCarretera = "bre7t54ht3hj67u5uhjt4g8h";
						    $idProyecto  = null;
						    $carretera   = $regDato[$cont][1];
							$tramo		 = $registros[$cont][1];
							$sentido     = $registros[$cont][2];
							$carril 	 = $registros[$cont][0];	
							$rubro 		 = substr($ubicacionArchivo, 12,1);
							$abrEstudio  = substr($ubicacionArchivo, 14,3);
*/
							/*** anyo 

							$datos = new datos();
							$anyo = $datos->getAnyo();***/

							/*** geo 

							$latitud = $registros[$cont][4];
							$longitud = $registros[$cont][5];
							$elevacion = $registros[$cont][6];
							$x = $registros[$cont][7];
							$y = $registros[$cont][8];
							$rango = null; 
							$loc = [$latitud,$longitud];
							$tipo ="point";
							$geo  = $datos->getGeo($latitud,$longitud,$elevacion,$x,$y,$rango,$loc,$tipo);
							$campos =  array("descripcion"=>$registros[$cont][9]);
							$consecutivo = $cont;***/
	/*
							array_unshift($registros[$cont], $idCarretera,$idProyecto,$carretera,
														 $tramo,$sentido,$carril,$rubro, 
														 $abrEstudio, $anyo, $geo, 
														 $campos,$consecutivo);
							for ($i=12; $i<=21 ; $i++) 
							{ 
								unset($registros[$cont][$i]);	
							}
*/
							//$elementName = array("idCarretera","idProyecto","carretera","tramo",
							//	"sentido","carril","rubro","abrEstudio","anyo","geo","campos","consecutivo");

							//var_dump( $registros[$cont]= array_combine ($elementName, $registros[$cont]) );
							
					//	}


					   // echo $nomArchivo;

					 	//primera fila
/*
							for ($filai=2; $filai < 11; $filai++) 
							{								 
								echo "<tr>";
								for ($columnai=0; $columnai < 10; $columnai++) 
								{ 
									 $otroArray = $registros[$filai][$columnai];
									 echo "<td>".$otroArray."</td>"; 
								}		
								 echo "</tr>";	
							}
*/