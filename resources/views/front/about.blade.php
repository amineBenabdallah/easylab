<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="stylesheet" href="{{ URL::asset('bootstrap/dist/css/bootstrap.min.css') }}">
		<title>About : Science Labs</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        
		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div class="site-content">
			<header class="site-header" data-bg-image="">
				<div class="container">
					<div class="header-bar">
						<a href="/" class="branding">
							<img src="{{ URL::asset('images/'.$labo->logo) }}" alt="" class="logo">
							<div class="logo-type">
								<h1 class="site-title">{{$labo->nom}}</h1>
								<small class="site-description">Laboratoire de recherche d'informatique</small>
							</div>
						</a>

						<nav class="main-navigation">
							<button class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item"><a href="/">Home</a></li>
								<li class="menu-item"><a href="/news">Actualité</a></li>
								<li class="menu-item current-menu-item"><a href="/about">About</a></li>
								<li class="menu-item"><a href="/teams">Teams</a></li>
								<li class="menu-item"><a href="/projects">Our Projects</a></li>
							    <li class="menu-item"><a href="/articlesFront">Articles</a></li>
								<li class="menu-item"><a href="/contact">Contact</a></li>
								<li class="menu-item"><a href="/login">Login</a></li>
							</ul>
						</nav>

						<div class="mobile-navigation"></div>
					</div>
				</div>
			</header>

			<div class="page-head" data-bg-image="{{ URL::asset('images/cl.jpg') }}">
				<div class="container">
					<h2 class="page-title">About us</h2>
					<small>Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen</small>
				</div>
			</div>

			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h2 class="section-title">Presentation</h2>
								<ol class="circle">
									<li>
										Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications, ainsi qu'à la mise en oeuvre et la validation des solutions au travers de partenariats académiques comme le département de Mathématique et de Physique Electronique.
										Les axes fédérateurs sont :
										Sûreté, sécurité, fiabilité ;
										Science des données, intelligence et optimisation ; 
										Systèmes communicants.
										Le LRI répond à ces challenges à différents niveaux thématiques au sein des 3 départements. 
									</li>
									<li>
										et multidisciplinaire. Le LRI est composé de 33 chercheurs, 1 ingénieur et 1 secrétaire. Il accueille plus d'une dizaine de doctorants, près d'une trentaine de MA, 4MC et un professeur. La recherche est organisée en quatre équipes regroupées en plusieures thématiques : Systèmes Intelligents, Données et Apprentissage Artificiel, Réseaux et Systèmes,  Modélisation et Optimisation, Web sémantique. 
                                        La production scientifique est en moyenne d'une vintaine de publications par an.

									</li>
									<li>
										La coopération internationale est une nécessité pour notre laboratoire Il entretient des relations suivies avec des universités françaises et tunisiennes. En complément de la recherche académique, le LRI a une récente coopération avec le monde industriel et des partenaires socio économiques. 
										Le laboratoire est grandement impliqué dans des enseignements liés à la recherche en master (Master Réseaux, Master Génie Logiciel, Master SIC et MID). L'école doctorale "Réseaux et Services" du département Informatique de l'Université de Tlemcen accueille les doctorants du laboratoire.
									</li>
								</ol>
							</div>

							<div class="col-md-4">
								<h2 class="section-title">Mot du directeur</h2>
								<ul class="testimonial-list">
									<li>
										<blockquote>
											<p> Nul doute que les Mathématiques sont devenues un outil indispensable pour la résolution de problèmes concrets, en particulier ceux relatifs à la physique, la chimie et les sciences du vivant.Il existe diverses méthodes pour approcher les phénomènes concrets par des outils mathématiques.Ces méthodes se sont développées et améliorées au cours du vingtième siècle et continuent à nous permettre de concevoir des phénomènes réels d’une  façon  plus fine et plus précise.La théorie des équations différentielles et aux dérivées partielles non linéaires est l’un des outils mathématiques les plus utilisé pour exprimer ces phénomènes d’une manière plus fiable et concrète.En se basant sur  la théorie de la modélisation, on peut exprimer plusieurs phénomènes issus de la physique, chimie, biologie, économie à l’aide des EDO et des EDP  non linéaires de type elliptique, parabolique et hyperbolique.</p>
											<cite>Anthony Rubbens</cite>
										</blockquote>
									</li>
								</ul>
							</div>
						</div> <!-- .row -->
					</div> <!-- .container -->		
				</div> <!-- .fullwidth-block -->

				
			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="widget">
								<h3 class="widget-title">Our address</h3>
								<strong>Université de Tlemcen </strong>
								<address>119 - Imama 13000 Tlemcen – Algérie</address>
								<a href="tel:+1 800 931 812">043.21.31.98</a> <br>
								<a href="mailto:office@companyname.com">Laboratoir@univ.yahoo</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="widget">
								<h3 class="widget-title">Social media</h3>
								
								<div class="social-links">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</div>
							</div>
						</div>
				</div> <!-- .container -->
			</div>
			</footer>
		</div>

		<script src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
		<script src="{{ URL::asset('js/plugins.js') }}"></script>
		<script src="{{ URL::asset('js/app.js') }}"></script>
		
	</body>

</html>