<?php
/**
 * Template Name: Pagination for CPT (Portfolio)
 */
?>

<?php get_header(); global $redux_data; ?>
<div class="container">

    <?php

    $portfolio_current_page = get_query_var('paged') ? get_query_var('paged') : 1;

    $portfolio_cpt_query = new WP_Query( [
        'post_type' => 'portfolio',
        'posts_per_page' => 2,
        'paged' => $portfolio_current_page, // Current Page Number
    ] );

    if ( $portfolio_cpt_query->have_posts() ) :
        while ( $portfolio_cpt_query->have_posts() ) :
            $portfolio_cpt_query->the_post();
    ?>

    <h1><?php the_title(); ?></h1>

    <?php
        endwhile;
    endif;
    wp_reset_postdata();

    // Pagination
    $portfolio_max_page = $portfolio_cpt_query->max_num_pages;
    echo paginate_links( array(
        'current' => $portfolio_current_page,
        'total' => $portfolio_max_page,
        'show_all' => true,
    ) );
    ?>

</div>
<?php get_footer(); ?>
