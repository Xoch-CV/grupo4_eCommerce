<?php
session_start();
include('functions.php');
is_remembered();

$claseperfil='d-none';
$claselogout='';
$perfil='';
$foto='files/Avatar.jpg';

if(isset($_SESSION['user'])){
  $claseperfil='';
  $claselogout='d-none';
  $perfil=$_SESSION['user']['nombre'];
  $foto=$_SESSION['user']['foto'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Semantic_ui/project/semantic/dist/semantic.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleform.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,900&display=swap" rel="stylesheet">
    <title>Contacto</title>
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
        <div id="login" class="<?=$claseperfil?>">
        <li class="nav-item2 dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hola <?=$perfil?>!</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="Perfil.php">Ir a mi perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="Logout.php">Cerrar sesión</a>
          </div>
        </li>
        <li class="nav-link"><img src="<?=$foto?>" alt="avatar"></li>
        </div>
        <div id="login" class="<?=$claselogout?>">
        <li class="nav-item">
          <a class="nav-link" href="Loginform.php">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Registro.php">sign up</a>
        </li>
      </div>
      </ul>
    </div>
  </nav>
    <div class="ui center aligned grid">
        <div class="column">
            <div class="ui segment">
                <h4 id="sem">¡Dinos en qué podemos ayudarte!</h4>
                <div class="ui secondary segment">
                    <div class="ui form">
                        <div class="field">
                            <div class="field">
                                <label>Nombre</label>
                                <input type="text" placeholder="Nombre completo">
                            </div>
                            <div class="field">
                                <label>Correo electrónico</label>
                                <input type="email" placeholder="joe@schmoe.com">
                            </div>
                            <div class="field">
                                    <label>Nombre del evento</label>
                                        <input type="text" placeholder="Evento">
                            </div>
                            <label>Asunto</label>
                            <div class="ui selection dropdown">
                            <input type="hidden" name="Asunto">
                                <i class="dropdown icon"></i>
                                <div class="default text">Asunto</div>
                                <div class="menu">
                                        <div class="item" data-value="compraTicket">Compra Ticket</div>
                                        <div class="item" data-value="medioPago">Medio de Pago</div>
                                        <div class="item" data-value="marchandising">Producto</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                                <label>Dejanos tu consulta</label>
                                <textarea></textarea>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="ui submit button">Enviar</div>
                </div>
            </div>
        </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous">
    </script>
    <script src="Semantic_ui/project/semantic/dist/semantic.min.js"></script>
</body>
</html>
