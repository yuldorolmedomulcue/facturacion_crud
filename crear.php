<?php //Paso 3

//Incluir conexion
include 'conexion.php';

//paso 4 si esta seteado o preciona 
if(isset($_POST['crearRegistro'])){
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']); //paso 5 crear scape
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    //configurar zona horaria
    date_default_timezone_set('America/Bogota');
    $time = date('h:i:s:a', time());

    //validar sino estan vacios del lado del servidor
    if(!isset ($nombre) || $nombre == '' || !isset($apellidos) || $apellidos =='' || !isset($telefono) || $telefono == '' || !isset($email) || $email=='' ){
        $error = "Algunos campos estan vacios";
    }else{
        //paso 5 envio de datos
        $query = "INSERT INTO usuario(nombre, apellidos,telefono, email) 
        VALUES ('$nombre', '$apellidos', '$telefono', '$email')";
        if(!mysqli_query($conn, $query)){
            die('Error: '.mysqli_error($conn));
            $error = "No se pudo crear el registro";
        }else{
            $mensaje = "Registro creado correctamente";
            //Retornar si se creo
            header('Location: index.php?mensaje='.urlencode($mensaje));//<!--Errores4 urlencode-->
            exit();
        }
    }
}
?>


<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">

    <title>CRUD PHP Y MYSQL</title>
  </head>
  <body>
    <h1 class="text-center">CRUD PHP Y MYSQL</h1>
    <p class="text-center">Aprende a realizar las 4 operaciones básicas entre PHP y una base de datos, en este caso MYSQL: CRUD(Create, Read, Update, Delete)</p>

    <div class="container">

    <div class="row">
        <h4>Crear un Nuevo Registro</h4>
    </div>   

        <div class="row caja">
 
            <?php if(isset($error)) :?> <!--Errores1-->
                <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
            <?php endif;?>

            <div class="col-sm-6 offset-3">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">  <!--Paso1-->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre"> <!--Paso2 los name-->                    
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos">                    
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono">                    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa el email">                    
                </div>
              
                <button type="submit" class="btn btn-primary w-100" name="crearRegistro">Crear Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>