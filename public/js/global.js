          



   $('#makea').on('change', function (e) {
               e.preventDefault();   

          sel ="";
          var url = APP_URL+"/model/json";
          var val = $(this).val();
          getModel(url,val,sel);


      });


    function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}






  $('#reserve').submit(function (e) {
  e.preventDefault();   
    $('#old').remove();
// alert('x');
     $.ajax({
                  url: APP_URL+"/request/store",
                  method: 'POST',
                  data: new FormData(this),
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
                    $('#request')[0].reset();  
               //     $('.table').DataTable().ajax.reload();
                    $("#form").hide();
                    $(".msg").show();
                    var imageurl = APP_URL+"/images/";
                    $(".msg").append('<img class="img-responsive succ center-block" src="'+APP_URL+'/images/check-circle.gif">');
                    $('.modal-footer .btn-primary').hide();
                    setTimeout(function() { $('#reserveCarForm').modal('hide'); }, 1000);

                  }
                  if(data.errors)
                  {
                      $('.alert').show();
                      $('.alert-danger').show();
                      $(".succ").remove();
            
                      $(".msg").show();
                      $('.alert').show();
                      $('.alert-danger').show();

                                           // $('.alert-danger').remove();


                   //   alert-danger

                      $('.alert-success').hide();
                                $('#old').remove();
                      $.each(data.errors, function(key, value){
                      $('.alert-danger').append('<p id="old">'+value+'</p>');
                      });
                 }
}
                });

        return false;

  });




$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.tab-content .tab-pane .tab-pane-inner #selection').on('change', function() {
  //alert($(this).val());
       $.ajax({
               url: APP_URL+"/restaurant",      
               method: 'POST',
           beforeSend: function() 
           {
             $('#response').html('<svg width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-coffee" style="background: none;"><defs><linearGradient id="gradient" x1="0%" x2="0%" y1="0%" y2="100%"><stop offset="10%" stop-color="black" stop-opacity="0"></stop><stop offset="100%" stop-color="white" stop-opacity="1"></stop></linearGradient><mask id="mask" maskUnits="userSpaceOnUse" x="0" y="0" width="100" height="100"><rect x="22" y="8" width="56" height="54" fill="url(#gradient)"></rect></mask><path id="steam" d="M0-4c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0 c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9h0c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9" stroke-width="6" stroke-linecap="round" fill="#f00" stroke="#abbd81"></path></defs><g mask="url(#mask)"><use x="29" y="-7.63012" href="#steam"><animate attributeName="y" calcMode="linear" values="4;-14" keyTimes="0;1" dur="0.5" begin="0s" repeatCount="indefinite"></animate></use><use x="47" y="-5.26025" href="#steam"><animate attributeName="y" calcMode="linear" values="0;-18" keyTimes="0;1" dur="0.25" begin="0s" repeatCount="indefinite"></animate></use><use x="64" y="-12.4452" href="#steam"><animate attributeName="y" calcMode="linear" values="-4;-22" keyTimes="0;1" dur="0.3333333333333333" begin="0s" repeatCount="indefinite"></animate></use></g><path d="M81.2,52.5l-5.2,0V49c0-1.6-1.3-3-3-3H20c-1.6,0-3,1.3-3,3v11.6C17,71.3,25.7,80,36.5,80h20.1 c7.1,0,13.3-3.8,16.7-9.5h8.3c5.2,0,9.3-4.4,9-9.6C90.2,56.1,86,52.5,81.2,52.5z M81.5,67.5h-6.8c0.8-2.2,1.3-4.5,1.3-7v-5h5.5 c3.3,0,6,2.7,6,6S84.8,67.5,81.5,67.5z" fill="#e15b64"></path><path d="M78.8,88H19.2c-1.1,0-2-0.9-2-2s0.9-2,2-2h59.5c1.1,0,2,0.9,2,2S79.9,88,78.8,88z" fill="#f47e60"></path></svg>')
           },
            data: {
             "id": $(this).val(),
             "_token": $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
              if(data.status == 401)
              {
             $('#response').html('<svg width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-coffee" style="background: none;"><defs><linearGradient id="gradient" x1="0%" x2="0%" y1="0%" y2="100%"><stop offset="10%" stop-color="black" stop-opacity="0"></stop><stop offset="100%" stop-color="white" stop-opacity="1"></stop></linearGradient><mask id="mask" maskUnits="userSpaceOnUse" x="0" y="0" width="100" height="100"><rect x="22" y="8" width="56" height="54" fill="url(#gradient)"></rect></mask><path id="steam" d="M0-4c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0 c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9h0c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9" stroke-width="6" stroke-linecap="round" fill="#f00" stroke="#abbd81"></path></defs><g mask="url(#mask)"><use x="29" y="-7.63012" href="#steam"><animate attributeName="y" calcMode="linear" values="4;-14" keyTimes="0;1" dur="0.5" begin="0s" repeatCount="indefinite"></animate></use><use x="47" y="-5.26025" href="#steam"><animate attributeName="y" calcMode="linear" values="0;-18" keyTimes="0;1" dur="0.25" begin="0s" repeatCount="indefinite"></animate></use><use x="64" y="-12.4452" href="#steam"><animate attributeName="y" calcMode="linear" values="-4;-22" keyTimes="0;1" dur="0.3333333333333333" begin="0s" repeatCount="indefinite"></animate></use></g><path d="M81.2,52.5l-5.2,0V49c0-1.6-1.3-3-3-3H20c-1.6,0-3,1.3-3,3v11.6C17,71.3,25.7,80,36.5,80h20.1 c7.1,0,13.3-3.8,16.7-9.5h8.3c5.2,0,9.3-4.4,9-9.6C90.2,56.1,86,52.5,81.2,52.5z M81.5,67.5h-6.8c0.8-2.2,1.3-4.5,1.3-7v-5h5.5 c3.3,0,6,2.7,6,6S84.8,67.5,81.5,67.5z" fill="#e15b64"></path><path d="M78.8,88H19.2c-1.1,0-2-0.9-2-2s0.9-2,2-2h59.5c1.1,0,2,0.9,2,2S79.9,88,78.8,88z" fill="#f47e60"></path></svg>')
              }
              if(data.status == 200)
              {
              window.location.href = APP_URL+"/restaurant";              
              }       
        }
      });
  });

