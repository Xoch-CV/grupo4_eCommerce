<?php
function user_exists(array $users, string $email) {
  foreach ($users as $user) {
    if ($user['email'] === $email) {
      return true;
    }
  }
  return false;
}

$errors = [];
$usuario['foto'] = 'files/Avatar.jpg';

//Validacion datos
$mensaje='';

if($_POST){
  // var_dump($_POST); exit;
    //Validamos nombre
    if(empty($_POST['nombre'])){
      $errors['nombre'] = 'Debes completar este campo.';
    }else{
      $usuario['nombre'] = $_POST['nombre'];
    }
    //Validamos apellido
    if(empty($_POST['apellido'])){
      $errors['apellido'] = 'Debes completar este campo.';
    }else{
      $usuario['apellido'] = $_POST['apellido'];
    }
    //Validamos email
    if(empty($_POST['email'])){
      $errors['email'] [] = 'Este campo está vacío.';
    }elseif(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
       $usuario['email'] = $_POST['email'];
    }else{
          $errors['email'][] = 'El formato no es correcto';
    }
    //Validamos password


    if(empty($_POST['pass'])){
      $errors['pass'] [] = 'Este campo está vacío.';
    }elseif(strlen($_POST['pass'])<8){
      $errors['pass'] [] = 'La contraseña tiene que tener un mínimo de 8 caracteres.';
    } else {
      if(empty($_POST['confirmapass'])){
      $errors['confirmapass'] [] = 'Debes completar este campo.';
    }elseif(strlen($_POST['confirmapass'])<8){
        $errors['confirmapass'][] = 'La contraseña tiene que tener un mínimo de 8 caracteres.';
      }else{
        if($_POST['confirmapass']==$_POST['pass']){
            $usuario['pass'] = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        }else {
          $errors['pass'][] = 'Las contraseñas no coinciden';
        }
      }
      }
    //Validamos checkbox
    if(!isset($_POST['checkbox'])){
      $errors ['checkbox'] = 'Debes aceptar los terminos y condiciones';
    }

    if (count($errors)== 0){

      //Creamos archivo json vacio y decodificamos a un array php
      $data=json_decode(file_get_contents('data.json'),true);

      if (user_exists($data['usuarios'], $usuario['email'])) {
        $mensaje = "Ya existe una cuenta registrada con esa dirección de correo.";
      } else {
        $usuario['id']=count($data['usuarios'])+1;
        //Agregarmos un usuario nuevo
        $data['usuarios'][]=$usuario;
        //Codificamos y almacenamos array php a json de nuevo
        file_put_contents('data.json', json_encode($data,JSON_PRETTY_PRINT));
        //Redireccionamos a pagina de inicio
        header('location:Loginform.php');
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
          <h3>Registrate</h3>
          <h6><?=$mensaje?></h6>
        </div>

      <div class="row">
        <div class="col-1 col-sm-1 col-md-1 col-lg-2">
        </div>

        <div class="col-10 col-sm-10 col-md-10 col-lg-8">
          <form action="Registro.php" method="POST">
            <div class="row">
              <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                <label for="name"><i class="fas fa-user"></i></label>
                <input type="text" name="nombre" value="<?=isset($_POST['nombre']) ? $_POST['nombre'] : ''?>" placeholder="Nombre"/><br>
                <span><?= isset($errors['nombre']) ? $errors['nombre'] : '' ?></span>
              </div>
              <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                <label for="name"><i class="far fa-user"></i></label>
                <input type="text" name="apellido" value="<?=isset($_POST['apellido']) ? $_POST['apellido'] : ''?>" placeholder="Apellido"/><br>
                <span><?= isset($errors['apellido']) ? $errors['apellido'] : '' ?></span>
              </div>
            </div>

            <div class="row">
              <div class="col-11 col-sm-12 col-md-10 col-lg-11 inputregister">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="text" name="email" value="<?=isset($_POST['email']) ? $_POST['email'] : ''?>" placeholder="joe@schmoe.com"><br>
                <span><?= isset($errors['email']) ? $errors['email'][0] : '' ?></span>
              </div>
            </div>

            <div class="row">
              <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                <label for="pass"><i class="fas fa-unlock"></i></label>
                <input type="password" name="pass" value="<?=isset($_POST['pass']) ? $_POST['pass'] : ''?>" placeholder="Mínimo 8 caracteres"><br>
                <span><?= isset($errors['pass']) ? $errors['pass'][0] : '' ?></span>
              </div>

              <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                <label for="re-pass"><i class="fas fa-lock"></i></label>
                <input type="password" name="confirmapass" value="<?=isset($_POST['pass']) ? $_POST['pass'] : ''?>" placeholder="Mínimo 8 caracteres"><br>
                <?= isset($errors['pass']) ? $errors['pass'][0] : '' ?></span>
              </div>
            </div>

            <div class="row">
              <div class="col-11 col-sm-12 col-md-10 col-lg-11 checkbox">
                <input type="checkbox" name="checkbox" value="checked"/>
                <span>Estoy de acuerdo con los  <a href="#" class="term-service">Términos y condiciones.</span></a><br>
                <span><?= isset($errors['checkbox']) ? $errors['checkbox'] : '' ?></span>
              </div>
            </div>

            <div class="row">
              <div class="col-6 col-sm-6 col-md-6 col-lg-6 ">
                <input class="button2" type="submit" name="boton" value="Registrarme">
              </div>
              <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                <a class="button" href="Loginform.php">Ya tengo usuario</a>
              </div>
            </div>

          </form>
        </div>
        <div class="col-10 col-sm-10 col-md-10 col-lg-2">
          <img class="register" src="img/signo.png" alt="">
        </div>


      </div>

    </div>

  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>
