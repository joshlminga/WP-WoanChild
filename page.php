<?php
$layout = leaf_get_option('page_sidebar_layout','right');
get_header();
?>
	<?php if(!is_page_template('page-templates/front-page.php')){
		get_template_part( 'templates/header/header', 'heading' );
	}?>
    <div id="body">
    	<div class="container">
        	<?php if(!is_page_template('page-templates/front-page.php')){ ?>
        	<div class="content-pad-4x">
			<?php } ?>
                <div class="row">
                    <div id="content" class="<?php if($layout != 'full'){ ?> col-md-9 <?php }else{?> col-md-12 <?php } if($layout == 'left'){ ?> revert-layout <?php }?>" role="main">
                        <div class="single-page-content">
                        	<?php while ( have_posts() ) : the_post();
								the_content();
								echo '<div class="clear"></div>';
								$pagiarg = array(
									'before'           => '<div class="single-post-pagi">'.esc_html__( 'Pages:','conferpress'),
									'after'            => '</div>',
									'link_before'      => '<span type="button" class="btn btn-lighter">',
									'link_after'       => '</span>',
									'next_or_number'   => 'number',
									'separator'        => ' ',
									'nextpagelink'     => esc_html__( 'Next page','conferpress'),
									'previouspagelink' => esc_html__( 'Previous page','conferpress'),
									'pagelink'         => '%',
									'echo'             => 1
								);
								wp_link_pages($pagiarg);
							endwhile;
							
							if(!is_page_template('page-templates/front-page.php')){
								echo '<div class="page-comment">';
									comments_template();
								echo '</div>';
							}
							
							?>
                        </div><!--/single-page-content-->
                    </div><!--/content-->
                    <?php if($layout != 'full' && $layout != 'true-full'){get_sidebar();} ?>
                </div><!--/row-->
            <?php if(!is_page_template('page-templates/front-page.php')){ ?>
            </div><!--/content-pad-4x-->
			<?php }?>
        </div><!--/container-->
    </div><!--/body-->
<?php get_footer(); ?>