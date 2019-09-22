<?php
session_start();
if($_POST){
//var_dump($_POST); exit;
$data=json_decode(file_get_contents('data.json'),true);

  foreach ($data['usuarios'] as $key => $value) {
    $mensaje='';
    $_SESSION['email']='';
          if (strlen($_POST['email'])==0 || strlen($_POST['pass'])==0) {
            $mensaje='Por favor completa los datos';
          } else {
            if(password_verify($_POST['pass'],$value['pass']) && $_POST['email']===$value['email']){
              if($_POST['checkbox']=='checked'){
                $_SESSION['email']=$value['email'];
                header("location:index.php?email=" . $value['email']);
              }else{
                $_SESSION['email']='';
                header("location:index.php?email=" . $value['email']);
              }
            }else{
            $mensaje='Tus datos no verifican';
          }
    }
  }
$mensaje;
// var_dump($_SESSION['email']);
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
      <label for="">Email</label>
    <input type="text" name="email" value="" placeholder="<?= $_SESSION['email']?>">
    <label for="">Contraseña</label>
    <input type="password" name="pass" value="">
    <label for="" >Recordar usuario</label>
    <input type="checkbox" name="checkbox" value="checked">
    <input type="submit" name="enviar" value="">


    </select>
    </form>
  </body>
</html>
