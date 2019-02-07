<div class="box">
	<div class="box-header">
		<div class="box-title">Account Setting</div>
	</div>

	<div class="box-body">
               <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="add-data" action="{{url('/admin/setting/store')}}" >

                     @include ('layouts.error')
         
                <div class="form-group">
                    <label for="name_en" class=" col-md-2">Restaurant Name :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="shop_name" value="{{$shop->name}}" placeholder="" >
                    </div>
                     <input type="hidden" name="id" value="{{$shop->id}}">
                </div>
                <div class="form-group">     
                    <label for="name_en" class=" col-md-2">Restaurant Address :</label>
                    <div class=" col-md-4">
                       <textarea class="form-control" name="shop_address" value="" placeholder="" >{{$shop->address}}</textarea>
                    </div>           
                    {{csrf_field()}}
                </div>
                <div class="form-group">
                   <label for="name_en" class=" col-md-2">Contact :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="contact" value="{{$shop->contact}}" placeholder="" >
                    </div>
                </div>
                <div class="form-group">   
                    <label for="name_en" class=" col-md-2">Contact2 :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="contact2" value="{{$shop->contact1}}" placeholder="" >
                    </div>                      
                </div>

   

                  
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
                 <div class="form-group">
                    <label for="company_name" class=" col-md-2">Status:</label>
                         <div class=" col-md-4">
                       <input type="checkbox" name="statuscheck"  checked data-toggle="toggle" id="">
                       <input type="hidden"  name="status" value="{{$shop->is_enable}}">
                    </div>

                </div>      
                      <button type="submit" class="btn btn-primary">Save changes</button>
                 
                 </div>
                 </form> 

            </div>
                 </div>