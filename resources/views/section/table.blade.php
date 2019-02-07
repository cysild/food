        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$page['title']}}</h3>
              <div class="box-body">
                <button type="button" class="btn btn-default" style="float:right;" data-toggle="modal" id="modal-add-open" >
                Add {{$page['content']}}
              </button>
              </div>
            </div>
    
            <!-- /.box-header -->
            <div class="box-body">
                  <table  class="table table-bordered table-hover">
                <thead>
                <tr>
                  @foreach($heading as $head)
                  <th>{{ucfirst($head)}}</th>
                  @endforeach
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

