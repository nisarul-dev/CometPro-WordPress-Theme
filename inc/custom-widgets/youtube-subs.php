<?php

function cometpro_widget_youtube_subs_scripts_enuqueue() {
    wp_enqueue_script( 'google-platform', 'https://apis.google.com/js/platform.js' );
}
add_action( 'wp_enqueue_scripts', 'cometpro_widget_youtube_subs_scripts_enuqueue' );

/**
 * Adds Youtube Subs widget.
 */
class Youtube_Subs_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'yb-subs', // Base ID
            esc_html__( 'Youtube Subs Widget', 'cometpro' ), // Name
            array( 'description' => esc_html__( 'Subscribe button for your youtube channel', 'cometpro' ), ) // Args
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
        <div
            class="g-ytsubscribe"
            data-channelid="<?php echo esc_attr( ! empty( $instance['channel_id']) ? $instance['channel_id'] : 'UCUIkj9NMaKkp33PLaoHWRUw' ); ?>"
            data-layout="full"
            data-count="<?php echo esc_attr( ( $instance['show_subscount'] == 'hidden' ) ? 'hidden' : 'default' ); ?>"
        ></div>
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
        $channel_id = ! empty( $instance['channel_id'] ) ? $instance['channel_id'] : esc_html__( 'UCUIkj9NMaKkp33PLaoHWRUw' );
        $show_subscount = ! empty( $instance['show_subscount'] ) ? $instance['show_subscount'] : 'shown';
        ?>

        <!-- Title -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'cometpro' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <!-- Channel ID -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'channel_id' ) ); ?>"><?php esc_attr_e( 'Channel ID:', 'cometpro' ); ?> <a href="http://www.youtube.com/account_advanced" target="_blank">( find your channel id )</a></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'channel_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'channel_id' ) ); ?>" type="text" value="<?php echo esc_attr( $channel_id ); ?>">
        </p>

        <!-- Subscriber count -->
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_subscount' ) ); ?>"><?php esc_attr_e( 'Show Subscriber Count:', 'cometpro' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_subscount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_subscount' ) ); ?>" type="text">
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
        $instance['channel_id'] = ( ! empty( $new_instance['channel_id'] ) ) ? sanitize_text_field( $new_instance['channel_id'] ) : '';
        $instance['show_subscount'] = ( ! empty( $new_instance['show_subscount'] ) ) ? sanitize_text_field( $new_instance['show_subscount'] ) : '';

        return $instance;
    }

} // class Foo_Widget

function cometpro_youtube_subs_widget() {
    register_widget( 'Youtube_Subs_Widget' );
}
add_action( 'widgets_init', 'cometpro_youtube_subs_widget' );
