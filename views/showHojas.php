<?php
include("../clases/archivo.php");
$nombreArchivo = $_GET['dir'];
$nombre = $_GET['nombre'];
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
	   		for ($i=0; $i<$numeroHojas ; $i++) 
	   		{ 													
	   			echo "<label><input type='radio' value=".$i." id='$nombreHojas[$i]'  name='numHoja'>".$nombreHojas[$i]."</label><br>";			
	   		}								
	   	?>
		<br>
			<p><span>Indique la ultima fila con datos:</span></p>
			<p><input type="text" name="numfilas" value=''></p>
			<br>
			<p><input type="submit" name="enviarhoja" id="enviarhoja" value="Continuar" class="btn btn-success"></p>
	</form>	