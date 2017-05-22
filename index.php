<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Red social de mascotas">
    <meta name="author" content="Fluffy">

    <title>Fluffy - ¡La red social de mi mascota!</title>

    <!-- Nucleo de Bootstrap -->
    <link href="indexplugins/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fuentes customizadas -->
    <link href="indexplugins/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin del CSS -->
    <link href="indexplugins/plugin/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- CSS -->
    <link href="indexplugins/css/estiloIndex.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Menu desplegable para mobile -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Abrir el menu</span><i class="fa fa-2x fa-navicon"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><i class="fa fa-paw"></i>&nbsp;&nbsp;FLUFFY</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#registro">&iexcl;Registrarme!</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#acerca">¿Qu&eacute; es Fluffy?</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#ilustraciones">Conoce mas de Fluffy</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#ayuda">Ayuda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!--Sector del login. Usa el header como pantalla de presentación -->
    <header class="bgimg<?php echo rand(1,10) ?>">
        <div class="header-content">
            <div class="header-content-inner">
                <div class="col-sm-7">
                	<h1 id="homeHeading">Fluffy</h1>
                	<h2 id="homeHeading">&iexcl;La red social de mi mascota!</h2>
                </div>
                <div class="col-sm-5 contenedor-login panel panel-default panel-heading" >
                	<form action="procesarUser.php" class="form form-center" method="post">
                		<div class="form-group">
                			<label for="user">Usuario o e-mail:</label><br>
                			<input type="text" class="form-control" name="user"><br>
                		</div>
                		<div class="form-group">
                			<label for="pwd">Contraseña:</label><br>
                			<input type="password" class="form-control" name="pass"><br>
                		</div>
                		<button type="submit" class="btn btn-basic">Ingresar</button>
                		<a href="#registro" class="btn btn-primary btn-md page-scroll">Registrarme</a>
                	</form>
                </div>
            </div>
            <div class="col-sm-12 contenedor-login-botones">
                	<a href="" class="btn btn-danger btn-md google"><i class="fa fa-2x fa-google"></i>  Iniciar con Google</a>
                	<a href="" class="btn btn-primary btn-md facebook"><i class="fa fa-2x fa-facebook-square"></i>   Iniciar con Facebook</a>
            </div>
        </div>
    </header>
<!--Sector del registro-->
    <section class="bg-primary" id="registro">
        <div class="container">
            <div class="row">
            	<div class="col-lg-3 text-center registrotitle">
            		<h2 class="section-heading">&iexcl;Registrarme en Fluffy!</h2>
            		<hr class="light">
                <h4>Registrate ahora en Fluffy, solo te tomará unos segundos y es totalmente gratis.<br></h4>
                <hr class="light">
                <h4>Conoce m&aacute;s sobre Fluffy y como tus mascotas pueden tener su lugar en internet.<br></h4>
                    <a href="#acerca" class="btn btn-default btn-md page-scroll">¿Qu&eacute; es Fluffy?</a>
            	</div>
                <div class="col-lg-4 col-md-offset-1">
                    	<form class="form form-center" action="procesarRegistroUsuario.php" method="post">
                    		<div class="form-group">
                    			<label>Nombre:</label>
                    			<input type="text" class="form-control" name="nombre">
                    		</div>
                    		<div class="form-group">
                    			<label>Apellido:</label>
                    			<input type="text" class="form-control" name="apellido">
                    		</div>
                    		<div class="form-group">
                    			<label>Sexo:</label>
                    			<select name="sexo">
                    				<option value=1>Masculino</option>
                    				<option value=2>Femenino</option>
                    			<select class="form-control" name="sexo">
                            <option value="0">- Seleccione un sexo -</option>
                    				<option value="1">Masculino</option>
                    				<option value="2">Femenino</option>
>>>>>>> 93b4ffa434de938fe9e6bdf4c958252cbb7da5ac
                    			</select>
                    		</div>
                    		<div class="form-group">
                    			<label>Fecha de Nacimiento:</label>
                    			<input type="date" class="form-control" name="fechaNacimiento">
                    		</div>
                    		<div class="form-group">
                    			<label>E-mail:</label>
                    			<input type="text" class="form-control" name="e_mail">
                    		</div>
                    <hr class="light">
                            </div>
                    <div class="col-lg-4">
                    		<div class="form-group">
                    			<label>Crea un usuario:</label>
                    			<input type="text" class="form-control" name="nombreUsuario">
                    		</div>
                    		<div class="form-group">
                    			<label>Crea una contraseña:</label>
                    			<input type="password" class="form-control" name="contrasenia">
                    		</div>
							<div class="form-group">
                    			<label>Repita la contraseña anterior:</label>
                    			<input type="password" class="form-control" name="contrasenia">
                    		</div>
                    		<div class="text-center">
                    			<button type="submit" class="btn btn-default btn-xl sr-button" name="submit">Enviar</button>
                    		</div>
                    </div>
                    	</form>
            </div>
        </div>
    </section>
