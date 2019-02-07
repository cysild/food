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
                    <label for="name_en" class=" col-md-3"> Name :</label>
                    <div class=" col-md-9">
                       <input type="text" class="form-control" name="catgeory" value="" placeholder="Chinese,Soups,..." >
                    </div>           
                    {{csrf_field()}}
                </div>

                      <div class="form-group">
                    <label for="name_en" class=" col-md-3">Parent :</label>
                    <div class=" col-md-9">
                      <select class="form-control" name="is_parent" id="sub"> 
                      </select>
                    </div>           
                </div>

                <div class="form-group">
                  <div class="col-md-12">
                  <label for="name_en" class="">Description:</label>
                  <textarea class="form-control" name="desc"></textarea>
                </div>
                </div>  

                <div class="form-group">
                  <div class=" col-md-12">
                           <label for="name_en" class="">Status:</label>
                            <input type="checkbox" value="1" class="form-control" class="form-control" name="status"  data-toggle="toggle">
                  </div>
              </div> 



          

                    <div class="form-group">
                    <div class="center-block col-lg-12">
                      <div class="images"></div>
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