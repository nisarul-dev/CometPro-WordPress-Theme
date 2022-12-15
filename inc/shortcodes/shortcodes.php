<?php
// Slider shortcode (Home page)
function simple_slider_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'abc' => 'Default value',
        'def' => 'Default value',
    ], $atts );
    extract($atts);
    ob_start(); ?>

    <section id="home">
      <div id="home-slider" class="flexslider">
        <ul class="slides">
          <?php
            $slider_query = new WP_Query( [
              'post_type'     => 'simple_slider',
              'post_per_page' => 3,
            ] );
            if ( $slider_query->have_posts() ):
              while ( $slider_query->have_posts() ) :
                $slider_query->the_post();
          ?>
          <li><?php the_post_thumbnail(); ?>
            <div class="slide-wrap">
              <div class="slide-content">
                <div class="container">
                  <h1><?php the_title(); ?><span class="red-dot"></span></h1>
                  <h6><?php echo esc_html__( get_post_meta( get_the_ID(), 'simple-slider-subtitle', 1 ), 'cometpro' ); ?></h6>
                  <p>
                    <?php
                      $button_fields_arr = get_post_meta( get_the_ID(), '_button_fields', 1 );
                      foreach ( $button_fields_arr as $buttion_field ) :
                        if ( $buttion_field['_simple_slider_button_style'] == 'style-one' ) {
                          $style_class = 'btn-light-out';
                        } elseif ( $buttion_field['_simple_slider_button_style'] == 'style-two' ) {
                          $style_class = 'btn-color btn-full';
                        }
                    ?>
                    <a href="#" class="btn <?php echo $style_class; ?>">
                      <?php echo esc_html__( $buttion_field['_simple_slider_button_text'], 'cometpro' ); ?>
                    </a>
                    <?php endforeach; ?>
                  </p>
                </div>
              </div>
            </div>
          </li>
          <?php endwhile;
          endif; ?>
        </ul>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'simple_slider', 'simple_slider_fnc' );




