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
    <title>Contacto</title>
</head>
<body>
    <div class="ui grid">
        <div class="column">
            <div class="ui segment">
                <h4>¡Dinos en qué podemos ayudarte!</h4>
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
    <!--<h3>Telefono "opcional":</h3> 
    <h3>Fecha del evento:</h3>-->
</body>
</html>