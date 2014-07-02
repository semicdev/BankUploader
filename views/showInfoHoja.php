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

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../bst/css/bootstrap.min.css">


</head>
<body>
	<div class="container">
		<div class="row col-lg-12">
			<h2>Herramienta carga de Archivos</h2>
			<p><span>A continuacion se muestra el contenido del archivo <b><?php echo $nombreArchivo; ?></b> en la hoja :<b> <?php echo $nombrehoja[$numeroHoja] ?></b>. Seleccione las filas que no sean necesarias para generar el documento JSON</span></p>
			<form name="getValores" method="post" action="generarDoc.php">
			<?php ?>
			<p align="right"><span><input type="submit" id="generaDoc" class="btn btn-success" value="Generar Documento"></span></p>
			<table class= "table table-condensed table-striped">
			<?php
			$regDato = $libro->getDataSheet($numeroHoja,9,$ultimaFiladeHoja);
			///////
			$registros = $libro->getDataSheet($numeroHoja,11,$ultimaFiladeHoja);

			echo "<p><span><b>Carretera: </b></span><input type='text' class='form-control' name='carretera' onfocus='this.blur()' value='".$regDato[0][1]."' ></p>";

			$leerClave=$registros[1][0];
			$claveTramo = substr($leerClave,0,1);

			if($claveTramo=="L" || $claveTramo=="A")
			{
				$cantCol=13;
				for ($filai=0; $filai < ($ultimaFiladeHoja-10); $filai++) //establecemes la lectura de la hoja
				{								 
					echo "<tr>";
						for ($columnai=0; $columnai < $cantCol; $columnai++) 
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

			}else{
				$cantCol=15;
				for ($filai=0; $filai < ($ultimaFiladeHoja-10); $filai++) //establecemes la lectura de la hoja
				{	
										 
					echo "<tr>";
						for ($columnai=0; $columnai < $cantCol; $columnai++) 
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
			}
			?>

			</table> claveTramo
    		<input type="hidden" name="claveTramo" value="<?php echo $claveTramo; ?>"/>
			<input type="hidden" name="nombreArchivo" value="<?php echo $nombreArchivo; ?>"/>
			</form>
		</div>
	</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
	$( "form" ).submit(function( event ) {
  		event.preventDefault();
  		console.log(event);
  		$(this).unbind('submit');
  		$(this).submit();
	});
</script>
</body>
</html>