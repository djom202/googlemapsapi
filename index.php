<?php include('clases/config.php'); ?><!DOCTYPE html>
<html lang="es-CO">
<head>
	<meta charset="utf-8">
	<title>Lab Pasteur</title>
	<meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="googlebot" content="index,follow"/>
    <meta name="author" content="Ing. Jonathan Olier Miranda"/>
    <meta name="copyright" content="Todos los derechos reservados por AltiviaOT.com"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="theme/css/altiviaot.min.css" rel="stylesheet">
	<style type="text/css">
		body { padding-top: 60px; padding-bottom: 40px; }
		#google_maps { height: 25em; width: 100% !important; }
		.linker, .linker:hover{ text-decoration: none; }
	</style>
	<link href="theme/css/altiviaot-responsive.min.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="theme/js/html5shiv.js"></script>
	<![endif]-->

	<link rel="shortcut icon" href="../theme/ico/fav.ico">
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Pasteur</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="./">Home</a></li>
					</ul>
					<p id="UserSession" class="navbar-text pull-right">
						<?php
							if(!isset($_SESSION['user_id'])){
								echo '<a class="linker" role="button" data-toggle="modal" href="#myModal"><i class="icon-user"></i> Login</a>';
							}else{
								echo '<i class="icon-user"></i> '.$_SESSION['user_name'];
								echo ' <a class="linker" href="users/closeSession.php"><i class="icon-off"></i> Salir</a>';
							}
						?>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
			<h3>Iniciar Session</h3>
		</div>
		<div class="modal-body">
			<form id="FormSeccion" class="form-signin" method="post" action="seccion.php">
	            <input id="UserSeccion" type="text" class="input-block-level" placeholder="User" maxlength="8" required="required" value="djom202">
	            <input id="PasswordSeccion" type="password" class="input-block-level" placeholder="Password" maxlength="30" required="required" value="teamomiyale">
	            <label class="checkbox">
	                <input type="checkbox" value="remember-me"> Remember me
	                <br>
	            </label>
	            <div class="text-center">
	            	<a href="users/registro.php" class="btn btn-info"><i class="icon-edit icon-white"></i> Registrarse</a>
	            </div>
	        </form>
	        <div id="successSeccion" class="alert alert-success hide">
	            <a class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
	            <p id="successSeccionText" class="text-center">error</p>
	        </div>
	        <br>
	        <div id="errorSeccion" class="alert alert-error hide">
	            <a class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
	            <p id="errorSeccionText">error</p>
	        </div>
		</div>
		<div class="modal-footer">
			<button id="FormSeccion_Submit" class="btn btn-primary" type="submit">Iniciar Session</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true" type="button">Close</button>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<div id="searchBar" class="well sidebar-nav">
					<div class="form-search">
						<div class="input-append">
							<input id="address" type="text" class="span10 search-query" placeholder="Nombre del Hospital" maxlength="100" value="Nueva EPS">
							<button id="search" type="submit" class="btn btn-info"><i class="icon-search"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="span9">
				<div id="google_maps" class="row-fluid"></div><br>
				<!-- <iframe src="https://developers.google.com/maps/location-based-apps_de11b5698ab79929651475da9e2b26ce.frame?hl=es" class="framebox" style="height: 26em;width: 100%;">&lt;p&gt;[Para esta sección, es necesario un navegador compatible con iframes].&lt;/p&gt;</iframe> -->
				<div class="row-fluid">
					<div class="span4">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						<p><a class="btn" href="#">View details &raquo;</a></p>
					</div>
					<div class="span4">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						<p><a class="btn" href="#">View details &raquo;</a></p>
					</div>
					<div class="span4">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						<p><a class="btn" href="#">View details &raquo;</a></p>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span4">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						<p><a class="btn" href="#">View details &raquo;</a></p>
					</div>
					<div class="span4">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						<p><a class="btn" href="#">View details &raquo;</a></p>
					</div>
					<div class="span4">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						<p><a class="btn" href="#">View details &raquo;</a></p>
					</div>
			  	</div>
			</div>
		</div>
	  	<hr>
		<footer>
			<p>&copy; <a href="http://altiviaot.com/">AltiviaOT</a> 2012</p>
		</footer>
	</div>

	<script src="theme/js/jquery.min.js"></script>
	<script src="theme/js/bootstrap-alert.js"></script>
	<script src="theme/js/bootstrap-modal.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/place/details/json?key=AIzaSyDA8hI06MvNVF78jSpxPiFArsSIljdOpp8&reference=&sensor=false&language=es&types=hospital"></script> -->
	<script type="text/javascript">
		$(document).ready(function(){
			Googlemaps();
		});

		var map;
		var n=1;

		function Googlemaps() {
		    var barranquilla = new google.maps.LatLng(10.97989,-74.80639); //20.68009, -101.35403
		    var myOptions = {
		        zoom: 12,
		        center: barranquilla,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map($("#google_maps").get(0), myOptions);
		}

		$('#search').click(function() {
			n=1;
		    // Obtenemos la dirección y la asignamos a una variable
		    // lo concatenamos con la ubicacion por defecto a donde debe buscar
		    var address = $('#address').val() + ', Barranquilla, Atlántico, Colombia';
		    // Creamos el Objeto Geocoder
		    var geocoder = new google.maps.Geocoder();
		    // Hacemos la petición indicando la dirección e invocamos la función
		    // geocodeResult enviando todo el resultado obtenido
		    geocoder.geocode({ 'address': address }, geocodeResult);
		});

		function geocodeResult(results, status) {
		    // Verificamos el estatus
		    if (status == 'OK') {
	        	// Si hay resultados encontrados, centramos y repintamos el mapa
	        	// ademas para eliminar cualquier pin antes puesto
		        var mapOptions = {
		        	zoom: 14,
		            center: results[0].geometry.location,
		            mapTypeId: google.maps.MapTypeId.ROADMAP
		        };
			    map = new google.maps.Map($("#google_maps").get(0), mapOptions);


		        for(var i in results){
			        // Dibujamos un marcador con la ubicación del primer resultado obtenido
			        var markerOptions = {
			        	map: map,
			        	animation: google.maps.Animation.BOUNCE,
			        	title: results[i].address_components[0].short_name + ' (' + results[i].address_components[1].short_name + ')',
			        	position: results[i].geometry.location,
	            		icon: 'http://gmaps-samples.googlecode.com/svn/trunk/markers/red/marker' + n++ + '.png'
			        }
			        var marker = new google.maps.Marker(markerOptions);
			        marker.setMap(map);
			    }
		    } else {
		        // En caso de no haber resultados o que haya ocurrido un error
		        // lanzamos un mensaje con el error
		        alert("Google Maps no encontro resultados.");
		    }
		}
	</script>
	<script type="text/javascript">
		$("#FormSeccion_Submit").click(function (e){
        	var parametros = {
                "user" : $("#UserSeccion").attr('value'),
                "pass" : $('#PasswordSeccion').attr('value')
            };

            $.ajax({
                data:  parametros,
                url:   'clases/session.php',
                type:  'post',
                dataType: 'json',
                beforeSend: function(){ $("#respuesta").html("Cargando..."); },
                success: function(response){
                	$("#successSeccion").removeClass('hide');
                	$("#successSeccionText").html('Bienvenido Sr(a).' + response);
                	limpiaForm('#FormSeccion');

                	$('#UserSession').html('<i class="icon-user"></i> ' + response + ' <a class="linker" href="users/closeSession.php"><i class="icon-off"></i> Salir</a>');
                },
                error: function(response){
                	$("#errorSeccion").removeClass('hide');
                	$("#errorSeccionText").html('Error al Iniciar Session.');
                }
            });
        });

        function limpiaForm(miForm) {
       		$(':input', miForm).each(function(){
       			var type = this.type;
       			if (type == 'text' || type == 'password'){ this.value = "";	}
           	});
        }
	</script>
</body>
</html>