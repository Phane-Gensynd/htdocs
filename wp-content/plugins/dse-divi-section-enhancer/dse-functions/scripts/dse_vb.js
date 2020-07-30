function dse_visual_geometry(){
  jQuery(function($){


    var $diviSelector = $(".et_pb_hovered.et_pb_focused");
  	if($("iframe#et-fb-app-frame").length != 0){
  		var $diviIframe = $("iframe#et-fb-app-frame").contents();
  		$diviSelector = $diviIframe.find(".et_pb_hovered.et_pb_focused");
  	}


    $('li[data-value="divi_se_geometryangle_preview"]').on('click', function(){
      var $deproscripts = divi_sections_enhancer_scripts_pro();
      var $this = $(this);
      var $hex1 = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_geometry_meshbg').attr('value');
      var $hex2 = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_geometry_meshdiffuse').attr('value');
      var $hex3 = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_geometry_meshambient').attr('value');
      var $hex4 = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_geometry_lightsdiffuse').attr('value');
      var $hex5 = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_geometry_lightsambient').attr('value');


      $diviSelector.attr('data-geometryanglemeshbg', $hex1);
      $diviSelector.attr('data-geometryanglemeshdiffuse', $hex2);
      $diviSelector.attr('data-geometryanglemeshambient', $hex3);
      $diviSelector.attr('data-geometryanglelightsdiffuse', $hex4);
      $diviSelector.attr('data-geometryanglelightsambient', $hex5);

      if(!$('.et-fb-modal').hasClass('dse_visual_builder_loaded')){
        $diviSelector.addClass('divi_se_geometryangle_bg');
        if($('.et-fb-modal').length != 0 && !$('.et-fb-modal').hasClass('dse_visual_builder_loaded')) {
          $deproscripts.divi_se_geometry_bg();
        }
      }

        setTimeout(function(){
          dse_visual_geometry();
          $('.et-fb-modal').addClass('dse_visual_builder_loaded');
        }, 50);


    })




    $('.et-fb-form__group').on('mouseover change', function(){
      var $deproscripts = divi_sections_enhancer_scripts_pro();

      if($('.et-fb-modal').hasClass('dse_visual_builder_loaded')){

        if($(this).find('#et-fb-divi_se_geometry_meshbg').length > 0 ){
          var $color = $(this).find('#et-fb-divi_se_geometry_meshbg').attr('value');

          if($diviSelector.hasClass('divi_se_geometryangle_bg') && $diviSelector.attr('data-geometryanglemeshbg') != $color){
            $diviSelector.attr('data-geometryanglemeshbg', $color);
            $deproscripts.divi_se_geometry_bg();
          }
        }


        if($(this).find('#et-fb-divi_se_geometry_meshdiffuse').length > 0){
          var $color = $(this).find('#et-fb-divi_se_geometry_meshdiffuse').attr('value');

          if($diviSelector.hasClass('divi_se_geometryangle_bg') && $diviSelector.attr('data-geometryanglemeshdiffuse') != $color){
            $diviSelector.attr('data-geometryanglemeshdiffuse', $color);
            $deproscripts.divi_se_geometry_bg();
          }
        }


        if($(this).find('#et-fb-divi_se_geometry_meshambient').length > 0){
          var $color = $(this).find('#et-fb-divi_se_geometry_meshambient').attr('value');

          if($diviSelector.hasClass('divi_se_geometryangle_bg') && $diviSelector.attr('data-geometryanglemeshambient') != $color){
            $diviSelector.attr('data-geometryanglemeshambient', $color);
            $deproscripts.divi_se_geometry_bg();
          }
        }


        if($(this).find('#et-fb-divi_se_geometry_lightsdiffuse').length > 0){
          var $color = $(this).find('#et-fb-divi_se_geometry_lightsdiffuse').attr('value');

          if($diviSelector.hasClass('divi_se_geometryangle_bg') && $diviSelector.attr('data-geometryanglelightsdiffuse') != $color){
            $diviSelector.attr('data-geometryanglelightsdiffuse', $color);
            $deproscripts.divi_se_geometry_bg();
          }
        }


        if($(this).find('#et-fb-divi_se_geometry_lightsambient').length > 0){
          var $color = $(this).find('#et-fb-divi_se_geometry_lightsambient').attr('value');

          if($diviSelector.hasClass('divi_se_geometryangle_bg') && $diviSelector.attr('data-geometryanglelightsambient') != $color){
            $diviSelector.attr('data-geometryanglelightsambient', $color);

            $deproscripts.divi_se_geometry_bg();
          }
        }


      }


    });

    $('li[data-value="divi_se_geometryangle_pnone"]').on('click', function(){

      if($diviSelector.hasClass('divi_se_geometryangle_bg')){
        if($diviSelector.find('.fss-output').lenght != 0){
          $diviSelector.find('.fss-output').remove();
        }
        $('.et-fb-modal').removeClass('dse_visual_builder_loaded');
        $diviSelector.removeAttr('data-geometryanglemeshbg data-geometryanglemeshdiffuse data-geometryanglemeshambient data-geometryanglelightsdiffuse data-geometryanglelightsambient');
        $diviSelector.removeClass('divi_se_geometryangle_bg');
      }

    })

  })
}





