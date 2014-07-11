<!DOCTYPE html>
<html>
	<head>
		<title>Seleccion de Archivo</title>
		<link rel="stylesheet" type="text/css" href="bst/css/bootstrap.min.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="js/jquery.form.min.js"></script>

		<style type="text/css">
		/* Customize container */
		@media (min-width: 768px) {
		  .container {
		    max-width: 730px;
		  }
		}
		.container-narrow > hr {
		  margin: 30px 0;
		}

		#mostrarHojas{
			background-color: #e9e9e9
		}
		</style>
	</head>
<body>
	<div class="container">
		<h2 align="center"> Convertidor de Libros Excel => MongoDB</h2>
		<hr>
		<div class="row col-lg-12" id="entradaFile" >
			<p ><span>Seleccione Libro a abrir:</span></p>
				<form action="processupload.php" method="post" enctype="multipart/form-data" id="uploadFile">
					<p><input name="FileInput" id="FileInput" type="file" class="btn btn-default" /></p>
					<p><input type="submit"  id="submit-btn" value="Mostrar archivo" class="btn btn-primary btn-md" /></p>
					<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
					
				</form>
					<div id="progressbox" >
							<div  class="progress progress-striped">
							  <div id="progressbar"class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
							    <span class="sr-only">0% Complete (success)</span>
							  </div>
							</div>

						<div id="statustxt">0%</div>
						<div id="salida"></div>
					</div>
			</div>

	  </div>
	<div class="container">
			<div class=" col-lg-12 " id="mostrarHojas"></div>
	</div>

  </div>
<script type="text/javascript" src="js/uploadtemp.js"></script>
</body>

</html>