<!-- Sector de información del sitio. Detalla las utilidades de forma simple-->
    <section id="acerca">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"> En Fluffy... </h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-paw text-primary sr-icons"></i>
                        <h3>...hay un lugar especial para tus mascotas...</h3>
                        <p class="text-muted">Crea perfiles, bitacoras, arma las historias de todas tus mascotas, sube fotos de cada momento y haz que interactue con las mascotas de tus amigos.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-home text-primary sr-icons"></i>
                        <h3>...donde adoptar y dar en adopci&oacute;n...</h3>
                        <p class="text-muted">Muchas personas estan buscando un nueva mascota para cuidar, y si necesitas, tambi&eacute;n puedes encontrar un nuevo hogar para tu mascotas</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-qrcode text-primary sr-icons"></i>
                        <h3>...donde tienes una nueva forma de protegerlas...</h3>
                        <p class="text-muted">Puedes obtener un codigo QR con tu informaci&oacute;n y, en caso de perderse, podr&aacute;n ponerse en contacto rapidamente contigo</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>...y hasta buscales una pareja. </h3>
                        <p class="text-muted">Tenemos un sitio especial donde puedes buscarle la pareja ideal y cruzarlos con la otra mascota que elijan </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ilustraciones de las funciones del sitio -->
    <section class="no-padding" id="ilustraciones">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="indexplugins/img/portfolio/fullsize/1.jpg" class="portfolio-box">
                        <img src="indexplugins/img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    D&iacute;a a d&iacute;a de tus mascotas.
                                </div>
                                <div class="project-name">
                                    Registra cada uno de sus d&iacute;as.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="indexplugins/img/portfolio/fullsize/2.jpg" class="portfolio-box">
                        <img src="indexplugins/img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    &iexcl;No importa el tipo de mascota!
                                </div>
                                <div class="project-name">
                                    Pueden ser perro, gato, conejo, coballo, oveja... &iexcl;hasta tibur&oacute;n!
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="indexplugins/img/portfolio/fullsize/3.jpg" class="portfolio-box">
                        <img src="indexplugins/img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                  &iexcl;Un lugar para todas tus mascotas!
                                </div>
                                <div class="project-name">
                                  Puedes crear tantas bit&aacute;coras como mascotas tengas.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="indexplugins/img/portfolio/fullsize/4.jpg" class="portfolio-box">
                        <img src="indexplugins/img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                  Comparte con tus amigos
                                </div>
                                <div class="project-name">
                                  Puedes ver como est&aacute;n las mascotas de tus amigos, y ellos, ver las tuyas.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="indexplugins/img/portfolio/fullsize/5.jpg" class="portfolio-box">
                        <img src="indexplugins/img/portfolio/thumbnails/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Busca tu mascota en caso de perderse
                                </div>
                                <div class="project-name">
                                    Ofrecemos herramientas para buscar tu mascota perdida, en la ubicaci&oacute;n donde est&eacute;s.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="indexplugins/img/portfolio/fullsize/6.jpg" class="portfolio-box">
                        <img src="indexplugins/img/portfolio/thumbnails/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    &iquest;Quieres que tenga cria? &iexcl;Buscale una pareja!
                                </div>
                                <div class="project-name">
                                    Tu mascota puede encontrar pareja mediante Fluffy.
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
<!-- Despues de la informacion, ofrezco nuevamente loguearse o registrarse-->
    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>&iexcl;Es el momento de empezar en Fluffy!</h2>
                <a href="#page-top" class="btn btn-default btn-xl page-scroll">Ingresar</a>
                <a href="#registro" class="btn btn-primary btn-xl page-scroll">Registrarme</a>
            </div>
        </div>
    </aside>
<!-- -->
    <section id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">&iquest;Tienes alguna duda ?</h2>
                    <hr class="primary">
                    <p>&iexcl;No te preocupes, escribenos! y as&iacute; de esta forma, nos pondremos en contacto contigo lo m&aacute;s r&aacute;pido posible.</p>
                </div>
                <div class="col-lg-12 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:ayuda@fluffy.com">ayuda@fluffy.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="indexplugins/plugin/jquery/jquery.min.js"></script>

    <!-- JS de Bootstrap -->
    <script src="indexplugins/plugin/bootstrap/js/bootstrap.min.js"></script>

    <!-- js de los Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="indexplugins/plugin/scrollreveal/scrollreveal.min.js"></script>
    <script src="indexplugins/plugin/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Codigo de js del index -->
    <script src="indexplugins/js/indexjs.min.js"></script>

</body>

</html>
