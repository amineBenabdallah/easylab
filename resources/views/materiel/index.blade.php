@extends('layouts.master')

 @section('title','LRI | Liste des materiel')

@section('header_page')

      <h1> 
        Materiels
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Materiels</a></li>
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
          @if(Auth::user()->role->nom == 'admin' )
          
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
      <div class="col-md-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
             <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des materiels</h3>
            </div>
          </div>
          </div>
            
            <!-- /.box-header -->
            <div class="box-body">
           @if(Auth::user()->role->nom == 'admin' )
              <div class="pull-right">
                <a href="{{url('materiel/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouveau materiel</i></a>
              </div>
           @endif   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Libelle</th>
                  <th>Déscription</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($materiels as $materiel)
                  <tr>
                    <td>{{$materiel->libelle}}</td>
                    <td>{{$materiel->description}}</td>
                    <td>{{$materiel->status}}</td>
                    <td>
                      <div class="btn-group">
                        <form action="{{ url('materiel/'.$materiel->id)}}" method="post">
                          
                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('materiel/'.$materiel->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if($materiel->status == 'libre' )
                        <a href="{{ url('materiel/'.$materiel->id.'/'.Auth::user()->id.'/reserve')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if($materiel->status == 'reserved' )
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $materiel->reserver )
                        <a href="{{ url('materiel/'.$materiel->id.'/unreserve')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @endif
                        @if(Auth::user()->role->nom == 'admin' )
                        <a href="{{ url('materiel/'.$materiel->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom == 'admin' )
                        <!-- <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button> -->

                         <a href="#supprimer{{ $materiel->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $materiel->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ? 
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('materiel/'.$materiel->id)}}"  method="POST">
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
                  <th>Libelle</th>
                  <th>Déscription</th>
                  <th>Status</th>
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