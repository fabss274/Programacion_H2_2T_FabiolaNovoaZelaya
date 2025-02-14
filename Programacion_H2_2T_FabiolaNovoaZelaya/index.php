
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SuperTareas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">SuperTareasFabss</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Inicio</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registrarme</a></li>
            </ul>
          </div>
        </nav>
        
<!-- Formulario de inicio de sesion --> 
        
        <form method="POST" action="index.php" id="formulario">
            <br>
            <h2>Iniciar Sesión</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Correo Electrónico</label>
                <input type="text" class="form-control" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" name="contra" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>


        <?php
            include "conexion.php";
            //verifico que el formulario no esta vacio
            if(!empty($_POST)) {
                //inicio una sesion con cada dato del formulario
                $contra = $_POST['contra'];
                $email = $_POST['email'];
                $_SESSION['usuarioValido'] = false; 
                
                
                $email_sql = "select * from usuario where correo = '$email' ;";
                $resultado = $conexion->query($email_sql);
                
                //si el correo esta en la base de datos, y la contraseña son correctos, se inicia la sesion
                if ($resultado->num_rows == 1) {
                    $fila = $resultado->fetch_assoc();
                    //esto verifica la contraseña del formulario con la de la bd
                    if (password_verify($contra, $fila['contra'])) {
                        //si es correcta inicio la sesion, y guardo en una sesion el correo del usuario
                        session_start();
                        $_SESSION['usuarioValido'] = true;
                        $_SESSION['email'] = $email;
                        
                        echo "Sesion iniciada correctamente.";
                        //luego cuando se haya iniciado sesion, nos envia a la pagina de tareas
                        header("Location: tareas.php");
                        exit();
                        
                    } else {echo "Contraseña incorrecta.";}
                } else {
                    //si no estan en la BD, sale un error
                    echo "Usuario no encontrado.";
                }
            }
            
            //puedo meter un boton de "recordarme" y meterlo en una cookie
        ?>    
    

</body>
</html>