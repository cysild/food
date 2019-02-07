<div class="box">
	<div class="box-header">
		<div class="box-title">Account Setting</div>
	</div>

	<div class="box-body">
               <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="add-data" action="{{url('/admin/setting/adminstore')}}" >
                 
                  @include ('layouts.error')

                    <div class="form-group">
                   <label for="name_en" class=" col-md-2">User Name :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="user_name" value="{{$data->name}}" placeholder="" >
                    </div>   
                </div>
                <div class="form-group">
                    <label for="name_en" class=" col-md-2">Email :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="email" value="{{$data->email}}" placeholder="" >
                    </div>                      
                </div>
   {{csrf_field()}}
                 <div class="form-group">
                   <label for="name_en" class="pwd col-md-2">Password :</label>
                    <div class=" col-md-4">
                       <input type="password" class="pass form-control" name="password" value="" placeholder="" >
                    </div>
                    </div>
                    <div class="form-group"> 
                    <input type="hidden" name="users_id" value="{{$data->id}}">  
                    <label for="name_en" class="cpwd col-md-2">Confirm Password :</label>
                    <div class=" col-md-4">
                       <input type="password" class="form-control" name="repassword" value="" placeholder="" >
                    </div>                      
                </div>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                 
                 </div>
                 </form> 

            </div>
                 </div>