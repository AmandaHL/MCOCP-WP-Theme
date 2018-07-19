(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		
	});
	
})(jQuery, this);

jQuery(function($) {
//responsive menu function	
	$('.nav-icon').on('click', function(event){
			event.preventDefault();
			var slideoutMenu = $('.header-navigation');	
			slideoutMenu.slideToggle(200);
			$('.header-nav ul').toggleClass('mobile');
	});
	$(document).ready(function(){
		 $('.sub-menu').hide();
		 //navigation hover style 
		$('.topnav > li').on('mouseenter', function(){
			$(this).siblings().children('.sub-menu').hide();
			if($(this).hasClass('menu-item-has-children')) {
			$(this).children('.sub-menu').delay('300').show();
			$('.header-drop-down').show();
			}
			})
		
		$('.topnav > li').on('mouseleave', function(){
			$(this).children('.sub-menu').hide();
			$('.header-drop-down').hide();
		})
		$('.arrow-toggle').on('click', function(){
			$('.portmenu').slideToggle('fast');
		})
	});
});
