(function($){
  'use strict';

  // The hiding MataBox Game function with 4 parameters
  function hidingGame( currentFormat, intervalToBeCleared = undefined, func = undefined ) {
    $( '#cometpro_demo_metabox' ).show(); // MetaBox Container(Parent)-> Show
    $( '.cmb-row' ).hide(); // Fields(Childrens)-> Hide

    switch ( currentFormat ) {
      case 'standard':
        $( '#cometpro_demo_metabox' ).hide(); // MetaBox Container-> Hide
        break;

      case 'quote':
        $( '#cometpro_demo_metabox' ).hide(); // MetaBox Container-> Hide
        break;

      case 'audio':
        $( '.cmb-row.cmb2-id-cometpro-soundcloud-embed' ).show(); // Audio Field-> Show
        break;

      case 'video':
        $( '.cmb-row.cmb2-id-cometpro-youtube-embed' ).show(); // Video Field-> Show
        break;

      case 'gallery':
        $( '.cmb-row.cmb2-id-cometpro-gallery-embed' ).show(); // Gallery Field-> Show
        break;

      default:
        $( '.cmb-row' ).show();
        break;
    }

    if ( intervalToBeCleared ) { // If the interval argument is passed, then clear it.
      clearInterval( intervalToBeCleared );
    }

    if ( func ) { // If a function is passed as an argument, then cll the function.
      func();
    }
  }

  function metaBoxEventLisners() {
    if ($( '.editor-post-format #post-format-selector-0' )) { // Gutenberg - Select Option (jQuery)
      $( '.editor-post-format #post-format-selector-0' ).change(hidingMetboxes);
    }
    if ($( 'input[type=radio][name=post_format]')) { // Classic Editor - Radio Input (JS DOM)
      document.querySelector( '#post-formats-select').addEventListener( "change", hidingMetboxes );
    }
    function hidingMetboxes( e ) {
      var currentFormat = e.target.value;

      if ( currentFormat == "0" ) { // For Classic Editor
        currentFormat = "standard";
      };

      hidingGame( currentFormat );

    }
  }

  // Custom MetaBox Hiding Game starts from here
  if ( $( '#poststuff' ) ) {
    var metaBoxInterval = setInterval( function () {
      var currentType = $( '.editor-post-format #post-format-selector-0' ).val();

      if( !currentType ) { // For Classic Editor
        var currentType = $( 'input[type=radio][name=post_format]:checked' )[0].getAttribute( 'value' );
        if ( currentType == "0" ) {
          currentType = "standard";
        }
      }

      hidingGame( currentType, metaBoxInterval, metaBoxEventLisners);

    }, 1000);
  }

})(jQuery)