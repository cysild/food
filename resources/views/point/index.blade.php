@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')

@include('section.table')
@include('point.form')





@stop
@section('css')

<style type="text/css">
@media (min-width: 768px){
.modal-dialog {
    width: 600px;
    margin: 30px auto;
}
}
.one div{
  display: table-cell;
  padding-left: 10px;
}
.one div:first-child{
  padding-left: 0px;
}
</style>
        @stop


@section('js')
<script src="{{url('/admin')}}/vendor/ckeditor/ckeditor.js"></script>
<script src="{{url('/admin')}}/vendor/ckeditor/adapters/jquery.js"></script>
<script src="{{url('/admin')}}/js/bootbox.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('/vendor/adminlte/vendor/toggle')}}/bootstrap-toggle.min.css">
<script src="{{url('/vendor/adminlte/vendor/toggle')}}/bootstrap-toggle.min.js"></script>
<script>
    $(document).ready(function(){
      //           var editor = CKEDITOR.replace( 'desc',{
      // height:'100px',
      //           } );

        // $('#modal-add-open').on('click', function() {
        //    $('.modal-title').html('<h4><b>Add Food Items</b></h4>');
        //  });

             $('.table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{$page['table_url']}}',
              columns:{!!$table!!}
          }); 

    $('#add-data').submit(function(e){
               e.preventDefault();       
    // for ( instance in CKEDITOR.instances ) {
    //     CKEDITOR.instances[instance].updateElement();
    // }  
    var url = "{{$page['save_url']}}";
    var mydata = new FormData(this);
    AddData(url,mydata);
    });

      $('body').on('click', '[data-act=ajax-modal]', function (e) {
            var id = $(this).data('id');
              getData(id); 
      });  

      $('body').on('click', '[data-act=ajax-modal-del]', function (e) {
            var id = $(this).data('id');
            DataDel("{{$page['delete_url']}}",id);
      });


$('#modal-add-open').on('click', function() {
 $('#add-data')[0].reset();
   get_sub();
       $('#modal-add').modal('show');
       $('input[type=checkbox]').attr('checked', false)
      $('[name=status]').val(0);
      $('[name=veggie]').val('n');
      $('[name=veggie]').bootstrapToggle('off');
      $('[name=status]').bootstrapToggle('off');

});



   $('[name=main_category]').on('change', function (e) {
       e.preventDefault();   
       get_category($(this).val());
      });

function getData(id){
   $('.modal-footer .btn-primary').show();
           $(".msg").hide();
           $("#form").show();
           $('.alert-success').hide();
           $("#add-data").show();
            $('.modal-title').html('<h4><b>Edit Pax</b></h4>');
            $.ajax({
              type:'GET',
              url:"{{$page['view_url']}}/" + id,
              success: function(data)
              {
                $('#add-data')[0].reset();
                $('[name=starting_value]').val(data.html.starting_value);
                $('[name=ending_value]').val(data.html.ending_value);
                $('[name=point_value]').val(data.html.point_value);
                $('[name=id]').val(data.html.id);
                if(data.html.status == 1){var status = "on";}
                if(data.html.status == 0){var status = "off";}
                $('[name=status]').bootstrapToggle(status);
                $('[name=status]').val(data.html.status);
                $('#modal-add').modal('show');
             }
            });
}



$('body').on('click', '[data-act=ajax-del-id]', function (e) {
             var id = $(this).data('id');
             var pid = $('[name=id]').val();
              bootbox.confirm("Are you sure want to delete?", function(result) {
              if(result){
              delimages(id,pid);
             $('.table').DataTable().ajax.reload();
            }
        });
      
      });




});
</script>

@stop
