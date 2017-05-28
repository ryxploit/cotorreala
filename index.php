<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cotorreala</title>

    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.scss">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" href="css/flexslider.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>


<div class="col s12 m11 l11 container titulo ">
    <div class="section ">
        <div class="row col 12">
        	<div class="col s6">
        		<img class="logo" src="img/cotorreala-logo.png" alt="">
        	</div>
        	<div class="col s6 wrapper socialiconos">
        		  <div href="www.facebook.com" class="social">&#62220;</div>
				  <div class="social">&#62217;</div>
				  <div class="social">&#62223;</div>
				  <div class="social">&#62232;</div>
        	</div>
        </div>
    </div>
</div>

<div class="carousel">
    <?php
    $ruta = "uploads/"; // Indicar ruta
    $filehandle = opendir($ruta); // Abrir archivos
    while ($file = readdir($filehandle)) {
    if ($file != "." && $file != "..") {
    $tamanyo = GetImageSize($ruta . $file);
    ?>
    <a class="carousel-item" href="#one!"><img src="<?php echo $ruta.$file ?>"></a>
        <?php
    }
    }
    closedir($filehandle); // Fin lectura archivos
    ?>
  </div>

<!--<div class="carousel carousel-slider">
    <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/800/400/food/1"></a>
    <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/800/400/food/2"></a>
    <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/800/400/food/3"></a>
    <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/800/400/food/4"></a>
  </div>-->

<div class="row container col s12 fiestas">
    <div class="col s12 m4 peda">
        <div class="card hoverable">
            <div class="card-image">
                <img src="img/Fiesta%20o%20reunion%20social.jpg">
                <span class="card-title">Fiesta o reunion social</span>
            </div>
            <div class="card-content">
                <p> Es una reunión de personas para celebrar un acontecimiento o divertirse.
                     Por lo general, suele acompañarse de comida y bebida, y a menudo también de música y baile.</p>
            </div>
        </div>
    </div>

    <div class="col s12 m4">
        <div class="card hoverable">
            <div class="card-image">
                <img src="img/Acampado,viaje%20o%20retiro.jpg">
                <span class="card-title">Acampado,viaje o retiro</span>
            </div>
            <div class="card-content">
                <p>Es un momento de máximo festejo, purificación y respeto a la creación.
                    Ya has sembrado,trabajado mucho en todos tus proyectos, ahora celebra, confia y prepárate.</p>
            </div>
        </div>
    </div>

    <div class="col s12 m4">
        <div class="card hoverable">
            <div class="card-image">
                <img src="img/Juego%20o%20competicion.jpg">
                <span class="card-title">Juego o competicion</span>
            </div>
            <div class="card-content">
                <p> Es una disposición en la práctica de un juego o actividad con la que se evalúa la competencia de los participantes.
                    Se suele obtener como resultado ganadores. </p>
            </div>
        </div>
    </div>

</div>


<div class="fixed-action-btn horizontal menu">
    <a class="btn-floating btn-large black pulse">
        <i class="large material-icons">menu</i>
    </a>
    <ul>
        <li><a href="#modal3" class="btn-floating yellow darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Developers"><i class="material-icons">code</i></a></li>
        <li><a href="#modal4" class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Acerca de.."><i class="material-icons">info</i></a></li>
        <li><a href="#modal1" class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="login"><i class="material-icons"  >perm_identity</i></a></li>
    </ul>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal tamaño">
    <div class="modal-content">
        <h4>Iniciar sesion</h4>
        <form class="col s8 m8" action="php/validadorLogin.php" method="post" id="formulario">
        <div class="row">
                <div class="row">
                    <div class="input-field col s12 m12">
                        <input id="email" type="email" class="validate" name="email" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12">
                        <input id="password" type="password" class="validate" name="pw" required>
                        <label for="password">Password</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
    	<input type="submit" value="Entrar" form="formulario" class="waves-effect waves-green btn uno">
        <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat dos">Cancelar</a>
        <a href="#modal2" class="modal-action modal-close waves-effect waves-green btn tres">Registrar</a>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>REGISTRO</h4>
        <div class="container">
            <div class="row formulario">
                <form class="col s12" method="post" action="php/registro.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input placeholder="Nombre" id="first_name" type="text" class="validate" name="nombre" required>
                            <label for="first_name">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">info</i>
                            <input  id="last_name" type="text" class="validate" name="apellidos" required>
                            <label for="last_name">Apellidos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate" name="correo" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">today</i>
                            <input  id="fecha_nac" type="date" class="validate" name="fecha_nacimiento" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat cuatro">Cancelar</a>
                        <button class="btn waves-effect waves-green registrar cinco" type="submit" name="action">Registrar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>


<!-- Modal Structure -->
<div id="modal3" class="modal tamaño">
    <div class="modal-content">
        <h4>DEVELOPERS</h4>
        <p align="center">Mario Labrador Avila</p>
        <p align="center">Juan Carlos Leon Salcido</p>
     </div>
    <div class="modal-footer">
        <a href="#!" class="right modal-action modal-close waves-effect waves-light btn-flat dos">Salir</a>
    </div>
</div>


<!-- Modal Structure -->
<div id="modal4" class="modal ">
    <div class="modal-content">
        <h4>ACERCA DE NOSOTROS</h4>
        <p>Somos una empresa intrépida al momento de imaginar, excitante al momento de materializar y de sonrisa afable al momento de negociar. Somos una organización integrada por profesionales, entregados y entrenados en la planeación, coordinación y organización Integral de todo tipo de eventos a nivel nacional e internacional. Buscamos día a día posicionarnos en el mercado como una organización reconocida por el valor agregado que aportamos a nuestros clientes, proveedores y partners, ayudándoles a alcanzar sus metas de negocio brindando servicios y soluciones innovadoras. Imaginamos y materializamos momentos que desencadenen emociones, acorde a los objetivos económicos, sociales, culturales y políticos de organizaciones tanto privadas como públicas, poniendo a disposición nuestra poderosa mezcla de tecnología y un excelente servicio.
</p>
     </div>
    <div class="modal-footer">
        <a href="#!" class="right modal-action modal-close waves-effect waves-light btn-flat dos">Salir</a>
    </div>
</div>

 <footer class="page-footer">

          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Cotorreadas
            <a class="grey-text text-lighten-4 right" href="#!">Mario Labrador Avila | Juan Carlos Leon Salcido Joto</a>
            </div>
          </div>
 </footer>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/materialize	.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script>

    $('.logo').addClass('animated bounceInDown ');
    $('.menu').addClass('animated bounceInDown ');
    $('.fiestas').addClass('animated swing');
	  

    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
         $(document).ready(function(){
      $('.carousel').carousel();
    });
        

        

    });
</script>



    </body>

</html>