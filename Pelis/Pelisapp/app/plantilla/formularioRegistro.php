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
        <!--FORMULARIOS DE REGISTRO Y LOGIN-->
        <div class="fondo buscador">
            <div id="content">
                <h1>REGÍSTRATE</h1>
                <form action="index.php?orden=Registro" method="POST">

                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos">

                    <label for="email">e-mail</label>
                    <input type="email" name="email" id="email">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">

                    <input type="submit" name="submit" id="submit" value="Registro">
                    <input type="button" value=" Cancelar " size="10" onclick="javascript:window.location='index.php'">
                </form>
            </div>
        </div>
    </div>
</body>

</html>