<?php
//Variables para persistencia de datos
$nombre='';
$apellido='';
$email='';
$pass='';
$confirmapass='';
$button='';
$checkbox='';

//Variables para validacion datos
$campovacio='Debes completar este campo';
$numcaract='El password debe tener al menos 8 caracteres';
$nombrevacio='';
$apellidovacio='';
$emailvacio='';
$formatonovalido='';
$passvacio='';
$confirmavacio='';
$passcaract='';
$confirmcaract='';
$nocoincide='';
$aceptarterminos='';

//Validacion datos
if($_POST){
  // var_dump($_POST); exit;
    //Validamos nombre
    if(strlen($_POST['nombre'])==0){
      $nombrevacio = $campovacio;
    }else{
      $nombre = $_POST['nombre'];
    }
    //Validamos apellido
    if(strlen($_POST['apellido'])==0){
      $apellidovacio = $campovacio;
    }else{
      $apellido = $_POST['apellido'];
    }
    //Validamos email
    if(strlen($_POST['email'])==0){
      $emailvacio = $campovacio;
    }elseif(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
       $email = $_POST['email'];
    }else{
          $formatonovalido = 'El formato no es correcto';
    }
    //Validamos password
    if(strlen($_POST['pass'])==0){
      $passvacio = $campovacio;
    }elseif(strlen($_POST['pass'])>=8){
        $pass = $_POST['pass'];
    }else{
      $passcaract = $numcaract;
    }
    //Verificamos contraseña
    if(strlen($_POST['confirmapass'])==0){
      $confirmavacio = $campovacio;
    }elseif(strlen($_POST['confirmapass'])<8){
        $confirmcaract = $numcaract;
      }else{
        if($_POST['confirmapass']==$pass){
            $confirmapass = $_POST['confirmapass'];
        }else {
          $nocoincide = 'Las contraseñas no coinciden';
        }
      }
    //Validamos checkbox
    if(!isset($_POST['checkbox'])){
      $aceptarterminos= 'Debes aceptar los terminos y condiciones';
    }

    if ($nombrevacio=='' && $apellidovacio=='' && $emailvacio=='' && $formatonovalido=='' && $passvacio=='' && $confirmavacio=='' && $passcaract=='' && $nocoincide == '' && $aceptarterminos==''){


    //Almacenamos datos para generar archivo json post validacion
      $usuario = [
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'email' => $_POST['email'],
        'pass' => password_hash($_POST['pass'],PASSWORD_DEFAULT),
        'foto' => null,
      ];
      //Creamos archivo json vacio y decodificamos a un array php
      $data=json_decode(file_get_contents('data.json'),true);

      foreach ($data['usuarios'] as $key => $value) {
      $mensaje='';
      if($_POST['email']===$value['email']){
        $mensaje = "Ya existe una cuenta registrada con esa dirección de correo.";
      } else {
      //Agregarmos un usuario nuevo
      $data['usuarios'][]=$usuario;
      //Codificamos y almacenamos array php a json de nuevo
      file_put_contents('data.json',json_encode($data,JSON_PRETTY_PRINT));

    //Redireccionamos a pagina de inicio
    header('location:Login.php');
      }

    }  $mensaje;
}}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Semantic_ui/project/semantic/dist/semantic.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous">
    </script>
    <script src="Semantic_ui/project/semantic/dist/semantic.min.js"></script>
    <title>Registro</title>
</head>
<body>
<form class="" action="Registro.php" method="post">
    <div class="ui grid">
      <div class="column">
        <div class="ui segment">
          <h1><?= $mensaje ?></h1>
            <h4>¡Registrate con tu dirección de email!</h4>
            <div class="ui secondary segment">
                <h4>Datos de tu cuenta</h4>
                <div class="ui form">
                  <div class="fields">
                      <div class="field">
                          <div class="required field">
                              <label>Nombre</label>
                              <input type="text" name="nombre" value="<?=$nombre?>" placeholder="Nombre">
                              <span><?=$nombrevacio?></span>
                          </div>
                              <label>Apellido</label>
                              <input type="text" name="apellido" value="<?=$apellido?>"placeholder="Apellido">
                              <span><?=$apellidovacio?></span>
                      </div>
                  </div>
                    <div class="field">
                        <div class="required field">
                            <label>Correo electrónico</label>
                            <!--type="text" para que no haga la validacion el navegador-->
                            <input type="text" name="email" value="<?=$email?>" placeholder="joe@schmoe.com">
                            <span><?=$emailvacio?><br></span>
                            <span><?=$formatonovalido?></span>
                        </div>
                    </div>
                        <div class="field">
                          <div class="required field">
                            <label>Crea tu contraseña</label>
                            <input type="password" name="pass" value="<?=$pass?>" placeholder="Mínimo 8 caracteres">
                            <span><?=$passvacio?></span>
                            <span><?=$passcaract?></span>
                          </div>
                        </div>
                        <div class="field">
                          <div class="required field">
                            <label>Confirma tu contraseña</label>
                            <input type="password" name="confirmapass" value="<?=$confirmapass?>" placeholder="Mínimo 8 caracteres">
                            <span><?=$confirmavacio?></span>
                            <span><?=$confirmcaract?></span>
                            <span><?=$nocoincide?></span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="ui form">
                        <div class="required field">
                            <div class="ui checkbox">
                                <input type="checkbox" name="checkbox" value="checked" class="">
                                <label>Estoy de acuerdo con los terminos y condiciones</label>
                                <span><?=$aceptarterminos?></span>
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
