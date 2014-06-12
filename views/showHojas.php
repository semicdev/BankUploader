<?php
include("../clases/archivo.php");
$nombreArchivo = $_GET['dir']; // ubicacion archivo
$nombre = $_GET['nombre']; // nombre del archivo
$ubicacionArchivo = "../".$nombreArchivo;
$libro = new archivo();
$libro->leerLibro($ubicacionArchivo);

   	echo "<p>Archivo  seleccionado: <b>".$nombre."</b></p>";
   	echo "<p>Seleccione una hoja para ver contenido: </p>";
 ?>	
   	<form name="getdata" id="getdata" method="post" action="views/showInfoHoja.php" >
	   	<input type="hidden" name="ubicacionArchivo" value="<?php echo $ubicacionArchivo; ?>">
	   	<?php
	   		$nombreHojas = $libro->getNombreHojas();
	   		$numeroHojas = $libro->getNumeroHojas();
   			$ultimaFila = $libro->getUltimaFila();

	   		for ($i=0; $i<$numeroHojas ; $i++) 
	   		{ 													
	   			echo "<label><input type='radio' value=".json_encode($i,$ultimaFila[$i])." name='numHoja'>".$nombreHojas[$i]."</label><br>";			
	   		//	echo "<input type='hidden' name='numTotFilas[]' value='".$ultimaFila[$i]."' >";
	   		}
	   	?>
		<br>
			<br>
			<p><input type="submit" name="enviarhoja" id="enviarhoja" value="Continuar" class="btn btn-success"></p>
	</form>	