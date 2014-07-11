<?php
include ('../clases/archivo.php');
//include ('../clases/datosAnexos.php');

$numeroHoja = (int)$_POST['numeroHoja']; //obtenemos el numero de hoja del input radio
$numTotFilasHojas = $_POST['numTotFilasHojas']; // arreglo de total de filas de cada hoja
$nombreArchivo=$_POST['nombreArchivo'];	 // recibimos nombre archivo
$ubicTempArchivo = $_POST['ubicTempArchivo']; // ruta del archivo en caprpeta TmpFile

$totalFilas = json_decode($numTotFilasHojas);
$ultimaFiladeHoja = $totalFilas[$numeroHoja]; // asignamos el total de filas de acuerdo a la hoja seleccionada

$libro = new archivo();
$libro->leerLibro($ubicTempArchivo); // cargamos el archivo excel de acuerdo a la ruta
$nombrehoja = $libro->getNombreHojas(); // ñeemos los nombre de las hojas

/*var_dump($nombreArchivo);
exit();*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>

</head>
<body>
	<div class="container" >
		<div class="row ">
			<div class="col-md-12 col-lg-12">
				<h2>Herramienta carga de Archivos</h2>
				<p><span>A continuacion se muestra el contenido del archivo <b><?php echo $nombreArchivo; ?></b> en la hoja :<b> <?php echo $nombrehoja[$numeroHoja] ?></b>. Seleccione las filas que no sean necesarias para generar el documento JSON</span></p>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-lg-2">
			<h4><b>Orden estandar</b></h4>
			<table class= "table table-condensed table-striped">
				<tr>
					<th class="col-lg-9">Columna</th>
					<th class="col-lg-3">Pos a corregir</th>
				</tr>
				<tr>
					<td class="col-lg-9">Clave tramo</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="claveTramo" value="0"></td>
				</tr>		
				<tr>
					<td class="col-lg-9">Sentido</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="sentido" value="1"></td>
				</tr>
				<tr>
					<td class="col-lg-9">Carril</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="carril" value="2"></td>
				</tr>
				<tr>
					<td class="col-lg-9">Latitud</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="latitud" value="5"></td>
				</tr>
				<tr>
					<td class="col-lg-9">Longitud</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="longitud" value="6"></td>
				</tr>
				<tr>
					<td class="col-lg-9">Elevacion</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="elevacion" value="7"></td>
				</tr>
				<tr>
					<td class="col-lg-9">X</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="x" value="8"></td>
				</tr>
				<tr>
					<td class="col-lg-9">Y</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="y" value="9"></td>
				</tr>
				<tr>
					<td class="col-lg-9">IRI der</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="iriDer" value="10"></td>
				</tr>
				<tr>
					<td class="col-lg-9">IRI izq</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="iriIzq" value="11"></td>
				</tr>
				<tr>
					<td class="col-lg-9">IRI prom</td>
					<td class="col-lg-3"><input type="text" maxlength="2" class="form-control" id="iriProm" value="12"></td>
				</tr>
			</table>

			</div>
			<div class="col-md-10 col-lg-10">

					<form name="getValores" method="post" action="generarDoc.php">
					<p align="right"><span><input type="submit" id="generaDoc" class="btn btn-success" value="Generar Documento"></span></p>
					<table class= "table table-condensed table-striped" >
					<?php
					$regDato = $libro->getDataSheet($numeroHoja,9,$ultimaFiladeHoja);
					///////
					$registros = $libro->getDataSheet($numeroHoja,11,$ultimaFiladeHoja);

					echo "<p><span><b>Carretera: </b></span><input type='text' class='form-control' name='carretera' onfocus='this.blur()' value='".$regDato[0][1]."' ></p>";
					//$cantColumnas = $libro->getClaveTramo( $leerClave = $registros[1][0] );
					//var_dump($cantColumnas);
					//exit();

					for ($filai=0; $filai < ($ultimaFiladeHoja-10); $filai++) //establecemes la lectura de la hoja
					{								 
						echo "<tr>";
							for ($columnai=0; $columnai < 13; $columnai++) 
							{ 
							$arr = $registros[$filai];

								 if ($columnai == 0)
								  {
									  	if($registros[$filai][0]==null)
									  	{ 
									  		break;
									  	}else{
									  		echo "<td><input type='checkbox' checked ='true' name='chkarray[]' value='".json_encode($arr)."'>".$registros[$filai][$columnai]."</td>"; 					  	
											 }

									}else{
										echo "<td>".$registros[$filai][$columnai]."</td>"; 	
										}	
										  								 
							}	
						 echo "</tr>";
					}
					?>

					</table> 
		    		<input type="hidden" name="claveTramo" value="<?php echo $claveTramo; ?>"/>
					<input type="hidden" name="nombreArchivo" value="<?php echo $nombreArchivo; ?>"/>
					<input type="hidden" id="columnas" name="columnas" value=""/>

					</form>
			</div>
	    </div>
    </div>


<script>
var columnas = {tramo:0, sentido:1, carril:2, latitud:5, longitud:6, elevacion:7, x:8, y:9,iriIzq:10, iriDer:11,iriProm:12};
	
   $( "form" ).submit(function( event ) {
  		event.preventDefault();
  		console.log(event);
  		$(this).unbind('submit');
  		$(this).submit();
	});
 function hiddenColumnas (){
 	$('#columnas').val(JSON.stringify(columnas));
 };

hiddenColumnas();

    $('#claveTramo').on('keyup', function(event) {
    	event.preventDefault();
    	/* Act on the event */
    	var val = $(this).val();

    	console.log(val);
    	columnas.tramo = val;
    	hiddenColumnas(); 
    });

    $('#sentido').on('keyup', function(event) {
    	event.preventDefault();
    	/* Act on the event */
    	var val = $(this).val();

    	console.log(val);
    	columnas.sentido = val;
    	hiddenColumnas(); 
    });

    $('#carril').on('keyup', function(event) {
    	event.preventDefault();
    	/* Act on the event */
    	var val = $(this).val();

    	console.log(val);
    	columnas.carril = val;
    	hiddenColumnas(); 
    });




</script>
</body>
</html>