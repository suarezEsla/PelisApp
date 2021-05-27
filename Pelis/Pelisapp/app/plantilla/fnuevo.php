<?php

// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();
?>
<div class="fondo">
	<div id='aviso'><b><?= (isset($msg)) ? $msg : "" ?></b></div>
	<form name='ALTA' method="POST" action="index.php?orden=Crear" enctype="multipart/form-data">
		<h2>Añadir película</h2>
		<!-- <p>Código Película:</p> <input type="text" name="codigo"> <br> -->
		<p>Nombre :</p> <input type="text" name="nombre"><br>
		<p>Director :</p> <input type="text" id="clave1" name="director"><br>
		<p>Género :</p> <input type="text" id="clave2" name="genero"><br>
		<p>Imágen :</p> <input type="file" name="imagen"><br>
		<p>Alquiler : </p><input type="text" id="alquiler" name="alquiler"><br>
		<p>Añadir Vídeo :</p><input type="text" id="video" name="video" ><br>

		<input type="submit" value="Enviar" name="enviar">
		<input type="button" value=" Cancelar " size="10" onclick="javascript:window.location='index.php'">
	</form>

</div>

<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido
$contenido = ob_get_clean();
include_once "principal.php";

?>