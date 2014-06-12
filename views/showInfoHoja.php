<?php
include ('../clases/archivo.php');
//include ('../clases/datosAnexos.php');

$numHoja = (int)$_POST['numHoja'];
$ubicacionArchivo = $_POST['ubicacionArchivo'];
$numfilas = $_POST['numfilas'];

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
			$registros = $libro->getDataSheet($numHoja,9,$numfilas);
			
				for ($filai=0; $filai < ($numfilas-8); $filai++) 
				{								 
					echo "<tr>";

						for ($columnai=0; $columnai < 10; $columnai++) 
						{ 
						$arr = $registros[$filai];
							 if ($columnai == 0)
							  {
				 				 echo "<td><input type='checkbox' checked ='true' name='chkarray[]' value='".json_encode($arr)."'></td>"; 					  	
							  }else{
							  	 echo "<td> ".$registros[$filai][$columnai]."</td>";		
							  }
						}
													

					 echo "</tr>";	

				}

			  

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