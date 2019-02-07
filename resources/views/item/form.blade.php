 <div class="modal fade" id="modal-add">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">{{$page['title']}}</h4>
                    </div>
                    <div class="modal-body"> 
                    
                  <div class="center-block msg">
                    <div class="alert alert-success" style="display:none"></div>
                    <div class="alert alert-danger" style="display:none"></div>
                  </div>
                <div id="form">  
             <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{$page['save_url']}}" id="add-data" >
                <div class="form-group">
                    <label for="name_en" class=" col-md-2"> Food Name :</label>
                    <div class=" col-md-10">
                       <input type="text" class="form-control" name="name" value="" placeholder="Quick Bites" >
                    </div>           
                    {{csrf_field()}}
                </div>

                <div class="form-group">
                    <label for="name_en" class=" col-md-2">Category type :</label>
                    <div class=" col-md-4">
                      <select class="form-control" name="main_category" id="sub"> 
                      </select>
                    </div> 

                       <label for="name_en" class=" col-md-2">Food Category:</label>
                    <div class=" col-md-4">
                      <select class="form-control" name="food_category_id" id="category"> 
                        <option value="0">Select category type </option>
                      </select>
                    </div>          
                </div>


                <div class="form-group">
                    <label for="name_en" class=" col-md-2">Price:</label>
                    <div class=" col-md-4">
                       <input type="text" class="form-control" name="price" value="" placeholder="£" >
                    </div> 

                       <label for="name_en" class=" col-md-2">Points:</label>
                    <div class=" col-md-4">

                     <input type="text" class="form-control" name="points" value="" placeholder="1" >

                    </div>          
                </div>
      


                <div class="form-group">
                    <label for="name_en" class=" col-md-2">Order:</label>
                    <div class=" col-md-4">
              <input type="checkbox" name="on_takeaway" value="1">Available<br>

                    </div> 

                       <label for="name_en" class=" col-md-2">Party:</label>
                    <div class=" col-md-4">
                <input type="checkbox" name="on_party" value="1"> Available<br>
                    </div>          
                </div>

          <div class="form-group">
                                <div class=" col-md-6">

            <label>Image:</label>
                           <input type="file" class="form-control" name="image"  >
                         </div>
                                <div class=" col-md-6">
                           
                                                 <div class="images"></div>

                         </div>

</div>

                  
  <div class="form-group">
   <div class=" col-md-5">

                          <label>
                            Veg / Non Veg
                <input type="checkbox" value="v" class="form-control" name="veggie"  data-toggle="toggle" data-on="Non Veg" data-width="100" data-off="Veg">

                          </label>

              </div> 
                  <div class=" col-md-3">
                 
                          <label>
                            Status
               <input type="checkbox" value="0"  class="form-control" name="status"  data-toggle="toggle">
                          </label>
</div>
                
</div>


          

                    <div class="form-group">
                    <div class="center-block col-lg-12">
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" name="id" value="">
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