<?php

//TABLA QUE MUESTRA LOS DETALLES DE LA PELÍCULA (VISTA)
ob_start();
?>
<div class="fondo">

    <p><?php echo $error ?></p>
    <div class="buttons">
        

        <input type="button" value=" Volver al inicio " size="10" onclick="javascript:window.location='index.php'">
    </div>

</div>

<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido

$contenido = ob_get_clean();
include_once "principal.php";

?>