<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
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

			<div class="page-head" data-bg-image="{{ URL::asset('images/page-head-2.jpg') }}">
				<div class="container">
					<h2 class="page-title">{{$membre->name}} {{$membre->prenom}}</h2>
					<small> Notre but est essentiellement  l’étude des problèmes elliptiques et paraboliques non linéaires avec dépendance en gradient, et \ou sous la présence de termes singuliers. </small>
				</div>
			</div>

			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<div class="card">
						  <img src="{{asset($membre->photo)}}" style="width:100%">
						  <h1>{{$membre->name}} {{$membre->prenom}}</h1>
						  <p class="title">{{$membre->grade}}</p>
						  <p>Abou-bekr Belkaid University</p>
						  <div style="margin: 24px 0;">
						    <a href="#"><i class="fa fa-dribbble"></i></a> 
						    <a href="#"><i class="fa fa-twitter"></i></a>  
						    <a href="{{asset($membre->lien_linkedin)}}"><i class="fa fa-linkedin"></i></a>  
						    <a href="#"><i class="fa fa-facebook"></i></a> 
						 </div>
						</div>
					</div>
				</div>
			</main> <!-- .main-content -->
						<main class="main-content">
							@if($membre->these)
				 <div class="fullwidth-block">
					<div class="container">
						<h2>These :</h2>
						 <p><strong>Titre : </strong>{{$membre->these->titre}}</p>
						 <p><strong>Sujet : </strong>{{$membre->these->sujet}}</p>
						 <p><strong>Encadreur : </strong>{{$membre->these->encadreur_int}}</p>
						 <p><strong>date : </strong>{{$membre->these->date_debut}}</p>
					</div>
				</div>
				@endif
				<div class="fullwidth-block">
					<div class="container">
						<h2>Articles :</h2>
						<div class="project-list">
							@foreach ($membre->articles as $article) 
							<div class="project">
								<div class="project-content">
									
									<h3 class="project-title">{{$article->type}}</h3>
									<p>{{$article->annee}}</p>
									<p>{{$article->titre}}</p>
									<a href="{{ url('articles/'.$article->id.'/detail')}}" class="button">Learn more</a>
								</div>
							</div>
							@endforeach

						</div>
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