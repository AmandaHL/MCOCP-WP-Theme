jQuery(function($) {
	//responsive menu function	
	$('.nav-icon').on('click', function(event){
		event.preventDefault();
		var slideoutMenu = $('.header-navigation');	
		slideoutMenu.slideToggle(200);
		$('.header-nav ul').toggleClass('mobile');
	});
	//sub-menu
	$(document).ready(function(){
		$('.sub-menu').hide();
		 //navigation hover style 
		$('.header-nav > li').on('mouseenter', function(){
			$(this).siblings().children('.sub-menu').hide();
			if($(this).hasClass('menu-item-has-children')) {
				$(this).children('.sub-menu').delay('300').show();
				$('.header-drop-down').show();
			}
		})
		
		$('.header-nav > li').on('mouseleave', function(){
			$(this).children('.sub-menu').hide();
			$('.header-drop-down').hide();
		})
		$('.arrow-toggle').on('click', function(){
			$('.portmenu').slideToggle('fast');
		})
	});


	//recipents 
	$(document).ready(function(){
		$('.recipients div').hide();
		$('.recipients h3').on('click', function(){
			var $closest = $(this).next('div');
			$('.recipients div').not($closest).slideUp();
			$closest.slideToggle('fast');
		});
	})


	//show more/less
	$(document).ready(function(){
		$('.toggle').on('click', function(){
			var $closest = $(this).parent().next('.more');
			var $notThis = $(this).parent().siblings();
			var $notThish3 = $(this).parent().parent().siblings().children('h3');
			$('.more').not($closest).slideUp();
			$closest.slideToggle('fast');
			$(this).html($(this).text() == 'Close' ? 'View Details' : 'Close');
			$notThis.find('.toggle').html($('.toggle').text() == 'View Details' ? 'View Details' : 'View Details');
			$notThish3.find('.toggle').html($('.toggle').text() == 'View Details' ? 'View Details' : 'View Details');
		});
	})

});
