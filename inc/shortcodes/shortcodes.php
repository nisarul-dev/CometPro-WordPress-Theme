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
              'posts_per_page' => 3,
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
                      foreach ( $button_fields_arr as $button_field ) :
                        if ( $button_field['_simple_slider_button_style'] == 'style-one' ) {
                          $style_class = 'btn-light-out';
                        } elseif ( $button_field['_simple_slider_button_style'] == 'style-two' ) {
                          $style_class = 'btn-color btn-full';
                        }
                    ?>
                    <a href="#" class="btn <?php echo $style_class; ?>">
                      <?php echo esc_html__( $button_field['_simple_slider_button_text'], 'cometpro' ); ?>
                    </a>
                    <?php endforeach; ?>
                  </p>
                </div>
              </div>
            </div>
          </li>
          <?php endwhile;
          endif;
          wp_reset_postdata(); ?>
        </ul>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_simple_slider', 'simple_slider_fnc' );


// About Us shortcode (Home page)
function about_us_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'subtitle' => 'Subtitle text goes here',
        'title'    => 'Title text goes here',
    ], $atts );
    extract( $atts );
    ob_start();?>

    <section id="about">
      <div class="container">
        <div class="title center">
          <h4 class="upper"><?php echo $subtitle; ?></h4>
          <h2><?php echo $title; ?><span class="red-dot"></span></h2>
          <hr>
        </div>
        <div class="section-content">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead-text serif text-center"><?php echo $content; ?></p>
          </div>
        </div>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_about', 'about_us_fnc' );


// Expertise shortcode (Home page)
function expertise_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'subtitle' => 'THIS IS WHAT WE LOVE TO DO.',
        'title'    => 'Expertise',
        'bg_img_id'=> '171',
        'icon_1'   => 'focus',
        'title_1'  => 'BRANDING',
        'desc_1'   => 'Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup.',
        'icon_2'   => 'layers',
        'title_2'  => 'INTERACTIVE',
        'desc_2'   => 'Commodi totam esse quis alias, nihil voluptas repellat magni, id fuga perspiciatis, ut quia beatae, accus.',
        'icon_3'   => 'mobile',
        'title_3'  => 'Production',
        'desc_3'   => 'Doloribus qui asperiores nisi placeat volup eum, nemo est, praesentium fuga alias sit quis atque accus.',
        'icon_4'   => 'globe',
        'title_4'  => 'Editing',
        'desc_4'   => 'Aliquid repellat facilis quis. Sequi excepturi quis dolorem eligendi deleniti fuga rerum itaque.',
    ], $atts );
    extract( $atts );
    ob_start();?>

    <section class="p-0 b-0">
      <div class="col-md-6 col-sm-4 img-side img-left mb-0">
        <div class="img-holder"><img src="<?php echo wp_get_attachment_image_url( $bg_img_id, 'full' ); ?>" alt="<?php //wp_get_attachment_image_url(); ?>" class="bg-img">
          <div class="centrize">
            <div class="v-center">
              <div class="title txt-xs-center">
                <h4 class="upper"><?php echo $subtitle; ?></h4>
                <h3><?php echo $title; ?><span class="red-dot"></span></h3>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
        <div class="row">
          <div class="services">
            <div class="col-sm-6 border-bottom border-right">
              <div class="service"><i class="icon-<?php echo $icon_1; ?>"></i><span class="back-icon"><i class="icon-<?php echo $icon_1; ?>"></i></span>
                <h4><?php echo $title_1; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $desc_1; ?></p>
              </div>
            </div>
            <div class="col-sm-6 border-bottom">
              <div class="service"><i class="icon-<?php echo $icon_2; ?>"></i><span class="back-icon"><i class="icon-<?php echo $icon_2; ?>"></i></span>
                <h4><?php echo $title_2; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $desc_2; ?></p>
              </div>
            </div>
            <div class="col-sm-6 border-bottom border-right">
              <div class="service"><i class="icon-<?php echo $icon_3; ?>"></i><span class="back-icon"><i class="icon-<?php echo $icon_3; ?>"></i></span>
                <h4><?php echo $title_3; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $desc_3; ?></p>
              </div>
            </div>
            <div class="col-sm-6 border-bottom">
              <div class="service"><i class="icon-<?php echo $icon_4; ?>"></i><span class="back-icon"><i class="icon-<?php echo $icon_4; ?>"></i></span>
                <h4><?php echo $title_4; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $desc_4; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_expertise', 'expertise_fnc' );


