<?php include 'conexion.php';?>

<?php
//crear y seleccionar query
$query = "SELECT * FROM usuario ORDER BY id DESC";
$usuarios = mysqli_query($conn, $query);

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

    <!--Errores6 mensaje, se ejecuta si esta seteado-->
    <?php if(isset($_GET['mensaje'])) : ?>       

        <!--Errores7, alerta sacada de link de bootstrap alert-dismissing-->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $_GET['mensaje']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>

    <div class="row">
            <div class="col-sm-4 offset-8">
                <a href="crear.php" class="btn btn-success w-100"> Crear Nuevo Registro</a>
            </div>            
        </div>

        <div class="row caja">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php while($fila = mysqli_fetch_assoc($usuarios)) : ?><!--Habre PHP-->

                    <tr>
                        <td><?php echo $fila['id'];?></td>
                        <td><?php echo $fila['nombre'];?></td>
                        <td><?php echo $fila['apellidos'];?></td>
                        <td><?php echo $fila['telefono'];?></td>
                        <td><?php echo $fila['email'];?></td>
                        <td><!--Deja btn al lado derecho-->
                        <a href="editar.php?id=<?php echo $fila['id'];?>" class="btn btn-primary"> Editar</a> <!--Editar1-->
                        <a href="borrar.php?id=<?php echo $fila['id'];?>" class="btn btn-danger"> Borrar</a>
                        </td>
                    </tr> 

                    <?php endwhile;?><!--Cierra PHP-->

                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <!--JavaScript opcional; elige uno de los dos! -->

    <!--Opción 1: Paquete Bootstrap con Popper para poder quitar alertas que se hacen al final-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Opción 2: Separar Popper y Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

  </body>
</html>