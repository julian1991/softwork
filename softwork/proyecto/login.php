    <?php
    ini_set("display_errors", false);

    session_start();
    $valido=true;
    $mostrar=false;

// Verificamos si Existe el Botón para Ejecutar el Procedimiento
if (isset($_POST['ingresar'])) {
    
    // Conexión a la Db
    $Servidor="localhost";
    $Usuario="root";
    $Password="";
    $db="softwork";
    // Nos Conectamos a la Db
    $testconec= mysql_pconnect($Servidor,$Usuario,$Password) or die ("No se Puede Conectar");
    mysql_select_db($db) or die ("<script>alert('Error al Conectar con la Base de Datos')</script>");
    // Recojemos Valores a nuetras Variables
    $nombre=$_POST['Nombre'];
    $password=$_POST['Contrasena'];
    // Consultamos las Variables en la Tabla
    $consulta="SELECT IdUsuario,Nombre,Contrasena FROM usuario where Nombre='$nombre' AND Contrasena='$password'";
    // Ejecutamos Nuestra Consulta
    $result= mysql_query($consulta) or die (mysql_error());
    // Verificamos el Nùmero de Filas existentes
    $filasn= mysql_num_rows($result);
    // Si No Arroja Ninguna Fila
    if ($filasn<=0 || isset($_GET['nologin'])) {
        $valido=false;
    }else{
        // Arramos nuestro Resultado ($result)
        $rowsresult=mysql_fetch_array($result);
        // Variable Para Mostrar el Error
        $valido=true;
        // Localizamos Hacia Donde Nos Lleva si Es Exitosa La operaciòn
        header("location:index.html");
        // Llevamos Nuestros Campos Ingresados a Variables
        $_SESSION["Nombre"]=$Nombre;
        $_SESSION["Contrasena"]=$Contrasena;
        
    }
}




    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cromados El Niche</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="CROMADOS EL NICHE EMPRESA DE CROMADOS EN ANTIOQUIA/COLOMBIA/AMERICA" />
    <meta name"viewport" content="width=device-width, initial-scale=1" />
    <link rel="shorcut icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="stylesheet"  href="css/estilos.css" />
    <link type="text/css" href="css/dot-luv/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
    <link type="text/css" href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" href="css/estilos.css" rel="stylesheet" />

    <script type="text/javascript" src="js/jquery_ui/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/jquery_ui/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="js/jquery_ui/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery-validation-1.10.0/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery-validation-1.10.0/lib/jquery.metadata.js"></script>
    <script type="text/javascript" src="js/jquery-validation-1.10.0/localization/messages_es.js"></script>


    
</head>
<script type="text/javascript">

</script>
<section id="login">
<img src="img/logo.png" id="logoid"  />
<div id="ingreso">
    <h2>
    <br>
    <strong>INGRESAR</strong></h2>
        <form action="login.php" method="POST">
            Usuario<br/>
            <input type="text"     name="Nombre"><br/>
            Password<br/>
            <input type="password" name="Contrasena"><br/>
            
            <input type="submit" value="Ingresar" name="ingresar" class="btn btn-inverse"><br>
            
            <?php // Error si no existen los datos
            if($valido == false){
            echo "Ingresa De Nuevo Tu Usuario y Contraseña";
            }
        ?>
        </form>
</div>
    
</section>
                

</html>
