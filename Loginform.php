<?php
session_start();

$mensaje='';
$clase='ui hidden negative attached message';

if($_POST){
//var_dump($_POST); exit;
$data=json_decode(file_get_contents('data.json'),true);

if (strlen($_POST['email'])==0 || strlen($_POST['pass'])==0) {
  $clase ='ui negative attached message';
  $mensaje='Por favor completa los datos!';
}else{
    foreach ($data['usuarios'] as $key => $value) {
      if(password_verify($_POST['pass'], $value['pass']) && $_POST['email']==$value['email']){
        //Para guardar toda la informacion del usuario
        $_SESSION['user']=$value;

        //Para recordar los datos de la cuenta (queda para el siguiente modulo)
        if(isset($_POST['checkbox'])) {
          setcookie(COOKIE_REMEMBER, $_POST['email'], time()+3600);
        }

        header("location:index.php");
        break;
      }else{
        $clase ='ui negative attached message';
        $mensaje='Tus datos no verifican!';
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="css/styleregister.css" rel="stylesheet" media="screen">

  </head>
  <body>
    <div class="header">
      <a href="index.php"><h1>T<span class="iso">!</span>CKET</h1></a>
    </div>

      <div class="container-fluid container">

          <div class="header">
            <h3>Ingresá con tus datos</h3>
            <h6><?=$mensaje?></h6>
          </div>

        <div class="row">
          <div class="col-1 col-sm-1 col-md-1 col-lg-2">
          </div>

          <div class="col-10 col-sm-10 col-md-10 col-lg-8">
            <form action="Loginform.php" method="POST">

              <div class="row">
                <div class="col-11 col-sm-12 col-md-10 col-lg-6 inputregister">
                  <label for="email"><i class="fas fa-envelope"></i></label>
                  <input type="text" name="email" value="" placeholder="Dirección de correo"/>
                </div>
              </div>

              <div class="row">
                <div class="col-11 col-sm-12 col-md-10 col-lg-6 inputregister">
                  <label for="pass"><i class="fas fa-unlock"></i></label>
                  <input type="password" name="pass" value="" placeholder="Contraseña"/>
                </div>
              </div>

              <div class="row">
                <div class="col-11 col-sm-12 col-md-10 col-lg-6 checkbox">
                  <input type="checkbox" name="checkbox" value="checked"/>
                  <span>Recordarme en este equipo.</span>
                </div>
              </div>

              <div class="row">
                <div class="col-11 col-sm-12 col-md-10 col-lg-6 checkbox">
                  <a href="#"><span>No recuerdo mi contraseña.</span></a>
                </div>
              </div>

              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3">

                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <input class="button2" type="submit" name="" value="Ingresar">
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <a class="button" href="Registro.php">No tengo usuario</a>
                </div>
              </div>

            </form>
          </div>
          <div class="col-10 col-sm-10 col-md-10 col-lg-1">
            <img class="register" src="img/signo.png" alt="">
          </div>


        </div>

      </div>

  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>
