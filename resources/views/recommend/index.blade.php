@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
@include('recommend.form')





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

  $('#prod').attr('multiple', 'multiple');
    $("#prod option")[0].remove();

     $('.product').select2({
      width: '100%',
      multiple:true,
      allowClear: true,
        placeholder: 'Select Items',
        ajax: {
          url: "{{url('/admin')}}/item/list",
          dataType: 'json',
          delay: 250,
            initSelection: true, 

          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {

                    if(item== ''){
                      return null;
                    }
                    return {
                        text: item.name,
                        id: item.id,
                    }
                })
            };
          },
          cache: false
        }
      });


    $(document).ready(function(){  
       var Select = $('.product');

       $(".product").empty().trigger('change');

    var xurl="{{url('admin/item/recommend/list/get')}}";      
     $.ajax({
              type:'GET',
              url:xurl,
              success: function(data)
              {  


          if(!data.error){

     $.each(data, function(key, value){



         var option = new Option(value.name,value.id, true, true);
                Select.append(option).trigger('change');
                Select.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });


              });
   }

              }
            });
  });

</script>

@stop
