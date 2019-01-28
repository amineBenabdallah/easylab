@extends('layouts.master')

@section('title','LRI | Ajouter une actualité')

@section('header_page')

      <h1>
        Actualité
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('actualite')}}">Actualité</a></li>
        <li class="active">Ajouter</li>
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
      <div class="col-xs-12">
        <div class="box">
            
          <div class="container col-xs-12">

            <form class="well form-horizontal" action="{{ url('actualite') }}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouvelle actualité</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Titre (*)</label>  
                        <div class="col-xs-9 inputGroupContainer  @if($errors->get('titre')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" placeholder="Titre" type="text" value="{{old('titre')}}">
                            <span class="help-block">
                                @if($errors->get('titre'))
                                  @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Détails (*)</label>
                      <div class="col-md-9 inputGroupContainer  @if($errors->get('detail')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="detail" class="form-control" rows="3" placeholder="Détails ...">{{old('detail')}}</textarea>
                          <span class="help-block">
                                @if($errors->get('detail'))
                                  @foreach($errors->get('detail') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Date (*)</label>
                      <div class="col-md-9 inputGroupContainer  @if($errors->get('date')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="date" class="form-control" rows="3" placeholder="Date ...">{{old('date')}}</textarea>
                          <span class="help-block">
                                @if($errors->get('date'))
                                  @foreach($errors->get('date') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Type (*)</label>
                      <div class="col-md-9 inputGroupContainer  @if($errors->get('type')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="type" class="form-control" rows="3" placeholder="Type ...">{{old('type')}}</textarea>
                          <span class="help-block">
                                @if($errors->get('type'))
                                  @foreach($errors->get('type') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Lieu (*)</label>
                      <div class="col-md-9 inputGroupContainer  @if($errors->get('lieu')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="lieu" class="form-control" rows="3" placeholder="Lieu ...">{{old('description')}}</textarea>
                          <span class="help-block">
                                @if($errors->get('lieu'))
                                  @foreach($errors->get('lieu') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-4 control-label">Photo</label>  
                        <div class="col-md-8 inputGroupContainer">
                          <input name="img" type="file" >
                        </div>
                  </div>

              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('actualite')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
 @endsection
 