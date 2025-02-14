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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <style>
         #tituloborrar {
           display:Box;
           width: 46%;
           margin-left: 30%;
        } 
          #boton1{
           display:Box;
           width: 20%;
           margin-left: 32%; 
             }
          #boton2{
           display:Box;
           width: 20%;  
         }
        </style>
    </head>
    <body>
        <!-- Formulario de Tarea nueva -->
        <h1 align="center">Borrar Tarea</h1> <br>
        
        <form method="POST" action="borrar.php">
            <fieldset>
            <div class="form-group" id="tituloborrar">
                <label >Titulo de la tarea</label>
                <input type="text" class="form-control" name="titulo" aria-describedby="emailHelp" required>
            </div>
                <p align="center">(Después de ser eliminada no se puede recuperar la tarea.)</p><br>
            <button type="submit" class="btn btn-danger" id="boton1">Borrar</button>
            <button class="btn btn-secondary" id="boton2"><a href="tareas.php" class="link-light">Volver</a></button>
            </fieldset>
        </form>
        
        <?php
            include("conexion.php");
            session_start();
            
            if(!empty($_POST)) {
                $titulo = $_POST['titulo'];
                
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    $estado = $_SESSION['estado'];
                    
                    $delTarea_sql = "delete from tarea where titulo='$titulo' and correo='$email';";
                    
                    $borrar = $conexion->query($delTarea_sql);
                    echo "Tarea eliminada";
                    header("Location: tareas.php");
                    exit();
                    
                } else { echo "Inicia sesión de nuevo."; }
                
            } 
        ?>
       
    </body>
</html>