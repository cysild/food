$('.added-items').on('click', '.itemqty-increase', function() {
	var $n = $(this).parent(".rate").find(".itemqty");
	var $itemp = $('#item-price').val();
	var $totitemqty = $n.html(function(i, val) { return val*1+1 } );
	$(".commonqty").html(function(i, val) { return val*1+1 } );
});
$('.added-items').on('click', '.itemqty-decrease', function() {
	var $n = $(this).parent(".rate").find(".itemqty");
	var $totitemqty = $n.html(function(i, val) { if(val == 0) { return 0 } else{ return val*1-1 } } );
	$(".commonqty").html(function(i, val) { if(val == 0) { return 0 } else{ return val*1-1 } } );
});

$("#add-item").click(function(){

	var menuname = $("#item-name").text();
	var itemprice = $("#item-price").text();
	$('.added-items').append("<div class='row'><div class='col-xs-12 col-sm-8 col-md-6 col-lg-6'><p id='itemname'>" + menuname + "</p></div><div class='col-xs-12 col-sm-4 col-md-3 col-lg-3'><div class='rate'><p class='itemqty-decrease'>-</p><p class='itemqty'>0</p><p class='itemqty-increase'>+</p></div></div><div class='col-xs-12 col-sm-8 col-md-2 col-lg-2'><p>&#163; <span id='itemrate'>" + itemprice + "</span></p></div><div class='col-xs-12 col-sm-4 col-md-1 col-lg-1'><p><i class='fa fa-trash-o' aria-hidden='true'></i></p></div></div>");
});

//Menu Nav Submenu
var $container = $('.list');
$container.find('.submenu-items').hide();
$container.find('.submenu').click(function (e) {
    var $menu = $(this).next('.submenu-items').slideToggle();
    $('ul.submenu-items', $container).not($menu).slideUp();
    e.preventDefault();
});


//Scroll Menu List
$('#listing-page .list li>a').click(function(){
	var moveto = $(this).attr('href');
	window.location.hash = moveto;
	// if (moveto.length) {
	// 	$('#listing-page .invisible-scrollbar').animate({scrollTop: $(moveto).parent().offset().top}, 2000);
	// }
	$('.modal').modal('hide');
});

// var current = 0;
// $('.itemqty-increase').click(function(){
// 	current = current + 1;
// 	$('.itemqty').html(current);
// });	
// $("#itemqty-increase").each(function() {
//    $(this).data("serial", current);
//    current++;
// });
// $('#itemqty-increase').click(function(){
// 	$(this).next('p').html(function(i, val) { return val*1+1 });
// });
// $('#itemqty-decrease').click(function(){
// 	$('.itemqty').html(function(i, val) { return val*1-1 });
// });