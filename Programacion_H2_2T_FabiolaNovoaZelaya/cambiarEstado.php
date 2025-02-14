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
            #selectortareas{
                display:Box;
                width: 46%;
                margin-left: 30%;
            }
            #tareatitulo{
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
    <body> <br>
        <!-- Formulario de Tarea nueva -->
        <h1 align="center">Cambiar Estado</h1>
        <br>
        <form method="POST" action="cambiarEstado.php">
            <div class="form-group" id="tareatitulo">
                <label >Titulo de la tarea</label>
                <input type="text" class="form-control" name="titulo" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group" id="selectortareas">
                <select class="form-select form-select-lg mb-3" name="estado" aria-label=".form-select-lg example">
                    <option selected disabled>Estado Nuevo</option>
                    <option value="Por Empezar">Por Empezar</option>
                    <option value="Estoy en ello">Estoy en ello</option>
                    <option value="Casi terminado!">Casi terminado!</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="boton1">Cambiar</button> 
            <button class="btn btn-secondary" id="boton2"><a href="tareas.php" class="link-light" >Cancelar</a></button>
        </form>
        
        <?php
            include("conexion.php");
            session_start();
            
            if(!empty($_POST)) {
                $titulo = $_POST['titulo'];
                $newEstado = $_POST['estado'];
                
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    
                    $changeEstadoTarea_sql = "update tarea set estado = '$newEstado' where correo = '$email' and titulo='$titulo';";
                    
                    $cambio = $conexion->query($changeEstadoTarea_sql);
                    echo "Tarea cambiada :)";
                    header("Location: tareas.php");
                    exit();
                    
                } else { echo "Selecciona un cambio."; }
                
            } else { echo "Selecciona un cambio."; }
        ?>
       
    </body>
</html>