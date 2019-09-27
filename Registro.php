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
    <title>Registro</title>
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
          <a class="nav-link" href="Loginform.php">Log in</a>
        </li>
      </div>

      </ul>
    </div>
  </nav>
    <div class="ui center aligned grid">
      <div class="column">
        <form class="ui form segment" action="Registro.php" method="post">
        <div class="ui segment">
          <h2><?=$mensaje?></h2>
            <h4>¡Registrate con tu dirección de email!</h4>
            <div class="ui secondary segment">
                <h4>Datos de tu cuenta</h4>
                <div class="ui form">
                  <div class="fields">
                      <div class="field">
                          <div class="required field">
                              <label>Nombre</label>
                              <input type="text" name="nombre" value="<?=isset($_POST['nombre']) ? $_POST['nombre'] : ''?>" placeholder="Nombre">
                              <span><?= isset($errors['nombre']) ? $errors['nombre'] : '' ?></span>
                          </div>
                              <label>Apellido</label>
                              <input type="text" name="apellido" value="<?=isset($_POST['apellido']) ? $_POST['apellido'] : ''?>"placeholder="Apellido">
                              <span><?= isset($errors['apellido']) ? $errors['apellido'] : '' ?></span>
                      </div>
                  </div>
                    <div class="field">
                        <div class="required field">
                            <label>Correo electrónico</label>
                            <!--type="text" para que no haga la validacion el navegador-->
                            <input type="text" name="email" value="<?=isset($_POST['email']) ? $_POST['email'] : ''?>" placeholder="joe@schmoe.com">
                            <span><?= isset($errors['email']) ? $errors['email'][0] : '' ?></span>
                        </div>
                    </div>
                        <div class="field">
                          <div class="required field">
                            <label>Crea tu contraseña</label>
                            <input type="password" name="pass" value="<?=isset($_POST['pass']) ? $_POST['pass'] : ''?>" placeholder="Mínimo 8 caracteres">
                            <span><?= isset($errors['pass']) ? $errors['pass'][0] : '' ?></span>
                          </div>
                        </div>
                        <div class="field">
                          <div class="required field">
                            <label>Confirma tu contraseña</label>
                            <input type="password" name="confirmapass" value="<?=isset($_POST['pass']) ? $_POST['pass'] : ''?>" placeholder="Mínimo 8 caracteres">
                            <?= isset($errors['pass']) ? $errors['pass'][0] : '' ?></span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="ui form">
                        <div class="required field">
                            <div class="ui checkbox">
                                <input type="checkbox" name="checkbox" value="checked" class="">
                                <label>Estoy de acuerdo con los terminos y condiciones</label>
                                <span><?= isset($errors['checkbox']) ? $errors['checkbox'] : '' ?></span>
                            </div>
                            <br>
                            <!--<div class="ui checkbox">
                                <input type="checkbox" tabindex="0" class="hidden">
                                <label>Recordar mi usuario</label>
                            </div>
                          -->
                        </div>
                </div>
                <br>
                <div class="field">
                    <input class="ui submit button" type="submit" name="button" value="Enviar">
                </div>
            </div>
        </div>
      </div>
    </div>
</form>
</body>
</html>
