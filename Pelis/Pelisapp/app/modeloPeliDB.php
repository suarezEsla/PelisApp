<?php

include_once 'config.php';
include_once 'Pelicula.php';

class ModeloUserDB
{

    public static $error;


    private static $dbh = null;
    private static $consulta_peli = "Select * from peliculas where codigo_pelicula = ?";
    private static $insert_pelicula   = "Insert into peliculas (codigo_pelicula, nombre, director, genero, imagen, alquiler, video)" .
        " VALUES ( ?, ?, ?, ?, ?, ?, ?)";
    private static $delete_peli   = "Delete from peliculas where codigo_pelicula = ?";
    private static $update_peli    = "UPDATE peliculas set nombre =?, director=?, genero=?, imagen=?, alquiler=?, video=? WHERE codigo_pelicula=?";
    private static $buscar_peli = "SELECT * from peliculas WHERE codigo_pelicula=?, nombre =?, director=?, genero=?, imagen=?, alquiler=?, video=?";

    private static $consulta_genero = "SELECT * FROM peliculas WHERE genero=?";
    private static $consulta_nombre = "SELECT * FROM peliculas WHERE nombre=?";
    private static $consulta_director = "SELECT * FROM peliculas WHERE director=?";

    private static $loginUsuario = "SELECT * FROM usuarios WHERE email=?";

    private static $estrellas = "UPDATE peliculas SET estrellas=? WHERE codigo_pelicula=?";

    private static $registro   = "Insert into Usuarios (nombre_usuario,apellidos,email,password)" .
        " VALUES (?,?,?,?)";



    /* private static $registro = "INSERT INTO usuarios(nombre, apellidos, email, password) VALUES (?, ?, ?, ?])"; */

    /* private static $registro = "INSERT INTO usuarios(nombre, apellidos, email, password) VALUES (?, ?, ?, ?])"; */

    /* Sentencias preparadas

     private static $delete_peli   = "Delete from Usuarios where id = ?"; 
     private static $insert_user   = "Insert into Usuarios (id,clave,nombre,email,plan,estado)".
                                     " VALUES (?,?,?,?,?,?)";
     private static $update_user    = "UPDATE Usuarios set  clave=?, nombre =?, ".
                                     "email=?, plan=?, estado=? where id =?";
 */



    //Registro usuarios
    /* public static function registroUsuario($nombreUsuario, $apellidos, $email, $password){
    $stmt = self::$dbh->prepare(self::$registro);
    $stmt->bindValue(1, $nombreUsuario);
        $stmt->bindValue(2, $apellidos);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $password);


        if ($stmt->execute ()){
            return true;
        }else{
            echo "ERROR al registrar usuario.";
        }
} */
    //REGISTRO DE USUARIO 
    public static function registroUsuario($nombreUsuario, $apellidos, $email, $password)
    {

        $stmt = self::$dbh->prepare(self::$registro);
        $stmt->bindValue(1, $nombreUsuario);
        $stmt->bindValue(2, $apellidos);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $password);

