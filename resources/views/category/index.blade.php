@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')

@include('section.table')
@include('category.form')





@stop
@section('css')

<style type="text/css">
@media (min-width: 768px){
.modal-dialog {
    width: 500px;
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
                var editor = CKEDITOR.replace( 'desc',{
      height:'100px',
                } );

        $('#modal-add-open').on('click', function() {
           $('.modal-title').html('<h4><b>Add Food Category</b></h4>');
           editor.setData('');
         });

             $('.table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{$page['table_url']}}',
              columns:{!!$table!!}
          }); 

    $('#add-data').submit(function(e){
               e.preventDefault();       
    for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }  
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
                bootbox.confirm("Are you sure want to delete?", function(result) {
                  if(result){
            $.ajax({
              type:'GET',
              url:"{{$page['delete_url']}}/" + id,
              success: function(data)
              {
                if(data.success){
                bootbox.alert(data.success, )
                    $('.alert').show();
                    $('.alert-danger').html('<p>'+data.success+'</p>');
                    $('.table').DataTable().ajax.reload();
              }
            
            else{
              bootbox.alert(data.error, )
               $('.alert').show();
                    $('.alert-danger').html('<p>'+data.error+'</p>');
                    $('.table').DataTable().ajax.reload();
            }
            }
            });
          }
            });
      });


var imageurl ="{{url('/images/types')}}/";

$('#modal-add-open').on('click', function() {
             $('#add-data')[0].reset();
   get_sub();
     $('[name=status]').val(1);
            $('[name=status]').bootstrapToggle('on');
       $('#modal-add').modal('show');
});

function getData(id){
   $('.modal-footer .btn-primary').show();
           $(".msg").hide();
           $("#form").show();
           $('.alert-success').hide();
           $("#add-data").show();
            $('.modal-title').html('<h4><b>Edit Food Category</b></h4>');
            $.ajax({
              type:'GET',
              url:"{{$page['view_url']}}/" + id,
              success: function(data)
              {
                $('#add-data')[0].reset();
                $('[name=type]').val(data.html.type);
                $('[name=id]').val(data.html.id);
                                $('[name=catgeory]').val(data.html.name);

               editor.setData(data.html.description);
get_sub(data.html.is_parent);
     $.each(data.html, function(key, value)
             {
              $('[name='+key+']').val(value);
             }



             );
    

                  if(data.html.status == 1){var status = "on";}
                  if(data.html.status == 0){var status = "off";}


                 
                $('[name=status]').bootstrapToggle(status);
                                       $('[name=status]').val(data.html.status);

              //   alert(data.html.status);
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
         //alert(pid);
      });

function delimages(i,p){
     $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
   $.ajax({
    type: "POST",
    url: "{{url('/admin/cartype/images/del')}}",
    data:{

      "p":p,
      "i":i,
      "_token": "{{ csrf_token() }}",

    },
    success: function(data){
     // alert(data);
                      bootbox.alert(data.success, )

                           //  var id = $(i).data('id').hide();

                 $('.images').hide();
                 
             $('.table').DataTable().ajax.reload();

                            
                                


    }
    });


}



});
</script>

@stop
