<!DOCTYPE html>

<?php
session_start();
extract($_GET);

require_once 'conexion.php';
$query = "SELECT * FROM `eventos` e JOIN `tipo_evento` t ON e.id_tipo = t.id WHERE  ide=$id ";
$res = $connect->query($query);
while ($row = mysqli_fetch_array($res)){
    $id=$row[idevento];
    $fecha_inicio=$row[fecha_inicio];
    $fecha_fin=$row[fecha_fin];
    $hora_inicio=$row[hora_inicio];
    $hora_fin=$row[hora_fin];
    $tipo_evento=$row[tipo];
    $img=$row[imagen];
    $nombre=$row[nombre];
    $descripcion=$row[descripcion];
    $ubicacion=$row[ubicacion];
    $titulo=$row[titulo];
}

?>



<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Evento</title>
	
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link rel="stylesheet" href="../css/creaEvento.css">
    <link rel="stylesheet" href="../css/maps.css">
    <link rel="stylesheet" href="../fonts/iconfont/material-icons.css">
	
</head>
<body class="#e8f5e9 green lighten-5" onKeyDown="javascript:Verificar()">

<script>
    var cuenta=0;
    function enviado() {
        if (cuenta == 0) {
            cuenta++;
            return true;
        } else {
            return false;
        }
    }
</script>

<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper #00695c teal darken-3">
            <a href="#" class="brand-logo center"><?php echo $titulo ?></a>
        </div>
    </nav>
</div>

<div class="parallax-container">
    <div class="parallax responsive-img"><img  src="<?php echo $img ?>"></div>
</div>

<div class="col s6">
    <h3 class="center-align" for="">UBICACIÓN</h3>
    <h5 class="center-align"><?php echo $ubicacion ?></h5>
    <div class="divider"></div>

</div>
<input value="<?php echo $ubicacion ?>" id="pac-input" class="controls" type="text" placeholder="Search Box">
<div id="map"></div>
<script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRm7KdFTVfejn3izcoT2f9MVLASksORR0&libraries=places&callback=initAutocomplete"
        async defer></script>



	<div class="container">
		<div class="col s12 m7">
		    <div class="card horizontal">
		      <div class="card-image">
		        <img src="<?php echo $img ?>">
		      </div>
		      <div class="card-stacked">
		        <div class="card-content">
                    <h5 class="" for="">FECHA Y HORA</h5><br>
                    <strong>Inicio</strong>
                    <p><?php echo $fecha_inicio , '   ', $hora_inicio  ?></p>
                    <br>
                    <br>
                    <strong>Fin</strong>
                    <p><?php echo $fecha_fin,'   ' , $hora_fin ?></p>
                    <br>
                    <br>
                    <h5 class="center-aling">Asistir</h5>
                    <div id="fb-login"  class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="continue_with"
                         data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="false"  scope="public_profile,email" onlogin="checkLoginState();"></div>

                    <form action="asistentes.php" method="post" name="f1" id="f1" style="display: none;" onsubmit="return enviado()">

                        <input type="hidden" id="nombre" name="nombre" value="">

                        <input type="hidden" id="email" name="email" value="">

                        <input type="submit" name="asis" id="registrarse" value="enviar participacion" class="waves-effect waves-light btn">

                    </form>
                    <?php
                    require("conexion.php");



                    if (isset($_POST[asis])) {
                        $nombre = $_POST['nombre'];
                        $email = $_POST['email'];

                        $query = " INSERT INTO  `asistentes`(`nombre_completo`,`email`)VALUES ('$nombre','$email')";

                        $resultado = $connect->query($query) || die("Ha ocurrido un error al guardar los datos");
                        if ($resultado) {
                            echo "<script> alert('Felicidades a quedado registrado') </script>";
                            echo "<script>  document.getElementById('registrarse').disabled=true; </script>";
                        } else {
                            echo "<script> alert('Ha ocurrido un error') </script>";
                        }
                    }
                    ?>
		        </div>
		      </div>
		    </div>
  		</div>

        <script>

            // This is called with the results from from FB.getLoginStatus().
            function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                console.log(response);
                // The response object is returned with a status field that lets the
                // app know the current login status of the person.
                // Full docs on the response object can be found in the documentation
                // for FB.getLoginStatus().
                if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                    // location.href='../index.php'
                    testAPI();

                    document.getElementById("fb-login").style.display="none";
                    document.getElementById("f1").style.display="block";
                } else {
                    // The person is not logged into your app or we are unable to tell.
                    document.getElementById("f1").style.display="none";

                }
            }

            // This function is called when someone finishes with the Login
            // Button.  See the onlogin handler attached to it in the sample
            // code below.
            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '293513957727263',
                    xfbml      : true,
                    version    : 'v2.9'
                });
                FB.AppEvents.logPageView();

                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function testAPI() {

                FB.api('/me?fields=id,name,email,permissions', function(response) {
                    console.log('Successful login for: ' + response.name);
                    document.f1.nombre.value = response.name;
                    document.f1.email.value = response.email;

                    // location.href='../index.php'
                });

            }
        </script>


		<div class="section white col m12">
			<div class="row">
		      <div class="col s12">
		      <h2 class="center-align" for=""><strong>DESCRIPCIÓN</strong> </h2>
		        <h5 class="center-align"><?php echo $descripcion ?></h5>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col s5"></div>

		      <div class="col s1"></div>
		    </div>

			<div class="container">
				<hr>
			</div>

		    <br>

		    <div>

    			<p class="center-align"><?php echo $titulo ?></p>
    			<p class="center-align">en</p>
    			
    			<p class="center-align"><?php echo $ubicacion ?></p>
    			

    		</div>



	</div>



	 <script>
      window.fbAsyncInit = function() {
          FB.init({
              appId      : '293513957727263',
              xfbml      : true,
              version    : 'v2.9'
          });
          FB.AppEvents.logPageView();
      };

      (function(d, s, id){
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
  </script>

  <div
          class="fb-like"
          data-share="true"
          data-width="450"
          data-show-faces="true">
  </div>

	



	
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/materialize.min.js"></script>

	<script>

		    $(document).ready(function(){
		        $('.datepicken').pickadate();
		    });

		    $(document).ready(function(){
		      $('.parallax').parallax();
		    });



            $(document).ready(function() {
                $("form").submit(function(){
                    if ($("body").hasClass('sendingForm')) {
                        return false;
                    }
                    $("body").addClass('sendingForm');
                    $(this).find("input:submit").css({visibility: "hidden"});
                    $(this).find("input:button").css({visibility: "hidden"});
                    $(this).find("a").css({visibility: "hidden"});
                    $(this).find("input:submit").parent().append("Enviando...");
                    return true;
                })
            });


	</script>
</body>
</html>