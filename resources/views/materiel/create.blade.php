@extends('layouts.master')

@section('title','LRI | Ajouter un materiel')

@section('header_page')

      <h1>
        Materiel
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('materiel')}}">Materiel</a></li>
        <li class="active">Ajouter</li>
      </ol>

@endsection

@section('asidebar')

        <li >
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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
            <li ><a href="{{url('materiel')}}"><i class="fa fa-id-badge"></i> Catégories</a></li>
            <li class="active"><a href="{{url('membres')}}"><i class="fa fa-list"></i> Matériels</a></li>
          </ul>
        </li>
          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Partenaires</span></a>
          </li>
          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Contacts</span></a>
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

            <form class="well form-horizontal" action="{{ url('materiel') }}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau materiel</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Libelle (*)</label>  
                        <div class="col-xs-9 inputGroupContainer  @if($errors->get('libelle')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="libelle" class="form-control" placeholder="Libelle" type="text" value="{{old('libelle')}}">
                            <span class="help-block">
                                @if($errors->get('libelle'))
                                  @foreach($errors->get('libelle') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>  

                  <div class="form-group">
                      <label class="col-md-3 control-label">Déscription (*)</label>
                      <div class="col-md-9 inputGroupContainer  @if($errors->get('description')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="description" class="form-control" rows="3" placeholder="Déscription ...">{{old('description')}}</textarea>
                          <span class="help-block">
                                @if($errors->get('description'))
                                  @foreach($errors->get('description') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Catégorie (*)</label>  
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('idCategorie')) has-error @endif">
                          <div style="width: 70%">
                            <select name="idCategorie" class="form-control select2">
                              <option></option>
                               @foreach($categories as $categorie)
                              <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                               @endforeach
                            </select>

                            <span class="help-block">
                                @if($errors->get('idCategorie')) 
                                  @foreach($errors->get('idCategorie') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>
              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('materiel')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>
 @endsection
 