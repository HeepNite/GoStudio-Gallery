<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/* receive and return the results of ajax requests for Galery filter */
function go_filter_projects(){?>

    <div id="container-gallery" class="container-gallery">
    <?php $category = $_POST['category'];
          $args = array('post_type' => 'gogalery','posts_per_page' => 7);
          if(isset($category)){$args['category__in'] = array($category);}
          $post_query_gallery = new WP_Query($args); 
            if ($post_query_gallery->have_posts()):
                while ($post_query_gallery->have_posts()): $post_query_gallery->the_post();?>
                    <article data-id="<?php echo get_the_ID() ?>" id="categories-gallery" class="categories-gallery">
                        <?php the_post_thumbnail();?>
                        <h4 id="post-title" class="post-title"><?php the_title();?></h4>
                    </article>
                <?php endwhile; wp_reset_postdata();?>
            <?php endif; ?>
    </div> 
<?php
    die();
}
add_action('wp_ajax_nopriv_go_filter_projects', 'go_filter_projects');
add_action('wp_ajax_go_filter_projects', 'go_filter_projects');
?>