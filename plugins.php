<!-- Enquiry Plugin Start -->
     <script>
     var mail = jQuery.noConflict();
     mail(document).ready(function()
     	{
     		mail(".enquiry-form").submit(function(e)
     			{
     				var $form = mail(this),
     				$msg = mail(this).prev('div.message'),
     				$action = $form.attr('action');
     				mail.post($action, $form.serialize(), function(data)
     					{
     						$form.fadeOut("fast", function()
     							{
     								mail('.message').hide().html(data);
     								mail('.message').show('fast');
     							}
     						);
     					}
     				);
     				e.preventDefault();
     			}
     		);
     	}
     );
     </script>
    <!-- MixItUp Plugin Start -->
     <link rel="stylesheet" type="text/css" href="css/isotope.css"/>
     <style>
     #filter .element{
          display: none;
      }
     </style>
    <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
    <script>
    var mixit = jQuery.noConflict();
    mixit(document).ready(function()
    	{
    		mixit(function()
    			{
    				mixit('#filter').mixItUp(
    					{animation:
    						{
    						animateChangeLayout: true,
    						duration: 500,
    						effects: 'fade rotateY(180deg) rotateX(180deg) rotateZ(-4deg) stagger(100ms) scale(1.50)',
    						easing: 'cubic-bezier(0.5, 0, 0.5, 0.5)'
    						},
                            changeLayout: {
                      		containerClass: 'flex'
                      	}
    					}
    				);
    			}

    		);

    		//Portfolio Image Hover
    		mixit(this).find('.portfolio_link').stop().css("display", "none");
    		mixit(".portfolio_img").hover(function()
    			{
    				mixit(this).find('img').stop().animate({opacity: "0.3"}, 'fast');
    				mixit(this).find('.portfolio_link').stop().css("display", "block");
    				mixit(this).find('.portfolio_link a img').stop().animate({opacity: "1"}, 'fast');
    			},
    			function() {
    				mixit(this).find('.portfolio_link').stop().css("display", "none");
    				mixit(this).find('img').stop().animate({opacity: "1"}, 'fast');
    			}
    		);
    	}
    );
    </script>
    <!-- MixItUp Plugin Ends -->
    <!-- Colorbox Plugin Start -->
    <link rel="stylesheet" type="text/css" href="css/colorbox.css" media="screen" />
    <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
    <script>
    var j = jQuery.noConflict();
    j(document).ready(function()
    	{
    		//Examples of how to assign the ColorBox event to elements
    		j(".popup").colorbox({rel: 'group1'});
    		j(".youtube").colorbox({iframe: true, innerWidth: 640, innerHeight: 390});
    	}
    );
    </script>
    <!-- Colorbox Plugin Ends -->

    <!-- Gmap3 Plugin Start-->
    <script type="text/javascript" src="js/gmap3.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <style>
    #map{
        margin: 20px auto;
        border: 5px solid #bbb;
        width: 100%;
        height: 250px;
      }
    .gm-style .gm-style-iw{
      color:black;
      font-weight: bold;
      white-space: nowrap;
      width: 80px;
    }
    </style>
    <?php
    echo'
    <script>
    var gmap = jQuery.noConflict();
    gmap(function()
    	{
    		var address = "'.$address.'";
    		gmap("#map").gmap3(
    			{map:
    				{
    				address: address,
    				options: {
    					zoom: 17,
    					opts: {
    						scrollwheel: true
    						}
    					}
    				},
    			infowindow: {
    				address: address,
    				options: {
    					size: new google.maps.Size(50, 50),
    					content: "'.$label.'"
    					},
    				events: {
    					closeclick: function(infowindow) {
    							alert("closing : " + s(this).attr("id") + " : " + infowindow.getContent());
    						}
    					}
    				}
    			}
    		);
    	}
    );
    </script>';
    ?>
    <!-- Gmap3 Plugin Ends-->

