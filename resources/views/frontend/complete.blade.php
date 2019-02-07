<!-- Modal -->
<form name='complete' method="post" id="completeform">
  {{csrf_field()}}
<div id="complete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Complete Order</h4>
      </div>
      <div class="modal-body">
        <div class="center-block msg">
          <div class="alert alert-success" style="display:none"></div>
          <div class="alert alert-danger" style="display:none"></div>
        </div>
        <div class="order" style="display: none;">
          <span></span>
        </div>
        @if($type == 't')
          <div class="restratant Details">
            <h4>Restaurant Details</h4> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p>Restaurant</p><p>{{$store->name}}</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p>Address</p><p>{{$store->address}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p>Contact 1</p><p>{{$store->contact}}</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                @if($store->contact2)
                  <p>Contact 2</p><p>{{$store->contact2}}</p>
                @endif
              </div>
            </div>
          </div>
          <hr>
          <div class="preview">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Name</label>
                  <input type="text" class="form-control" name="name" value="" placeholder="" required>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en"> Phone</label>
                  <input type="text" class="form-control" name="phone" value="" required> 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Note</label>
                  <textarea class="form-control" name="note"></textarea>
                  <span class="carttotal"></span>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Email</label>
                  <input type="email" class="form-control" name="email" value="" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Total</label>
                  <p for="name_en" class="tot">Total</p>
                  {{csrf_field()}} 
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"></div>
            </div>
          </div>
        @else
          <div class="restratant Details">
            <h4>Restaurant Details</h4> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p>Restaurant</p><p>{{$store->name}}</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p>Address</p><p>{{$store->address}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <p>Contact 1</p><p>{{$store->contact}}</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                @if($store->contact2)
                  <p>Contact 2</p><p>{{$store->contact2}}</p>
                @endif
              </div>
            </div>
          </div>
          <hr>
          <div class="preview">

                 <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="name_en">Name</label>
                  <input name="name" class=" form-control">
                </div>
              </div>
       
            </div>


            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Deliver Date</label>
                  <input name="delivery_date" class="datepicker form-control" required>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Phone</label>
                  <input type="text" class="form-control" name="phone" value="" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Email</label>
                  <input type="email" class="form-control" name="email" value="" required>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label for="name_en">Address</label>
                  <textarea class="form-control" name="address" required></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p><strong>Total</strong></p>
                    <p class="totalp">&#163;<span id="rpoints"></span></p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <p ><strong>Members</strong></p>
                    <p class="mempp"><i class="fa fa-user" aria-hidden="true"></i><span id="rmember"></span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif 
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary cnf">Confirm</button>
          <button type="button" class="btn btn-default cle" data-dismiss="modal">Close</button>
      </div>
 </form>