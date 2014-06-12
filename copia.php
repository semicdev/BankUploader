<?php 

	$registros = $libro->getDataSheet($numHoja,14);
		 	//var_dump($registros);
			echo "<tr>";
		 	for ($f=0; $f < 10; $f++) 
		 	{ 					
		 		for ($c=0; $c <=10; $c++) 
				{
					foreach ($registros as $valores)
	  				{
		 				 print_r ("<td>".$registros[$c]."</td>" );
					} 
		 		}
		 	}

			echo "</tr>";
		 	/*
			echo "<tr>";
		 	for ($i=0; $i < 10; $i++) 
		 	{ 					
		 		for ($c=0; $c <=10; $c++) 
				{
				$separado_por_comas = implode(",", $registros);
		 		 var_dump("<th>".$separado_por_comas."</th>" );
		 		}
		 	}
		 	
		 	*/
	 /*
			
		 		echo "<tr>";
				for ($f=0; $f <=10; $f++) 
				{ 

		 				 print_r ("<td>".$registros."</td>" );
		 				// echo $registrosr[] = implode(" ",$registros)  ;
				 	}
				}
				echo "</tr>";	*/
		/*	
		*/	



/*	   $tiempo_inicio = microtime(true);
		
		$libro = new cargaArchivos();

		$fileWithPath = "files/14_E_DET.xlsx";
		$libro->leerLibro($fileWithPath);

		 $documentos = $libro->getDataSheet(5,14);
	*/
		//quitar fila el arreglo no se recorre
		//unset($documentos[0]);
				
		//quitar elemento en especifico
		//unset($documentos[0][1]);
/*
		$deleteCol = array(1,2,4,6,7);
		$elementName = array("carretera","sentido","carril","latitud","longitud");
		for ($fila=0; $fila < sizeof($documentos); $fila++) { 
			# elimiar columnas de una matriz
			foreach ($deleteCol as $columna) {
				unset($documentos[$fila][$columna]);
			}   
			$documentos[$fila] = array_combine($elementName, $documentos[$fila]);         
		}
*/

		//var_dump($documentos[0]);

		//echo json_encode($documentos[0]);
	

	//	$libro->conectar();
	//	$rawData = $libro->getRawData();
		
	//	foreach ($rawData as $value) {
	//		var_dump($value);
	//	}

		//$libro->exportToMongo($documentos);
		//var_dump($documentos);


		//$libro->getValoresExcel();
/*
	
		$tiempo_fin = microtime(true);
		$tiempoTotal = $tiempo_fin - $tiempo_inicio;

		echo "Tiempo inicio: ".$tiempo_inicio."<br>";
		echo "Tiempo fin: ".$tiempo_fin."<br>";
		echo "tiempo transcurrido: ".$tiempoTotal;
*/


			<!--	<form name="getFile" method="post" action="views/showHojas.php">
					<p>
					<input type="file" name="archivo" id="archivo" >				
					<select id="listaArchivos" name="listaArchivos">
					<?php /*
						$directorio = new directorio();
						$listaArchivos = $directorio->getListaArchivos();

						while ($nombreArchivo = $listaArchivos->read())
						{
		    				echo "<option value=".$nombreArchivo.">".$nombreArchivo."</option>";
						}
						*/
					?>
					</select> 
					</p> 
					<p>	<input type="submit" id="obtenerLibro" class="btn btn-primary" value ="Continuar"></p>
				</form>-->




?>	