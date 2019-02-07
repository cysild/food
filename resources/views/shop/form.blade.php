 <div class="modal fade" id="modal-add">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">{{$page['subtitle']}}</h4>
                    </div>
                    <div class="modal-body"> 
                    
                <div class="center-block msg">
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="alert alert-danger" style="display:none"></div>
                  </div>
                
                <div id="form">  
               <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="add-data" action="{{url('/admin/restaurant/store')}}" >


                <div class="shop-detail">
                <div class="form-group">
                    <label for="name_en" class=" col-md-2">Restaurant Name :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="shop_name" value="" placeholder="" >
                    </div>
                     <input type="hidden" name="id">     
                    <label for="name_en" class=" col-md-2">Restaurant Address :</label>
                    <div class=" col-md-4">
                       <textarea class="form-control" name="shop_address" value="" placeholder="" ></textarea>
                    </div>           
                    {{csrf_field()}}
                </div>
                <div class="form-group">
                   <label for="name_en" class=" col-md-2">Contact :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="contact" value="" placeholder="" >
                    </div>   
                    <label for="name_en" class=" col-md-2">Contact2 :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="contact2" value="" placeholder="" >
                    </div>                      
                </div>

              </div>

                <div class="user-detail">
                    <div class="form-group">
                   <label for="name_en" class=" col-md-2">User Name :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="user_name" value="" placeholder="" >
                    </div>   
                    <label for="name_en" class=" col-md-2">Email :</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="email" value="" placeholder="" >
                    </div>                      
                </div>

                 <div class="form-group">
                   <label for="name_en" class="pwd col-md-2">Password :</label>
                    <div class=" col-md-4">
                       <input type="password" class="pass form-control" name="password" value="" placeholder="" >
                    </div> 
                    <input type="hidden" name="users_id">  
                    <label for="name_en" class="cpwd col-md-2">Confirm Password :</label>
                    <div class=" col-md-4">
                       <input type="password" class="form-control" name="repassword" value="" placeholder="" >
                    </div>                      
                </div>
              </div>

              <div class="shop-detail">
                <div class="form-group">
                    <label for="company_name" class=" col-md-2">Status:</label>
                         <div class=" col-md-4">
                       <input type="checkbox" name="statuscheck" value="1" checked data-toggle="toggle">
                       <input type="hidden"  name="status" value="1">
                    </div>

                </div>

                </div>              
                 
                    <div class="form-group">
                    <div class="center-block col-lg-12">
                      <div class="images"></div>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                 </form> 
                    <!-- end form --> 

                  </div>

                  

                  </div>
                      

            <!-- /.modal-content -->
                  </div>
          <!-- /.modal-dialog -->