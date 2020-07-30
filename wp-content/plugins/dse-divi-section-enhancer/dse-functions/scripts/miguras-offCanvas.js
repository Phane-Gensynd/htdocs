(function($){
  $.fn.offCanvas = function(options){
    var $this = $(this);
    var $windowsize = $(window).outerHeight();
    var $windowwidth = $(window).outerWidth();
    //settings

    var defaults = {
        width : '300px',
        scroll : 'rounded-dots',
        openicon : 'a',
        closedicon : 'Q',
        iconsize : '30',
        iconcolor : '#ffffff',
        iconbackground : '#111111',
        positiony : '100px',
        positionx : '50px',
        buttontext : '',
        height : 'auto',
        insideposition : 'middle',
    }

    var settings = $.extend({}, defaults, options);
    var $finalwidth = parseInt(settings.width);
    var $finalheight = $windowsize;
    var $buttontext = '';
    if(settings.height != 'auto' && settings.height != ''){
      $finalheight = settings.height;
    }
    if($windowwidth < 768){$finalwidth = $windowwidth;}
    if(settings.buttontext != ''){
      $buttontext = '<span style="color:'+settings.iconcolor+'; line-height:'+settings.iconsize*1.17+'px; font-size:'+settings.iconsize*0.8+'px;" class="miguras_offcanvas_button_text">'+settings.buttontext+'</span>';
    }

    // code begin
    if($this.length){
      jQuery('body').append('<span class="miguras_offcanvas_button_wrapper miguras_offcanvas_button_click">'+$buttontext+'<span style="font-family: ETmodules!important;" class="miguras_offcanvas_button">'+settings.openicon+'</span></span>');
      $this.prepend('<span style="font-family: ETmodules!important;" class="miguras_offcanvas_button_click miguras_offcanvas_inside dse_inside_'+settings.insideposition+' miguras_offcanvas_button">'+settings.openicon+'</span>');

    }

    var $outsidebuttonwidth = (parseInt(settings.iconsize)*1.3)
    if(settings.buttontext != '') {
      $outsidebuttonwidth = '';
    }

    $('.miguras_offcanvas_button_wrapper').css({
      left: settings.positionx,
      top: settings.positiony,
      backgroundColor: settings.iconbackground,
      height: (parseInt(settings.iconsize)*1.3),
      width: $outsidebuttonwidth,
      lineHeight: (parseInt(settings.iconsize)*1.3)+'px',
    });

    $('.miguras_offcanvas_button').css({
      color: settings.iconcolor,
      backgroundColor: settings.iconbackground,
      fontSize: parseInt(settings.iconsize),
      height: (parseInt(settings.iconsize)*1.3),
      width: (parseInt(settings.iconsize)*1.3),
      lineHeight: (parseInt(settings.iconsize)*1.3)+'px',
    });

    $this.mCustomScrollbar({
      setHeight: $finalheight,
      setWidth: false,
      axis: 'y',
      theme: settings.scroll,
      scrollbarPosition: 'inside'
    });

    var $newheight = $this.outerHeight();
    $('.dse_inside_top').css({top: '10px' });
    $('.dse_inside_middle').css({top: ($newheight/2) - (settings.iconsize/2) });
    $('.dse_inside_bottom').css({bottom: '10px' });

    $this.addClass('miguras_offcanvas miguras_offcanvas_hide');
    $this.css({
      left: -($finalwidth),
    });

    $('.miguras_offcanvas_button_click').on('click', function(){
      if($this.hasClass('miguras_offcanvas_hide')){

        $('.miguras_offcanvas_button').html(settings.closedicon);
        $('.miguras_offcanvas_button_wrapper').css({opacity: 0});
        $('.miguras_offcanvas_inside').css({position: 'fixed'});

        $this.css({
          width: $finalwidth,
        });
        $this.stop().animate({left: 0}, 400, function(){
          $this.removeClass('miguras_offcanvas_hide');
          $this.addClass('miguras_offcanvas_show');
        });
      }

      if($this.hasClass('miguras_offcanvas_show')){

        $('.miguras_offcanvas_button').html(settings.openicon);
        $('.miguras_offcanvas_button_wrapper').css({opacity: 1});


        $this.stop().animate({left: -($finalwidth)}, 400, function(){
          $this.removeClass('miguras_offcanvas_show');
          $this.addClass('miguras_offcanvas_hide');
          $this.css({
            width: 0,
          });
          $('.miguras_offcanvas_inside').css({position: 'relative'});
        });
      }

    });


  }
})(jQuery);
