(function($){
  'use strict';

  // The hiding MataBox Game function
  function hidingGame() {
    if ($(".editor-post-format #post-format-selector-0")) { // Gutenberg
      $(".editor-post-format #post-format-selector-0").change(hidingMetboxes);
    }
    if ($('input[type=radio][name=post_format]')) { // Classic Editor
      $('input[type=radio][name=post_format]').change( hidingMetboxes );
    }
    function hidingMetboxes() {
      var currentFormat = $(this).val();

      if (currentFormat == "0") { // For Classic Editor
        currentFormat = "standard";
      };

      if (currentFormat == 'standard' || currentFormat == 'quote') {
        $('.cmb-row').hide();
        $('#cometpro_demo_metabox').hide();
      }
      if (currentFormat == 'audio') {
        $('#cometpro_demo_metabox').show();
        $('.cmb-row').hide();
        $('.cmb-row.cmb2-id-cometpro-soundcloud-embed').show();
      }
      if (currentFormat == 'video') {
        $('#cometpro_demo_metabox').show();
        $('.cmb-row').hide();
        $('.cmb-row.cmb2-id-cometpro-youtube-embed').show();
      }
      if (currentFormat == 'gallery') {
        $('#cometpro_demo_metabox').show();
        $('.cmb-row').hide();
        $('.cmb-row.cmb2-id-cometpro-gallery-embed').show();
      }
    }
  }

  // Game starts from here
  var the_interval = setInterval( function () {
    var currentType = $(".editor-post-format #post-format-selector-0").val();

    if( !currentType ) { // For Classic Editor
      var currentType = $('input[type=radio][name=post_format]:checked')[0].getAttribute('value');
      if (currentType == "0") {
        currentType = "standard";
      };
    }

    // Initial hiding Metaboxs
    if (currentType == "standard" || currentType == "quote") {
      $('.cmb-row').hide();
      $('#cometpro_demo_metabox').hide();
      hidingGame();
      clearInterval( the_interval );
    }
    if (currentType == "audio") {
      $('.cmb-row').hide();
      $('.cmb-row.cmb2-id-cometpro-soundcloud-embed').show();
      hidingGame();
      clearInterval( the_interval );
    }
    if( currentType == "video" ) {
      $('.cmb-row').hide();
      $('.cmb-row.cmb2-id-cometpro-youtube-embed').show();
      hidingGame();
      clearInterval( the_interval );
    }
    if( currentType == "gallery" ) {
      $('.cmb-row').hide();
      $('.cmb-row.cmb2-id-cometpro-gallery-embed').show();
      hidingGame();
      clearInterval( the_interval );
    }
  }, 1000);

})(jQuery)