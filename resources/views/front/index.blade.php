<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="stylesheet" href="{{ URL::asset('bootstrap/dist/css/bootstrap.min.css') }}">
		<title>Science Labs</title>

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
			<header class="site-header collapsed-nav" data-bg-image="">
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
								<li class="menu-item current-menu-item"><a href="/">Home</a></li>
								<li class="menu-item"><a href="/news">Actualité</a></li>
								<li class="menu-item"><a href="/about">About</a></li>
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

			<div class="hero">
				<ul class="slides">
					
					<li data-bg-image="{{ URL::asset('images/pc.jpg') }}">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Laboratoire de recherche d'informatique</h2>
								<p>Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique se consacrant à la modélisation et la résolution de problèmes fondamentaux motivés par les applications...</p>
								<a href="/about" class="button">See details</a>
							</div>
						</div>
					</li>
					
					<li data-bg-image="{{ URL::asset('images/0101.jpg') }}">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Laboratoire de recherche d'informatique</h2>
								<p>La coopération internationale est une nécessité pour notre laboratoire Il entretient des relations suivies avec des universités françaises et tunisiennes. En complément de la recherche académique, le LRI a une récente coopération avec le monde industriel et des partenaires socio économiques...</p>
								<a href="/about" class="button">See details</a>
							</div>
						</div>
					</li>
					<li data-bg-image="{{ URL::asset('images/cl.jpg') }}">
						<div class="container">
							<div class="slide-content">
								<h2 class="slide-title">Laboratoire de recherche d'informatique</h2>
								<p> Le laboratoire est grandement impliqué dans des enseignements liés à la recherche en master (Master Réseaux, Master Génie Logiciel, Master SIC et MID). L'école doctorale "Réseaux et Services" du département Informatique de l'Université de Tlemcen accueille les doctorants du laboratoire.</p>
								<a href="/about" class="button">See details</a>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							@foreach($equipes as $equipe)
							<div class="col-md-3 col-sm-6">
								<div class="feature">
									<img src="{{ URL::asset('images/icon-research-small.png') }}" alt="" class="feature-image">
									<h2 class="feature-title">{{$equipe->intitule}}</h2>
									<p>{{$equipe->resume}}</p>
									<a href="{{url('teams/'.$equipe->id)}}" class="button">Learn more</a>
								</div>
							</div>
							@endforeach
						</div> <!-- .row -->
					</div> <!-- .container -->
				</div> <!-- .fullwidth-block -->

				<div class="fullwidth-block" data-bg-color="#edf2f4">
					<div class="container">
						<h2 class="section-title">Latest News</h2>
						<div class="row">
							@foreach($news as $new)
							<div class="col-md-4">
								<div class="post">
									<figure class="featured-image"><img src="{{ URL::asset('images/'.$new->photo) }}" alt=""></figure>
									<h2 class="entry-title"><a href="{{url('news/'.$new->id)}}">{{$new->titre}}</a></h2>
									<small class="date">{{$new->date}}</small>
									
								</div>
							</div>
							@endforeach
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