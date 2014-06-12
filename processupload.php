<?php
ini_set('upload_max_filesize', '512M');
ini_set('post_max_size', '512M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"]== UPLOAD_ERR_OK)
{
	$UploadDirectory	= 'tmpfile/'; 
	
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}
	
	if ($_FILES["FileInput"]["size"] > 536870912) {
		die("Tamaño archivo demasiado grande!");
	}
	
	//allowed file type Server side check
	switch(strtolower($_FILES['FileInput']['type']))
		{
			//allowed file types
			case 'application/vnd.ms-excel':
			case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
			case 'application/vnd.openxmlformats-officedocument.spreadsheetml.template':
				break;
			default:
				die('Archivo no soportado!'); //output error
	}
	
	$File_Name          = $_FILES['FileInput']['name'];
	$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
	
	if(move_uploaded_file($_FILES['FileInput']['tmp_name'], $UploadDirectory.$File_Name ))
	   {
		die('Apertura de archivo Exitosa');
	}else{
		die('Error al abrir archivo!');
	}
	
}
else
{
	die('Se ha encontrado un error al cargar! em "upload_max_filesize" esta ajustado correctamente?');
}