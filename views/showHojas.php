<?php
include("../clases/archivo.php");
$dir = $_GET['dir']; // ubicacion archivo
$nombreArchivo = $_GET['nombreArchivo']; // nombre del archivo
$ubicacionArchivo = "../".$dir;
$libro = new archivo();
$libro->leerLibro($ubicacionArchivo);

   	echo "<p>Archivo  seleccionado: <b>".$nombreArchivo."</b></p>";
   	echo "<p>Seleccione una hoja para ver contenido: </p>";
 ?>	
   	<form name="getdata" id="getdata" method="post" action="views/showInfoHoja.php" >
	   	<input type="hidden" name="ubicacionArchivo" value="<?php echo $ubicacionArchivo; ?>">
	   	<input type="hidden" name="nombreArchivo" value='<?php echo $nombreArchivo;?>'>
			
	   	<?php
	   		$nombreHojas = $libro->getNombreHojas();
	   		$numeroHojas = $libro->getNumeroHojas();
   			$ultimaFila = $libro->getUltimaFila();
   			$j = 0;
	   		for ($i=0; $i<$numeroHojas; $i++) 
	   		{ 													
	   			echo "<label><input type='radio' value=".$j." name='numHoja'>".$nombreHojas[$i]."</label><br>";			
	   		$j++;
	   		}
	   		echo "<input type='hidden' name='numTotFilas' value='".json_encode($ultimaFila)."' >";

	   	?>
		<br>
			<br>
			<p><input type="submit" name="enviarhoja" id="enviarhoja" value="Continuar" class="btn btn-success"></p>
	</form>	