@extends('adminSide.layouts.admin-dash-layout')
@section('title','Liste des annoces')
@section('css-script')
<!-- Font Awesome -->
<link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Mes CVs</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">dashboard</a></li>
               <li class="breadcrumb-item active">Mes CVs</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<div class="col-12">
<div class="callout callout-info">
   <h5><i class="fas fa-filter"></i> Critere des Filtres:</h5>
   <div class="col-sm-6">
      <!-- select -->
      <div class="form-group">
        <form action="" id="id-filter-form" method="post" action="{{ route('anonce.getAllAnonceFiltrer') }}">
          @csrf
       
         <label>Par region :</label>
         <select class="form-control" id="region" name="lieux">
            <option>Marrakech et région, Maroc</option>
            <option>Beni mallal , Khénifra, Maroc</option>
            <option>option 3</option>
            <option>option 4</option>
            <option>option 5</option>
         </select>
      </div>
      <div class="form-group">
         <label>Par Autheur :</label>
         <select class="form-control" >
            <option>option 1</option>
            <option>option 2</option>
            <option>option 3</option>
            <option>option 4</option>
            <option>option 5</option>
         </select>
      </div>
      <div class="form-goup">
         <label for="">Par mot clee: </label>
      <div class="input-group mb-3">
         
         <input type="text" class="form-control" placeholder="saisire un mot clee..." aria-label="Recipient's username" aria-describedby="basic-addon2">
         <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Rechercher</button>
         </div>
      </div>  
      </div>
       
   </div>
    </form>
</div>
<!-- Main content -->
<!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            @foreach ($CVAn as $cv)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                    {{$cv["poste"]}}
                    </div>
                    <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                        <h2 class="lead"><b>{{$cv["nom"]." ".$cv["prenom"]}}</b></h2>
                        {{-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> --}}
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Ville: {{ $cv["ville"]}}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telephone#: {{ $cv["tele"]}}</li>
                        </ul>
                        </div>
                        <div class="col-5 text-center">
                        <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="text-right">
                        <a href="/dashboard/mailCondidat/{{ $cv['id']}}" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> View Profile
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- /.content -->
@endsection
@section('js-script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  
@endsection