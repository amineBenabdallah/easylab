<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="stylesheet" href="{{ URL::asset('bootstrap/dist/css/bootstrap.min.css') }}">
		<title>Teams</title>

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
								<li class="menu-item"><a href="/about">About</a></li>
								<li class="menu-item current-menu-item"><a href="/teams">Teams</a></li>
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
					<h2 class="page-title">Teams</h2>
					<small> Notre but est essentiellement  l’étude des problèmes elliptiques et paraboliques non linéaires avec dépendance en gradient, et \ou sous la présence de termes singuliers. </small>
				</div>
			</div>

			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h2 class="section-title">Objectifs</h2>
								<p>Notre but est essentiellement  l’étude des problèmes elliptiques et paraboliques non linéaires avec dépendance en gradient, et \ou sous la présence de termes singuliers. On s’intéresse d’une part à développer des outils mathématiques pour démontrer des résultats d’existence et de non-existence pour des solutions positives ou des solutions qui change de signe pour les EDP paraboliques. Par suite on s’intéresse à analyser les états stationnaires, c.à.d. les solutions des équations elliptiques associées. On démontre dans quelques cas la convergence des solutions des EDP paraboliques vers leurs états stationnaires ainsi que la vitesse de convergence. Les cas où les solutions explosent en temps fini sera aussi analysé..</p>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Fondements Scientifiques</h2>
								<p>Les principaux thèmes de recherche sontEtude des problèmes elliptiques et paraboliques non linéaires avec termes singuliers Etudes des problèmes elliptiques et paraboliques avec dépendance en gradient issus des équations de Hamilton Jacobi en contrôle stochastique.</p>

							</div>
						</div>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						@foreach($equipes as $equipe)
						<div class="boxed-icon">
							<img src="{{ URL::asset('images/icon-research.png') }}" alt="" class="icon">
							
							<h3><a href="{{url('teams/'.$equipe->id)}}">{{$equipe->intitule}}</a></h3>
							<p>{{$equipe->resume}}</p>
							
						</div>
						@endforeach
					</div>
				</div>

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