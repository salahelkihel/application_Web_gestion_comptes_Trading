@extends('layouts.master')
@section('title','add compte')
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
                                    <li><a href="compte">gestion compte Trading</a></li>
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
                                <strong class="card-title">Add Compte Trading</strong>
                            </div>
                        <form action="{{ route('add.comptetrading') }}" method="POST" >
                     @csrf
                  
                     <div class="modal-body">	
   				
               <div class="col">
                 
                  <div class="row">
                   <div class="col"><label>Num Compte</label>
                    <input type="text" class="form-control"  id="Num_Compte" name="Num_Compte" >
                  </div>
                  <div class="col"><label>Login</label>
                  
                    <input type="text" class="form-control"  id="login" name="login" >
                  </div>
                  <div class="col"><label>Mode de passe</label>
                    <input type="text" class="form-control"  id="modepass"  name="modepass" >
                  </div>
                  </div>
              
                  <div class="form-group"><label>Serveur</label>
                    <input type="text" class="form-control"  id="serveur"  name="serveur" >
                  </div>
                  <div class="form-group"><label>Utilisateur</label>
                    <input type="text" class="form-control"  id="utilisateur"  name="utilisateur" >
                  </div>
                  <div class="form-group"><label>Type compte</label>
                  <select id="inputState" class="form-control" name="type_compte" id="type_compte"required>
                  <option  disabled selected>Choose...</option>
         
             
                 <option value="Formation" >Formation</option>
                 <option value="Competition" >Competition</option>
                 <option value="Validation" >Validation</option>
                </select>  
            
                  </div>
                  <div class="form-group"> 
                  <label for="inputState">CIN Compte</label>
                  <input type="text" class="form-control"  id="compte_id" name="compte_id"  readonly="readonly">
                </br>

             <input type="button" class="btn btn-default" onclick="window.location.href='/compte'" value="Cancel">
						<input type="submit" class="btn btn-success float-right" value="Add">
                  </div></br>   	
           
				
				 

                    </div>
         
                    
					</div>
				
          </div>

          </div>
                </div>
                </form>

<script>


  document.getElementById("compte_id").value =window.location.href.substring(44);

</script>



</script>







@endsection