@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
@include('section.table')

@include('shop.form')
@stop
@section('css')

<style type="text/css">
@media (min-width: 768px){
.modal-dialog {
    width: 500px;
    margin: 30px auto;
}
}
</style>
        @stop


@section('js')

<script src="{{url('/admin')}}/js/bootbox.min.js"></script>
<script src="{{url('/admin')}}/vendor/ckeditor/ckeditor.js"></script>
<script src="{{url('/admin')}}/vendor/ckeditor/adapters/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('/vendor/adminlte/vendor/toggle')}}/bootstrap-toggle.min.css">
<script src="{{url('/vendor/adminlte/vendor/toggle')}}/bootstrap-toggle.min.js"></script>

<script>
    $(document).ready(function(){
         

          $("[name='statuscheck']").change(function() {
          if($(this).is(":checked")){
              $("[name='status']").val(1);



          }
          if($(this).is(":not(:checked)")){
              $("[name='status']").val(0);
          }
          
      });

            $('#modal-add-open').on('click', function() {
           $('.modal-title').html('<h4><b>Add Restaurant</b></h4>');
           $('#add-data')[0].reset();
           $("[name='users_id']").val(0); 
           $('.alert-danger').empty();
           $('.shop-detail').show();
           $('.user-detail').show(); 
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
        $('[name=users_id]').val("");
         $('.alert-danger').empty();
            var id = $(this).data('id');
              getData(id); 
      }); 

       $('body').on('click', '[data-act=ajax-user]', function (e) {
        $('[name=id]').val("");
            var id = $(this).data('id');
             $('.alert-danger').empty();
              getUser(id); 
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
                  if(data.error){
                

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


var imageurl ="{{url('/images/make')}}/";

function getData(id){
   $('.modal-footer .btn-primary').show();
           $(".msg").hide();
           $('.user-detail').hide();
           $('.shop-detail').show();
           $("#form").show();
           $('.alert-success').hide();
           $('.modal-title').html('<h4><b>Edit Restaurant</b></h4>');
           $("#add-data").show(); 
            $.ajax({
              type:'GET',
              url:"{{ url('/admin/get/shop') }}/" + id,
              success: function(data)
              {
                
                $('#add-data')[0].reset();
            $.each(data.html, function(key, value)
             {
              $('[name='+key+']').val(value);
              
             

              if(data.html.status == 1){
                  var status = "on";
                    }
                else
                {
                  var status = "off";
                }
                $('[name=statuscheck]').bootstrapToggle(status);
                $('[name=status]').val(data.html.status);

         });

            $('.table').DataTable().ajax.reload();
                   
                $('#modal-add').modal('show');
             }
            });
}



function getUser(id){
   $('.modal-footer .btn-primary').show();
           $(".msg").hide();
           $('.user-detail').show();
           $('.shop-detail').hide();

           $("#form").show();
           $('.alert-success').hide();
           $('.modal-title').html('<h4><b>Edit User</b></h4>');
           $("#add-data").show(); 
            $.ajax({
              type:'GET',
              url:"{{ url('/admin/get/user') }}/" + id,
              success: function(data)
              {
                $('#add-data')[0].reset();
            $.each(data.html, function(key, value)
             {
              $('[name='+key+']').val(value);
              
             }

     );
            $('.table').DataTable().ajax.reload();

             $('.pass').val('');
            $('.pwd').html('New Password:');
            $('.cpwd').html('Confirm Password:');

         
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

});
</script>

@stop
