function Tables(){

	
}


function AddData(sendurl,mydata){
	     
           //   var  mydata  =  $(this).serialize();
           
            $('.old').remove();
               $.ajax({
                  url: $('#add-data').attr('action'),
                  method: 'post',
                  data: mydata,
                  contentType: false,
                  cache: false,
                  processData:false,
                  success: function(data){
                   if(data.success)
                  {
                    $(".succ").remove();
                    $('.alert').hide();
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('.alert-success').html('<p>'+data.success+'</p>');
                    $('#add-data')[0].reset();  
                    $('.table').DataTable().ajax.reload();
                    $("#form").hide();
                    $(".msg").show();
                    var imageurl = "/images/";
                    $(".msg").append('<img class="img-responsive succ center-block" src="images/check-circle.gif">');
                    $('.modal-footer .btn-primary').hide();
                    setTimeout(function() { $('#modal-add').modal('hide'); }, 1000);
                 //   $('.nav-tabs').hide();
                  }
                  if(data.errors)
                  {
                      $('.alert').show();
                      $('.alert-danger').show();
                      $('#old').remove()
                      $(".succ").remove();
                      $(".msg").show();
                      $('.alert').show();
                      $('.alert-success').hide();
                      $.each(data.errors, function(key, value){
                      $('.alert-danger').append('<p class="old">'+value+'</p>');
                      });
                 }
                 } 
                  });
}


        //modal Add //
          $('#modal-add-open').on('click', function (e) {    
          $('#modal-add').modal('show'); 
          $('#add-data')[0].reset();  
          $('#form').show();
          $('[name=id]').val("");
          $('.images').empty();
           $(".msg").hide();
           $('.alert-success').hide();
           $('.modal-footer .btn-primary').show();
          });



    function getMake(url,val, sel) {
    $.ajax({
    type: "GET",
    url: url,
    data:'set='+val,
    success: function(data){
    $("#make option").remove();
      var toAppend = '';

              toAppend += '<option value="" >Select Make</option>';
           $.each(data.make,function(i,o){
            if(sel == o.id){
              var sele = "selected";
            }
            else{
              sele = "";
            }
            toAppend += '<option '+sele+' value='+o.id+'>'+o.make+'</option>';
            });
      $('#make').append(toAppend);
    }
    });
}





    function getType(url,val, sel) {
    $.ajax({
    type: "GET",
    url: url,
    data:'set='+val,
    success: function(data){
    $("#type option").remove();
      var toAppend = '';

              toAppend += '<option value="" selected>Select Car Type</option>';
           $.each(data.type,function(i,o){
            if(sel == o.id){
              var sele = "selected";
            }
            else{
              sele = "";
            }
            toAppend += '<option '+sele+' value='+o.id+'>'+o.type+'</option>';
            });
      $('#type').append(toAppend);
    }
    });
}


    function getTransmission(url,val, sel) {
    $.ajax({
    type: "GET",
    url: url,
    data:'set='+val,
    success: function(data){
    $("#transmission option").remove();
      var toAppend = '';

              toAppend += '<option value="0" selected>Select Car Transmission</option>';
           $.each(data.transmission,function(i,o){
            if(sel == o.id){
              var sele = "selected";
            }
            else{
              sele = "";
            }
            toAppend += '<option '+sele+' value='+o.id+'>'+o.transmission+'</option>';
            });
      $('#transmission').append(toAppend);
    }
    });
}

    function getFuel(url,val, sel) {
    $.ajax({
    type: "GET",
    url: url,
    data:'set='+val,
    success: function(data){
    $("#fuel option").remove();
      var toAppend = '';

              toAppend += '<option value="0" selected>Select Car Fuel</option>';
           $.each(data.fuel,function(i,o){
            if(sel == o.id){
              var sele = "selected";
            }
            else{
              sele = "";
            }
            toAppend += '<option '+sele+' value='+o.id+'>'+o.fuel+'</option>';
            });
      $('#fuel').append(toAppend);
    }
    });
}


function getFlist(url,val, sel) {
    $.ajax({
    type: "GET",
    url: url,
    data:'set='+val,
    success: function(data){
    $("#flist option").remove();
      var toAppend = '';

 var sele = '';

 var  mydata = data.features;
           $.each(mydata,function(i,o){
          toAppend += '<div class="checkbox col-md-2"><label><input type="checkbox" '+sele+' value='+o.id+' name="features[]">'+o.features+'</label></div>';
            });
      $('#flist').empty().append(toAppend);
           var initValues = sel;
          $('#flist').find(':checkbox[name^="features"]').each(function () {
                    $(this).prop("checked", ($.inArray($(this).val(), initValues) != -1));
                });
    }
    });
       

}





              
function DataDel(url,id){


 bootbox.confirm("Are you sure want to delete?", function(result) {
                 if(result){
           $.ajax({
             type:'GET',
             url: url+"/"+id,
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
}



  /* == Check All == */
   $('#masterCheckbox').click(function (e) {
      var parent = $(this).data('parent'); 
      var $checkBoxes = $(parent + " input[type=checkbox]");
      $($checkBoxes).prop("checked",$(this).prop("checked"));
    });
  




   $('[name=status]').on('change', function (e) {
               e.preventDefault();   
        if($(this).prop('checked')){
                          $(this).val(1)
        }
        else{
                          $(this).val(0)
        }
      });


   $('[name=veggie]').on('change', function (e) {
               e.preventDefault();   
        
        if($(this).prop('checked')){
                          $(this).val('n')
        }
        else{
                          $(this).val('v')
        }
      });


function LoadTable(url,data)
{
  alert(data);
     $('.table').DataTable({
              processing: true,
              serverSide: true,
              ajax:url,
              columns:data
          });
 }

function get_sub(sel){

      $.ajax({
    type: "GET",
    url: APP_URL+'/subcategory',
    data:'set='+sel,
    success: function(data){
    $("#sub option").remove();
      var toAppend = '';

              toAppend += '<option value="0" selected>choose category</option>';
           $.each(data.sub,function(i,o){
            if(sel == o.id){
              var sele = "selected";
            }
            else{
              sele = "";
            }
            toAppend += '<option '+sele+' value='+o.id+'>'+o.category+'</option>';
            });
      $('#sub').append(toAppend);
    }
    });

}


function get_category(sel,set){

      $.ajax({
    type: "GET",
    url: APP_URL+'/categoryjson',
    data:'id='+sel,
    success: function(data){
  //    console.log(count(data.sub));


    $("#category option").remove();

         var total = data.sub.length; 


      var toAppend = '';
      if(total > 0){
              toAppend += '<option value="0" selected>Select Category</option>';
           $.each(data.sub,function(i,o){
            if(set == o.id){
              var sele = "selected";
            }
            else{
              sele = "";
            }
            toAppend += '<option '+sele+' value='+o.id+'>'+o.category+'</option>';
            });
         }
         else{
                        toAppend += '<option value="0" selected disabled>No category found</option>';

         }
      $('#category').append(toAppend);
    }
    });

}