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
$ultimaColumna=$libro->getUltimaCol();


var_dump($totalFilas);
var_dump($ultimaFiladeHoja);
var_dump($ultimaColumna);
var_dump($numeroHoja);
//exit();
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
			
			<div class="col-md-10 col-lg-10">

					<form name="getValores" method="post" action="generarDoc.php">
					<p align="right"><span><input type="submit" id="generaDoc" class="btn btn-success" value="Generar Documento"></span></p>
					<table class= "table table-condensed table-striped" >
					<?php
					$regDato = $libro->getDataSheet($numeroHoja,1,$ultimaFiladeHoja);//9
					///////
					$registros = $libro->getDataSheet($numeroHoja,1,$ultimaFiladeHoja);//11--5 a partir de que columna leera
					$contadorRegistros=count($registros);
					echo "contador de registros".$contadorRegistros;
					//var_dump($registros);
					//echo "<p><span><b>Estado: </b></span><input type='text' class='form-control' name='carretera' onfocus='this.blur()' value='".$regDato[0][0]."' ></p>";
					//$prog=$registros[0][0];
					//echo "prog: ".$prog;
					for ($filai=0; $filai < $ultimaFiladeHoja; $filai++) //establecemes la lectura de la hoja numero de filas a iterar - el total de filas en blanco (encabezados)
					{								 
						echo "<tr>";
							for ($columnai=0; $columnai < 44; $columnai++) //columnas 13--64
							{ 
							$arr = $registros[$filai];
							if ($columnai == 0)
								  {
								  	echo "<td><input type='checkbox' checked ='true' name='chkarray[]' value='".json_encode($arr)."'>".$registros[$filai][$columnai]."</td> "; 					  	
								
								}else{
										echo "<td>".$registros[$filai][$columnai]."</td>"; 	
										}						
							}
						 echo "</tr>";
					}
					

					/*foreach ($arr as $value) {
						var_dump($value);
					}*/
					// echo 'total de vacios'.$vacio;
					?>

					</table> 
		    	
					</table> 
					<input type="hidden" name="nombreArchivo" value="<?php echo $nombreArchivo; ?>"/>
					<input type="text" name="nombreHoja" value=" <?php echo $nombrehoja[$numeroHoja]?>"/>
					</form>
					


					</form>
			</div>
	    </div>
    </div>
<script>
 $( "form" ).submit(function( event ) {
  		event.preventDefault();
  		console.log(event);
  		$(this).unbind('submit');
  		$(this).submit();
	});</script>

</body>
</html>