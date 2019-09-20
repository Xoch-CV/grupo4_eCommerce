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
    <title>Login</title>
</head>
<body>
    <div class="ui grid">
        <div class="column">
          <form action="indexLogin.html">
            <div class="ui segment">
                <h4>Ingresa a tu cuenta</h4>
                <!--<div class="two column centered row"></div>-->
                <div class="ui secondary segment">
                    <div class="ui center aligned form">

                        <div class="field">
                            <label>Usuario</label>
                            <input type="email" placeholder="joe@schmoe.com">
                        </div>
                        <div class="field">
                            <label>Contraseña</label>
                            <input type="password" placeholder="">
                        </div>
                        <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" tabindex="0" class="hidden">
                                    <label>Recordar contraseña</label>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <!--<div class="ui submit button">Ingresar</div>-->
                    <input class="ui submit button" type="submit" value="Ingresar">
                </div>
                <br>
                <label>¿Olvidaste tu <a href="">usuario</a> o <a href="">contraseña</a>?</label>
            </div>
           </form>
        </div>
    </div>
</body>
</html>