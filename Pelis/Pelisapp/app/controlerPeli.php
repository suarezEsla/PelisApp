<?php
// ------------------------------------------------
// Controlador que realiza la gestión de las películas
// ------------------------------------------------

/* var_dump($_FILES['imagen']['name']);
var_dump($_FILES['imagen']['size']); */

include_once 'config.php';
include_once 'modeloPeliDB.php'; 

/**********
/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlPeliInicio(){
    die(" No implementado.");
   }

//Insertar película en la bd

function ctlPeliAlta (){
    require_once './app/plantilla/fnuevo.php';
}

function ctlPeliRegistrarse(){
    require_once "./app/plantilla/formularioRegistro.php";
}

function ctlPeliLogearse(){
    require_once "./app/plantilla/formularioLogin.php";
}

function ctlPeliFormularioBuscador(){
    require_once "./app/plantilla/buscar.php";
}

function ctlPeliFormularioVotaciones(){
    require_once "./app/plantilla/formularioVotaciones.php";
}



function ctlPeliFormularioNuevo(){

    if (!isset($_SESSION['user_id'])) {
        echo "<h1>ERROR. SÓLO LOS USUARIOS REGISTRADOS PUEDEN AÑADIR.</h1>";

        exit;
    } else {


    require_once "./app/plantilla/formularioNuevo.php";

    }
}
 


//LLama a la función PeliculaAdd y añade todos los campos
function ctlPeliCrear(){
    /* var_dump($_POST);

    echo "<pre>".var_export($_FILES,true)."</pre>"; */

    //Sacar código Youtube
    $video = $_POST['video'];
    $yt = substr($video, strrpos($video, '/') + 1);
    $video = 'https://www.youtube.com/embed/'.$yt;

    //Directorio y fichers
    $target_dir = "app/img/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $public_file = "app/img/".basename($_FILES["imagen"]["name"]);
    /* echo $public_file; */

    //Llamada a modelo
    $cod_peli = ModeloUserDB::PeliculaAdd( $_POST['nombre'], $_POST['director'], $_POST['genero'], $public_file, $_POST['alquiler'], $video);

    if($cod_peli === false){
        mostrarError(ModeloUserDB::$error);
    }

    /* var_dump($cod_peli); */
   /*  echo "codigo = $cod_peli"; */

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    

    // Comprobar imágen
    if (isset($_POST["enviar"])) {
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check !== false) {
            /* echo "<h2>El archivo es una imágen</h2> - " . $check["mime"] . "."; */
            $uploadOk = 1;
        } else {
            echo "<h2>El archivo NO es una imágen</h2>";
            $uploadOk = 0;
        }

       /*  echo "Target File= ".$target_file; */
       /*  var_dump($_FILES); */

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
       /*  echo "<h2>El archivo </h2> " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " <h2> ha sido subido con éxito</h2>."; */
    } else {
        echo "<h2>ERROR al subir el archivo</h2>";
    }
    }
    
    $pelicula = ModeloUserDB::PeliculaGet($cod_peli);
     

    require_once './app/plantilla/detalle.php';


}




//ERRORES

function mostrarError($error){
    require_once './app/plantilla/error.php';
    exit();
}

//Registro
function ctlPeliRegistro(){
    $pelicula = ModeloUserDB::registroUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password']);
    
}

//Login

function ctlPeliLogin(){
    $pelicula = ModeloUserDB::loginUsuario($_POST['email'], $_POST['password']);
}

/*
 *  MODIFICAR
 */
function ctlPeliModificar (){

     if (!isset($_SESSION['user_id'])) {

        echo "<h1>ERROR. SÓLO LOS USUARIOS REGISTRADOS PUEDEN MODIFICAR PELÍCULAS.</h1>";

        exit;
        
    } else { 
     
    $pelicula = ModeloUserDB::PeliculaGet($_GET['codigo']); 
    require_once './app/plantilla/fmodifica.php';
    }
}



//Votar
function ctlPeliVotar()
{
    if (!isset($_SESSION['user_id'])) {

        echo "<h1>ERROR. SÓLO LOS USUARIOS REGISTRADOS PUEDEN MODIFICAR PELÍCULAS.</h1>";

        exit;
    } else { 

    if (!empty($_POST)) {
        switch ($_POST['estrellas']) {
            case '1':
                echo "⭐";
                break;

            case '2':
                echo "⭐⭐";
                break;
            case '3':
                echo "⭐⭐⭐";
                break;
            case '4':
                echo "⭐⭐⭐⭐";
                break;
            case '5':
                echo "⭐⭐⭐⭐⭐";
                break;
            default:
                echo "ERROR";
        }


            $pelicula = ModeloUserDB::PeliculaGet($_POST['codigo']);
        
    }
    $resultado = ModeloUserDB::anadirEstrellas($_POST['estrellas'], $_POST['codigo']);
    
}
}




