jQuery(document).ready(function($){"use strict";$('a[data-rel]').each(function(){$(this).attr('rel',$(this).data('rel'));});if($('#astronaut').length){$('#astronaut').sprite({fps:30,no_of_frames:1}).spRandom({top:30,bottom:200,left:0,right:0})
$('#space').pan({fps:40,speed:3,dir:'right',depth:50});

//$("a[rel^='prettyPhoto']").prettyPhoto();

}





if($('.counter').length){$('.counter').counterUp({delay:10,time:1000});}
$('[data-toggle="tooltip"]').tooltip()
if($('#search-push').length){$('#search-push').on('click',function(){var $navigacia=$('#cp-slide-search');var $val=($navigacia.width());if($val=='0'){$val='100%';$('#cp-slide-search form input[type="text"]').css({padding:'0 30px',});}else{$val='0';$('#cp-slide-search form input[type="text"]').css({padding:'0',transition:'all ease-in-out 0.8s',});}
$navigacia.animate({width:$val},600)});}
if($('#home-banner').length){$("#home-banner").owlCarousel({navigation:true,slideSpeed:300,paginationSpeed:400,autoPlay:true,autoplayTimeout:1000,singleItem:true});}
if($('#blog-banner').length){$("#blog-banner").owlCarousel({navigation:true,slideSpeed:300,paginationSpeed:400,autoPlay:true,autoplayTimeout:1000,singleItem:true});}
if($('#event-banner').length){$("#event-banner").owlCarousel({navigation:true,slideSpeed:300,paginationSpeed:400,autoPlay:true,autoplayTimeout:1000,singleItem:true});}
if($('#cp-datepicker').length){$('#cp-datepicker').Zebra_DatePicker();}
if($('#cp-datepicker2').length){$('#cp-datepicker2').Zebra_DatePicker({direction:1});}
if($('#testimonials-slide').length){$("#testimonials-slide").owlCarousel({navigation:true,slideSpeed:300,paginationSpeed:400,autoPlay:true,autoplayTimeout:1000,singleItem:true});}
/*if($('#testimonials-style-2').length){$("#testimonials-style-2").owlCarousel({navigation:true,slideSpeed:300,paginationSpeed:400,autoPlay:true,autoplayTimeout:1000,singleItem:true});}*/
if($('.testimonials-3').length){$(".testimonials-3").owlCarousel({slideSpeed:200,paginationSpeed:400,autoPlay:true,autoplayTimeout:800,items:4,loop:true,margin:30,itemsCustom:false,itemsDesktop:[1199,4],itemsDesktopSmall:[979,3],itemsTablet:[768,2],itemsTabletSmall:false,itemsMobile:[479,1],singleItem:false});}
/*if($('.testimonials-3').length){$(".testimonials-3").owlCarousel({navigation:true,slideSpeed:300,paginationSpeed:400,autoPlay:true,autoplayTimeout:1000,items:4,loop:true,margin:30,itemsCustom:false,itemsDesktop:[1199,4],itemsDesktopSmall:[979,3],itemsTablet:[768,2],itemsTabletSmall:false,itemsMobile:[479,1],singleItem:false,itemsScaleUp:false,});}*/
if($('#map_contact_1').length){var map;var myLatLng=new google.maps.LatLng(48.85661,2.35222);var myOptions={zoom:12,center:myLatLng,zoomControl:true,mapTypeId:google.maps.MapTypeId.ROADMAP,mapTypeControl:false,styles:[{stylers:[{hue:'#cacaca'},{saturation:-100,},{lightness:10}]}],}
map=new google.maps.Map(document.getElementById('map_contact_1'),myOptions);var marker=new google.maps.Marker({position:map.getCenter(),map:map,icon:'images/map-icon-2.png'});marker.getPosition();var map=new google.maps.Map(document.getElementById('map-canvas'),{zoom:7,center:new google.maps.LatLng(originalLocation[0],originalLocation[1]),scrollwheel:false});}
if($(".defaultCountdown-widget").length){var austDay=new Date();austDay=new Date(2017,4- 1,15);jQuery('.defaultCountdown-widget').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".defaultCountdown-widget-2").length){var austDay=new Date();austDay=new Date(2016,5- 1,15);jQuery('.defaultCountdown-widget-2').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".defaultCountdown-widget-3").length){var austDay=new Date();austDay=new Date(2016,6- 1,15);jQuery('.defaultCountdown-widget-3').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".defaultCountdown-event-1").length){var austDay=new Date();austDay=new Date(2016,5- 1,15);jQuery('.defaultCountdown-event-1').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".defaultCountdown-event-2").length){var austDay=new Date();austDay=new Date(2017,4- 1,15);jQuery('.defaultCountdown-event-2').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".defaultCountdown-event-3").length){var austDay=new Date();austDay=new Date(2016,5- 1,15);jQuery('.defaultCountdown-event-3').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".defaultCountdown-event-4").length){var austDay=new Date();austDay=new Date(2017,6- 1,15);jQuery('.defaultCountdown-event-4').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".defaultCountdown-event-5").length){var austDay=new Date();austDay=new Date(2016,6- 1,15);jQuery('.defaultCountdown-event-5').countdown({labels:['Years','Months','Weeks','Days','Hrs','Min','Sec'],until:austDay});jQuery('#year').text(austDay.getFullYear());}
if($(".cp-gallery-metro-2 .isotope").length){var $container=$('.cp-gallery-metro-2 .isotope');$container.isotope({itemSelector:'.item',transitionDuration:'0.6s',masonry:{columnWidth:$container.width()/ 12
},layoutMode:'masonry'});$(window).resize(function(){$container.isotope({masonry:{columnWidth:$container.width()/ 12
}});});}
if($('.portfolioContainer').length){var $container=$('.portfolioContainer');$container.isotope({filter:'*',animationOptions:{duration:750,easing:'linear',queue:false}});$('.portfolioFilter a').click(function(){$('.portfolioFilter .current').removeClass('current');$(this).addClass('current');var selector=$(this).attr('data-filter');$container.isotope({filter:selector,animationOptions:{duration:750,easing:'linear',queue:false}});return false;});}
if($('.accordion_cp').length){$.fn.slideFadeToggle=function(speed,easing,callback){return this.animate({opacity:'toggle',height:'toggle'},speed,easing,callback);};$('.accordion_cp').accordion({defaultOpen:'section1',cookieName:'nav',speed:'slow',animateOpen:function(elem,opts){elem.next().stop(true,true).slideFadeToggle(opts.speed);},animateClose:function(elem,opts){elem.next().stop(true,true).slideFadeToggle(opts.speed);}});}});

