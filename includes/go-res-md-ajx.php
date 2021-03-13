<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/* receive and return the results of ajax requests for Modal petition */
function go_modal_project(){ ?>
    <div id="modal-project" class="modal-project">
    
    <?php      
    $postId = $_POST['postId'];
    $args = array('post_type' => 'gogalery');
    if(isset($postId)){$args['post__in'] = array($postId);}
    $post_md_gallery = new WP_Query($args);
    if ($post_md_gallery->have_posts()):
        while ($post_md_gallery->have_posts()): $post_md_gallery->the_post();?>
        <article data-id="<?php the_id();?>" id="modal-content" class="modal-content">
        <div id="btn-close-modal" class="btn-close-modal">X</div>
            <h5><?php the_title(); ?></h5>
            <p id="modal-content-post" class="modal-content-post">
                <?php the_content(); ?>
            </p>
            <div id="btn-modal-post" class="btn-modal-post">
                <a href="#">WEBSITE COMING SOON</a>
            </div>
        </article>

    <?php endwhile; wp_reset_postdata(); ?>
    <?php endif; ?>
    </div>
    <?php
 die();
 }
 add_action('wp_ajax_nopriv_go_modal_project', 'go_modal_project');
 add_action('wp_ajax_go_modal_project', 'go_modal_project');
 ?>