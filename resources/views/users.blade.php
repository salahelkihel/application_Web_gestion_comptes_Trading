@extends('layouts.master')
@section('title','Profile')
@section('content')
<div class="breadcrumbs">
{!! Toastr::message() !!}  
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>All Users</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard">Dashboard</a></li>
                                    <li><a href="compte">Users List</a></li>
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
                                <strong class="card-title">Users List</strong>
                            </div>
                            <div class="card-body">
                            <div class="col col-xs-6 text-right">
                            <button href="#adduser" type="button" class="btn btn-info add-new btn-sm "data-toggle="modal"><i class="fa fa-plus"></i> ADD </button></div><BR>
                            <table id="mytable" class="table table-bordred table-striped table-hover">
                   
                  
                   
                    <thead>
                  
                     <th>ID</th> 
                     <th>Image</th>
                     <th>username</th>
                     <th>Email</th>
                     <th>Contact</th>
                     <th>Action</th>
                    </thead> 
                      
                       
                   
    <tbody>

    <tr >
    @foreach($users as $row) 
<td class="id">{{$row->id}}</td>  
<td class="img"><img class="rounded-circle" width="35" src="{{ asset('images') }}/{{$row->image}}"/></td>
<td class="username">{{$row->username}}</td>
<td class="Email">{{$row->Email}}</td>
<td class="telephone">{{$row->telephone}}</td>
<td ><p class="password"  hidden  >{{$row->password}}</p>
    <a href="/edit_user/{{$row->id}}" class="edit" data-toggle="modal" data-target="#edit" ><i class="fa fa-pencil-square-o fa-2x" ></i></a>
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
    <form action="/user.update" method="POST" id="editform" enctype="multipart/form-data">
    {{csrf_field()}}
{{method_field('PUT')}}
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
 			
						<div class="form-group">
							
              <div class="row">
            
    <div class="col"><label>Username</label>
      <input type="text" class="form-control" placeholder="Username" id="username"  name="username" >
    </div>
    <div class="col">
    <label>Email</label>
	<input type="email" class="form-control" id="Email" name="Email" required >
    </div>
  </div>
						</div>

					
            <div class="row">
    <div class="col-sm-6"><label>tel</label>
    <input type="text" class="form-control" id="telephone"name="telephone">
    </div>
    <div class="col-sm-6"><label>Password</label>
    <input type="password" class="form-control" id="password"name="password">
    </div>
     </div>
      </div>
 
     <div class="col">
    <label>Photo</label>
	<input type="file" class="form-control-file"  name="photo" onchange="previewFile(this)"  required />

        <img id="img" class="rounded-circle" width="40" src="{{asset('images')}}/{{$row->image}}"/>
        
    </div><br>
    

  			
					
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
 <!-- ADD Modal HTML -->
 <div id="adduser" class="modal fade">
		        <div class="modal-dialog">
			       <div class="modal-content">
  
				<form action="{{ route('user.add') }}" method="POST" enctype="multipart/form-data" >
                     @csrf
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
					
					</div>
					<div class="modal-body">	
                    
					<div class="form-group">
							
              <div class="row">
            
    <div class="col"><label>Username</label>
      <input type="text" class="form-control" placeholder="Username" id="username"  name="username" required >
    </div>
    <div class="col">
    <label>Email</label>
	<input type="email" class="form-control" id="Email" name="Email" placeholder="exemple@gmail.com" required >
    </div>
  </div>
						</div>

					
            <div class="row">
    <div class="col-sm-6"><label>Phone</label>
    <input type="text" class="form-control" id="telephone"name="telephone" placeholder="06xxxxxxxx" required >
    </div>
    <div class="col-sm-6"><label>Password</label>
    <input type="password" class="form-control" id="password"name="password" required>
    </div>
     </div>
      </div>
 
     <div class="col">
    <label>Photo</label>
	<input type="file" class="form-control-file"  name="photo" onchange="previewFile(this)"  required />
     
        <img id="img" class="rounded-circle" width="40" src=""/>

    </div><br>
	
					 
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
    <form action="/delete_user" method="POST" id="deletform">
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
<script src="//code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
 $(document).ready(function() {
    $('#mytable').DataTable();
} );
$(document).on('click', '.edit', function()
    {
        var _this = $(this).parents('tr');

  $('#id').val(_this.find('.id').text());
 $('#img').val(_this.find('.img').text());
 $('#username').val(_this.find('.username').text());
 
 $('#Email').val(_this.find('.Email').text());
 $('#telephone').val(_this.find('.telephone').text());
 $('#password').val(_this.find('.password').text());

        $('#editform').attr('action','/update_user/'+_this.find('.id').text());
    });   
    $(document).on('click', '.delete', function()
{
      var _this = $(this).parents('tr');

 $('#deletform').attr('action','/delete_user/'+_this.find('.id').text());

});
</script>
<script>
function previewFile(input){
    alert('ssss');
var file=$('input[type=file]').get(0).files[0];
if(file){
    var reader=new FileReader();
    reader.onload =function(){
        $('#img').attr('src',reader.result);
    }
    reader.readAsDataURL(file);
}

}

</script>



@endsection