// Vision shortcode (Home page)
function vision_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'subtitle'  => 'NOT JUST CODE.',
        'title'     => 'The Vision',
        'bg_img_id' => '173',
        'title_1'   => 'STRATEGY',
        'desc_1'    => 'Natus totam adipisci illum aut nihil consequuntur ut, ducimus alias iusto facili.',
        'title_2'   => 'DESIGN',
        'desc_2'    => 'Nisi, ut commodi dolor, quae doloremque earum alias accusantium sint.',
        'title_3'   => 'SKILLS',
        'desc_3'    => 'Nesciunt est eaque, expedita cum minima reprehenderit? Harum vero dolorum.',
        'title_4'   => 'POWER',
        'desc_4'    => 'Fuga ipsum, repellendus? Architecto commodi magni non nihil et iusto.',
    ], $atts );
    extract( $atts );
    ob_start();?>

    <section>
      <div class="col-md-6 col-sm-4 img-side img-right">
        <div class="img-holder"><img src="<?php echo wp_get_attachment_image_url( $bg_img_id, 'full' ); ?>" alt="" class="bg-img"></div>
      </div>
      <div class="container">
        <div class="col-md-5 col-sm-8">
          <div class="title">
            <h4 class="upper"><?php echo $subtitle; ?></h4>
            <h3><?php echo $title; ?><span class="red-dot"></span></h3>
            <hr>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="row">
              <div class="text-box">
                <h4 class="upper small-heading"><?php echo $title_1; ?></h4>
                <p><?php echo $desc_1; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="row">
              <div class="text-box">
                <h4 class="upper small-heading"><?php echo $title_2; ?></h4>
                <p><?php echo $desc_2; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="row">
              <div class="text-box">
                <h4 class="upper small-heading"><?php echo $title_3; ?></h4>
                <p><?php echo $desc_3; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="row">
              <div class="text-box">
                <h4 class="upper small-heading"><?php echo $title_4; ?></h4>
                <p><?php echo $desc_4; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_vision', 'vision_fnc' );


// Home Portfolio Section shortcode (Home page)
function portfolio_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'title'      => 'SELECTED WORKS',
        'post_count' => 8,
    ], $atts );
    extract( $atts );
    ob_start();
    ?>

    <section id="portfolio" class="pb-0">
      <div class="container">
        <div class="col-md-6">
          <div class="title m-0 txt-xs-center txt-sm-center">
            <h2 class="upper"><?php echo $title; ?><span class="red-dot"></span></h2>
            <hr>
          </div>
        </div>
        <div class="col-md-6">
          <ul id="filters" class="no-fix mt-25">

            <li data-filter="*" class="active">All</li>
            <?php $term_obj_list = get_terms( 'cometpro_portfolio_category' );
            foreach ( $term_obj_list as $term_obj ): ?>
            <li data-filter=".<?php echo $term_obj->slug; ?>"><?php echo $term_obj->name; ?></li>
            <?php endforeach;?>

          </ul>
        </div>
      </div>
      <div class="section-content pb-0">
        <div id="works" class="four-col wide mt-50">

          <?php
          $portfolio_query = new WP_Query( [
                  'post_type'      => 'portfolio',
                  'posts_per_page' => $post_count,
              ] );
              if ( $portfolio_query->have_posts() ):
                  while ( $portfolio_query->have_posts() ):
                      $portfolio_query->the_post();

                      $term_obj_list = get_the_terms( get_the_ID(), 'cometpro_portfolio_category' );
                      $terms_string_comma = implode( ', ', wp_list_pluck( $term_obj_list, 'name' ) );
                      $terms_string_space = implode( ' ', wp_list_pluck( $term_obj_list, 'slug' ) );
          ?>
          <div class="work-item <?php echo $terms_string_space; ?>">
            <div class="work-detail"><a href="portfolio-single-1.html"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3><?php the_title();?></h3>
                    <p><?php echo $terms_string_comma; ?>
                    </p>
                  </div>
                </div>
              </div></a>
            </div>
          </div>
          <?php endwhile;endif;
          wp_reset_postdata();?>

        </div>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_portfolio', 'portfolio_fnc' );


// Brand logos shortcode (Home page)
function brand_logos_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'subtitle'    => 'SOME OF THE BEST.',
        'title'       => 'Our Clients',
        'brand_logos' => '174,175,176,177,178,179,179,179,179',
    ], $atts );
    extract( $atts );
    $arr = [0, 500, 100];
    $brand_logos = explode(",", $brand_logos );
    $total_icons = count( $brand_logos );
    ob_start();?>

    <section>
      <div class="container">
        <div class="title center">
          <h4 class="upper"><?php echo $subtitle; ?></h4>
          <h3><?php echo $title; ?><span class="red-dot"></span></h3>
          <hr>
        </div>
        <div class="section-content">
          <div class="boxes clients">
            <?php for( $i = 1; $i <= $total_icons; $i++ ) :
              // Animation timing fixing
              if ( $i % 3 == 0 ) {
                $animation_timer = 1000;
              } elseif ( ( $i + 1 ) % 3 == 0 ) {
                $animation_timer = 500;
              } elseif ( ( $i + 2 ) % 3 == 0 )  {
                $animation_timer = 0;
              }
              // Border Fixing
              $border_right = 'border-right';
              $border_bottom = 'border-bottom';

              if ( ( $i - ( $total_icons - ( $total_icons % 3) ) )  < 3 && ( $i - ( $total_icons - ( $total_icons % 3) ) ) > 0 ) {
                $border_bottom = '';
                $border_right = 'border-right';
              }
              if ( $total_icons % 3 == 0 && $i > ($total_icons - 3) ) {
                  $border_bottom = '';
                  $border_right = 'border-right';
              }
              if ( $total_icons == $i ) {
                  $border_right = '';
                  $border_bottom = '';
              }
              if ( $i % 3 == 0 ) {
                  $border_right = '';
              }

              $border_line = "{$border_right} {$border_bottom}";
            ?>
            <div class="col-sm-4 col-xs-6 <?php echo $border_line; ?>"><img src="<?php echo wp_get_attachment_image_url( $brand_logos[$i-1], 'full' ); ?>" alt="" data-animated="true" data-delay="<?php echo $animation_timer; ?>" class="client-image"></div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_brand_logos', 'brand_logos_fnc' );