        if ($stmt->execute()) {
            echo "<h2 style='color:green'>Usuario registrado correctamente.</h2>"; ?>

            <input type="button" value="Volver al inicio " size="10" onclick="javascript:window.location='index.php'">
            <?php
            return true;
        } else {
            echo "ERROR al registrar usuario.";
        }
    }


    //lOGIN DE USUARIO
    public static function loginUsuario($email, $password)
    {


        $stmt = self::$dbh->prepare(self::$loginUsuario);
        $stmt->bindValue(1, $email);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$result) {
            echo '<h2>ERROR.El email no existe en nuestro sistema!.</h2>';
        } else {

            if ($password == $result['password']) {

                $_SESSION['user_id'] = $result['email'];

                echo '<h2 style="color:green">Login correcto!, Bienvenido ' . $result['email'] . '</h2>'; ?>


                <input type="button" value="Volver al inicio " size="10" onclick="javascript:window.location='index.php'">
                <input type="button" value=" Cerrar sesión " size="10" onclick="javascript:window.location='./app/plantilla/logout.php'">
                
<?php
            } else {
                echo '<h2>Error de login.</h2>';
            }
        }
    }


    //Estrellas

    public static function anadirEstrellas($estrellas, $codigo)
    {


        $stmt = self::$dbh->prepare(self::$estrellas);
        $stmt->bindValue(1, $estrellas);
        $stmt->bindValue(2, $codigo);
      

        if ($stmt->execute()){
            echo "Estrellas añadidas"; ?>

             <input type="button" value="Volver al inicio " size="10" onclick="javascript:window.location='index.php'">
             <?php

        }else{
            echo "Error en las estrellas.";
        }



    }





    //Update peli
    public static function peliculaUpdate($nombre, $director, $genero, $imagen, $alquiler, $video, $codigo)
    {
        $stmt = self::$dbh->prepare(self::$update_peli);

        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $director);
        $stmt->bindValue(3, $genero);
        $stmt->bindValue(4, $imagen);
        $stmt->bindValue(5, $alquiler);
        $stmt->bindValue(6, $video);
        $stmt->bindValue(7, $codigo);


        if ($stmt->execute()) {
            return true;
        } else {
            echo "ERROR. No se ha podido modificar los datos.";
        }
    }

    public static function init()
    {

        if (self::$dbh == null) {
            try {
                // Cambiar  los valores de las constantes en config.php
                $dsn = "mysql:host=" . DBSERVER . ";dbname=" . DBNAME . ";charset=utf8";
                self::$dbh = new PDO($dsn, DBUSER, DBPASSWORD);
                // Si se produce un error se genera una excepción;
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión " . $e->getMessage();
                exit();
            }
        }
    }
    //BUSCADOR

    //Por género
    public static function PeliculaGetGenero($genero)
    {
        //Sentencia preparada mostrar películas
        $stmt = self::$dbh->prepare(self::$consulta_genero);
        $stmt->bindValue(1, $genero);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Obtengo un objeto de tipo Usuario, pero devuelvo una tabla
            // Para no tener que modificar el controlador
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');

            $uobj = $stmt->fetch();
            return $uobj;
        }else{
            echo "La película que buscas no existe.";
        }
        return null;
    }
    //Por nombre:
    public static function PeliculaGetNombre($nombre)
    {
        //Sentencia preparada mostrar películas
        $stmt = self::$dbh->prepare(self::$consulta_nombre);
        $stmt->bindValue(1, $nombre);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Obtengo un objeto de tipo Usuario, pero devuelvo una tabla
            // Para no tener que modificar el controlador
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');

            $uobj = $stmt->fetch();
            return $uobj;
        } else {
            echo "La película que buscas no existe.";
        }
        return null;
    }
    //Por director:
    public static function PeliculaGetDirector($director)
    {
        //Sentencia preparada mostrar películas
        $stmt = self::$dbh->prepare(self::$consulta_director);
        $stmt->bindValue(1, $director);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Obtengo un objeto de tipo Usuario, pero devuelvo una tabla
            // Para no tener que modificar el controlador
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');

            $uobj = $stmt->fetch();
            return $uobj;
        } else {
            echo "La película que buscas no existe.";
        }
        return null;
    }






    //Añadir película
    public static function PeliculaAdd($nombre, $director, $genero, $imagen, $alquiler, $video)
    {



        if (!$genero) {
            self::$error = "Falta el campo género";
            return false;
        }


        $resultado = self::$dbh->query('SELECT max(codigo_pelicula) AS id FROM peliculas');
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $codigo_pelicula = $row['id'];
        /* echo "CODIGO PELICULA= " . $codigo_pelicula; */
        $codigo_pelicula++;
        /* echo "CODIGO PELICULA= " . $codigo_pelicula; */
        /* echo "Row =";
        var_dump($row); */

        /* var_dump($resultado); */
        $stmt = self::$dbh->prepare(self::$insert_pelicula);

        $stmt->bindValue(1, $codigo_pelicula);
        $stmt->bindValue(2, $nombre);
        $stmt->bindValue(3, $director);
        $stmt->bindValue(4, $genero);
        $stmt->bindValue(5, $imagen);
        $stmt->bindValue(6, $alquiler);
        $stmt->bindValue(7, $video);

        self::$error = "ERROR desconocido.";

        try {
            if ($stmt->execute()) {

                /* echo "OK";
            return self::$dbh->lastInsertId(); */
                /* echo "Retornamos = " . $codigo_pelicula; */
                self::$error = "";
                return $codigo_pelicula;
            }
        } catch (Exception $e) {

            self::$error = $e->getMessage();
        }

        return false;
    }

    // Tabla de objetos con todas las peliculas
    public static function GetAll(): array
    {
        // Genero los datos para la vista que no muestra la contraseña

        $stmt = self::$dbh->query("select * from peliculas");

        $tpelis = [];
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
        while ($peli = $stmt->fetch()) {
            $tpelis[] = $peli;
        }
        return $tpelis;
    }

    //Obtener peliculas
    public static function PeliculaGet($codigo)
    {


        //Sentencia preparada mostrar películas
        $stmt = self::$dbh->prepare(self::$consulta_peli);
        $stmt->bindValue(1, $codigo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Obtengo un objeto de tipo Usuario, pero devuelvo una tabla
            // Para no tener que modificar el controlador
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');

            $uobj = $stmt->fetch();
            return $uobj;
        }
        return null;
    }


    /*Borrar una peli (boolean)*/

    public static function peliDel($codigo)
    {
        $stmt = self::$dbh->prepare(self::$delete_peli);
        $stmt->bindValue(1, $codigo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
    //Cerrar conexión con la bd
    public static function closeDB()
    {
        self::$dbh = null;
    }
}

// class
/***
// Borrar un usuario (boolean)
public static function UserDel($userid){
    $stmt = self::$dbh->prepare(self::$delete_user);
    $stmt->bindValue(1,$userid);
    $stmt->execute();
    if ($stmt->rowCount() > 0 ){
        return true;
    }
    return false;
}
// Añadir un nuevo usuario (boolean)
public static function UserAdd($userid, $userdat):bool{
    $stmt = self::$dbh->prepare(self::$insert_user);
    $stmt->bindValue(1,$userid);
    $clave = Cifrador::cifrar($userdat[0]);
    $stmt->bindValue(2,$clave);
    $stmt->bindValue(3,$userdat[1] );
    $stmt->bindValue(4,$userdat[2] );
    $stmt->bindValue(5,$userdat[3] );
    $stmt->bindValue(6,$userdat[4] );
    if ($stmt->execute()){
       return true;
    }
    return false; 
}

// Actualizar un nuevo usuario (boolean)
// GUARDAR LA CLAVE CIFRADA
public static function UserUpdate ($userid, $userdat){
    $clave = $userdat[0];
    // Si no tiene valor la cambio
    if ($clave == ""){ 
        $stmt = self::$dbh->prepare(self::$update_usernopw);
        $stmt->bindValue(1,$userdat[1] );
        $stmt->bindValue(2,$userdat[2] );
        $stmt->bindValue(3,$userdat[3] );
        $stmt->bindValue(4,$userdat[4] );
        $stmt->bindValue(5,$userid);
        if ($stmt->execute ()){
            return true;
        }
    } else {
        $clave = Cifrador::cifrar($clave);
        $stmt = self::$dbh->prepare(self::$update_user);
        $stmt->bindValue(1,$clave );
        $stmt->bindValue(2,$userdat[1] );
        $stmt->bindValue(3,$userdat[2] );
        $stmt->bindValue(4,$userdat[3] );
        $stmt->bindValue(5,$userdat[4] );
        $stmt->bindValue(6,$userid);
        if ($stmt->execute ()){
            return true;
        }
    }
    return false; 
}
 ****/

   /*Datos de una película para visualizar
     public static function UserGet ($codigo){
    $datosuser = [];
    $stmt = self::$dbh->prepare(self::$consulta_user);
    $stmt->bindValue(1,$userid);
    $stmt->execute();
    if ($stmt->rowCount() > 0 ){
        // Obtengo un objeto de tipo Usuario, pero devuelvo una tabla
        // Para no tener que modificar el controlador
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $uobj = $stmt->fetch();
        $datosuser = [ 
                     $uobj->clave,
                     $uobj->nombre,
                     $uobj->email,
                     $uobj->plan,
                     $uobj->estado
                     ];
        return $datosuser;
    }
    return null;    
    
} */