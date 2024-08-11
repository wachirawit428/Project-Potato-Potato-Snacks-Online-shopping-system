// JavaScript Document
$(document).ready(function(){	
    $(document).on( "click", ".menu_collapse", function(){
      $('.menubar').addClass('open');     
      $('.menubackdrop').addClass('open');
    });
    $(document).on( "click", ".menubackdrop", function(){
        $('.menubar').removeClass('open');     
        $(this).removeClass('open');
      });

  


/*---------number-incriment-decriment-------------*/
var incrementPlus;
var incrementMinus;

var buttonPlus  = $(".cart-qty-plus");
var buttonMinus = $(".cart-qty-minus");

var incrementPlus = buttonPlus.click(function() {
	var $n = $(this).parent(".button-container").find(".qty");
	 $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
		var $n = $(this).parent(".button-container").find(".qty");
	var amount = Number($n.val());
	if (amount > 1) {
		$n.val(amount-1);
	}
});

});


$(document).ready(function() {
    //----------rightclick Off----------
$(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode==73){        
              return false;
    }
  });
  
  $(document).on("contextmenu",function(e){        
   e.preventDefault();
  });
  $(document).keydown(function (event) {
    if (event.keyCode == 123) {
        return false;
    }
    else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
        return false;
    }
  });

});