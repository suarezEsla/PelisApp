


<?php
include_once '../config.php';
include_once '../Pelicula.php';
include_once '../modeloPeliDB.php'; 



echo "<h3 style='color:red'>FUNCIONA</h3>";

if (isset($_POST)){

session_start();



    //Asignación de variables
    $nombre=isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    /* var_dump($_POST); */

    //Array de errores
    $errores = array();

    //Validación de datos

    //Validar nombre

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {

        $nombre_validado = true;
    } else {

        $nombre_validado = false;
        $errores['nombre'] = "<h4 class='alerta'>El nombre NO es válido</h4>";
    }

    //Validar apellidos

    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {

        $apellidos_validado = true;
    } else {

        $apellidos_validado = false;
        $errores['apellidos'] = "<h4 class='alerta'>Los apellidos NO son válidos</h4>";
    }

    //Validar email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "<h4 class='alerta'>El email NO es válido</h4>";
    }

    //Validar contraseña

    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "<h4 class='alerta'>La password no puede estar vacía</h4>";
    }


    //Insertar usuario en la BD (si el array de errores está vacío)
    $insertar = false;
    if (count($errores) == 0) {

        $insertar = true;

        //Cifrado de password
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        echo "Contraseña cifrada correctamente";
    }else{
        echo "Error de cifrado";
    }
    $_SESSION['user_id'] = $result['ID'];
    
}else{
    echo "<h1 style='color:red'>ERROR, NO SE RECOGEN LOS DATOS DEL FORMULARIO DE REGISTRO.</h1>";
}



?>