$('#shop').on('change', function() {
  //alert($(this).val());
       $.ajax({
               url: APP_URL+"/restaurant",      
               method: 'POST',
           beforeSend: function() 
           {
             $('#response').html('<svg width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-coffee" style="background: none;"><defs><linearGradient id="gradient" x1="0%" x2="0%" y1="0%" y2="100%"><stop offset="10%" stop-color="black" stop-opacity="0"></stop><stop offset="100%" stop-color="white" stop-opacity="1"></stop></linearGradient><mask id="mask" maskUnits="userSpaceOnUse" x="0" y="0" width="100" height="100"><rect x="22" y="8" width="56" height="54" fill="url(#gradient)"></rect></mask><path id="steam" d="M0-4c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0 c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9h0c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9" stroke-width="6" stroke-linecap="round" fill="#f00" stroke="#abbd81"></path></defs><g mask="url(#mask)"><use x="29" y="-7.63012" href="#steam"><animate attributeName="y" calcMode="linear" values="4;-14" keyTimes="0;1" dur="0.5" begin="0s" repeatCount="indefinite"></animate></use><use x="47" y="-5.26025" href="#steam"><animate attributeName="y" calcMode="linear" values="0;-18" keyTimes="0;1" dur="0.25" begin="0s" repeatCount="indefinite"></animate></use><use x="64" y="-12.4452" href="#steam"><animate attributeName="y" calcMode="linear" values="-4;-22" keyTimes="0;1" dur="0.3333333333333333" begin="0s" repeatCount="indefinite"></animate></use></g><path d="M81.2,52.5l-5.2,0V49c0-1.6-1.3-3-3-3H20c-1.6,0-3,1.3-3,3v11.6C17,71.3,25.7,80,36.5,80h20.1 c7.1,0,13.3-3.8,16.7-9.5h8.3c5.2,0,9.3-4.4,9-9.6C90.2,56.1,86,52.5,81.2,52.5z M81.5,67.5h-6.8c0.8-2.2,1.3-4.5,1.3-7v-5h5.5 c3.3,0,6,2.7,6,6S84.8,67.5,81.5,67.5z" fill="#e15b64"></path><path d="M78.8,88H19.2c-1.1,0-2-0.9-2-2s0.9-2,2-2h59.5c1.1,0,2,0.9,2,2S79.9,88,78.8,88z" fill="#f47e60"></path></svg>')
           },
            data: {
             "id": $(this).val(),
             "_token": $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
              if(data.status == 401)
              {
             $('#response').html('<svg width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-coffee" style="background: none;"><defs><linearGradient id="gradient" x1="0%" x2="0%" y1="0%" y2="100%"><stop offset="10%" stop-color="black" stop-opacity="0"></stop><stop offset="100%" stop-color="white" stop-opacity="1"></stop></linearGradient><mask id="mask" maskUnits="userSpaceOnUse" x="0" y="0" width="100" height="100"><rect x="22" y="8" width="56" height="54" fill="url(#gradient)"></rect></mask><path id="steam" d="M0-4c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0 c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9h0c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9" stroke-width="6" stroke-linecap="round" fill="#f00" stroke="#abbd81"></path></defs><g mask="url(#mask)"><use x="29" y="-7.63012" href="#steam"><animate attributeName="y" calcMode="linear" values="4;-14" keyTimes="0;1" dur="0.5" begin="0s" repeatCount="indefinite"></animate></use><use x="47" y="-5.26025" href="#steam"><animate attributeName="y" calcMode="linear" values="0;-18" keyTimes="0;1" dur="0.25" begin="0s" repeatCount="indefinite"></animate></use><use x="64" y="-12.4452" href="#steam"><animate attributeName="y" calcMode="linear" values="-4;-22" keyTimes="0;1" dur="0.3333333333333333" begin="0s" repeatCount="indefinite"></animate></use></g><path d="M81.2,52.5l-5.2,0V49c0-1.6-1.3-3-3-3H20c-1.6,0-3,1.3-3,3v11.6C17,71.3,25.7,80,36.5,80h20.1 c7.1,0,13.3-3.8,16.7-9.5h8.3c5.2,0,9.3-4.4,9-9.6C90.2,56.1,86,52.5,81.2,52.5z M81.5,67.5h-6.8c0.8-2.2,1.3-4.5,1.3-7v-5h5.5 c3.3,0,6,2.7,6,6S84.8,67.5,81.5,67.5z" fill="#e15b64"></path><path d="M78.8,88H19.2c-1.1,0-2-0.9-2-2s0.9-2,2-2h59.5c1.1,0,2,0.9,2,2S79.9,88,78.8,88z" fill="#f47e60"></path></svg>')
              }
              if(data.status == 200)
              {
              window.location.href = APP_URL+"/restaurant";              
              }       
        }
      });
  });


          $('[name=complete]').on('submit', function() {
            $('.alert-danger').empty();

   $.ajax({
               url: APP_URL+"/complete",      
               method: 'POST',
               data: $(this).serialize(),
            beforeSend: function() 
           {
             $('#response').html('<svg width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-coffee" style="background: none;"><defs><linearGradient id="gradient" x1="0%" x2="0%" y1="0%" y2="100%"><stop offset="10%" stop-color="black" stop-opacity="0"></stop><stop offset="100%" stop-color="white" stop-opacity="1"></stop></linearGradient><mask id="mask" maskUnits="userSpaceOnUse" x="0" y="0" width="100" height="100"><rect x="22" y="8" width="56" height="54" fill="url(#gradient)"></rect></mask><path id="steam" d="M0-4c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0 c2.1,2.6,2.1,6.4,0,9l0,0c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9c-2.1,2.6-2.1,6.4,0,9l0,0c2.1,2.6,2.1,6.4,0,9l0,0 c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9h0c-2.1,2.6-2.1,6.4,0,9h0c2.1,2.6,2.1,6.4,0,9" stroke-width="6" stroke-linecap="round" fill="#f00" stroke="#abbd81"></path></defs><g mask="url(#mask)"><use x="29" y="-7.63012" href="#steam"><animate attributeName="y" calcMode="linear" values="4;-14" keyTimes="0;1" dur="0.5" begin="0s" repeatCount="indefinite"></animate></use><use x="47" y="-5.26025" href="#steam"><animate attributeName="y" calcMode="linear" values="0;-18" keyTimes="0;1" dur="0.25" begin="0s" repeatCount="indefinite"></animate></use><use x="64" y="-12.4452" href="#steam"><animate attributeName="y" calcMode="linear" values="-4;-22" keyTimes="0;1" dur="0.3333333333333333" begin="0s" repeatCount="indefinite"></animate></use></g><path d="M81.2,52.5l-5.2,0V49c0-1.6-1.3-3-3-3H20c-1.6,0-3,1.3-3,3v11.6C17,71.3,25.7,80,36.5,80h20.1 c7.1,0,13.3-3.8,16.7-9.5h8.3c5.2,0,9.3-4.4,9-9.6C90.2,56.1,86,52.5,81.2,52.5z M81.5,67.5h-6.8c0.8-2.2,1.3-4.5,1.3-7v-5h5.5 c3.3,0,6,2.7,6,6S84.8,67.5,81.5,67.5z" fill="#e15b64"></path><path d="M78.8,88H19.2c-1.1,0-2-0.9-2-2s0.9-2,2-2h59.5c1.1,0,2,0.9,2,2S79.9,88,78.8,88z" fill="#f47e60"></path></svg>')
            
           },
      success: function(data){

        if(data.status == 200){
$(".preview").addClass("disabledbutton");
$('.order').show();
$('.cnf').hide();

$('#response').html('');

$( ".sc-cart-clear" ).trigger( "click" );

         
          $('.order').empty().html('<h1>Thank You</h2><p>Order has Been Accepted your Reference number'+data.order_id+'</p>')
        }

            if(data.errors)
                  {
                      $('.alert').show();
                      $('.alert-danger').show();
                      $(".succ").remove();
            
                      $(".msg").show();
                      $('.alert').show();
                      $('.alert-danger').show();

                                           // $('.alert-danger').remove();


                   //   alert-danger

                      $('.alert-success').hide();
                                $('#old').remove();
                      $.each(data.errors, function(key, value){
                      $('.alert-danger').append('<p id="old">'+value+'</p>');
                      });
                 }


      }
    });


return false;
          });