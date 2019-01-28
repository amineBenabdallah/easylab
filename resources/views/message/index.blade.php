@extends('layouts.master')

 @section('title','LRI | Liste des messages')

@section('header_page')

      <h1>
        Messages
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Messages</a></li>
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
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
             <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des messages</h3>
            </div>
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom et Prénom</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message)
                  <tr>
                    <td>{{$message->nom}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->message}}</td>
                    <td>
                      <div class="btn-group">
                        <form action="{{ url('message/'.$message->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('message/'.$message->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        
                        @if( Auth::user()->role->nom == 'admin' )
                        <!-- <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button> -->

                         <a href="#supprimer{{ $message->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $message->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $message->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $message->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('message/'.$message->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                        @endif
                        </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach
                  
                 </tbody>
                <tfoot>
                <tr>
                  <th>Nom et Prénom</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
      </div>
      
    </div>
 @endsection