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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Semantic_ui/project/semantic/dist/semantic.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous">
    </script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,900&display=swap" rel="stylesheet">
    <script src="Semantic_ui/project/semantic/dist/semantic.min.js"></script>
    <link rel="stylesheet" href="css/styleform.css">
    <title>Login</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
      <i class="fas fa-bars"></i>
    </button>
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Preguntas_frec.php">f.a.q.</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Contacto.php">Contacto</a>
        </li>
      </ul>
    </div>
    <div class="order-0">
      <h1>T<span class="iso">!</span>CKET</h1>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="Registro.php">sign up</a>
        </li>
      </div>

      </ul>
    </div>
  </nav>
  <div class="ui center aligned grid">
    <div class="column">
      <form class="ui form segment" action="Loginform.php" method="post">
        <h4>Ingresa a tu cuenta</h4>
        <div class="ui segment">
          <div class="<?=$clase?>">
            <div class="header">
                <h5><?=$mensaje?></h5>
            </div>
          </div>
          <div class="ui secondary attached segment">
            <div class="ui center aligned form">
              <div class="field">
                <label>Email</label>
                <input type="text" name="email" value="" placeholder="">
              </div>
              <div class="field">
                <label>Contraseña</label>
                <input type="password" name="pass" value="">
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" name="checkbox" value="checked">
                  <label>Recordar mi cuenta</label>
                </div>
              </div>
            </div>
          </div>
              <br>
              <div class="field">
                  <input class="ui submit button" type="submit" value="Ingresar">
              </div>
              <br>
              <label>¿No tienes cuenta? <a href="http://localhost/Proyecto_Integrador/grupo4_eCommerce/Registro.php">Registrate!</a></label>
              <br>
              <label><a href="">Recuperar contraseña!</a></label>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
