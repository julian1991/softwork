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
        header("location:index2.html");
        // Llevamos Nuestros Campos Ingresados a Variables
        $_SESSION["Nombre"]=$Nombre;
        $_SESSION["Contrasena"]=$Contrasena;
        
    }
}




    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">

  <title></title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
    <!-- BOOTSTRAPS -->
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- THEMES -->
  <link type="text/css" href="css/theme.css" rel="stylesheet">

  <!--ICONS-->
  <link type="text/css" href="icons/font-awesome/css/font-awesome.css" rel="stylesheet">
  <!--FONTS-->
  <link type='text/css'href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic,500italic,500,300italic,300' rel='stylesheet'>
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Fugaz+One|Leckerli+One' rel='stylesheet'>


  

    </head>
    <style>
.panel-primary{
  width: 400px;
  height: 300px;
margin-top: 157px;
margin-left: 511px;
}
h1 { 
  font: oblique bold 120% algeria; 
  font-size: 45px;
  color: white;
  border-color: black;
}
.panel-heading{
  height: 80px;
}
.l{
  background: #f7f8f9;
}
    </style>

    <body class="l">
<form action="index.php" method="POST">
<div class="container-fluid">
  <div class="row">
  <form data-parsley-validate>
  <div class="panel panel-primary">
  <div class="panel-heading">
  <h1 align="center">Softwork</h1></div>
  <div class="panel-body"> 
  <form action="index.php" method="POST">
  <div class="form-group col-md-12  col-sm-4  col-xs-4">
        <label for="nombre">Ingrese Usuario </label>
        <input type="text"     name="Nombre" required><br/>
      </div>
      <br>
      <br>
       <div class="form-group col-md-12  col-sm-4  col-xs-4">
        <label for="nombre">Ingrese contraseña </label>
        <input type="password" name="Contrasena" required>
      </div>
      <br>
      <br> <div class="form-group col-md-4  col-sm-4  col-xs-4">
           </div>
            <div class="form-group col-md-4  col-sm-4  col-xs-4">
            <p class="clearfix">
              <center> <input type="submit" value="Ingresar" name="ingresar" class="btn btn-primary"></center> 

            <?php // Error si no existen los datos
            if($valido == false){
            echo "Contraseña Incorrecta";
            }
        ?>
            </p></div>
            <div class="form-group col-md-4  col-sm-4  col-xs-4">
           </div>

           </div>
           </div>
           </form>
        </div>
        </div>
</form>

        </body>
        </html>