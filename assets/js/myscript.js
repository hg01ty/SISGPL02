
$(document).ready(function(){
	$(".icono").click(function(){
		$("body,html").animate({
			scrollTop:"0px"
		},2000);
	});

	$(window).scroll(function(){
		console.log($(window).scrollTop());
		if ($(window).scrollTop()>0) {
			$(".icono").slideDown(300);
		}
		else{
			$(".icono").slideUp(300);
		}
	});

	
new WOW().init();

$(function(){

     $('a[href*=#]').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;

            }

       }

   });

});






});

