<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="web/css/default.css" rel="stylesheet" type="text/css" />
    <title>Login</title>
</head>

<body>
    <!--FORMULARIOS DE REGISTRO Y LOGIN-->
    <div class="container">
        <div class="fondo buscador">
            <div id="content">

                <h1>Identifícate</h1>
                <form action="index.php?orden=Login" method="POST">
                    <label for="email">e-mail</label>
                    <input type="email" name="email" id="email">


                    <label for="email">Password</label>
                    <input type="password" name="password" id="password">

                    <input type="submit" name="submit" id="submit" value="Entrar">
                    <input type="button" value=" Cancelar " size="10" onclick="javascript:window.location='index.php'">
            </div>
        </div>

    </div>




    </form>
</body>

</html>