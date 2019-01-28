@extends('layouts.master')

 @section('title','LRI | Détails actualité')

@section('header_page')
 	<h1>
    Actualité
    <small>Détails</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li><a href="{{url('actualite')}}">Actualité</a></li>
    <li class="active">Détails</li>
  </ol>
@endsection

@section('asidebar')

        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li >
          <a href="{{url('actualite')}}">
            <i class="fa fa-newspaper-o"></i> <span>Actualités</span>
          </a>
        </li>

        <li>
          <a href="{{url('equipes')}}">
            <i class="fa fa-group"></i> 
            <span>Equipes</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li class="active"><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>
      
         <li class="active">
          <a href="{{url('articles')}}">
            <i class="fa fa-newspaper-o"></i> 
            <span>Articles</span></a>
          </li>

           <li>
          <a href="{{url('projets')}}">
            <i class="fa fa-folder-open-o"></i> 
            <span>Projets</span>
          </a>
        </li>
        
          @if(Auth::user()->role->nom == 'admin' )
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Matériels</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('categorie')}}"><i class="fa fa-id-badge"></i> Catégories</a></li>
            <li class="active"><a href="{{url('materiel')}}"><i class="fa fa-list"></i> Matériels</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Partenaires</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{url('Partenaire')}}"><i class="fa fa-id-badge"></i> Partenaires</a></li>
            <li class="active"><a href="{{url('contacts')}}"><i class="fa fa-list"></i> Contacts</a></li>
          </ul>
        </li>
<li>
          <a href="{{url('message')}}">
            <i class="fa fa-gears"></i> 
            <span>Messages</span></a>
          </li>
          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif
  @endsection

@section('content')
<div class="row">
      <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$actualite->titre}}
                    </p>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Détail</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{ $actualite->detail }}
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <strong>Date</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$actualite->date}}
                    </p>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Type</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$actualite->type}}
                    </p>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Lieu</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$actualite->lieu}}
                    </p>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Photo</strong>
                  </div>
                  <div class="col-md-9">
                    <div class="box-body box-profile">
                    <img class="img-responsive img-circl" src=" {{asset($actualite->photo)}}" alt="Article picture">
                  </div>
                  </div>
                  </div>
                  
                
              
            </div>
            <!-- /.box-body -->
          </div>
          
         </div><!-- /.container -->
       </div>
      </div>
@endsection