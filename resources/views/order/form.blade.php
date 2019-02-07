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
                     <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/admin/order/update')}}" id="add-data" >

                  <div class="item-detail">
                  </div>
                   <div class="form-group">
                    <div class="col-md-4"></div>
                    <label for="name_en" class=" col-md-4"> Total:</label>
                    <input type="hidden" name="id" value="">

                    <div class=" col-md-4">
                  <label name="total" id="total"></label>
                    </div>   

                    
                </div>

<div class="part">
                <div class="form-group">
                    <div class="col-md-4"></div>
                    <label for="name_en" class=" col-md-4"> Members:</label>

                    <div class=" col-md-4">
                  <label name="member"></label>
                    </div>   
                </div>

                              <div class="form-group">
                    <div class="col-md-4"></div>
                    <label for="name_en" class=" col-md-4"> Date:</label>

                    <div class=" col-md-4">
                  <label name="delivery_date"></label>
                    </div>   
                </div>
                              <div class="form-group">
                    <div class="col-md-4"></div>
                    <label for="name_en" class=" col-md-4"> address:</label>

                    <div class=" col-md-4">
                  <label name="address"></label>
                    </div>   
                </div>

</div>

                <div class="form-group">
                  <div class="col-md-4">Status</div>
                  <div class="col-md-8">
                   <select name="procees" id="orderstat" class="form-control orderstat">
                        <option value="o">open</option>
                        <option value="p">processing</option>
                        <option value="c">Closed</option>
                    </select> 
                  </div>
                </div>
                     {{csrf_field()}}     
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" name="id" value="">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                 </form> 
                 <div id="form">
                    <!-- end form --> 

                  </div>

                  

                  </div>
                      

            <!-- /.modal-content -->
                  </div>
          <!-- /.modal-dialog -->