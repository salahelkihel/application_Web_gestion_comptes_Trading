@extends('layouts.master')
@section('title','Gestion Compte')
@section('content')
<div class="breadcrumbs">
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
                                    <li><a href="compte">Gestion Compte</a></li>
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
                                <strong class="card-title">Gestion Compte</strong>
                            </div>
                            <div class="card-body">

                            <div class="col col-xs-6 text-right">
                            <button href="#addcompte" type="button" class="btn btn-info add-new btn-sm"data-toggle="modal"><i class="fa fa-plus"></i>Add </button>
                            <a href="{{ route('export') }}" class="btn btn-success btn-sm" ><i class="fa fa-file-excel-o" ></i> Export</a>            
                          <!-- export excel  <button onclick="tablesToExcel(['mytable'],['compte','compte.xls','Excel'])">ex</button>-->
                            <button class="btn btn-warning text-white btn-sm"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download" ></i> import</button>  

                           					
                  </div><br>
                            <table id="mytable" class="table table-bordred table-striped table-hover">
                   
                  
                   
                    <thead>
                  
                     <th>CIN</th>
                     <th>Nom</th>
                     <th>Prenom</th>
                 
                     <th>Email</th>
                     <th>Email The Cube</th>
                     <th>Contact</th>
                     
                     <th>Equipe</th>
                    <th>Date </th>
                     <th>Action</th>
                    </thead> 
                      
                       
                   
    <tbody>
    @foreach($comptes as $data) 
    <tr >
  
    <td class="cin" data-url="/add_comptetrading">{{$data->cin}}</td>
    <td class="nom">{{$data->nom}}</td> 
    <td class="prenom">{{$data->prenom}}</td>
 
    <td class="email">{{$data->Email}}</td>
    <td class="EmailtheCube">{{$data->Email_theCube}}</td>
    
    <td class="tel">{{$data->telephone}}</td>
    <td >{{$data->nom_eq}}<p class="id_eq"  hidden >{{$data->id_eq}}</p> </td>
    <td class="date">{{$data->created_at}}</td>
    <td >
    <p class="id_comp"  hidden  >{{$data->id}}</p>	
    <a href="/edite_compte/{{$data->cin}}"class="edit" data-toggle="modal" data-target="#edit" ><i class="fa fa-pencil-square-o fa-2x" ></i></a>
    <a  class="delete" data-toggle="modal" data-target="#delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
    
    </td>
  


   
    </tr> 
    
    @endforeach

    

 
   
    
   
    
    </tbody>
        
</table>




</div>

<!-- edit Modal HTML -->
<div class="modal fade" id="edit"  tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
    <form action="/update_compte" method="POST" id="editform">
    {{csrf_field()}}
{{method_field('PUT')}}
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
 			
						<div class="form-group">
							
              <div class="row">
              <input type="hidden" id="id" name="id">
    <div class="col"><label>First name</label>
      <input type="text" class="form-control" placeholder="First name" id="nom"  name="nom" >
    </div>
    <div class="col"><label>Last name</label>
      <input type="text" class="form-control" placeholder="Last name" id="prenom"  name="prenom" >
    </div>
  </div>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" id="email" name="Email" value="" required >
						</div>   <div class="form-group">
							<label>Email Thecube</label>
							<input type="email" class="form-control" id="EmailtheCube" name="EmailtheCube" required>
						</div>
					
            <div class="form-row">
     <div class="form-group col-md-4">
      <label for="inputZip">CIN</label>
      <input type="text" class="form-control" id="cin" name="cin">
    </div>
 
   <div class="form-group col-md-4">
      <label for="inputCity">tel</label>
      <input type="text" class="form-control" id="tel"name="telephone">
    </div>

    
    <div class="form-group col-md-4">
      <label for="inputState">Nom Equipe</label>
      <select  class="form-control" name="equipe_id" id="equipe_id"   required>

                @foreach($equipes as $row)
                 <option  value="{{$row->id}}"  >{{$row->Libelle_Equipe}}</option>
                 @endforeach

      </select>
    </div>
    </div>			
					</div>
          <div class="modal-footer ">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                     <button type="submit" class="btn btn-warning " ><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
    </form>
       </div> 
    <!-- /.modal-content --> 
    </div>
      <!-- /.modal-dialog --> 
 </div>
 {!! Toastr::message() !!}   
<!-- add Modal HTML -->
<div id="addcompte" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
  
				<form action="{{ route('compte.add') }}" method="POST" >
        @csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add Compte</h4>
					
					</div>
					<div class="modal-body">	
   				
						<div class="form-group">
							
              <div class="row">
      <div class="col"><label>First name</label>
      <input type="text" class="form-control"  placeholder="First name" name="prenom">
    </div>          
    <div class="col"><label>Last name</label>
      <input type="text" class="form-control"  placeholder="Last name" name="nom">
    </div>
    
  </div></div>
					
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control"  name="Email" placeholder="exemple@gmail.com" required>
						</div>
            <div class="form-group">
							<label>Email Thecube</label>
							<input type="email" class="form-control"  name="EmailtheCube" placeholder="exemple@gmail.com" required>
						</div>
					
            <div class="form-row">
     <div class="form-group col-md-4">
      <label for="inputZip">CIN</label>
      <input type="text" class="form-control" id="inputZip" name="cin">
    </div>
 
   <div class="form-group col-md-4">
      <label for="inputCity">Phone</label>
      <input type="text" class="form-control" id="inputCity" placeholder="06xxxxxxxx"name="telephone">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Nom Equipe</label>
     
      <select id="inputState" class="form-control" name="equipe_id" required>
        <option  disabled selected>Choose...</option>
         
                 @foreach($equipes as $row)
                 <option value="{{$row->id}}" >{{$row->Libelle_Equipe}}</option>
                @endforeach
      </select>  
    </div>
    </div>
    </div>
			
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
 
    
    <!-- Delete Modal HTML -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
    <form action="/delete" method="POST" id="deletform">
                      @method('DELETE')
                        {{ csrf_field() }} 
          <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
    </form>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
</div> 
<!-- import Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ route('import.compte') }}" method="POST"  enctype="multipart/form-data" >
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
<script src="export.js"></script>
 <!-- buttons -->


<script >

$(document).ready(function() {
    $('#mytable').DataTable();
} );

$(document).on('click', '.edit', function()
    {
        var _this = $(this).parents('tr');

  $('#cin').val(_this.find('.cin').text());
 $('#nom').val(_this.find('.nom').text());
 $('#prenom').val(_this.find('.prenom').text());
 
 $('#address').val(_this.find('.address').text());
 $('#email').val(_this.find('.email').text());
 $('#EmailtheCube').val(_this.find('.EmailtheCube').text());
 $('#tel').val(_this.find('.tel').text());

        $('#equipe_id').val(_this.find('.id_eq').text());
        $('#editform').attr('action','/update_compte/'+_this.find('.id_comp').text());
    });

$(document).on('click', '.delete', function()
{
      var _this = $(this).parents('tr');

 $('#deletform').attr('action','/delete/'+_this.find('.id_comp').text());

});











$('table').on('click','.cin', function()
{
      var data = $(this).parents('tr');
      var url = $(this).data("url"); 
      var cin = data.find('.cin').text();
      
      window.location.href = url+"?cin="+cin;

});



</script>
<!-- export excel -->








@endsection