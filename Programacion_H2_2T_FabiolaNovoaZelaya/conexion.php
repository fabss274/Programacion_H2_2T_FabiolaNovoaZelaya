<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $conexion = new mysqli("127.0.0.1", "root", "campusfp", "supertareas");
            if ($conexion->connect_error) {
                die("Error de conexion($conexion->connect_errno)");
            }
        ?>
       
    </body>
</html>