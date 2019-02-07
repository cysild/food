<form class="form-horizontal" method="POST" enctype="multipart/form-data" id="add-product" data-parsley-validate  action="{{url('/admin/item/recommend/store')}}">
                <div class="form-group">
                   <div class="col-md-2">
                        <label>Item List</label>
                   </div>
                   <div class="col-md-10">
                      <select name="prod_id[]" id="prod" class="form-control product">
                      <option></option></select>
                      <div id="prods"></div>
                   </div>
                    {{csrf_field()}}
                </div>
             
                  
                     
                      <button type="submit" class="btn btn-primary">Save changes</button>
              
                 
</form> 