@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')

@include('section.table')
@include('order.form')





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

#modal-add-open{
  display: none;
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
    var url = "{{url('/admin/order/update')}}";
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
           
            $.ajax({
              type:'GET',
              url:APP_URL+"/admin/orders/" + id,
              success: function(data)
              {


$('.emp').remove();

            $('.item-detail').append('<div class="form-group emp"><div class="col-md-1">Email</div><div class="col-md-5"><label  name="product_name">'+data.order['email']+'</label></div><div class="col-md-1">Contact</div><div class=" col-md-5"><label  name="product_quantity">'+data.order['contact']+'</label></div></div>');

                if(data.order['type'] =="T"){
                $('.item-detail').append('<div class="form-group emp"><div class="col-md-4"><label  name="product_name">Item Name</label></div><div class=" col-md-4"><label  name="product_quantity">Quantity</label></div><div class=" col-md-4"><label  name="product_price">Price</label></div></div>');
     }
     else{

      $('.item-detail').append('<div class="form-group emp"><div class="col-md-4"><label  name="product_name">Item Name</label></div><div class=" col-md-4"><label  name="product_quantity">Quantity</label></div><div class=" col-md-4"><label  name="product_price">Points</label></div></div>');

     }

            $.each(data.items, function(key, value)
             {
              $('.item-detail').append('<div class="form-group emp"><div class="col-md-4"><label  name="product_name">'+value.product_name+'</label></div><div class=" col-md-4"><label  name="product_quantity">'+value.product_quantity+'</label></div><div class=" col-md-4"><label  name="product_price">'+value.product_price*value.product_quantity+'</label></div></div>');

            });

  
              
            
             $.each(data.order, function(key, value)
             {

               if(key == 'total'){
                  if(value == '0'){
                    value="Out of Range";
                  }
                 
                }
                 $('[name='+key+']').html(value)
                 if(key == 'id'){
                  $('[name='+key+']').val(value)
                 }
                 if(key =='type' && value == 'P'){
                  $('.part').show();
                     //  $('[name='+key+']').val(value);
                 }
                 else{
                  $('.part').hide();
                 }

                 if(key == 'orderid'){
                    $('.modal-title').html('<h4><b>Order Id - '+value+'</b></h4>');
                 }
                 if(key == 'status'){
                  $('#orderstat').val(value);
                 }

             });
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
