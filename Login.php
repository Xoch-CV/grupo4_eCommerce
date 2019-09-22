<?php
$usuario='';

if($_POST){
//var_dump($_POST); exit;
$data=json_decode(file_get_contents('data.json'),true);

  foreach ($data['usuarios'] as $key => $value) {
    $mensaje='';
    if(password_verify($_POST['pass'],$value['pass']) && $_POST['usuario']===$value['email']){
        header('location:indexLogin.php');
    }else{
          $mensaje='Por favor verifica tus datos';
    }
  }
echo $mensaje;
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="Login.php" method="post">
      <label for="">Usuario</label>
    <input type="text" name="usuario" value="">
    <label for="">Contraseña</label>
    <input type="password" name="pass" value="">
    <input type="submit" name="enviar" value="">
    </form>
  </body>
</html>