function dse_visual_youtube(){
  jQuery(function($){


    var $diviSelector = $(".et_pb_hovered.et_pb_focused");
  	if($("iframe#et-fb-app-frame").length != 0){
  		var $diviIframe = $("iframe#et-fb-app-frame").contents();
  		$diviSelector = $diviIframe.find(".et_pb_hovered.et_pb_focused");
  	}


    $('li[data-value="divi_se_youtube_preview"]').on('click', function(){
      var $defreescripts = divi_sections_enhancer_scripts_free();
      var $this = $(this);

      var $youtubebgid = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_id').attr('placeholder');
      if($(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_id').attr('value') != ''){
        $youtubebgid = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_id').attr('value');
      }
      var $youtubebgmute = ($(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_mute').find('.select-option-item').first().attr('data-value') == "true");
      var $youtubebgratio = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_ratio').find('.select-option-item').first().attr('data-value');
      var $youtubebgrepeat = ($(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_repeat').find('.select-option-item').first().attr('data-value') == "true");
      var $youtubebghidetop = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_hidetop').attr('placeholder');
      if($(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_hidetop').attr('value') != ''){
        $youtubebghidetop = $(this).parents('.et-fb-form__toggle-opened').find('#et-fb-divi_se_youtubebg_hidetop').attr('value');
      }

      var $videowidth = $(window).width();





      $diviSelector.attr('data-youtubebgid', $youtubebgid);
      $diviSelector.attr('data-youtubebgmute', $youtubebgmute);
      $diviSelector.attr('data-youtubebgratio', $youtubebgratio);
      $diviSelector.attr('data-youtubebgrepeat', $youtubebgrepeat);
      $diviSelector.attr('data-youtubebghidetop', $youtubebghidetop);

      if(!$('.et-fb-modal').hasClass('dse_visual_builder_loaded')){
        $diviSelector.addClass('divi_se_youtubebg');
        if($('.et-fb-modal').length != 0 && !$('.et-fb-modal').hasClass('dse_visual_builder_loaded')) {
          $defreescripts.divi_se_youtube_background();
        }
      }

        setTimeout(function(){
          dse_visual_youtube();
          $('.et-fb-modal').addClass('dse_visual_builder_loaded');
        }, 50);


    })




    $('#et-fb-divi_se_youtubebg_id').on('keyup mouseup paste contextmenu mouseleave click change', function(){
      var $defreescripts = divi_sections_enhancer_scripts_free();
      var $value = $(this).attr('value');
      if($(this).attr('value') == ''){
        $value = $(this).attr('placeholder');
      }
      var $currentvalue = $diviSelector.attr('data-youtubebgid');
      if($('.et-fb-modal').hasClass('dse_visual_builder_loaded') && $currentvalue !== $value && $diviSelector.hasClass('divi_se_youtubebg')){
        $diviSelector.find('.divi_se_youtube_background_video').remove();

        $diviSelector.find('divi_se_youtube_background_container').prepend('<div class="divi_se_youtube_background_video"></div>');

        $diviSelector.attr('data-youtubebgid', $value);
        setTimeout(function(){
          $defreescripts.divi_se_youtube_background();
        }, 300);

      }


    });



    $('#et-fb-divi_se_youtubebg_mute').on('keyup mouseup mouseleave click', function(){
      var $defreescripts = divi_sections_enhancer_scripts_free();
      var $value = $(this).find('li.select-option-item').first().attr('data-value');

      var $currentvalue = $diviSelector.attr('data-youtubebgmute');
      if($('.et-fb-modal').hasClass('dse_visual_builder_loaded') && $currentvalue !== $value && $diviSelector.hasClass('divi_se_youtubebg')){
        $diviSelector.find('.divi_se_youtube_background_video').remove();

        $diviSelector.find('divi_se_youtube_background_container').prepend('<div class="divi_se_youtube_background_video"></div>');

        $diviSelector.attr('data-youtubebgmute', $value);
        setTimeout(function(){
          $defreescripts.divi_se_youtube_background();
        }, 300);

      }


    });



    $('#et-fb-divi_se_youtubebg_repeat').on('keyup mouseup mouseleave click', function(){
      var $defreescripts = divi_sections_enhancer_scripts_free();
      var $value = $(this).find('li.select-option-item').first().attr('data-value');

      var $currentvalue = $diviSelector.attr('data-youtubebgrepeat');
      if($('.et-fb-modal').hasClass('dse_visual_builder_loaded') && $currentvalue !== $value && $diviSelector.hasClass('divi_se_youtubebg')){
        $diviSelector.find('.divi_se_youtube_background_video').remove();

        $diviSelector.find('divi_se_youtube_background_container').prepend('<div class="divi_se_youtube_background_video"></div>');

        $diviSelector.attr('data-youtubebgrepeat', $value);
        setTimeout(function(){
          $defreescripts.divi_se_youtube_background();
        }, 300);

      }


    });



    $('#et-fb-divi_se_youtubebg_ratio').on('keyup mouseup mouseleave click', function(){
      var $defreescripts = divi_sections_enhancer_scripts_free();
      var $value = $(this).find('li.select-option-item').first().attr('data-value');

      var $currentvalue = $diviSelector.attr('data-youtubebgratio');
      if($('.et-fb-modal').hasClass('dse_visual_builder_loaded') && $currentvalue !== $value && $diviSelector.hasClass('divi_se_youtubebg')){
        $diviSelector.find('.divi_se_youtube_background_video').remove();

        $diviSelector.find('divi_se_youtube_background_container').prepend('<div class="divi_se_youtube_background_video"></div>');

        $diviSelector.attr('data-youtubebgratio', $value);
        setTimeout(function(){
          $defreescripts.divi_se_youtube_background();
        }, 300);

      }


    });



    $('#et-fb-divi_se_youtubebg_hidetop').on('keyup mouseup paste contextmenu mouseleave click change', function(){
      var $defreescripts = divi_sections_enhancer_scripts_free();
      var $value = $(this).attr('value');
      if($(this).attr('value') == ''){
        $value = $(this).attr('placeholder');
      }
      var $currentvalue = $diviSelector.attr('data-youtubebghidetop');
      if($('.et-fb-modal').hasClass('dse_visual_builder_loaded') && $currentvalue !== $value && $diviSelector.hasClass('divi_se_youtubebg')){
        $diviSelector.find('.divi_se_youtube_background_video').remove();

        $diviSelector.find('divi_se_youtube_background_container').prepend('<div class="divi_se_youtube_background_video"></div>');

        $diviSelector.attr('data-youtubebghidetop', $value);
        setTimeout(function(){
          $defreescripts.divi_se_youtube_background();
        }, 300);

      }


    });




    $('li[data-value="divi_se_youtube_pnone"]').on('click', function(){

      if($diviSelector.hasClass('divi_se_youtubebg')){
        $('.et-fb-modal').removeClass('dse_visual_builder_loaded');
        $diviSelector.removeAttr('data-youtubebgid data-youtubebgmute data-youtubebgratio data-youtubebgrepeat data-youtubebghidetop ');
        $diviSelector.find('.divi_se_youtube_background_container').remove();
        $diviSelector.find('.divi_se_youtube_background_overlay').remove();
        $diviSelector.removeClass('divi_se_youtubebg');
      }

    })

  })
}







//BUILDER
jQuery(function($) {

    jQuery(document).on('click', function(){
      if(jQuery("#et-fb-app").length != 0) {

        // visual geometry angle load after 300ms to avoid conflicts with modal box
        setTimeout(function(){
          if($('.et-fb-modal').length != 0 && !$('.et-fb-modal').hasClass('dse_visual_builder_loaded')) {
            dse_visual_geometry();
            dse_visual_youtube();
          }

        }, 300);


      }
    });

});
