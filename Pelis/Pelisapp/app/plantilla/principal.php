<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <!--VISTA PRINCIPAL-->
    <title>CRUD DE PELÍCULAS</title>
    <link href="web/css/default.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="web/js/funciones.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>
    <div id="container">
        <div id="header">
            <h1>PelisApp</h1>
        </div>
        <!--Menu-->
        <div class="menu">
            <ul>
                <li><a href="<?= $auto ?>?orden=FormularioNuevo">Añadir Película</a></li>
            </ul>
            <ul>
                <li><a href="<?= $auto ?>?orden=FormularioBuscador">Buscador</a></li>
            </ul>
            <ul>
                <ul>
                    <li><a href="<?= $auto ?>?orden=FormularioRegistro">Registrarse</a></li>
                </ul>
                <ul>
                    <li><a href="<?= $auto ?>?orden=FormularioLogin">Entrar</a></li>
                </ul>

        </div>


        <div id="content">

        </div>
        <?= $contenido ?>

    </div>
    </div>
    <!--Botón backToTop-->
    <div class="backtotop">
        <p><a href="index.php">🠉</a></p>
    </div>
</body>

</html>