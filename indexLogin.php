<?php
session_start();
include('functions.php');
is_remembered();
$claseperfil='d-none';
$claselogout='';
$perfil='';

if(isset($_SESSION['user'])){
  $claseperfil='';
  $claselogout='d-none';
  $perfil=$_SESSION['user']['nombre'];
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

    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <nav class="navbar">
      <ul class="leftnavbar">
        <li><a href="index.html">Inicio</a></li>
        <p> | </p>
        <li><a href="Preguntas_frec.html">F.A.Q.</a></li>
        <p> | </p>
        <li><a href="Contacto.html">Contacto</a></li>
      </ul>
      <ul class="rightnavbarlogin">

        <div class="<?=$claseperfil?>">
        <li><img src="img/avatar.jpg" width = 50 height = 50 alt="avatar"><br>Hola <?=$perfil?>!
        <a href="Logout.php">Cerrar Sesión </a></li>
        </div>

        <div class="<?=$claselogout?>">
        <li class="logout"><a href="Registro.php">Registro</a></li>
        <p class="logout"> | </p>
        <li class="logout"><a href="Loginform.php">Ingreso</a></li>
        </div>

      </ul>
    </nav>

    <container class="container-flex">

      <main>
            <ul class="principal row">
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-compact-disc fa-4x iconos"></i><h3>conciertos</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-film fa-4x iconos"></i><h3>cine</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-theater-masks fa-4x iconos"></i><h3>teatro</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-palette fa-4x iconos"></i><h3>espectáculos</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-futbol fa-4x iconos"></i><h3>deportes</h3></a></li>
              <li class="col-6 col-sm-6 col-md-4 col-lg-2"><a href="#"><i class="fas fa-hamburger fa-4x iconos"></i><h3>gastronomía</h3></a></li>
            </ul>
            <div class="searchbar">
              <form class="form-inline">
                <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>

      </main>


      <hr>

      <section id="events" class="highligths-events">
          <h2>eventos destacados</h2>
          <div class="row" >
            <div class="col-sm-6 col-md-8 col-lg-6">

              <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="img/metallica2017.jpg" class="d-block w-100" alt="Metallica">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="img/metallica2017.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="img/metallica2017.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>

            </div>
          </div>

      </section>
      <section class="promo-btn">
        <div class="row">
          <div class="col-sm-6 col-md-8 col-lg-6">
            <button type="button" class="btn btn-lg btn-block">mirá todas las promos</button>
          </div>
        </div>
      </section>

      <footer>
        <nav class="navbar">
          <ul class="leftnavbar">
            <li><a href="index.html">Inicio</a></li>
            <p> | </p>
            <li><a href="Preguntas_frec.html">F.A.Q.</a></li>
            <p> | </p>
            <li><a href="Contacto.html">Contacto</a></li>
          </ul>
        </nav>
      </footer>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
