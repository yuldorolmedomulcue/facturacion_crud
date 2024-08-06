<?php //<!--Editar2-->

//Incluir conexion | Extraer datos del registro y mostrarlos en el formumlario
include 'conexion.php';

//<!--Editar3-->  Obtener el id enviado de index
$idRegistro = $_GET['id'];

//<!--Editar4--> Seleccionar datos
$query = "SELECT * FROM usuario WHERE id='".$idRegistro."'";
$usuario = mysqli_query($conn, $query) or die (mysqli_error());

//<!--Editar5--> Volcamos los datos de ese registro
$fila = mysqli_fetch_assoc($usuario);


//<!--Editar8, [''] --> 
if(isset($_POST['editarRegistro'])){
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
        //<!--Editar9, cambiar querys--> 
        $query = "UPDATE usuario set nombre='$nombre', apellidos='$apellidos', telefono='$telefono', email='$email' WHERE id='$idRegistro'";

        if(!mysqli_query($conn, $query)){
            die('Error: '.mysqli_error($conn));
            $error = "No se pudo crear el registro";
        }else{
            $mensaje = "Registro editado correctamente";
            //Retornar si se creo
            header('Location: index.php?mensaje='.urlencode($mensaje)); //<!--Errores3 urlencode-->
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
        <h4>Editar un Registro Existente</h4>
    </div>


        <div class="row caja">

            <?php if(isset($error)) :?> <!--Errores2-->
                    <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
            <?php endif;?>

            <div class="col-sm-6 offset-3">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $fila['nombre'];?>"><!--Editar6 , values-->            
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos" value="<?php echo $fila['apellidos'];?>" >             
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono" value="<?php echo $fila['telefono'];?>">               
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa el email" value="<?php echo $fila['email'];?>">
                </div>
              
                <!--Editar7, el name de btn --> 
                <button type="submit" class="btn btn-primary w-100" name="editarRegistro">Editar Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>