function ctlPeliActualizar(){
    
    //Var_export
    /* echo "<pre>" . var_export($_FILES, true) . "</pre>"; */

   //Sacar código Youtube
    $video = $_POST['video'];
    $yt = substr($video, strrpos($video, '/')+1);
    $video = 'https://www.youtube.com/embed/'.$yt;

    /* echo $public_file; */
    /* var_dump($_POST); */
    
    $public_file = $_POST['imagen'];
    // Check if image file is a actual image or fake image
    if ($_FILES["nueva_imagen"]["tmp_name"]) {
        $target_dir = "./web/img/";


        $target_file = $target_dir . basename($_FILES["nueva_imagen"]["name"]);

        echo "target_file = ".realpath($target_dir);

        $public_file = "app/img/" . basename($_FILES["nueva_imagen"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["nueva_imagen"]["tmp_name"]);
        if ($check !== false) {

    

            echo "<h2>El archivo es una imágen</h2> - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "<h2>El archivo NO es una imágen</h2>";
            $uploadOk = 0;
        }
    
    if (move_uploaded_file($_FILES["nueva_imagen"]["tmp_name"], $target_file)) {
        echo "<h2>El archivo: </h2> " . htmlspecialchars(basename($_FILES["nueva_imagen"]["name"])) . " <h2> ha sido subido correctamente.</h2>";
    } else {
        echo "<h2>ERROR al subir el archivo.</h2>";
    }
    }

    $resultado = ModeloUserDB::peliculaUpdate($_POST['nombre'], $_POST['director'], $_POST['genero'], $public_file, $_POST['alquiler'], $video, $_POST['codigo']);
    $pelicula = ModeloUserDB::PeliculaGet($_POST['codigo']);
    
    require_once './app/plantilla/detalle.php';
}


/*
 *  DETALLES
 */

function ctlPeliDetalles(){

    $codigo = $_GET['codigo'];

    $pelicula = ModeloUserDB::PeliculaGet($codigo); 
    
    require_once './app/plantilla/detalle.php';
}


/*BUSCADOR*/
//Llamada a consulta según tipo de 'buscador'
function ctlPeliConsulta(){

    if (!isset($_SESSION['user_id'])) {
        echo "<h1>ERROR. SÓLO LOS USUARIOS REGISTRADOS PUEDEN USAR EL BUSCADOR.</h1>";
        
        exit;
    } else {
        // Show users the page!
    
    if(isset($_POST['submit']) || isset($_POST['nombre']) || isset($_POST['genero']) || isset($_POST['director'])){
        $genero = $_POST['genero'];
        $nombre = $_POST['nombre'];
        $director = $_POST['director'];
        /* var_dump($nombre); */
    }else{
        echo "<h1>No se puede obtener el tipo</h1>";
    }
    
    

    if($genero){
        ctlPeliBuscarGenero($genero);
    }elseif($nombre) {
        ctlPeliBuscarNombre($nombre);
    }elseif ($director) {
        ctlPeliBuscarDirector($director);
    }
}
}


//Buscador por género
function ctlPeliBuscarGenero($genero){
    
    $pelicula = ModeloUserDB::PeliculaGetGenero($genero);

    require_once './app/plantilla/detalle.php';
}
//Buscador por nombre
function ctlPeliBuscarNombre($nombre)
{
    
    $pelicula = ModeloUserDB::PeliculaGetNombre($nombre);

    require_once './app/plantilla/detalle.php';
}

//Buscador por director
function ctlPeliBuscarDirector($director)
{
    
    $pelicula = ModeloUserDB::PeliculaGetDirector($director);

    require_once './app/plantilla/detalle.php';
}






/*
 * Borrar Peliculas
 */

function ctlPeliBorrar(){

   
    $codigo =$_GET['userid'];
    $pelicula = ModeloUserDB::peliDel($codigo);

    
    
    header('Location:index.php?eliminado=0k');
    
    
}

/*
 * Cierra la sesión y vuelca los datos
 */
function ctlPeliCerrar(){
    session_destroy();
    modeloUserDB::closeDB();
    header('Location:index.php');
}

/*
 * Muestro la tabla con los usuario 
 */ 
function ctlPeliVerPelis (){
    // Obtengo los datos del modelo
    $peliculas = ModeloUserDB::GetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verpeliculas.php';
   
}