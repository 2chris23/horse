// When DOM is fully loaded
jQuery(document).ready(function($) {
	"use strict";
	/* Main Settings
	 ---------------------------------------------------------------------- */
	// Detect Touch Devices
	var isTouch = ( ( 'ontouchstart' in window ) || ( navigator.msMaxTouchPoints > 0 ) );
	if ( isTouch ) {
		$( 'body' ).addClass( 'touch-device' );
	}
	// Global Variables
	var 
		intro_slider = null;
	/* Animsition
	 ---------------------------------------------------------------------- */
	(function() {
		var 
		 		reserved_el = '.vc_tta-tab,.vc_tta-tab a,.mixed-gallery a.g-item';
		 		reserved_el = reserved_el.split(',');
		 		
			function reserved_elements(link) {
				"use strict";
				var has_el = false;
				// Theme reserved classes
				$.each( reserved_el, function( i, val ) {
					if ( link.is( $( val ) ) ) {
						has_el = true
						return false;
					}
				});
				
				return has_el;
			}
			function valid_links(link) {
				"use strict";
				var url;
				if ( typeof link === 'string' ) {
					url = link;
				} else {
					url = link.attr( 'href' );
					// No comments links
					if ( ( link.hasClass( 'comment-reply-link' ) ) || ( link.attr( 'id' ) === 'cancel-comment-reply-link' ) ) {
						return false;
					}
					// Theme reserved classes
					else if ( reserved_elements( link ) ) {
						return false;
					}
					// Target blank
					else if ( link.is('[target="_blank"]') ) {
						return false;
					}
				}
				// Hash or empty
				if ( url == '' || url == '#' ) {
					return false;
				}
				// No admin area
				if ( url.indexOf( 'wp-admin' ) > -1 || url.indexOf( 'wp-login' ) > -1 ) {
					return false;
				}
				// File types
				else if ( url.indexOf( '.jpg' ) > -1 || url.indexOf( '.png' ) > -1 || url.indexOf( '.gif' ) > -1 || url.indexOf( '.zip' ) > -1 || url.indexOf( '.pdf' ) > -1 || url.indexOf( '.mp3' ) > -1 || url.indexOf( 'feed' ) > -1 ) {
					return false;
				} else {
					return true;
				}
			}
		if ( theme_vars.page_animations == 'on' ) {
			/* Reserved DOM elements
	 	 	------------------------------------------------------ */
			// Add links
			$( 'a' ).each(function(){
				var href = $( this ).attr( 'href' ),
					that = $( this );
				if ( typeof href !== typeof undefined && href !== false ) {
				
					if ( valid_links( that ) ) {
						if ( that.parents().hasClass('vc_tta-panels') ) {
							return;
						}
						$( this ).addClass('animsition-link');
					}
					
				}
			});
			
			$( "#site" ).animsition({
	            inClass: 'fade-in',
	            outClass: 'fade-out',
	            inDuration: 1000,
	            outDuration: 500,
	            linkElement:  '.animsition-link',  //'a:not([target="_blank"]):not([href^="#"])',
	            loading: true,
	            loadingParentElement: 'body',
	            loadingClass: 'animsition-loading',
	            loadingInner: '<img src="' + theme_vars.theme_uri + '/images/audio.svg" alt="" />',
	            timeout: false,
	            timeoutCountdown: 5000,
	            onLoadEvent: true,
	            browser: [
	                'animation-duration',
	                '-webkit-animation-duration',
	                '-o-animation-duration'],
	            overlay: false,
	            overlayClass: 'animsition-overlay-slide',
	            overlayParentElement: 'body',
	            transition: function(url) {
	                window.location.href = url;
            	}
        	});
		}
	})();
	/* Navigation
	 ---------------------------------------------------------------------- */
	(function() {
		/* Top navigation
	 	 ------------------------- */
	 	if ( $( '#nav li' ).length ) {
			
			// Create top navigation
			$( document ).on( 'mouseenter', '#nav ul li', function() {
				var 
					$this = $( this ),
					$sub  = $this.children( 'ul' );
				if ( $sub.length ) {
					$this.addClass('active');
		            var elm = $('ul:first', this);
		            var off = elm.offset();
		            var l = off.left;
		            var w = elm.width();
		            var docH = $('body').height();
		            var docW = $('body').width();
		            var isEntirelyVisible = (l + w <= docW);
		            if (!isEntirelyVisible) {
		                $sub.addClass('edge');
		            } else {
		                $sub.removeClass('edge');
		            }
		        }
				$sub.stop( true, true ).addClass( 'show-list' );
			}).on( 'mouseleave', '#nav ul li', function() {
				$( this ).removeClass( 'active' ).children( 'ul' ).stop( true, true ).removeClass( 'show-list edge' );
			});
			// Add Top nav to main nav
			$( '#nav ul, #nav li' ).addClass( 'top-nav-el' );
			var $top_nav = $( '#nav > ul' ).children().clone();
			if ( $( '#main-nav ul' ).length <= 0 ) {
				$( '#main-nav' ).append( '<ul></ul>' );
				$( '#main-nav ul' ).append( $top_nav );
			}
			else {
				$( $top_nav ).insertBefore( '#main-nav ul > li:first-child:eq(0)' );
			}
		}
		// Main navigation
		// Slidebar
		var slidebar_scroll = new IScroll( '#slidebar-content', {
		    mouseWheel: true,
		    interactiveScrollbars: true,
		    scrollbars: 'custom',
		    click: true
		});
		$( '#main-nav .menu-item-has-children > a' ).each(function(){
			$( this ).after('<i class="submenu-trigger icon icon-angle-down"></i>' );
		});
		$( '#main-nav > ul > li' ).addClass( 'first-child' );
		$( '#main-nav .submenu-trigger, #main-nav .menu-item-has-children > a[href="#"]' ).on( 'click', function(e){
			e.preventDefault();
			var li = $( this ).closest('li'),
				main_index = $( this ).parents( '.first-child' ).index();
			$( '#main-nav > ul > li:not(:eq('+main_index+')) ul:visible' ).slideUp();
			li.find( ' > ul' ).slideToggle(400);
			setTimeout( function(){ slidebar_scroll.refresh() }, 400  );
		});
		// Menu Trigger
		$( '#menu-trigger' ).on( 'click', function(e){
			e.preventDefault();
			$('body').addClass('slidebar-visible');
		});
		$( '#slidebar-close, #slidebar-layer' ).on( 'click', function( e ){
			e.preventDefault();
			$('body').removeClass('slidebar-visible');
		});
	})();
	/* Scroll Actions
	 ---------------------------------------------------------------------- */
	(function() {
		var scroll_actions = function() {
			var st = $( window ).scrollTop(),
				wh = $( window ).height(),
				admin_bar = 0,
				place = $( '#header-wrap' ).offset().top,
				hh = $( '#header' ).outerHeight();
			if ( $( '#wpadminbar' ).length ) {
				admin_bar = $( '#wpadminbar' ).outerHeight();
			}
			// Header
			if ( st >= place ) {
				$( '#header' ).addClass( 'sticky' );
			} else {
				$( '#header' ).removeClass( 'sticky' );
			}
			// Top button
			if ( st >= 100 ) {
				$( '#top-button' ).addClass( 'active' );
			} else {
				$( '#top-button' ).removeClass( 'active' );
			}
		};
		scroll_actions();
		$( window ).on( 'scroll', scroll_actions );
	})();
  	/* Content Slider
	 ---------------------------------------------------------------------- */
	(function() {
 		if ( $( '.content-slider' ).length <= 0 ) return;
		$( '.content-slider' ).each( function() {
			// Carousel slider
			var 
				content_slider = $( this ),
				id = '#' + $( this ).attr( 'id' ),
				owl = $( id ),
				navigation = content_slider.data( 'slider-nav' ),
				pagination = content_slider.data( 'slider-pagination' ),
				speed = content_slider.data( 'slider-speed' ),
				pause_time = content_slider.data( 'slider-pause-time' ),
				auto_height = content_slider.data( 'auto_height' ),
				autoplay = false;
				if ( pause_time > 0 ) {
					autoplay = true;
				} 
				owl.on('changed.owl.carousel', function(e) {
                	var this_slide = $( e.target ).find( '.owl-item.active' )
                	this_slide.find( '.music-slide .spl-track.playing' ).ScampPlayerLite( 'stop' ); 
                });
			owl.owlCarousel({
			    nav : navigation,
			    navText : ['', ''],
			    dots : pagination,
			    smartSpeed : speed,
			    autoplayTimeout : pause_time,
			    autoplay : autoplay,
			    autoHeight:auto_height,
			    autoplayHoverPause : true,
			    loop: false,
			    items : 1,
			    video : true
	  		});
	  		var slider_sizes = function() {
			setTimeout( function(){
				var 
					s = content_slider,
					w = s.outerWidth(),
					all_classes = 'slider--small slider--medium slider--large'
				if ( w <= 300 )
				    s.removeClass( all_classes ).addClass( 'slider--small' );
				else if ( w <= 768 )
				    s.removeClass( all_classes ).addClass( 'slider--medium' );
				else if ( w <= 1170 )
				    s.removeClass( all_classes ).addClass( 'slider--large' );
				else
				    s.removeClass( all_classes );
			 }, 100);
		}
		$( window ).on( 'resize', slider_sizes );
		slider_sizes();
		});
		
		
  	})();
  	/* Carousel slider
	 ---------------------------------------------------------------------- */
	(function() {
		$( '.carousel-slider' ).each( function(){
			var id = $( this ).attr( 'id' ),
				effect = $( this ).data( 'effect' ),
				nav = $( this ).data( 'nav' ),
				autoplay = $( this ).data( 'autoplay' ),
				pagination = $( this ).data( 'pagination' ),
				items = $( this ).data( 'items' ),
				single_item = true;
			if ( items != undefined && items > 1 ) {
				single_item = false;
			}
			if ( id == undefined ) return;
			
			$( '#' + id ).owlCarousel({
			    navigation : nav,
			    pagination : pagination,
			    navigationText: [
			      '<div class="nav-slider nav-slider-prev"><i class="icon icon-chevron-left"></i></div>',
			      '<div class="nav-slider nav-slider-next"><i class="icon icon-chevron-right"></i></div>'
			    ],
			    singleItem : single_item,
			    items : items,
			    autoPlay : autoplay,
			     //Basic Speeds
			    slideSpeed : 400,
			    paginationSpeed : 800,
			    rewindSpeed : 1000
	  		});
			$( '.owl-link', this ).on( 'click', function( event ){
			    var $this = $( this );
			   
			  });
	  	});
	})();
	/* SCROLL LIST
 	 ---------------------------------------------------------------------- */
 	(function() {
		if ( ! $( '.scroll-list' ).length ) return;
		// Tracklist scroll
		$( '.scroll-list-inner' ).each(function(){
			var id = $( this ).attr( 'id' );
			
			var spl_scroll = new IScroll( '#'+id, {
			    mouseWheel: true,
			    interactiveScrollbars: true,
			    scrollbars: 'custom',
			    snap: '.scroll-list-el',
			    click: true
			});
			// Resize scroll
			$( '#'+id+' div' ).sizeChanged(function(){
		  		setTimeout( function(){ spl_scroll.refresh() }, 400  );
			});
		});
	})();
	/* MASONRY GRID
 	 ---------------------------------------------------------------------- */
 	(function() {
		if ( ! $( '.masonry' ).length ) return;
		if ( $( 'body' ).hasClass( 'wp-ajax-loader' ) ) {
 			$( '.masonry' ).isotope({
				itemSelector : '.masonry-item',
				transitionDuration: 0
			});
			setTimeout( function(){ $( '.masonry' ).isotope( 'layout' ) }, 1000);
 		} else {
	 		$( window ).on( 'load', function(){
				$( '.masonry' ).isotope({
					itemSelector : '.masonry-item',
					transitionDuration: 0
				});
			});
 		}
 		$( window ).on( 'resize', function(){
			setTimeout( function(){ $( '.masonry' ).isotope( 'layout' ) }, 1000);
		} );
		if ( ! $( '.masonry.masonry-anim' ).length ) return;
		var $count = 1;
		var _addClass = function(){
			setTimeout( function() {
				var added_item = $( '.masonry.masonry-anim' ).find( '.masonry-item' ).eq($count-1);
				added_item.addClass( 'masonry-item--appear' );
				var added_item_tip = added_item.find('.tip');
				added_item_tip.addClass( 'active-tip' );
				if ( $( '.masonry.masonry-anim' ).find( '.masonry-item' ).length >= $count ) {
					$count++;
					_addClass();
				}
			}, 300);
		}
		
		_addClass();
	})();
	/* Ajax Filters
	 ---------------------------------------------------------------------- */
 	(function() {
		// Open dropdown
		$( document ).on( 'click', '.filters-wrapper .filter', function(event) {
			event.preventDefault();
			$( this ).parents( '.filters-wrapper' ).find( '.is-visible' ).not( this ).removeClass( 'is-visible' );
			$( this ).toggleClass( 'is-visible' );
			
		} );
		// List click action
		$( document ).on( 'click', '.filter-dropdown-content ul li a', function(event) {
			event.preventDefault();
			var 
				$filter = $( this ).parents( '.filter' ),
				$grid = $filter.parents( '.grid-wrapper' ).attr( 'data-grid' ),
				obj = $.parseJSON( $filter.attr('data-obj') ),
				cat_name = $( this ).text(),
				selected_filter = $filter.find( '.filter-title' ).attr( 'data-filter-name' ),
				hh = 0;
			obj['filter_name'] = $( this ).attr( 'data-filter-name' );
			
			if ( $( '#wpadminbar' ).length ) {
				hh = $( '#wpadminbar' ).outerHeight();
			}
			hh = hh + $( '#header' ).outerHeight();
			
			if ( obj.filter_name != selected_filter ) {
				// Clear filters
				$filter.parents( '.filters-wrapper' ).find( '.filter' ).not( $filter ).each( function(){
					var 
						temp_name = $( this ).find('ul li:first-child').text();
					$( this ).find( '.filter-title' ).text( temp_name );
					$( this ).find( '.filter-title' ).attr( 'data-filter-name', '' );
					$( this ).removeClass( 'active' );
				});
				// Classes
				$filter.addClass( 'loading active' );
				$( '.load-more' ).removeClass( 'loaded loading' );
				 $('html, body').animate({
        			scrollTop: $filter.offset().top-hh 
    			}, 400);
				$filter.find( '.filter-title' ).text( cat_name ).attr( 'data-filter-name', obj.filter_name );;
				$filter.find( '.filter-title' ).attr( 'data-filter-name', obj.filter_name );
				// Pagenum
				obj['pagenum'] = 1;
				$( '.load-more' ).attr( 'data-pagenum', 2 );
				// Hide messages
				$( '.ajax-messages .message' ).hide();
				$( '.' + $grid ).find( '.masonry-item' ).addClass( 'masonry-item--hide' );
	
				setTimeout( function() { 
					// Ajax
					$.ajax({
						url: ajax_action.ajaxurl,
						type: 'post',
						data: {
							action: obj['action'],
							ajax_nonce : ajax_action.ajax_nonce,
							obj: obj
						},
						success: function( result ) {
							var 
								$result = $( result ),
								$container = $( '.' + $grid );
								$container.isotope( 'remove', $container.isotope( 'getItemElements' ) );
							if ( result == 'no_results' ) {
							
								return;
							}
							$result.imagesLoaded( { background: true }, function() {
								$filter.removeClass( 'loading' );
								$container.append( $result ).isotope( 'appended', $result );
								$container.isotope( 'layout' );
								var $count = 1;
								var _addClass = function(){
									setTimeout( function() {
										var added_item = $container.find( '.masonry-item' ).eq($count-1);
										added_item.addClass( 'masonry-item--appear' );
										if ( $container.find( '.masonry-item' ).length >= $count ) {
											$count++;
		
											_addClass();
										}
									}, 200);
								}
								
								_addClass();
							});
						},
						error: function( request, status, error ) {
							var 
								$container = $( '.' + $grid );
							$container.isotope( 'remove', $container.isotope( 'getItemElements' ) );
							$container.css( 'height', 0 );
							$filter.removeClass( 'loading' );
							$( '.message.ajax-error' ).fadeIn(400);
						}
					});
				}, 300);
			}
			
		} );
		// Load more post
		$( document ).on( 'click', '.load-more', function(event) {
			event.preventDefault();
			if ( ! $( '.filter' ).length ) return;
			var 
				$this = $( this ),
				$filter,
				$grid,
				obj;
			// Check active filter (if exists)
			if ( $( '.filters-wrapper .filter.active' ).length ) {
				$filter = $( '.filters-wrapper .filter.active' );
				obj = $.parseJSON( $filter.attr('data-obj') );
				obj['filter_name'] = $filter.find( '.filter-title' ).attr( 'data-filter-name' );
			} else {
				$filter = $( '.filters-wrapper .filter' );
				obj = $.parseJSON( $filter.attr('data-obj') );
				obj['filter_name'] = 'all';
			}
			// Grid
			$grid = $filter.parents( '.grid-wrapper' ).attr( 'data-grid' );
			// Pagenum
			obj['pagenum'] = parseInt( $this.attr( 'data-pagenum' ) );
			// Hide messages
			$( '.ajax-messages .message' ).hide();
			// Classes
			$this.addClass( 'loading' );
			// Ajax
			$.ajax({
				url: ajax_action.ajaxurl,
				type: 'post',
				data: {
					action: obj['action'],
					ajax_nonce : ajax_action.ajax_nonce,
					obj: obj
				},
				success: function( result ) {
					var 
						$result = $( result ),
						$container = $( '.' + $grid );
					if ( result == 'no_results' ) {
						$this.removeClass( 'loading' );
						$this.addClass( 'loaded' );
						return;
					}
					$result.imagesLoaded( { background: true }, function() {
						$container.removeClass( 'new-masonry-item' );
						obj['pagenum'] = obj['pagenum'] + 1;
						$this.attr( 'data-pagenum', obj['pagenum'] );
						$this.removeClass( 'loading' );
						$container.append( $( $result ).addClass( 'new-masonry-item' ) ).isotope( 'appended', $result );
						$container.isotope( 'layout' );
						var $count = 1;
						var _addClass = function(){
							setTimeout( function() {
								var added_item = $container.find( '.new-masonry-item' ).eq($count-1);
									added_item.addClass( 'masonry-item--appear' );
								var added_item_tip = added_item.find('.tip');
								added_item_tip.addClass( 'active-tip' );
								if ( $container.find( '.new-masonry-item' ).length >= $count ) {
									$count++;
									_addClass();
								}
							}, 200);
						}
						
						_addClass();
					});
				},
				error: function( request, status, error ) {
					var 
						$container = $( '.' + $grid );
					$this.attr( 'data-pagenum', '2' );
					$container.isotope( 'remove', $container.isotope( 'getItemElements' ) );
					$container.css( 'height', 0 );
					$this.removeClass( 'loading' );
					$( '.message.ajax-error' ).fadeIn(400);
				}
			});
			
		} );
		
	})();
	/* WP gallery
 	 ---------------------------------------------------------------------- */
 	(function() {
 		if ( ! $( '.gallery' ).length ) return;
 		if ( $( 'body' ).hasClass( 'wp-ajax-loader' ) ) {
 			$( '.gallery' ).isotope({
				itemSelector : '.gallery-item'
			});
			setTimeout( function(){ $( '.gallery' ).isotope( 'layout' ) }, 1000);
 		} else {
	 		$( window ).on( 'load', function(){
	 			$( '.gallery' ).isotope({
					itemSelector : '.gallery-item'
				});
	 		});
 		}
		
	})();
	/* Small Functions
	 ---------------------------------------------------------------------- */
	(function() {
		/* Resonsive videos
	 	 ------------------------- */
		if ( $.fn.ResVid ) {
			$( 'body' ).ResVid();
		}
		/* Tooltip
  	     ------------------------- */
	
		/* Image Tooltip */
		if ( $.fn.RImageTooltip ) { 
			$( '[data-image-src]' ).RImageTooltip({
				'offset_y' : 55
			})
		}
		/* Scroll Button
	 	 ------------------------- */
		$( '#top-button' ).on( 'click', function(e) {
			var body = $("html, body");
			body.stop().animate({scrollTop:0}, '500', 'swing' );
		});
		/* Countdown
	 	 ------------------------- */
		if ( $.fn.countdown ) {
			$( '.countdown' ).each( function(e) {
				var date = $( this ).data( 'event-date' );
		        $( this ).countdown( date, function( event ) {
		            var $this = $( this );
		            switch( event.type ) {
		                case "seconds":
		                case "minutes":
		                case "hours":
		                case "days":
		                case "weeks":
		                case "daysLeft":
		                    $this.find( '.' + event.type ).html( event.value );
		                    break;
		                case "finished":
		              
		                    break;
		            }
		        });
		    });
	    }
	})();
	/* Google Maps
	 ---------------------------------------------------------------------- */
	(function() {
		if ( $.fn.gmap3 ) {
			$( '.gmap' ).each( function(){
				// Get Marker
				var marker = '';
				if ( theme_vars.map_marker !== '' ) {
					marker = theme_vars.map_marker;
				} else {
					marker = theme_vars.theme_uri + '/images/map-marker.png';
				}
				var 
					gmap = $( this ),
					address = gmap.data( 'address' ), // Google map address e.g 'Level 13, 2 Elizabeth St, Melbourne Victoria 3000 Australia'
					zoom = gmap.data( 'zoom' ), // Map zoom value. Default: 16
					zoom_control, // Use map zoom. Default: true
					scrollwheel; // Enable mouse scroll whell for map zooming: Default: false
				if ( gmap.data( 'zoom_control' ) == 'true' ) {
					zoom_control = true;
				} else {
					zoom_control = false;
				}
				if ( gmap.data( 'scrollwheel' ) == 'true' ) {
					scrollwheel = true;
				} else {
					scrollwheel = false;
				}
				gmap.gmap3({
						address: address,
						zoom: zoom,
						zoomControl: zoom_control, // Use map zoom. Default: true
						scrollwheel: scrollwheel, // Enable mouse scroll whell for map zooming: Default: false
						mapTypeId : google.maps.MapTypeId.ROADMAP,
						mapTypeControlOptions: {
				          mapTypeIds: [google.maps.MapTypeId.ROADMAP, "style1"]
				        },
				        styles: [{
		        featureType: "water",
		        stylers: [{
		          hue: "#7bddfd"
		        }, {
		          saturation: -35
		        }, {
		          color: "#0099cc"
		        }]
		      }, {
		        featureType: "administrative",
		        elementType: "geometry",
		        stylers: [{
		          saturation: -100
		        }, {
		          visibility: "off"
		        }]
		      }, {
		        stylers: [{
		          visibility: "on"
		        }, {
		          gamma: 1.33
		        }]
		      }, {
		        featureType: "poi",
		        stylers: [{
		          visibility: "simplified"
		        }]
		      }, {}, {
		        featureType: "road",
		        stylers: [{
		          visibility: "simplified"
		        }, {
		          saturation: -33
		        }, {
		          color: "#666666"
		        }]
		      }, {}, {
		        featureType: "road",
		        elementType: "labels.text.fill",
		        stylers: [{
		          visibility: "on"
		        }, {
		          saturation: -9
		        }, {
		          color: "#999999"
		        }]
		      }, {
		        featureType: "administrative.neighborhood",
		        stylers: [{
		          lightness: 30
		        }, {
		          visibility: "on"
		        }, {
		          saturation: -100
		        }]
		      }, {
		        featureType: "administrative.locality",
		        stylers: [{
		          visibility: "off"
		        }]
		      }, {
		        featureType: "poi",
		        stylers: [{
		          color: "#cccccc"
		        }]
		      }, {}, {
		        featureType: "administrative.province",
		        stylers: [{
		          visibility: "off"
		        }]
		      }, {
		        featureType: "transit.line",
		        stylers: [{
		          color: "#808080"
		        }, {
		          lightness: -61
		        }]
		      }, {
		        featureType: "transit",
		        elementType: "labels.text",
		        stylers: [{
		          visibility: "off"
		        }]
		      }, {
		        featureType: "transit.station",
		        elementType: "labels.icon",
		        stylers: [{
		          visibility: "simplified"
		        }, {
		          saturation: -100
		        }, {
		          lightness: 32
		        }]
		      }, {}, {
		        featureType: "road",
		        stylers: [{
		          weight: 1.6
		        }, {
		          color: "#dddddd"
		        }]
		      }, {
		        featureType: "landscape.man_made",
		        stylers: [{
		          color: "#ffffff"
		        }]
		      }, {}, {
		        featureType: "water",
		        elementType: "labels",
		        stylers: [{
		          visibility: "off"
		        }]
		      }, {
		        featureType: "road",
		        elementType: "labels.text.fill",
		        stylers: [{
		          color: "#8d8c8c"
		        }]
		      }, {
		        featureType: "road.highway",
		        stylers: [{
		          visibility: "off"
		        }]
		    }]
					}).marker({
						address: address,
				        icon: marker
				    });
			});
		}
	})();
	/* Magnific popup
 	 ---------------------------------------------------------------------- */
	(function() {
	 
	 	// Image
		$( '.imagebox' ).magnificPopup( { type:'image' } );
		$( '.vclightbox .vc_figure a' ).magnificPopup( { type:'image' } );
		// WP Gallery
		$( '.gallery' ).each(function() {
			var gallery = $( this ),
				id = $( this ).attr( 'id' ),
				attachment_id = false;
			if ( $( 'a[href*="attachment_id"]', gallery ).length ) {
				return false;
			}
			$( 'a[href*="uploads"]', gallery ).each( function(){
				$( this ).attr( 'data-group', id );
				$( this ).addClass( 'thumb' );
				if ( $( this ).parents( '.gallery-item' ).find( '.gallery-caption' ).length ) {
					var caption = $( this ).parents( '.gallery-item' ).find( '.gallery-caption' ).text();
					$( this ).attr( 'title', caption );
				}	
			});
			$( this ).magnificPopup({
				delegate: 'a', 
		        type: 'image',
		        fixedBgPos: true,
		        gallery: {
		          enabled:true
		        }
		    });
		});
		// Theme Gallery
		$( '.mixed-gallery' ).magnificPopup({
			delegate: 'a.g-item', 
	        type: 'image',
	        image: {
				verticalFit: true,
			},
			callbacks: {
			    elementParse: function( item ) {
					if ( item.el.hasClass( 'iframe-link' ) ) {
						item.type = 'iframe';
						
					} else {
						item.type = 'image';
					}
			    }
			},
	        gallery: {
	          enabled:true
	        }
	    });
		// Theme Gallery
		$( '#intro' ).magnificPopup({
			delegate: 'a.lightbox-link', 
	        type: 'image',
			callbacks: {
			    elementParse: function( item ) {
					if ( item.el.hasClass( 'iframe-link' ) ) {
						item.type = 'iframe';
					} else {
						item.type = 'image';
					}
			    }
			},
	        gallery: {
	          enabled:false
	        }
	    });
	})();
});
(function ($) {
	$.fn.sizeChanged = function (handleFunction) {
	    var element = this;
	    var lastWidth = element.width();
	    var lastHeight = element.height();
	    setInterval(function () {
	        if (lastWidth === element.width()&&lastHeight === element.height())
	            return;
	        if (typeof (handleFunction) == 'function') {
	            handleFunction({ width: lastWidth, height: lastHeight },
	                           { width: element.width(), height: element.height() });
	            lastWidth = element.width();
	            lastHeight = element.height();
	        }
	    }, 100);
	    return element;
	};
}(jQuery));
/* 
 *  R-Image Tooltip ver. 1.0
 *  Copyright (c) 2016 Rascals Themes. 
 *	All Right Reserved.
 *  You may not modify and/or redistribute this file.
 *  http://www.rascals.eu
 *  rascals@rascals.eu
*/
;(function ($) {
    jQuery.fn.RImageTooltip = function(options) {
		
		return this.each(function() {
								  
			 var opts = jQuery.extend({
				'offset_x' : 25,
				'offset_y' : 55
			}, options);
			 
			$(this).hover(function (e) {
				tooltip_title = this.title;
				this.title = '';
				image_path = $( this ).attr( 'data-image-src' );
				$('body').append('<div id="tooltip"></div>');
				$('#tooltip').css('top', (e.pageY - opts.offset_y) + 'px').css('left', (e.pageX + opts.offset_x) + 'px').fadeIn('fast');
		
				/* Load Image */
				var img = new Image();
				$(img).load(function () {
					var image = $(this);
					opts.offset_y = img.height + 20;
					opts.offset_x = -img.width / 2;
					$('#tooltip').animate({ width : img.width, height : img.height }, 400, function () {
						$('#tooltip').html(image);
						image.css('opacity', '0.0').stop().animate({ opacity : 1.0 }, 800)});
				}).attr('src', image_path);
				
			}, function () {
				this.title = tooltip_title;
				$('#tooltip').remove();
			});
			
			/* Move Tooltip */
			$(this).mousemove(function (e) {
				$('#tooltip').css('top', (e.pageY - opts.offset_y) + 'px').css('left', (e.pageX + opts.offset_x) + 'px');
			})
		})
    }
})(jQuery);