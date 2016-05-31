// JavaScript Document
jQuery(document).ready(function($){
	$('.srl-controls').on('click', 'a', function(){
		//console.log($(this));
		var divs = 'rw_'+$(this).attr('data-rw');
		$('.sr-box-single').addClass('hide').hide();
		$('.'+divs).removeClass('hide');
		$('.'+divs).css({
				opacity: 0,
				display: 'inline-block'     
			}).animate({opacity:1},600);
		
		$('.srl-controls a').removeClass('active');
		$(this).addClass('active');
	});
	if($('.srl-controls a').length>1){
		var rotate = setInterval(function(){
			if($('.srl-controls a.active').index()==($('.srl-controls a').length-1)){
				$('.srl-controls a').eq(0).click();
			}else{
				$('.srl-controls a.active').next().click();
			}
			
		}, 10000);
	}
});