<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="web/css/default.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <!--FORMULARIOS DE NUEVA PELÍCULA-->
        <div class="fondo buscador">
            <div id="content">
                <div id='aviso'><b><?= (isset($msg)) ? $msg : "" ?></b></div>
                <form name='ALTA' method="POST" action="index.php?orden=Crear" enctype="multipart/form-data">
                    <h1>Añadir película</h1>
                    <!-- <p>Código Película:</p> <input type="text" name="codigo"> <br> -->
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre"><br>
                    <label for="nombre">Director:</label>
                    <input type="text" id="clave1" name="director"><br>
                    <label for="gemerp">Género:</label>
                    <input type="text" id="clave2" name="genero"><br>
                    <label for="imagen">Imágen:</label>
                    <input type="file" name="imagen"><br>
                    <label for="alquiler">Precio Alquiler:</label>
                    <input type="text" id="alquiler" name="alquiler"><br>
                    <label for="video">Añadir Vídeo:</label>
                    <input type="text" id="video" name="video"><br>

                    <input type="submit" value="Enviar" name="enviar">
                    <input type="button" value=" Cancelar " size="10" onclick="javascript:window.location='index.php'">
            </div>
        </div>
    </div>


    </form>

</body>

</html>