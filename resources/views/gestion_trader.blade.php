@extends('layouts.master')
@section('title','Gestion Trader')
@section('content')
<div class="breadcrumbs">
{!! Toastr::message() !!}  
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard">Dashboard</a></li>
                                    <li><a href="compte">Data Trader</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Trader</strong>
                            </div>
                            <div class="card-body">

                            <div class="col col-xs-6 text-right">
                                 
                            <button class="btn btn-warning text-white btn-sm"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download" ></i> import</button>  

                           					
                  </div><br>
                            <table id="mytable" class="table table-bordred table-striped table-hover">
                   
                  
                   
                    <thead>
                     <th>symbole</th>
                     <th>Position</th>
                     <th>Heure</th>
                     <th>Type</th> 
                     <th>Prix</th>
                     <th>Prix_du_marche</th>
                     <th>Solde</th>
                     <th>num_compte</th>
                    </thead> 
                      
                       
                   
    <tbody>
    @foreach($traders as $data) 
    <tr >

    <td >{{$data->Symbole}}</td>
    <td >{{$data->Position}}</td>
    <td >{{$data->Heure}}</td>
    <td >{{$data->Type}}</td>
    <td >{{$data->Prix}}</td>
    <td >{{$data->Prix_du_marche}}</td>
    <td >{{$data->Action}}</td>
    <td >{{$data->num_compte}}</td>
 

    </tr> 
    
 @endforeach
    

 
   
    
   
    
    </tbody>
        
</table>




</div>
<!-- import Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ route('import.Trader') }}" method="POST"  enctype="multipart/form-data" >
    @csrf
   
    <form>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">import</h5>
      </div>
      <div class="modal-body">
    
          <div class="file-field">
          
              <span>Choose file</span>
              <input type="file" name="file" required><br>
              @error('file')
              <span class="text-danger">{{$message}}</span>
              @enderror
          
          
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

 

 
    




<script src="//code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

 <!-- buttons -->


<script >

$(document).ready(function() {
    $('#mytable').DataTable();
} );



</script>
<!-- export excel -->








@endsection