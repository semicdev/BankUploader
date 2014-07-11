var options = { 
			target:   '#salida',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			success:       afterSuccess,  // post-submit callback 
			uploadProgress: OnProgress, //upload progress callback 
			resetForm: true        // reset the form after successful submit 
		}; 


 $('#uploadFile').submit(function() 
 { 
		$(this).ajaxSubmit(options);  			
		// always return false to prevent standard browser submit and page navigation 
		return false; 

}); 


//function after succesful file upload (when server response)
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	//$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
}

//function to check file size before uploading.
function beforeSubmit()
{
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		if( !$('#FileInput').val()) //check empty input filed
		{
			$("#salida").html("No se ha seleccionado archivo Excel");
			return false
		}
		
		var fsize = $('#FileInput')[0].files[0].size; //get file size
		var ftype = $('#FileInput')[0].files[0].type; // get file type
		

		//allow file types 
		switch(ftype)
        {
			case 'application/vnd.ms-excel':
			case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
			case 'application/vnd.openxmlformats-officedocument.spreadsheetml.template':
                break;
            default:
                $("#salida").html("<b>"+ftype+"</b> Tipo de archivo no compatible!");
				return false
        }
		
		//Allowed file size is less than 512 MB (536870912)
		if(fsize>536870912) 
		{
			$("#salida").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 512 MB.");
			return false
		}

		var nombreFile = $('#FileInput').val().replace(/C:\\fakepath\\/i, '');
		//$('#nombreArch').html(nombreFile);
		var rutaCompleta ="tmpfile/"+nombreFile;
		//console.log(rutaCompleta);
		setTimeout(function(){
			$.get( "views/showHojas.php?dir="+rutaCompleta+"&nombreArchivo="+nombreFile, function( data ) {
			  $( "#mostrarHojas" ).html( data );
			});
		}, 300);

		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#salida").html("");  
	}
	else
	{
		//salida error to older unsupported browsers that doesn't support HTML5 File API
		$("#salida").html("Actualiza tu navegador, debido a que el mismo carece de algunas características nuevas que necesitamos!!");
		return false;
	}
}


//progress bar function
function OnProgress(event, position, total, percentComplete)
{
    //Progress bar
	$('#progressbox').show();
    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) 
{
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}