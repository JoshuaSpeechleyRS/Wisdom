(function($) {
	
	function isScrolledIntoView(elem){
	    
	    var docViewTop = $(window).scrollTop();
	    var docViewBottom = docViewTop + $(window).height();
		
		var elemTop = $(elem).offset().top;
	    var elemBottom = elemTop + $(elem).height();
	
	    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
	    
	}
	
	var didScroll,timer;
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = $('#site-header').outerHeight();

	jQuery(document).ready(function(e) {
				
		$('.open-menu a').click(function(e){			
				e.preventDefault();
				$(this).parent().toggleClass('active');
				$('#site-header').toggleClass('active');
		});		
				
				
		$("#main-menu li.dropdown").on("mouseover", function() {
			var thisID = $(this).attr('id');
			clearTimeout(timer);
			openSubmenu(thisID);
		}).on("mouseleave", function() {
			timer = setTimeout(
		    	closeSubmenu
			, 300);
		});
		
		function openSubmenu(thisID) {
		  	$("#main-menu li.dropdown").removeClass('current');
			$('#'+thisID).addClass("current");
			$("#site-header").addClass("over");
		}
		function closeSubmenu() {
		  $("#site-header").removeClass("over");
		  $("#main-menu li.dropdown").removeClass('current');
		}
		
		if ( $('body').hasClass('home') ){
			jQuery("a.logo").click(function(e) {
				e.preventDefault();
				jQuery('html,body').animate({
					scrollTop: 0
				}, 'slow');
			});
		}
						
						
		$("#menu-button").click(function(e) {
			$('#menu-button, #site-header').toggleClass('active');	
		});
		
		
	});
		
	$(window).load(function() {
    	
		
	});
  	
  	//sticky header scroll
  	
  	var $tourData = false;
  	
  	$(window).scroll(function(event){
	    didScroll = true;
	    
	
	});
	
	setInterval(function() {
	    if (didScroll) {
	        hasScrolled();
	        didScroll = false;
	    }
	}, 250);
	
	function hasScrolled() {
	    var st = $(this).scrollTop();
	    
	    if(Math.abs(lastScrollTop - st) <= delta)
	        return;
	    
	    if( st == 0 ){
		    $('#site-header').removeClass('nav-down').removeClass('nav-up');
	        $('body').removeClass('fixed');
	    }else{
	        $('body').addClass('fixed');
		    if (st > lastScrollTop && st > navbarHeight) {
		        $('#site-header').removeClass('nav-down').addClass('nav-up');
		        $('#site-header').removeClass('active');
				$('.open-menu').removeClass('active');
		    } else {
		        if(st + $(window).height() < $(document).height()) {
		            $('#site-header').removeClass('nav-up').addClass('nav-down');		            
		        }
		    }
	    }
	    
	    
	    lastScrollTop = st;
	}
	
  	//end sticky header scroll
  	
})(jQuery);