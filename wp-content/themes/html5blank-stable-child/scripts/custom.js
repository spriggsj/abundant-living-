$(document).ready(function(){
  $('#navigation a, #fixedbar a').on('click', function(e) {
    //e.preventDefault();
  });
  
  $(window).on('scroll',function() {
    var scrolltop = $(this).scrollTop();

    if(scrolltop >= 50) {
      $('#fixedbar').fadeIn(250);
    }
    
    else if(scrolltop <= 50) {
      $('#fixedbar').fadeOut(250);
    }
  });
});

 $(document).ready(function(){
   $('.service a').on('click', function(e) {
    // e.preventDefault();
   });});