// Customer Reviews shortcode (Home page)
function customer_reviews_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'title'     => 'What They Say',
        'bg_img_id' => '173',
        'title_1'   => 'Jon Snow - Google Inc.',
        'desc_1'    => 'Blanditiis impedit omnis excepturi rem dolores! Ab consequuntur reiciendis eaque atque.',
        'title_2'   => 'Daenerys Targarien - Apple Inc.',
        'desc_2'    => 'Dolorem natus, sint. Enim molestias expedita laboriosam perferendis possimus facere nostrum laudantium vero.',
        'title_3'   => 'Jon Snow - Google Inc.',
        'desc_3'    => 'Blanditiis impedit omnis excepturi rem dolores! Ab consequuntur reiciendis eaque atque.',
        'title_4'   => 'Daenerys Targarien - Apple Inc.',
        'desc_4'    => 'Dolorem natus, sint. Enim molestias expedita laboriosam perferendis possimus facere nostrum laudantium vero.',

    ], $atts );
    extract( $atts );
    ob_start();?>

    <section class="parallax">
      <div data-parallax="scroll" data-image-src="images/bg/7.jpg" class="parallax-bg"></div>
      <div class="parallax-overlay pb-50 pt-50">
        <div class="container">
          <div class="title center">
            <h3><?php echo $title; ?><span class="red-dot"></span></h3>
            <hr>
          </div>
          <div class="section-content">
            <div id="testimonials-slider" data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-outside">
              <ul class="slides">
                <li>
                  <blockquote>
                    <p>"<?php echo $desc_1; ?>"</p>
                    <footer><?php echo $title_1; ?></footer>
                  </blockquote>
                </li>
                <li>
                  <blockquote>
                    <p>"<?php echo $desc_1; ?>"</p>
                    <footer><?php echo $title_1; ?></footer>
                  </blockquote>
                </li>
                <li>
                  <blockquote>
                    <p>"<?php echo $desc_1; ?>"</p>
                    <footer><?php echo $title_1; ?></footer>
                  </blockquote>
                </li>
                <li>
                  <blockquote>
                    <p>"<?php echo $desc_1; ?>"</p>
                    <footer><?php echo $title_1; ?></footer>
                  </blockquote>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_customer_reviews', 'customer_reviews_fnc' );


// Home Blog Section shortcode (Home page)
function home_blog_fnc( $atts, $content = null ) {
    $atts = shortcode_atts( [
        'subtitle'    => 'WE HAVE A FEW TIPS FOR YOU.',
        'title'       => 'The Blog',
        'button_text' => 'View Full Blog',
        'post_count'  => 2,
    ], $atts );
    extract( $atts );
    ob_start(); ?>

    <section>
      <div class="container">
        <div class="title center">
          <h4 class="upper"><?php echo $subtitle; ?></h4>
          <h2><?php echo $title; ?><span class="red-dot"></span></h2>
          <hr>
        </div>
        <div class="section-content">
          <div class="col-md-8 col-md-offset-2">

            <?php
            $blog_query = new WP_Query( [
              'post_type'     => 'post',
              'posts_per_page' => $post_count,
            ] );
            if ( $blog_query->have_posts() ):
              while ( $blog_query->have_posts() ) :
                $blog_query->the_post();
            ?>
            <div class="blog-post">
              <div class="post-body">
                <h3 class="serif"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <hr>
                <p class="serif"><?php echo wp_trim_words( get_the_content(), 30, '' ); ?> [...]  </p>
                <div class="post-info upper"><a href="<?php the_permalink(); ?>">Read More</a><span class="pull-right black-text">November 16, 2015</span></div>
              </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>

          </div>
          <div class="clearfix"></div>
          <div class="mt-25">
            <p class="text-center"><a href="<?php echo "#"; ?>" class="btn btn-color-out"><?php echo $button_text; ?></a></p>
          </div>
        </div>
      </div>
    </section>

    <?php return ob_get_clean();
}
add_shortcode( 'cometpro_home_blog', 'home_blog_fnc' );

