@extends('layouts.master')
@section('title','gestion responsable')
@section('content')
<div class="breadcrumbs">{!! Toastr::message() !!} 
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
                                                  <li><a href="compte">gestion compte</a></li>
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
                                              <strong class="card-title">Gestion Responsable</strong>
                                          </div>
                                          <div class="card-body">
                                          <div class="col col-xs-6 text-right">
                            <button href="#addresponsable"  type="button" class="btn btn-info add-new btn-sm" data-toggle="modal"><i class="fa fa-plus"></i> Add </button>
                            <a href="{{ route('res.export') }}"  class="btn btn-success btn-sm" ><i class="fa fa-file-excel-o" ></i> Export</a>            
                            <button class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download" ></i> import</button>  

                           					
                                   </div><br>
                                <table id="myTable" class="table table-bordred table-striped">
                                
                                
                                
                                  <thead>
                                  <th>ID</th>
                                  <th>Nom</th>
                                  <th>Prenom</th>
                                  <th>Email</th>
                                  <th>Contact</th>
                                  <th>Date de Creation</th>
                                  <th>Action</th>
                                  </thead> 
                                    
                                    
                                
                  <tbody>
                  @foreach($Responsable as $res) 
                  <tr>
                
                  <td>{{$res->id}}</td>
                  <td>{{$res->nom}}</td> 
                  <td>{{$res->prenom}}</td>
                  <td>{{$res->Email}}</td>
                  <td>{{$res->telephone}}</td>
                  <td>{{$res->created_at}}</td>
                  <td>	
                  <a class="edit" data-toggle="modal" data-target="#edit" ><i class="fa fa-pencil-square-o fa-2x" ></i></a>
                  <a  class="delete" data-toggle="modal" data-target="#delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                  
                  </td>
                  </tr>
                  @endforeach

                  

              
                
                  
                
                  
                  </tbody>
                      
              </table></div>
  <!-- ADD Modal HTML -->
                <div id="addresponsable" class="modal fade">
		        <div class="modal-dialog">
			       <div class="modal-content">
  
				<form action="{{ route('responsables.store') }}" method="POST" >
                     @csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add Responsable</h4>
					
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
                            </div>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control"  name="Email" placeholder="exemple@gmail.com"required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" name="telephone" placeholder="06xxxxxxxx" required>
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
    <!-- edit Modal HTML -->
<div class="modal fade" id="edit"  tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
    <form action="/update_res" method="POST" id="editform">
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
                   <input type="text" class="form-control"id="prenom"value="" name="prenom" >
                     </div>
                    <div class="col"><label>Last name</label>
                     <input type="text" class="form-control"id="nom" value="" name="nom" >
                    </div>
                      </div>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" id="email" name="Email" value="" required >
						</div>
			
						
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" name="telephone" value=""  id="tel" required>
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
        <!-- Delete Modal HTML -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
    <form action="/delete_res" method="POST" id="deletform">
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
    <form action="{{ route('import.responsable') }}" method="POST"  enctype="multipart/form-data" >
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

<script src="export.js"></script>
<script src="//code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
  
<script>
$(document).ready(function(){
var table=$('#myTable').DataTable();
table.on('click','.edit',function(){
 $tr=$(this).closest('tr');
 if($($tr).hasClass('child')){
$tr=$tr.prev('.parent');
 }
 var data=table.row($tr).data();
 console.log(data);
 $('#id').val(data[0]);
 $('#nom').val(data[1]);
 $('#prenom').val(data[2]);
 $('#email').val(data[3]);

 $('#tel').val(data[4]);
 $('#editform').attr('action','/update_res/'+data[0]);
 $('#edit').modal('show');
});




//delete
table.on('click','.delete',function(){
 $tr=$(this).closest('tr');
 if($($tr).hasClass('child')){
$tr=$tr.prev('.parent');
 }
 var data=table.row($tr).data();
 console.log(data);

 $('#deletform').attr('action','/delete_res/'+data[0]);
 $('#delete').modal('show');
});
});
</script>

                    

@endsection