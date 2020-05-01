jQuery(document).ready(function($) {
	if(!window.$) window.$ = jQuery; // $ Global
	
	var $window_width = $(window).width();
	var $window_height = $(window).height();
	
	/*window.onscroll = function (e) {  
		$('#masthead').addClass('scrolling');
	} */
	
	$("[data-fancybox]").fancybox({
		// Options will go here
	});
	
	if ($('#page > .barra_promocional').length){
        $('#masthead').addClass('promoBarActive');
    }

	function initFullScreenTemplate(){
	
		if($('.full_screen_section').length){
	
			
	        $('#up_fs_button').on('click', function() {
	            $.fn.fullpage.moveSectionUp();
	            return false;
	        });
	
	        $('#down_fs_button').on('click', function() {
	            $.fn.fullpage.moveSectionDown();
	            $.fn.fullpage.setAllowScrolling(true);
	            $('.newsletter_full').remove();
	            return false;
	        });
			
			if ($window_width > $window_height) {
				$('#sections-portrait').remove();
			} else {
				$('#sections-landscape').remove();
			}
			
			var idInterval;
	        var section_number = $('.full_screen_inner > .full_screen_section').length;
			$('.full_screen_inner').fullpage({
				sectionSelector: '.full_screen_section',
				scrollOverflow: true,
				navigation: true,
				navigationPosition: 'right',
				slidesNavigation: false,
				afterLoad: function(anchorLink, index){
					
					var loadedSection = $(this);
					//loadedSection.find('.slide').addClass('WHITE');
					if (loadedSection.find('.slide').hasClass('blanco')) {
						$('body').removeClass('menu-blanco menu-negro').addClass('menu-blanco');
					}
					if (loadedSection.find('.slide').hasClass('negro')) {
						$('body').removeClass('menu-blanco menu-negro').addClass('menu-negro');
					}

					//Move footer
	                $('#colophon').appendTo( ".full_screen_section.footerHolder .fp-tableCell" );
	                $('#colophon').addClass('visible');
	                
	                checkActiveArrowsOnFullScrrenTemplate(section_number, index);
	                
	                if(index == 1){
			            /*idInterval = setInterval(function(){
			                $.fn.fullpage.moveSlideRight();
			            }, 3000);*/
		            } 
		            if(index == 2 || index == 3){
			            //clearInterval(idInterval);
		            }

				},
	            afterRender: function(){
	                checkActiveArrowsOnFullScrrenTemplate(section_number, 1);
	            }
			});
			
			function checkActiveArrowsOnFullScrrenTemplate(section_number, index){
				if(index == '1'){
			        $('.full_screen_navigation_holder.down_arrow').show();
			    }else if(index == section_number){
			        $('.full_screen_navigation_holder.down_arrow').hide();
			    }else{
			        $('.full_screen_navigation_holder.down_arrow').show();
			    }
			}
		}
	}
	
	initFullScreenTemplate();
	
	
	//Newsletter form
	var request;
    $(".newsletterFormPopup").on("submit", function( event ) {
        if ( request ) {
            request.abort();
        }
        var
            $form = $(this),
            $inputs = $form.find("input, select, button, textarea"),
            serializedData = $form.serialize();

        request = $.ajax({
            url: js_config.ajax_url,
            type: 'post',
            data: {
                action: 'ajax_subscribe',
                nonce: js_config.ajax_nonce,
                ne: $form.find('.newsletter-email').val(), //THIS IS IMPORTANT TO SUBMIT!! ITS REQUIRED BY THE subscribe() METHOD
                data: serializedData
            },
            beforeSend: function () {
//disable all field
                $inputs.prop( "disabled", true );
            },
            success: function ( response ) {
//we have an answer. it will be placed right after our form
                var text = $( '<p class="newsletter-' + response.status + '">' + response.msg + '</p>' ).hide();
                $form.after( text ).next().slideDown();
            },
            complete: function() {
//we are done, reenable all fields
                $inputs.prop( "disabled", false );
            }
        });

        event.preventDefault();
    });


    $( ".shiftnav-toggle" ).click(function() {
		//$.fn.fullpage.setAllowScrolling(false);
	});
	$( ".shiftnav-panel-close" ).click(function() {
		//$.fn.fullpage.setAllowScrolling(true);
	});


	/*$( '#mega-menu-wrap-primary #mega-menu-primary>li.mega-menu-item>a.mega-menu-link[aria-haspopup="true"]' ).hover(
		function() {
			console.log('fSDFDS');
			$( '#masthead' ).addClass( "hover" );
		}, function() {
			$( '#masthead' ).removeClass( "hover" );
		}
	);*/

	$('#mega-menu-wrap-primary #mega-menu-primary>li.mega-menu-item-has-children').live('mouseover mouseout', function(event) {
		if (event.type == 'mouseover') {
			console.log('fSDFDS');
			$( '#masthead' ).addClass( "hover" );
		} else {
			$( '#masthead' ).removeClass( "hover" );
		}
	});
	
});