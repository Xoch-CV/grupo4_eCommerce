<?php
// if($_POST){
//   $usuarios = [
//     "nombre" = $_POST["nombre"],
//     "apellido" = $_POST["apellido"],
//     "email" = $_POST["email"],
//     "password" = password_hash($_POST['password'],PASSWORD_DEFAULT)
//   ]
// $datos= json_decode(file_get_contents("data.json"),true);
//
//
// }
// ?>


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
            <h4>¡Registrate con tu dirección de email!</h4>
            <div class="ui secondary segment">
                <h4>Datos de tu cuenta</h4>
                <div class="ui form">
                  <div class="fields">
                      <div class="field">
                          <div class="required field">
                              <label>Nombre</label>
                              <input type="text" name="nombre" placeholder="Nombre completo">
                              <?php if($_POST):?>
                                <?php if(strlen($_POST["nombre"])==0):?>
                                 <span>Tienes que completar este campo.</span>
                              <?php endif;?>
                              <?php endif;?>
                          </div>
                          <div class="required field">
                              <label>Apellido</label>
                              <input type="text" name="apellido" placeholder="Apellido">
                              <?php if($_POST):?>
                                <?php if(strlen($_POST["apellido"])==0):?>
                                 <span>Tienes que completar este campo.</span>
                              <?php endif;?>
                              <?php endif;?>
                          </div>
                      </div>
                  </div>
                    <div class="field">
                        <div class="field">
                            <label>Correo electrónico</label>
                            <input type="email" name="email" placeholder="joe@schmoe.com">
                            <?php if($_POST):?>
                              <?php if(strlen($_POST["email"])==0):?>
                               <span>Tienes que completar este campo.</span>
                             <?php if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)===false && strlen($_POST["email"])>8):?>
                                 <span>El campo no es válido.</span>
                            <?php endif;?>
                            <?php endif;?>
                            <?php endif;?>
                        </div>
                        <div class="field">
                            <label>Crea tu contraseña</label>
                            <input type="text" name = "password" placeholder="">
                        </div>
                        <div class="field">
                            <label>Confirma tu contraseña</label>
                            <input type="text" name= "confirmarpass" placeholder="">
                        </div>
                    </div>
                </div>
                <br>
                <div class="ui form">
                        <div class="required field">
                            <div class="ui checkbox">
                                <input type="checkbox" tabindex="0" class="hidden">
                                <label>Estoy de acuerdo con los terminos y condiciones</label>
                            </div>
                        </div>
                </div>
                <br>
                <div class="field">
                    <input type="submit" name="enviar" value="Enviar">
                </div>
            </div>
        </div>
      </div>
    </div>
</form>
</body>
</html>
