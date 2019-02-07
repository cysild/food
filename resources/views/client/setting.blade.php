@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')

@if(Auth::id()==1)
  @include('client.adminsetting')

@else
@include('client.settingform')
@endif
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





@if(Auth::id()!=1)


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

       var chckstatus=$("[name='status']").val();
      
       if(chckstatus == 1){

     	 var enable = "on";
       }
       else{

       var enable = "off";
       }
        $('[name=statuscheck]').bootstrapToggle(enable);
                $('[name=status]').val(data.html.status);

      });
</script>
@endif
@stop
