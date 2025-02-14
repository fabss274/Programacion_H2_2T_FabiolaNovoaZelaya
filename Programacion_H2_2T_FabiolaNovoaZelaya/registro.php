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
  <script src="https:   //maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
     #boton1{
      display:Box;
      width: 46%;
      margin-left: 28%;
  }
  #parte1{
       display:Box;
      width: 46%;
      margin-left: 28%;
  }
  #parte2{
       display:Box;
      width: 46%;
      margin-left: 28%;
  }
  #parte3{
       display:Box;
      width: 46%;
      margin-left: 28%;
  }
   #parte4{
       display:Box;
      width: 46%;
      margin-left: 28%;
  }
  </style>
    </head>
    <body>
        <!-- Barra navegadora superior -->
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
        
        <!-- Formulario de registro de usuarios -->
        <h1 align="center">Registrarme</h1>
        <form method="POST" action="registro.php">
            <div class="form-group" id="parte1">
                <label for="exampleInputEmail1">Nombre de Usuario</label>
                <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group"id="parte2">
                <label for="exampleInputEmail1">Correo Electronico</label>
                <input type="text" class="form-control" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group" id="parte3">
                <label for="exampleInputPassword1" >Contraseña</label>
                <input type="password" class="form-control" name="contra" required>
            </div>
            <div class="form-group form-check" id="parte4">
                <input type="checkbox" class="form-check-input" required>
                <label class="form-check-label" for="exampleCheck1">Acepto la politica de privacidad</label>
            </div>
            <button type="submit" class="btn btn-primary" id="boton1">Enviar</button>
        </form>
        
        <?php
            include("conexion.php");
            session_start();
            
            if(!empty($_POST)) {
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['email'] = $_POST['email'];
                $contra_hasheada = password_hash($_POST['contra'], PASSWORD_DEFAULT);
                $_SESSION['contra'] = $contra_hasheada;
                
                $verificar_sql = "select * from usuario where correo = '".$_SESSION['email']."' and nombre = '".$_SESSION['usuario']."';";
                $resultado = $conexion->query($verificar_sql);
                
                if ($resultado->num_rows == 0) {
                    $add_sql = "insert into usuario(correo, nombre, contra) values 
                    ('".$_SESSION['email']."', '".$_SESSION['usuario']."', '".$_SESSION['contra']."');";
                    
                    $añadido = $conexion->query($add_sql);
                    
                    echo "Usuario registrado";
                    header("Location: index.php");
                } else {
                    echo "Correo en uso.";
                }
            }
        ?>
       
    </body>
</html>