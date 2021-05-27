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
    <!--BUSCADOR-->
    <div class="container">
        <div class="fondo buscador">
            <div id="content">
                <form action="index.php?orden=Consulta" method="POST" name="Buscar">
                    <div class="buscador">
                        <h1>Buscar Película</h1>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre">
                        <label for="genero">Género:</label>
                        <input type="text" name="genero">
                        <label for="director">Director:</label>
                        <input type="text" name="director">
                        <input type="submit" value="Buscar" name="submit">
                        <input type="button" value=" Cancelar " size="10" onclick="javascript:window.location='index.php'">

                </form>


                <!-- <?= $contenido ?> -->
            </div>
        </div>

    </div>
</body>

</html>