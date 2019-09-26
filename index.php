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
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
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
    <main>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Primer slide -->
          <div class="carousel-item active">
            <img src="img/la-odisea-de-los-giles.jpg" alt="">
            <div class="carousel-caption">
              <h2>La Odisea de los Giles</h2>
              <p class="lead">Se metieron con los perdedores equivocados.</p>
            </div>
          </div>
          <!-- Segundo slide -->
          <div class="carousel-item">
            <img src="img/messi-cirque-du-soleil.png" alt="">
            <div class="carousel-caption">
              <h2>Messi 10</h2>
              <p class="lead">El nuevo espectáculo de Cirque du Soleil.</p>
            </div>
          </div>
          <!-- Tercer slide -->
          <div class="carousel-item">
            <img src="img/metallica2017.jpg" alt="">
            <div class="carousel-caption">
              <h2>Metallica</h2>
              <p class="lead">18 de abril. Campo Argentino de Polo.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>
        <div class="container">

          <div class="inputWithIcon">
            <input type="text" name="" value="" placeholder="Buscar evento">
            <i class="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
          </div>

        </div>

        <div class="row">
          <div class="col-lg-1">
          </div>
          <div class="col-lg-10">
            <ul class="row principal">
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-compact-disc fa-4x iconos"></i><h3>conciertos</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-film fa-4x iconos"></i><h3>cine</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-theater-masks fa-4x iconos"></i><h3>shows</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-palette fa-4x iconos"></i><h3>muestras</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-futbol fa-4x iconos"></i><h3>deportes</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-hamburger fa-4x iconos"></i><h3>gastronomía</h3></a></li>
            </ul>
          </div>
        </div>
    </main>
    <section>
      <div class="divisor col-6 col-lg-2">
      </div>
      <h4>Recomendados</h4>
      <div class="row">
        <div class="cards col-12">

          <div class="col-6 col-lg-2">
            <img src="img/puro-disenio.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Feria Puro Diseño</h5>
              <a href="#" class="btn-cards">Ver más</a>
            </div>
          </div>

          <div class="col-6 col-lg-2">
            <img src="img/elmato.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">El Mató a un Policía Motorizado</h5>
              <a href="#" class="btn-cards">Ver más</a>
            </div>
          </div>

          <div class="col-6 col-lg-2">
            <img src="img/motogp.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Moto GP</h5>
              <a href="#" class="btn-cards">Ver más</a>
            </div>
          </div>

          <div class="col-6 col-lg-2">
            <img src="img/volar.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Enrique piñeyro</h5>
              <a href="#" class="btn-cards">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-4">
          <h1>T<span class="iso">!</span>CKET</h1>
          <p>© T!CKET | Todos los derechos reservados.</p>
        </div>

        <div class="col-4">
          <ul class="footer">
            <li>
              <a href="index.php">Inicio</a>
            </li>
            <li>
              <a href="Preguntas_frec.php">f.a.q.</a>
            </li>
            <li>
              <a href="Contacto.php">Contacto</a>
            </li>
            <li>
              <a href="Loginform.php">log in</a>
            </li>
            <li>
              <a href="Registro.php">sign up</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
