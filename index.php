<?php
/* Incluye el archivo de conexion */
include("conexion.php");
include("registro.php");
/* ----------------------------------- */

if (!empty($_POST)) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['user']);
    $password = mysqli_real_escape_string($conexion, $_POST['pass']);
    $password_encriptada = sha1($password);
    $sql = "SELECT idusuarios FROM usuarios WHERE usuario = '$usuario' AND Contraseña = '$password_encriptada' ";
    $resultado = $conexion->query($sql);
    $rows = $resultado->num_rows;
    if ($rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['id_usuario'] = $row["idusuarios"];
        header("Location: admin.php");
        } else {
            echo "<script>
                    alert('Los datos ingresados son incorrectos');
                    windows.location = 'index.php';
                  </script>";
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <link href="http://fonts.cdnfonts.com/css/billabong" rel="stylesheet">
    <title>Instagram Log In</title>
</head>
<body>

    <div class="contenedor">
        <h1>Instagram</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="user" placeholder="Usuario" required/>
            <input type="password" name="pass" placeholder="Contraseña" required/>
            <button type="submit" class="iniciar-sesion"> Iniciar sesion </button> 
        </form>

        <p>O</p>

        <div class="sub-contenedor">
            <img src="img/facebook.png">
            <h2>Iniciar sesion con Facebook</h2>
        </div>
        
        <a href="registro.php">Registrarse en Instagram</a>
    </div>
</body>
</html>