<?php
include ('../clases/archivo.php');
//include ('../clases/datosAnexos.php');

$numHoja = $_POST['numHoja'];

$hoja = $numHoja[0][0];
$ulHoja = $numHoja[0][1];
var_dump($hoja);
var_dump($ulHoja);


$ubicacionArchivo = $_POST['ubicacionArchivo'];

$libro = new archivo();
$libro->leerLibro($ubicacionArchivo);
$nombrehoja = $libro->getNombreHojas();

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
			<p><span>A continuacion se muestra el contenido de la hoja :<b> <?php echo $nombrehoja[$numHoja] ?></b>. Seleccione las filas que no sean necesarias para generar el documento JSON</span></p>
			<form name="getValores" method="post" action="recibe.php">
			<p align="right"><span><input type="submit" id="generaDoc" class="btn btn-success" value="Generar Documento"></span></p>
			<table class= "table table-condensed table-striped">
			<?php
		/*	$regDato = $libro->getDataSheet($numHoja,9,$ultimaFila);
			///////
			$registros = $libro->getDataSheet($numHoja,11,$ultimaFila);
			echo "<p><span><b>Carretera: </b></span><input type='text' class='form-control' name='carretera' onfocus='this.blur()' value='".$regDato[0][1]."' ></p>";
				for ($filai=0; $filai < ($ultimaFila-10); $filai++) //establecemes la lectura de la hoja
				{								 
					echo "<tr>";
						for ($columnai=0; $columnai < 10; $columnai++) 
						{ 
						$arr = $registros[$filai];
							 if ($columnai == 0)
							  {
				 				 echo "<td><input type='checkbox' checked ='true' name='chkarray[]' value='".json_encode($arr)."'>".$registros[$filai][$columnai]."</td>"; 					  	
							  }else{
							  	 echo "<td> ".$registros[$filai][$columnai]."</td>";		
							  }
						}
													

					 echo "</tr>";	

				}

			  
*/
			?>

			</table> 
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