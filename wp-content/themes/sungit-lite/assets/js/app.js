(function($)
{
    "use strict"

    jQuery(document).ready(function() {
        if( jQuery(window).width() < 767) {
            jQuery('.nav-wrapper .dropdown').click(function() {
              jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
              jQuery(this).toggleClass('open');
            }, function() {
              jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
              jQuery(this).toggleClass('open');
            });
        }

        else{
            jQuery('.nav-wrapper .dropdown').hover(function() {
              jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
              jQuery(this).toggleClass('open');
            }, function() {
              jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
              jQuery(this).toggleClass('open');
            });
        }
        jQuery('.nav-wrapper .dropdown').find('.caret').each(function(){
            jQuery(this).on('click', function(){
              if( jQuery(window).width() < 767) {
                  jQuery(this).parent().next().slideToggle();
              }
              return false;
            });
        });
    });

    jQuery('.slider-item-wrapper').slick({
      dots: true,
      infinite: true,
      speed: 500,
      autoplay: true,
      arrows: true,
    });

    jQuery('.sungit-gallery-carousel ').slick({
      dots: false,
      infinite: true,
      speed: 500,
      autoplay: true,
      arrows: true,
    });

    //Audio Player
    var n = $("input[name^='audi-guid']").length;
    var file_url = $("input[name^='audi-guid']");
    var file_title = $("input[name^='audi-title']");
    var file_image = $("input[name^='audi-image']");
    var i = 0;

    var array_guid = [];
    var array_title = [];
    var array_image = [];
    var jsonString = [];
    var myarray = [];
    for(i=0; i < n; i++) {
      array_guid[i]  = file_url.eq(i).val();
      array_title[i] = file_title.eq(i).val();
      array_image[i] = file_image.eq(i).val();
      // foo.file       = array_guid[i];
      // foo.trackName  = array_title[i];
      // myarray.push(foo);
        myarray.push({
            file: array_guid[i],
            trackName: array_title[i],
            thumb: array_image[i],
            trackArtist: '',
        });
    }
    // jsonString = jQuery.parseJSON(JSON.stringify(myarray));
    // inverted_removed = jQuery.makeArray(jsonString);
    // inverted_removed = jsonString.replace(/"(\w+)"\s*:/g, '$1:');
    // console.log(inverted_removed);
    jQuery(".jAudio--player").jAudio({
      playlist:myarray,
        swfPath: "",
        supplied: "OGA, MP3",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
    });

    jQuery('.blog-post-wrapper').slick({
      infinite: true,
      autoplaySpeed: 7000,
      arrows: false,
      slidesToShow: 4,
      slidesToScroll: 2,
      responsive: [
          {
            breakpoint: 990,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
      ]
    });
})(jQuery);

// if( jQuery(window).width() > 767) {
//   jQuery('.nav-wrapper .dropdown').hover(function() {
//     jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
//     jQuery(this).toggleClass('open');
//   }, function() {
//     jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
//     jQuery(this).toggleClass('open');
//   });
// }

// if( jQuery(window).width() > 767) {
//   jQuery('.nav-wrapper .dropdown').click(function() {
//     jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
//     jQuery(this).toggleClass('open');
//   }, function() {
//     jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
//     jQuery(this).toggleClass('open');
//   });
// }

