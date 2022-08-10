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
                  <h6><?php the_content(); ?></h6>
                  <p><a href="#" class="btn btn-light-out">Read More</a><a href="#" class="btn btn-color btn-full">Services</a></p>
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




