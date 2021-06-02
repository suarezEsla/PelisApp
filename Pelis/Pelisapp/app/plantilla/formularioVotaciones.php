<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de votaciones</title>
</head>

<body>
<?php
$codigo = $_GET['codigo'];
?>
    <form action="index.php?orden=Votar&codigo=<?php echo $codigo ?>" method="POST">

        ⭐<select name="estrellas" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>