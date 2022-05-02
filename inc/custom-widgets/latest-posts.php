<?php

/**
 * Adds Latest Posts widget.
 */
class Latest_Posts_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'latest-posts', // Base ID
            esc_html__( 'CometPro Latest Posts Widget', 'cometpro' ), // Name
            array( 'description' => esc_html__( 'Your site\'s most recent Posts.', 'cometpro' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
        <ul class="nav">
            <?php
            $queryBlog = new WP_Query("type=post&posts_per_page={$instance['post_count']}");
            if( $queryBlog->have_posts() ) :
                while( $queryBlog->have_posts() ) : $queryBlog->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?><?php if( $instance['show_date'] == 'shown' ) : ?><i class="ti-arrow-right"></i><span><?php echo esc_html( get_the_date('j F, Y') ); ?></span><?php endif; ?></a></li>
            <?php
                endwhile;
            endif;
            ?>
        </ul>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'cometpro' );
        $channel_id = ! empty( $instance['post_count'] ) ? $instance['post_count'] : esc_html__( '5' );
        $show_subscount = ! empty( $instance['show_date'] ) ? $instance['show_date'] : 'shown';
        ?>

        <!-- Title -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'cometpro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <!-- Post count -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>"><?php esc_attr_e( 'Number of posts to show:', 'cometpro' ); ?></label>
        <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_count' ) ); ?>" type="number" value="<?php echo esc_attr( $channel_id ); ?>">
        </p>

        <!-- show Date -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_attr_e( 'Show Post Date:', 'cometpro' ); ?></label>
        <select class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" type="text">
        <option value="shown" <?php  echo ( $show_subscount == 'shown' )  ? esc_attr( 'selected') : ''; ?>>Default (shown)</option>
        <option value="hidden" <?php echo ( $show_subscount == 'hidden' ) ? esc_attr( 'selected') : ''; ?>>Hidden</option>
        </select>
        </p>


        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['post_count'] = ( ! empty( $new_instance['post_count'] ) ) ? sanitize_text_field( $new_instance['post_count'] ) : '';
        $instance['show_date'] = ( ! empty( $new_instance['show_date'] ) ) ? sanitize_text_field( $new_instance['show_date'] ) : '';

        return $instance;
    }

} // class Youtube_Subs_Widget

function cometpro_latest_posts_widget() {
    register_widget( 'Latest_Posts_Widget' );
}
add_action( 'widgets_init', 'cometpro_latest_posts_widget' );
