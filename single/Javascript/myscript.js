
$(function()
{
	var topoffset = 60; //menu height
	"use strict";
	//Activate scrollspy
	$('body').scrollspy(
	{
		target: 'header .navbar',
		offset: topoffset
		
	});
	
	var hash=$(this).find('li.active a').attr('href');
		if(hash !== '#home')
		{
			$('header nav').addClass('inbody');
		}
		else
		{
			$('header nav').removeClass('inbody');
		}
	//add a new class inbody on scrollspy event
	$('.navbar-fixed-top').on('activate.bs.scrollspy', function()
	{
	
	
		var hash=$(this).find('li.active a').attr('href');
		if(hash !== '#home')
		{
			$('header nav').addClass('inbody');
		}
		else
		{
			$('header nav').removeClass('inbody');
		}
	});
	
	
	//smooth scrolling
	
		$('.navbar a[href*="#"]:not([href="#"])').click(function() 
		{
			if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') 
				&& location.hostname === this.hostname) 
			{
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) 
				{
				$('html, body').animate(
					{
					scrollTop: target.offset().top-topoffset+2
					}, 1300);
				return false;
				}
			}
		});
	
	
	//carousel sliding
	$('.carousel').carousel({
	interval: false
	});
	
});
