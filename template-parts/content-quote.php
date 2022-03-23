            <article class="post-single">
              <div class="post-info">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <h6 class="upper"><span>By</span><a href="<?php echo esc_url( get_the_author_meta( 'url' ) ) ?>"  title="<?php echo esc_attr( sprintf( __( 'Visit %s&#8217;s website' ), get_the_author() ) ); ?>" rel="author external" target="_blank"> <?php the_author(); ?></a><span class="dot"></span><span><?php the_time('j F Y'); ?></span><?php echo ( '' != the_tags() ) ? '<span class="dot"></span>' . the_tags() : ''; ?></h6>
              </div>
              <div class="post-body">
                <blockquote class="italic">
                  <?php echo the_content(); ?>
                </blockquote>
              </div>
            </article>
