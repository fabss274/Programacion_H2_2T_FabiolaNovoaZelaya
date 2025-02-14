<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="estilos.css">
        
    </head>
    <body>
        <!-- Barra navegadora superior -->
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">SuperTareasFabss</a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="tareas.php">Tareas</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="cerrarSesion.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
            </ul>
          </div>
        </nav>
        
        <?php
        //no nos olvidamos de incluir la conexion e iniciar una sesion
        include("conexion.php");
        session_start();
        
        //verifico si el usuario es valido, sino no muestra nada
        if(isset($_SESSION['email'])) {
            $emamail = $_SESSION['email'];
            $showSql = "select * from tarea where correo='$emamail'";
            $resultado = $conexion->query($showSql);
            
            if($resultado) {
        ?>
        <br>
        <table class="table table-dark" id="tablatareas">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                    </tr>
                     
        <?php
                $row = $resultado->fetch_assoc();
                while ($row) {
                    echo "<tr>";
                    echo "<td>". $row['titulo'] ."</td>";
                    echo "<td>". $row['descripcion'] ."</td>";
                    echo "<td>". $row['estado'] ."</td>";
                    echo "</tr>";
                    $row=$resultado->fetch_assoc();
                }
                $resultado->close();
            }
            
            ?>
        </table> 
        <br>
        <a href="nuevaTarea.php" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true" id="boton1">Añadir Tarea</a>
        <a href="cambiarEstado.php" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true" id="boton2">Cambiar Estado</a>
        <a href="borrar.php" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true" id="boton3">Borrar Tarea</a>     
            <?php
            
            
        } else {
            echo "inicia sesion por favor";
        }
        ?>
        
    </body>
</html>