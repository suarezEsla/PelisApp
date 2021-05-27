<?php
include_once 'app/Pelicula.php';
//TABLA PRINCIPAL CON UN for QUE RECORRE LA BD MOSTRANDO LOS DATOS EN UNA TABLA (VISTA DE INICIO)
ob_start();
$auto = $_SERVER['PHP_SELF'];

?>

<!-- <table>

	<th>Código</th>
	<th>Nombre</th>
	<th>Director</th>
	<th>Genero</th>
	<th>Imágen</th>
	<th>Alquiler</th>
	<th>Estrellas</th>

</table> -->


<div class="tarjetas">
	<?php foreach ($peliculas as $peli) : ?>
		<div class="card" style="width: 18rem;">
			<div class="imagenes">
				<img class="card-img-top" src="<?= $peli->imagen ?>" alt="foto">
			</div>
			<div class="card-body">
				<h2 class="card-title"><?= $peli->nombre ?></h2>
				<p class="card-text">
				<h5>Director: <?= $peli->director ?></h5>
				</p>
				<p class="card-text">
				<h5>Género: <?= $peli->genero ?></h5>
				</p>
				<p class="card-text">
				<h5>Precio Alquiler: <?= $peli->alquiler ?></h5>
				</p>
				<p class="card-text">
				<h5>Valoración: <?= $peli->estrellas ?></h5>
				</p>

				<a href="#" onclick="confirmarBorrar('<?= $peli->nombre . "','" . $peli->codigo_pelicula . "'" ?>);" class="btn btn-warning">Borrar</a></td>
				<a href="<?= $auto ?>?orden=Modificar&codigo=<?= $peli->codigo_pelicula ?>"" class=" btn btn-warning">Modificar</a>
				<a href="<?= $auto ?>?orden=Detalles&codigo=<?= $peli->codigo_pelicula ?>" class="btn btn-warning">Detalles</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<!--Antiguo-->
<!-- <tr>
				<td><?= $peli->codigo_pelicula ?></td>
				<td><?= $peli->nombre ?></td>
				<td><?= $peli->director ?></td>
				<td><?= $peli->genero ?></td>
				<div class="imagenes">
					<td><img src="<?= $peli->imagen ?>" alt="foto"> </img> </td>
				</div>
				<td><?= $peli->alquiler ?></td>
				<td><?= $peli->estrellas ?></td> -->
<!--Ordenes de la tabla-->
<!-- <td><a href="#" onclick="confirmarBorrar('<?= $peli->nombre . "','" . $peli->codigo_pelicula . "'" ?>);">Borrar</a></td>
	<td><a href="<?= $auto ?>?orden=Modificar&codigo=<?= $peli->codigo_pelicula ?>">Modificar</a></td>
	<td><a href="<?= $auto ?>?orden=Detalles&codigo=<?= $peli->codigo_pelicula ?>">Detalles</a></td>
	</tr> -->


<!--Mensaje de eliminación de registros-->
<?php if (isset($_GET['eliminado'])) : ?>
	<h2> Película eliminada correctamente.</h2>
<?php
	header('Location:index.php');
endif; ?>


</table>
<br>
<!-- <form name='f2' action='index.php'>
	<input type='hidden' name='orden' value='Alta'>
	<input type='submit' value='Nueva Película'>
</form> -->
<div class="footer">
	<footer>
		<h3>Esla Suárez Arquero &copy 2021</h3>
	</footer>
</div>


<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal
$contenido = ob_get_clean();
include_once "principal.php";

?>