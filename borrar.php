<?php 

//Incluir conexion | Extraer datos del registro y mostrarlos en el formumlario
include 'conexion.php';

//Obtener el id enviado de index
$idRegistro = $_GET['id'];

//Seleccionar datos para mostrar los campos llenos
$query = "SELECT * FROM usuario WHERE id='".$idRegistro."'";
$usuario = mysqli_query($conn, $query) or die (mysqli_error($conn,$query));

//Volcamos los datos de ese registro
$fila = mysqli_fetch_assoc($usuario);

//si da click entonces  
if(isset($_POST['borrarRegistro'])){        

        //borrar4, query
        $query = "DELETE FROM usuario WHERE id='$idRegistro'";

        if(!mysqli_query($conn, $query)){
            die('Error: '.mysqli_error($conn));
            $error = "No se pudo borrar el registro";
        }else{
            $mensaje = "Registro borrado exitosamente";
            //Retornar si se creo
            header('Location: index.php?mensaje='.urlencode($mensaje)); //<!--Errores5-->
            exit();
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
        <h4>Borrar un Registro Existente</h4><!--borrar3 Borrar-->          
    </div>


        <div class="row caja">

       

            <div class="col-sm-6 offset-3">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $fila['nombre'];?>" readonly><!--Editar6 , values--> <!--borrar2 readonly, no deja editar-->             
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos" value="<?php echo $fila['apellidos'];?>" readonly>             
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono" value="<?php echo $fila['telefono'];?>" readonly>               
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa el email" value="<?php echo $fila['email'];?>" readonly>
                </div>
              
                <!--borrar1 name= borrarRegistro--> 
                <button type="submit" class="btn btn-primary w-100" name="borrarRegistro">Borrar Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>