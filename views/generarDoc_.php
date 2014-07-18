<?php
include('../clases/datosAnexos.php');
$json = $_POST['chkarray'];
$contjson=sizeof($json);
//var_dump($json);
foreach ($json as $key => $value) {
	$json[$key] = json_decode($value);	
}

for ($cont=0; $cont<$contjson; $cont++) 
{//ESTADO
    $nombreEstado 		= $json[$cont][2];
	$estado    = array('estado'=>array('nombreEstado'=>$nombreEstado,'carretera'=>array()));
 }

$carreteraAnt=null;
foreach ($json as $key => $value) {
	 if($value[6] != $carreteraAnt){
	 	$carreteraNueva = array('nombreCarretera'=>$value[5],'numero'=>$value[4],'claveCarretera'=>$value[6],'ruta'=>$value[7],'red'=>$value[8],'estacion'=> array());
	 	array_push($estado['estado']['carretera'], $carreteraNueva);
	 }
	 $carreteraAnt = $value[6];
}

$cont = 0;
foreach ($json as $key => $value) {
	foreach ($estado['estado']['carretera'] as $k => $v) {
	    if($value[6] == $v['claveCarretera']){
	    	$histograma=array("Lunes"=>$value[29],'Martes'=>$value[30],'Miercoles'=>$value[31],'Jueves'=>$value[32],'Viernes'=>$value[33],'Sabado'=>$value[34],'Domingo'=>$value[35]);
	    	$estacion = array('nombreEstacion'=>$value[10],'km'=>$value[13],'tipo'=>$value[11],'sentido'=>$value[12],'histograma'=>$histograma,'tdpa'=>$value[14],'m'=>$value[15],'a'=>$value[16],'b'=>$value[17],'c2'=>$value[18],'c3'=>$value[19],'t3s2'=>$value[20],'t3s3'=>$value[21],'t3s2r4'=>$value[22],'otros'=>$value[23],'aa'=>$value[24],'bb'=>$value[25],'cc'=>$value[26],'d'=>$value[27],'K_x0027_'=>$value[28],'lat'=>$value[36],'long'=>$value[37]);
	    	 array_push($estado['estado']['carretera'][$k]['estacion'],array($estacion));
	    	$cont++;
		}
	}
}
echo json_encode($estado);
?>

