@extends('layouts.master')

@section('title','LRI | Profil')

@section('header_page')

	  <h1>
        Profil
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Profil</li>
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
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i> <span>Membres</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a></li>
            <li><a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a></li>
          </ul>
        </li>

         <li>
          <a href="{{url('theses')}}">
            <i class="fa fa-file-pdf-o"></i> 
            <span>Thèses</span>
          </a>
        </li>

        <li>
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

          <li>
          <a href="{{url('parametre')}}">
            <i class="fa fa-gears"></i> 
            <span>Paramètres</span></a>
          </li>
          @endif
 @endsection

@section('content')

<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset($contact->photo)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$contact->name}} {{$contact->prenom}}</h3>

              <p class="text-muted text-center">{{$contact->grade}}</p>
              <div class="text-center">
                <div class="btn-group">
              <a href="www.Linkedin.com" class="btn btn-social-icon btn-linkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="www.Linkedin.com" class="btn btn-social-icon" title="Researchgate"><img src="{{asset('/rg.png')}}"></a>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#activity1" data-toggle="tab">A propos</a></li>
              <li class="active"><a href="#activity" data-toggle="tab">Modifier</a></li>
              <li><a href="#timeline" data-toggle="tab">Articles</a></li>
            </ul>

            <div class="tab-content">
          
              <div class="active tab-pane" id="activity">
            <form class="well form-horizontal" action=" {{url('contact/'. $contact->id) }} " method="post"  id="contact_form">

              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
                          <div class="input-group"  style="width: 40%">
                            <input  name="name" class="form-control" value="{{$contact->name}}" type="text">
                            <span class="help-block">
                                @if($errors->get('name'))
                                  @foreach($errors->get('name') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>

                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">Prénom</label>  
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group"  style="width: 40%">
                            <input  name="prenom" value="{{$contact->prenom}}" class="form-control"  type="text">
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>


                       <div class="form-group"> 
                          <label class="col-md-3 control-label">Grade</label>
                            <div class="col-md-9 selectContainer @if($errors->get('grade')) has-error @endif">
                              <div class="input-group" style="width: 40%">
                                  <select name="grade" class="form-control selectpicker">
                                    <option>{{$contact->grade}}</option>
                                    <option>MAA</option>
                                    <option>MAB</option>
                                    <option >MCA</option>
                                    <option >MCB</option>
                                    <option>Doctorant</option>
                                    <option >Professeur</option>
                                  </select>
                                  <span class="help-block">
                                @if($errors->get('grade'))
                                  @foreach($errors->get('grade') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              </div>
                            </div>
                      </div>


                      <div class="form-group"> 
                          <label class="col-md-3 control-label">Partenaire</label>
                            <div class="col-md-9 selectContainer ">
                              <div class="input-group"  style="width: 40%">
                                  <select name="partenaire" class="form-control selectpicker">
                                    <option value="{{$contact->partenaire_id}}">{{$contact->partenaire->nom}}</option>
                                    @foreach($partenaires as $partenaire)
                                    <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                                    @endforeach
                                  </select>
                                 
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail</label>  
                          <div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
                            <div class="input-group"  style="width: 40%">
                                <input name="email" type="email" class="form-control" value="{{$contact->email}}">
                                <span class="help-block">
                                @if($errors->get('email'))
                                  @foreach($errors->get('email') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                            </div>
                          </div>
                      </div>
                      

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                            <label class="col-md-6 control-label">Date_Naissance</label>  
                            <div class="col-md-6 inputGroupContainer input-group Date">
                              <input name="date_naissance" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{$contact->date_naissance}}">
                            </div>
                      </div>
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">N° Téléphone</label>  
                                <div class="col-md-6 input-group">
                                <input name="num_tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{$contact->num_tel}}">
                              </div>
                        </div>
                      </div>
                      
                    </div>

                    

                    

                      
              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('contacts')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button> 
                  </div>
            </form>
          </div>

             

          <div class="tab-pane" id="activity1">
                
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Date de naissance</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$contact->date_naissance}}
                    </p>
                  </div>
                  </div>
                 

                  
                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>N° de télépone</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$contact->num_tel}}
                    </p>
                  </div>
                  </div>
                 
                  @if($contact->idPartenaire)
                <div class="row" style="margin-top: 10px">
                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Partenaire</strong>                
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{$contact->partenaire->nom}}</a>
                  </div>
                </div>
                @endif

                <div class="row" style="margin-top: 10px">
                 <div class="col-md-3" style="padding-top: 10px">
                   <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
                 </div> 
                 <div class="col-md-9" style="padding-top: 10px">
                   {{$contact->email}}
                 </div>
                </div>


              <strong><i class="margin-r-5"></i></strong>
              <hr>
               
            </div>
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>

@endsection