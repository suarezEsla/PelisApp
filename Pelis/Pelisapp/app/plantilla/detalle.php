<?php

//TABLA QUE MUESTRA LOS DETALLES DE LA PELÍCULA (VISTA)
ob_start();
?>
<div class="fondo">

    <!-- <h2> <?php echo $pelicula->nombre ?> </h2>

    <table>
        <tr>
            <td> Codigo </td>
            <td> <?php echo $pelicula->codigo_pelicula ?></td>
        </tr>
        <tr>
            <td>Nombre </td>
            <td> <?php echo $pelicula->nombre ?></td>
        </tr>
        <tr>
            <td>Director </td>
            <td> <?php echo $pelicula->director ?></td>
        </tr>
        <tr>
            <td>Género </td>
            <td> <?php echo $pelicula->genero  ?></td>
        </tr>
        <tr>
            <td>Imágen </td>
            <td><img src="<?php echo $pelicula->imagen ?>" alt="foto"> </img> </td>
        </tr>
        <tr>
            <td>Precio de Alquiler </td>
            <td> <?php echo $pelicula->alquiler ?></td>
        </tr>
        <tr>
            <td>Video </td>
            <td>
                <iframe width="560" height="315" src="<?php echo $pelicula->video  ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </td>
            <td>
                <a href="index.php?orden=FormularioVotaciones">Votar</a>
                <td><?php $pelicula->estrellas ?></td>
            </td>
        </tr>

    </table> -->


    <div class="card" style="width: 48rem;">
        <div class="imagenes">
            <img class="card-img-top" src="<?php echo $pelicula->imagen ?>" alt="imagen detalles">
        </div>

        <div class="card-body">
            <h5 class="card-title">
                <h1><?php echo $pelicula->nombre ?></h1>
            </h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h2>Director: <?php echo $pelicula->director ?></h2>
            </li>
            <li class="list-group-item">
                <h2>Género: <?php echo $pelicula->genero  ?></h2>
            </li>
            <li class="list-group-item">
                <h2>Precio de alquiler: <?php echo $pelicula->alquiler ?></h2>
            </li>
            <li class="list-group-item">
                <h2>Valoración: <?php $pelicula->estrellas ?></h2>
            </li>
            <li class="list-group-item">
                <h2><iframe width="560" height="315" src="<?php echo $pelicula->video  ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h2>
            </li>




        </ul>
        <div class="card-body">
            <a href="index.php?orden=FormularioVotaciones" class="btn btn-warning">Valorar</a>
        </div>
    </div>




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