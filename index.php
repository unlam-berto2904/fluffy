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
                    <span class="sr-only">Abrir el menu</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">FLUFFY</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#registro">&iexcl;Registrarme!</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#acerca">Acerca de Fluffy</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bgimg<?php echo rand(1,5) ?>">
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

    <section class="bg-primary" id="registro">
        <div class="container">
            <div class="row">
            	<div class="col-lg-3 text-center registrotitle">
            		<h2 class="section-heading">&iexcl;Registrarme en Fluffy!</h2>
            		<hr class="light">
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

    <section id="acerca">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"> En Fluffy </h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="acerca-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="indexplugins/img/portfolio/fullsize/1.jpg" class="portfolio-box">
                        <img src="indexplugins/img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
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
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
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
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
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
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
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
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
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
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="http://startbootstrap.com/template-overviews/creative/" class="btn btn-default btn-xl sr-button">Download Now!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
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
