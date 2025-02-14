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
        <link rel="stylesheet" href="estilos.css">
        <style>
            #selectortareas{
                display:Box;
                width: 46%;
                margin-left: 30%;
            }
            #boton1tareas {
                display:Box;
                width: 25%;
                margin-left: 40%;
                margin-bottom: 1%;
            }
            #boton2tareas {
                display:Box;
                width: 25%;
                margin-left: 40%;
            }
            #tareatitulo{
                display:box;
                width:46%;
                margin-left:30%;
            }
        </style>
    </head>
    <body>
        <!-- Formulario de Tarea nueva -->
        <h2 align="center">Nueva Tarea</h2>
        
        <form method="POST" action="nuevaTarea.php">
            <fieldset>
            <div class="form-group" id="tareatitulo">
                <label for="exampl eInputEmail1">Titulo</label>
                <input type="text" class="form-control" name="titulo" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group" id="descripciontareas">
                <label for="exampleInputEmail1">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group" id="selectortareas">
                <select class="form-select form-select-lg mb-3" name="estado" aria-label=".form-select-lg example">
                    <option selected disabled>Estado</option>
                    <option value="Por Empezar">Por Empezar</option>
                    <option value="Estoy en ello">Estoy en ello</option>
                    <option value="Casi terminado!">Casi terminado!</option>
                </select>
            </div>
                <button type="submit" class="btn btn-primary" id="boton1tareas">Añadir</button>
            <button class="btn btn-secondary" id="boton2tareas"><a href="tareas.php" class="link-light">Volver</a></button>
            </fieldset>
        </form>
        
        <?php
            include("conexion.php");
            session_start();
            
            if(!empty($_POST)) {
                $_SESSION['titulo'] = $_POST['titulo'];
                $_SESSION['descripcion'] = $_POST['descripcion'];
                $_SESSION['estado'] = $_POST['estado'];
                
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    $titulo = $_SESSION['titulo'];
                    $descripcion = $_SESSION['descripcion'];
                    $estado = $_SESSION['estado'];
                    
                    $addTarea_sql = "insert into tarea(correo, titulo, descripcion, estado) values "
                            . "('$email', '$titulo', '$descripcion', '$estado');";
                    
                    $añadido = $conexion->query($addTarea_sql);
                    echo "Tarea añadida :)";
                    header("Location: tareas.php");
                    exit();
                    
                } else { echo "Rellena el formulario para añadir la tarea."; }
                
            }
        ?>
       
    </body>
</html>