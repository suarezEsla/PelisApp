<?php
var_dump($pelicula);
//FORMULARIO PARA MODIFICAR LOS DATOS DE LA PELÍCULA (VISTA)
ob_start();
?>

<div class="fondo">
	<div id='aviso'><b><?= (isset($msg)) ? $msg : "" ?></b></div>
	<form name='ALTA' method="POST" action="index.php?orden=Actualizar" enctype="multipart/form-data">


		<h2>Modificar película</h2>
	    <input type="hidden" name="codigo" id="cod_peli" readonly value="<?php echo $pelicula->codigo_pelicula ?>"> 
		
		<p>Modificar Título :</p><input type="text" name="nombre" id="nom_peli" value="<?php echo $pelicula->nombre ?>"><br>
		<p>Modificar Director :</p><input type="text" id="director" name="director" value="<?php echo $pelicula->director ?>"><br>
		<p>Modificar Género :</p><input type="text" name="genero" id="genero" value="<?php echo $pelicula->genero ?>"><br>
		<p><img src="<?php echo $pelicula->imagen ?>" alt=""></p>
		<p>Modificar Imágen :</p><input type="file" name="nueva_imagen" id="imagen_peli"><br>
		<input type="hidden" name="imagen" value="<?php echo $pelicula->imagen ?>">

		<p>Modificar Precio :</p><input type=" text" name="alquiler" id="alquiler" value="<?php echo $pelicula->alquiler ?>"><br>
		<p>Modificar Vídeo :</p><input type="text" id="video" name="video" value="<?php echo $pelicula->video ?>"><br>
			

		

		<input type="submit" value=" Guardar ">
		<input type="button" value=" Cancelar y volver al inicio " size="10" onclick="javascript:window.location='index.php'">


	</form>
</div>

<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido
$contenido = ob_get_clean();
include_once "principal.php";

?>