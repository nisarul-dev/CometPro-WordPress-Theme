<?php get_header(); global $redux_data; ?>
    <section class="page-title parallax">
      <div data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri() . '/images' ?>/bg/18.jpg" class="parallax-bg"></div>
      <div class="parallax-overlay">
        <div class="centrize">
          <div class="v-center">
            <div class="container">
              <div class="title center">
                <h1 class="upper"><?php echo esc_html( $redux_data[ 'blog-title' ] ); ?><span class="red-dot"></span></h1>
                <h4><?php echo esc_html( $redux_data[ 'blog-subtitle' ] ); ?></h4>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">

        <!-- left area -->
        <div class="col-md-8">
          <!-- Posts -->
          <div class="blog-posts">
            <?php
              if( have_posts() ) :
                while( have_posts() ) :
                  the_post();
                  get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
              endif;
            ?>
          </div>

        </div>
        <!-- End Posts -->

        <!-- right area  -->
        <div class="col-md-3 col-md-offset-1">
          <?php
            // Right Sidebar
            get_sidebar();
          ?>
        </div>

      </div>
    </section>
<?php get_footer(); ?>