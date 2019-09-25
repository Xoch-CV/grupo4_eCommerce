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
          setcookie('user_logged', $_POST['email'], time()+3600);
        }

        header("location:indexLogin.php");
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
    <link rel="stylesheet" href="css/stylesform.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous">
    </script>
    <script src="Semantic_ui/project/semantic/dist/semantic.min.js"></script>
    <title>Login</title>
</head>
<body>
  <div class="ui login center aligned grid">
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
</body>
</html>
