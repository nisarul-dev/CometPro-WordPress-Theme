            <article class="post-single">
              <div class="post-info">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <h6 class="upper"><span>By</span><a href="<?php echo esc_url( get_the_author_meta( 'url' ) ) ?>"  title="<?php echo esc_attr( sprintf( __( 'Visit %s&#8217;s website' ), get_the_author() ) ); ?>" rel="author external" target="_blank"> <?php the_author(); ?></a><span class="dot"></span><span><?php the_time('j F Y'); ?></span><?php echo ( '' != get_the_tags() ) ? '<span class="dot"></span>' . get_the_tag_list( null, ', ', '' ) : ''; ?></h6>
              </div>
              <div class="post-media">
                <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                  <ul class="slides">
                    <?php $images = get_post_meta( get_the_ID(), 'cometpro_gallery_embed', 1 ); ?>
                    <?php foreach( $images as $img_key => $img_val) : ?>
                        <li><img src="<?php echo $img_val; ?>" id="img-<?php echo $img_key; ?>" alt="<?php echo get_post_meta( $img_key, '_wp_attachment_image_alt', true) ?>"></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <div class="post-body">
                <?php echo wp_trim_words( get_the_content(), 50, '' ); ?>
                <p><a href="<?php the_permalink(); ?>" class="btn btn-color btn-sm">Read More</a></p>
              </div>
            </article>