<?php
include('../clases/datosAnexos.php');
$json = $_POST['chkarray'];
/*$nombreHoja=$_POST['nombreHoja'];
if($nombreHoja=='01 AGS')
{$nombreEstado='AGUASCALIENTES'}
*/
$nombreHoja=$_POST['nombreHoja'];
switch ($nombreHoja) {
   case "01 AGS":
        $nombreEstado='AGUASCALIENTES';
        break;
   case "02 BC":
        $nombreEstado='BAJA_CALIFORNIA';
        break;
   case "03 BCS":
       	$nombreEstado='BAJA_CALIFORNIA_SUR';
        break;
   case "04 CAMP":
        $nombreEstado='CAMPECHE';
        break;
   case "05 COAH":
       	$nombreEstado='COAHUILA';
        break;
   case "06 COL":
       	$nombreEstado='COLIMA';
        break;
    case "07 CHIS":
       	$nombreEstado='_CHIAPAS';
        break;
    case "08 CHIH":
       	$nombreEstado='CHIHUAHUA';
        break;
    case "09 DF":
       	$nombreEstado='FEDERAL';
        break;
    case "10 DGO":
       	$nombreEstado='DURANGO';
        break;
    case "11 GTO":
       	$nombreEstado='GUANAJUATO';
        break;
    case "12 GRO":
       	$nombreEstado='GUERRERO';
        break;
    case "13 HGO":
       	$nombreEstado='HIDALGO';
        break;
    case "14 JAL":
       	$nombreEstado='JALISCO';
        break;
    case "15 MEX":
       	$nombreEstado='MEXICO';
        break;
    case "16 MICH":
       	$nombreEstado='MICHOACAN';
        break;
    case "17 MOR":
       	$nombreEstado='MORELOS';
        break;
    case "18 NAY":
       	$nombreEstado='NAYARIT';
        break;
    case "19 NL":
       	$nombreEstado='NUEVO_LEON';
        break;
    case "20 OAX":
       	$nombreEstado='OAXACA';
        break;
    case "21 PUE":
       	$nombreEstado='PUEBLA';
        break;
    case "22 QRO":
       	$nombreEstado='QUERETARO';
        break;
    case "23 Q R":
       	$nombreEstado='QUINTANA_ROO';
        break;
    case "24 SLP":
       	$nombreEstado='SAN_LUIS_POTOSI';
        break;
    case "25 SIN":
       	$nombreEstado='SINALOA';
        break;
    case "26 SON":
       	$nombreEstado='SONORA';
        break;
    case "27 TAB":
       	$nombreEstado='TABASCO';
        break;
    case "28 TAMPS":
       	$nombreEstado='TAMAULIPAS';
        break;
    case "29 TLAX":
       	$nombreEstado='TLAXCALA';
        break;
    case "30 VER":
       	$nombreEstado='VERACRUZ';
        break;
    case "31 YUC":
       	$nombreEstado='YUCATAN';
        break;
    case "32 ZAC":
       	$nombreEstado='ZACATECAS';
        break;
   default:
         
   }

echo "nombreHoja".$nombreHoja;

$contjson=sizeof($json);

//$nombreEstadoArchivo=$_POST[''];
//var_dump($json);
foreach ($json as $key => $value) {
	$json[$key] = json_decode($value);	
}

for ($cont=0; $cont<$contjson; $cont++) 
{//ESTADO
    $nombreEstado 		= $json[$cont][2];
	$estado    = array('ESTADO'=>array('NOMBRE_ESTADO'=>$nombreEstado,'CARRETERA'=>array()));
 }


$carreteraAnt=null;
$nulo=null;
foreach ($json as $key => $value) {
	 if($value[6] != $carreteraAnt){
	 	$carreteraNueva = array('NOMBRE_CARRETERA'=>$value[5],'NUMERO'=>(string)$value[4],'CLAVE_CARRETERA'=>$value[6],'RUTA'=>$value[7],'RED'=>$value[8],'ESTACION'=> array());
	 	array_push($estado['ESTADO']['CARRETERA'], $carreteraNueva);
	 }
	 $carreteraAnt = $value[6];
}

$cont = 0;
foreach ($json as $key => $value) {
	foreach ($estado['ESTADO']['CARRETERA'] as $k => $v) {
		//comparar por claver carretera/  comparar por 
	    if($value[4] == $v['NUMERO']){
	    	
	    	if($value[29]!=$nulo && $value[30]!=$nulo && $value[31]!=$nulo && $value[32]!=$nulo && $value[33]!=$nulo && $value[34]!=$nulo && $value[35]){
	    	$histograma=array("Lunes"=>(string)$value[29],'Martes'=>(string)$value[30],'Miercoles'=>(string)$value[31],'Jueves'=>(string)$value[32],'Viernes'=>(string)$value[33],'Sabado'=>(string)$value[34],'Domingo'=>(string)$value[35]);
	    	}
	    	else {$histograma="";}

	    	$estacion = array('NOMBRE_ESTACION'=>$value[10],'KM'=>(string) $value[13],'TIPO'=>(string) $value[11],'SENTIDO'=>(string) $value[12],'HISTOGRAMA'=>$histograma,'TDPA'=>(string)$value[14],'M'=>$value[15],'A'=>$value[16],'B'=>$value[17],'C2'=>$value[18],'C3'=>$value[19],'T3S2'=>$value[20],'T3S3'=>$value[21],'T3S2R4'=>$value[22],'OTROS'=>$value[23],'TA'=>$value[24],'TB'=>$value[25],'TC'=>$value[26],'D'=>$value[27],'K_x0027_'=>$value[28],'LAT'=>(string) $value[36],'LONG'=>(string) $value[37]);
	    	 array_push($estado['ESTADO']['CARRETERA'][$k]['ESTACION'],$estacion);
	    	$cont++;
		}
	}
}


$a = (string)345;
var_dump($a);


echo "nombreEstado".$nombreEstado.'</br>';
//$nombreEstadoArchivo="SEMIC_AGUASCALIENTES";
$nombreEstadoArchivo="SEMIC_".$nombreEstado;
//echo json_encode($estado);

$guardarEstado=json_encode($estado);
//echo $guardarEstado;
//GUARDAR DATOS EN ARCHIVOS
$miarchivo=fopen($nombreEstadoArchivo.'.json','w');//abrir archivo, nombre archivo, modo apertura
fwrite($miarchivo,$guardarEstado);
echo "Tu archivo se ha guardado con el nombre \"$nombreEstadoArchivo.json\"";

fclose($miarchivo); //cerrar archivo

?>

