<?php
include("../clases/archivo.php");
$dirUpload = $_GET['dir']; // ubicacchivo
$nombreArchivo = $_GET['nombreArchivo']; // nombre del archivo

$ubicTempArchivo = "../".$dirUpload;
$libro = new Archivo();
$libro->leerLibro($ubicTempArchivo);

   	echo "<p>Archivo  seleccionado: <b>".$nombreArchivo."</b></p>";
   	echo "<p>Seleccione una hoja para ver contenido: </p>";
 ?>	
   	<form name="getdata" id="getdata" method="post" action="views/showInfoHoja.php" >
	   	<input type="hidden" name="ubicTempArchivo" value="<?php echo $ubicTempArchivo; ?>">
	   	<input type="hidden" name="nombreArchivo" value='<?php echo $nombreArchivo;?>'>
	   	<?php
	   		$nombreHojas = $libro->getNombreHojas();//Arreglo de nombre de hojas
	   		$numeroHojas = $libro->getNumeroHojas();//Conteo total de hojas
   			$ultimaFilaHoja = $libro->getUltFilaHoja();//Arreglo con el numero de filas de cada hoja
   			
		   		for ($i=0; $i<$numeroHojas; $i++) 
		   		{ 													
		   			echo "<label><input type='radio' value=".$i." name='numeroHoja'>".$nombreHojas[$i]."</label><br>";			
		   		}
	   		echo "<input type='hidden' name='numTotFilasHojas' value='".json_encode($ultimaFilaHoja)."' >";//array que contiene el numero total de filas por cada hoja
	   	
	   	?>
		<br>
			<br>
			<p><input type="submit" name="enviarhoja" id="enviarhoja" value="Continuar" class="btn btn-success"></p>
	</form>	