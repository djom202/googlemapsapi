<?php include('../clases/config.php'); ?><!DOCTYPE html>
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

	<link href="../theme/css/altiviaot.min.css" rel="stylesheet">
	<style type="text/css">
		body { padding-top: 60px; padding-bottom: 40px; }
		#google_maps { height: 15em; width: 100% !important; }
		#login, #login:hover{ text-decoration: none; }
	</style>
	<link href="../theme/css/altiviaot-responsive.min.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="../theme/js/html5shiv.js"></script>
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
						<li class="active"><a href="./../">Home</a></li>
					</ul>
					<p class="navbar-text pull-right"><i class="icon-user"></i><a id="login" data-toggle="modal" href="#myModal">Login</a></p>
				</div>
			</div>
		</div>
	</div>

	<div id="myModal" class="hide modal">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>Iniciar Session</h3>
		</div>
		<div class="modal-body">
			<form id="FormSeccion" class="form-signin" method="post" action="clases/seccion.php">
	            <input id="UserSeccion" type="text" class="input-block-level" placeholder="User" maxlength="8" required="required" value="djom202">
	            <input id="PasswordSeccion" type="password" class="input-block-level" placeholder="Password" maxlength="30" required="required" value="123456">
	            <label class="checkbox">
	                <input type="checkbox" value="remember-me"> Remember me
	                <br>
	            </label>
	        </form>
	        <div id="successSeccion" class="alert alert-success hide">
	            <a class="close" data-dismiss="alert">&times;</a>
	            <p id="successSeccionText" class="text-center">error</p>
	        </div>
	        <br>
	        <div id="errorSeccion" class="alert alert-error hide">
	            <a class="close" data-dismiss="alert">&times;</a>
	            <p id="errorSeccionText">error</p>
	        </div>
		</div>
		<div class="modal-footer">
			<button id="FormSeccion_Submit" class="btn btn-primary" type="submit">Iniciar Session</button>
			<button class="btn" data-dismiss="modal" type="button">Close</button>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<div class="well sidebar-nav">
					<div class="form-search">
						<div class="input-append">
							<input id="address" type="text" class="span10 search-query" placeholder="Nombre del Hospital" maxlength="100" value="Nueva EPS">
							<button id="search" type="submit" class="btn btn-info"><i class="icon-search"></i></button>
						</div>
					</div>
				</div>
				<hr>
				<footer>
					<p>&copy; <a href="http://altiviaot.com/">AltiviaOT</a> 2012</p>
				</footer>
			</div>
			<div class="span9">
				<div class="well">
					<h3>Registro de Usuario</h3>
					<br>
					<form id="FormRegistro" action="registro.php" method="post">
						<fieldset><label for="">Cedula:</label><input id="regCed" placeholder="Cedula" type="text" name="ced" value="1140820188"></fieldset>
						<fieldset><label for="">Nombre:</label><input id="regNom" placeholder="Nombre" type="text" name="nom" value="Jonathan"></fieldset>
						<fieldset><label for="">Apellido:</label><input id="regApe" placeholder="Apellido" type="text" name="ape" value="Olier"></fieldset>
						<fieldset><label for="">E-Mail:</label><input id="regMail" placeholder="E-Mail" type="text" name="mail" value="djom202@gmail.com"></fieldset>
						<fieldset><label for="">Usuario:</label><input id="regUser" placeholder="Usuario" type="text" name="user" value="djom202"></fieldset>
						<fieldset><label for="">Password:</label><input id="regPass" placeholder="Password" type="Password" name="pass" value="teamomiyale"></fieldset>
						<input id="FormRegistro_Submit" type="button" value="Submit" class="btn btn-info">
					</form>
					<div id="successRegistro" class="alert alert-success hide">
			            <a class="close" data-dismiss="alert">&times;</a>
			            <p id="successRegistroText">error</p>
			        </div>
			        <br>
			        <div id="errorRegistro" class="alert alert-error hide">
			            <a class="close" data-dismiss="alert">&times;</a>
			            <p id="errorRegistroText">error</p>
			        </div>
				</div>
			</div>
		</div>
	</div>

	<script src="../theme/js/jquery.min.js"></script>
	<script src="../theme/js/bootstrap-alert.js"></script>
	<script src="../theme/js/bootstrap-modal.js"></script>
	<script type="text/javascript">
		$("#FormRegistro_Submit").click(function (e){
        	var parametros = {
                "cedula" : $("#regCed").val(),
                "nombre" : $("#regNom").val(),
                "apellido" : $("#regApe").val(),
                "mail" : $("#regMail").val(),
                "user" : $("#regUser").val(),
                "pass" : $('#regPass').val()
            };

            $.ajax({
                data:  parametros,
                url:   '../clases/registro.php',
                type:  'post',
                dataType: 'json',
                beforeSend: function(){ $("#respuesta").html("Cargando..."); },
                success: function(response){
                	$("#successRegistro").removeClass('hide');
                	$("#successRegistroText").html(response);
                	limpiaForm('#FormRegistro');
                },
                error: function(response){
                	$("#errorRegistro").removeClass('hide');
                	$("#errorRegistroText").html('Error al Registrar el Usuario.');
                }
            });
        });

        function limpiaForm(miForm) {
       		$(':input', miForm).each(function() {
       			var type = this.type;
       			if (type == 'text' || type == 'password'){ this.value = "";	}
           	});
        }
	</script>
</body>
</html>