<?php
/* Incluye el archivo de conexion */
include("conexion.php");
/* ----------------------------------- */

/* Registro */
if (isset($_POST['registrar'])){
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['user']);
    $password = mysqli_real_escape_string($conexion, $_POST['pass']);
    $password_encriptada = sha1($password);
    $sqluser = "SELECT idusuarios FROM usuarios WHERE usuario = '$usuario' ";
    $resultadouser = $conexion->query($sqluser);
    $filas =$resultadouser->num_rows;
    if ($filas > 0) {
        echo "<script>
                alert('El usuario ya existe');
                window.location = 'index.php';
                </script> ";
    } else {
        $sqlusuario = "INSERT INTO usuarios(
                Nombre, Correo, Usuario, Contraseña)
                VALUES ('$nombre', '$correo', '$usuario', '$password_encriptada')";
        $resultadousuario = $conexion->query($sqlusuario);
        if ($resultadousuario > 0) {
            echo "<script>
                alert('Registro exitoso');
                window.location = 'index.php';
                </script>";
        } else{
            echo "<script>
                alert('Error al registrarse');
                window.location = 'index.php';
                </script>";
        }

    }
}
/* -------- */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="http://fonts.cdnfonts.com/css/billabong" rel="stylesheet">
    <title>Instagram Sing Up</title>
</head>
<body>
    <div class="contenedor" id="contenedor-form-registro">
        <h1>Instagram</h1>
        <h2 class="registro-h2">Registro</h2>
        <form action="registro.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre Completo">
            <input type="email" name="correo" placeholder="Email">
            <input type="text" name="user" placeholder="Usuario">
            <input type="password" name="pass" placeholder="Contraseña">
            <input type="password" name="pass" placeholder="Repetir contraseña">
            <button type="submit" name="registrar" class="iniciar-sesion"> Registrar </button> 
        </form>
    </div>

</body>
</html>