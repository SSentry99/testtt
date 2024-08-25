$(function() {
function ScrolClass() {
  if($(this).scrollTop() != 0) {
          $('.topPanel').addClass('topPanel-top');
        } else {
          $('.topPanel').removeClass('topPanel-top');
        }
  }
  $(window).scroll(function() {
    ScrolClass();
  });
  $(document).ready(function() {
    ScrolClass();
  });
});

$('.tab-button').click(function(){
	$('.tab-button').removeClass('active');
	$(this).addClass('active');
	$('.tab-block').removeClass('active');
	$('#'+$(this).attr('data-tab')).addClass('active');
})

$(document).ready(function() { 
    var overlay = $('#overlay'); 
    var open_modal = $('.open_modal'); 
    var close = $('.modal_close, #overlay'); 
    var modal = $('.modal_div'); 
     open_modal.click( function(event){ 
         event.preventDefault(); 
         var div = $(this).attr('href'); 
         overlay.fadeIn(400, 
             function(){ 
                 $(div) 
                     .css('display', 'block') 
                     .animate({opacity: 1, top: '20%'}, 200); 
         });
     });

     close.click( function(){ 
            modal 
             .animate({opacity: 0, top: '15%'}, 200, 
                 function(){ 
                     $(this).css('display', 'none');
                     overlay.fadeOut(400); 
                 }
             );
     });
});

var swiper = new Swiper('.swiper-news', {
  pagination: {
    el: '.swiper-pagination',
    type: 'fraction',
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

var galleryThumbs = new Swiper('.gallery-thumbs', {
  spaceBetween: 0,
  slidesPerView: 6,
  loop: true,
  freeMode: true,
  loopedSlides: 6, //looped slides should be the same
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
  spaceBetween: 0,
  loop:true,
  loopedSlides: 6, //looped slides should be the same
  speed: 1200,
  
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: galleryThumbs,
  },
});