<?php
$page_title = leaf_global_title();
if (function_exists('tribe_is_community_my_events_page') && tribe_is_community_my_events_page() ) {
	$page_title = esc_html__('My Events','conferpress');
}
if (function_exists('tribe_is_community_edit_event_page') && tribe_is_community_edit_event_page() ) {
	$page_title = esc_html__('Submit Event','conferpress');
}
if($page_title == esc_html__('WP Router Placeholder Page', 'conferpress')){
	$page_title = esc_html__('Submit Event','conferpress');
}
$ct_hd = get_post_meta(get_the_ID(),'header_content',true);
if(function_exists('is_shop') && is_shop()){
	$ct_hd ='';
	$id_ot = get_option('woocommerce_shop_page_id');
	if($id_ot!=''){
		$ct_hd = get_post_meta($id_ot,'header_content',true);
	}
}
if( is_home()){
	$ct_hd ='';
	$id_ot = get_option('page_for_posts');
	if($id_ot!=''){
		$ct_hd = get_post_meta($id_ot,'header_content',true);
	}
}
if(!is_page_template('page-templates/front-page.php') && $ct_hd==''){
if(is_singular('tribe_events')){
	global $wp_query;
	global $post;
	$post = $wp_query->post;
	?>
    <div class="page-heading event-heading main-color-1-bg dark-div">
        <div class="container">
        	<?php if(leaf_get_option('event_show_top_category','on')!='off'){
				echo get_the_term_list( get_the_ID(), 'tribe_events_cat', '<div class="heading-event-cats"><i class="lnr lnr-layers"></i> ', ', ', '</div>' );
			}?>
            
        	<h1><?php the_title(); ?></h1>
            
            <?php if(leaf_get_option('event_show_top_info','on')!='off'){ ?>
            <div class="heading-event-meta hidden-xs">
            	<div class="heading-meta-col">
                	<div class="heading-event-meta-title h2 main-color-1-border"><i class="lnr lnr-calendar-full"></i> <?php esc_html_e('Time','conferpress'); ?></div>
                    <div class="heading-event-meta-content">
                    	<?php echo tribe_events_event_schedule_details( get_the_ID(), '', '' ); ?>
                    </div>
                </div>
                
                <?php if ( tribe_address_exists() ) : ?>
                <div class="heading-meta-col">
                	<div class="heading-event-meta-title h2"><i class="lnr lnr-map-marker"></i> <?php esc_html_e('Venue','conferpress'); ?></div>
                    <div class="heading-event-meta-content">
                    	<dd><?php echo tribe_get_venue() ?></dd>
                        <dd>
                            <address>
                                <?php echo tribe_get_full_address(); ?>
                                <?php if ( tribe_show_google_map_link() ) : ?>
                                    <div><?php echo tribe_get_map_link_html(); ?></div>
                                <?php endif; ?>
                            </address>
                        </dd>
                        
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( get_post_meta(get_the_ID(),'product-id',true) || tribe_get_cost() ) : ?>
                <div class="heading-meta-col">
                	<div class="heading-event-meta-title h2"><i class="lnr lnr-tag"></i> <?php esc_html_e('Ticket','conferpress'); ?></div>
                    <div class="heading-event-meta-content">
                    	<span class="tribe-events-cost">
							<?php if($ticket_product_id = get_post_meta(get_the_ID(),'product-id',true)){
                                if(function_exists('wc_get_product') && ($ticket_product = wc_get_product($ticket_product_id)) ){
                                     echo ''.$ticket_product->get_price_html();
                                } ?>
                                <div><a href="#event-cart"><?php esc_html_e('Get it now','conferpress'); ?> <i class="fa fa-angle-right"></i></a></div>
                            <?php }elseif(tribe_get_cost( null, true )){ 
                                echo tribe_get_cost( null, true ); 
                            } ?>
                        </span>
                    </div>
                </div>
                <?php endif; ?>
                
            </div><!--/heading-event-meta-->
            <?php }//if show info ?>
        </div><!--/container-->
    </div><!--/page-heading-->
    <?php	

}elseif(is_singular('ajde_events')){
    global $post;
    ?>
    <div class="page-heading event-heading main-color-1-bg dark-div">
        <div class="container">
            <?php if(leaf_get_option('event_show_top_category','on')!='off'){
                echo get_the_term_list( get_the_ID(), 'event_type', '<div class="heading-event-cats"><i class="lnr lnr-layers"></i> ', ', ', '</div>' );
            }?>
            
            <h1><?php the_title(); ?></h1>
            
            <?php if(leaf_get_option('event_show_top_info','on')!='off'){ ?>
            <div class="heading-event-meta hidden-xs">
                <?php if($startdate = get_post_meta(get_the_id(), 'evcal_srow', true)){
                    $enddate = get_post_meta(get_the_id(), 'evcal_erow', true)
                    ?>
                <div class="heading-meta-col">
                    <div class="heading-event-meta-title h2 main-color-1-border"><i class="lnr lnr-calendar-full"></i> <?php esc_html_e('Time','conferpress'); ?></div>
                    <div class="heading-event-meta-content">
                        <?php
                        echo date_i18n( get_option('time_format').' '.get_option('date_format'), $startdate );
                        if($enddate){
                            echo ' - '.date_i18n( get_option('time_format').' '.get_option('date_format'), $enddate );
                        }
                        ?>
                    </div>
                </div>
                <?php } ?>

                <?php if (get_the_term_list( get_the_ID(), 'event_location')){ ?>
                <div class="heading-meta-col">
                    <div class="heading-event-meta-title h2"><i class="lnr lnr-map-marker"></i> <?php esc_html_e('Venue','conferpress'); ?></div>
                    <div class="heading-event-meta-content">
                        <?php echo strip_tags(get_the_term_list( get_the_ID(), 'event_location', ' <span>', '</span><span>, ', '</span>' ) ,'<span>'); ?>
                    </div>
                </div>
                <?php } ?>

                <?php if ( $enable_tix = get_post_meta(get_the_ID(),'evotx_tix',true) && ($tix_product_id = get_post_meta(get_the_ID(),'tx_woocommerce_product_id',true)) ) { ?>
                <div class="heading-meta-col">
                    <div class="heading-event-meta-title h2"><i class="lnr lnr-tag"></i> <?php esc_html_e('Ticket','conferpress'); ?></div>
                    <div class="heading-event-meta-content">
                        <span class="tribe-events-cost">
                            <?php
                                if(function_exists('wc_get_product') && ($tix_product = wc_get_product($tix_product_id)) ){
                                     echo ''.$tix_product->get_price_html();
                                }
                               
                            ?>
                            <div><a href="#" class="eventon-heading-ticket-anchor"><?php esc_html_e('Get it now','conferpress'); ?> <i class="fa fa-angle-right"></i></a></div>
                        </span>
                    </div>
                </div>
                <?php } ?>
                
            </div><!--/heading-event-meta-->
            <?php }//if show info ?>
        </div><!--/container-->
    </div><!--/page-heading-->
    <?php   

}elseif(is_singular('sp_member')){ ?>
<div class="page-heading main-color-1-bg dark-div">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<?php if(has_post_thumbnail()){
					echo '<div class="member-heading-thumb">';
					the_post_thumbnail( 'thumbnail' );
					echo '</div>';
				}?>
                <div class="member-heading-info">
                    <?php if(is_active_sidebar('pathway_sidebar')){
                            echo '<div class="pathway pathway-sidebar hidden-xs">';
                                dynamic_sidebar('pathway_sidebar');
                            echo '</div>';
                        }else{?>
                    <div class="pathway hidden-xs">
                        <?php if(function_exists('leaf_breadcrumbs')){ leaf_breadcrumbs(); } ?>
                    </div>
                    <?php } ?>
                    <h1><?php echo wp_kses_post($page_title) ?></h1>
                    <?php $social_account = array(
							'facebook',
							'instagram',
							'envelope-o',
							'twitter',
							'linkedin',
							'tumblr',
							'google-plus',
							'pinterest',
							'youtube',
							'flickr', 'soundcloud', 'mixcloud',
							'github',
							'dribbble',
							'rss',
							'stumbleupon',
							'vk',
					);?>
					<ul class="list-inline social-list">
						<?php 
						foreach($social_account as $social){
							if($link = get_post_meta(get_the_ID(),$social,true)){
								if($social!='envelope-o'){?>
									<li><a class="btn btn-lighter social-icon" href="<?php echo esc_url($link);?>"><i class="fa fa-<?php echo esc_attr($social);?>"></i></a></li>
								<?php }else{ ?>
									<li><a class="btn btn-lighter social-icon" href="mailto:<?php echo esc_url($link);?>"><i class="fa fa-<?php echo esc_attr($social);?>"></i></a></li>
								<?php } ?>
							<?php }?>
						<?php }?>    
					</ul>
                </div>
            </div>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/page-heading-->


<?php }else{ ?>
<div class="page-heading main-color-1-bg dark-div">
    <div class="container">
        <div class="row">
            <?php if(is_active_sidebar('pathway_sidebar')){
                    echo '<div class="pathway pathway-sidebar col-md-12 hidden-xs text-center">';
                        dynamic_sidebar('pathway_sidebar');
                    echo '</div>';
                }else{?>
            <div class="pathway col-md-12 hidden-xs text-center">
                <?php if(function_exists('leaf_breadcrumbs')){ leaf_breadcrumbs(); } ?>
            </div>
            <?php } ?>
            <div class="col-md-12 text-center">
                <h1><?php echo wp_kses_post($page_title) ?></h1>
            </div>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/page-heading-->
<?php 
}//else product
}//if not front page ?>

<div class="top-sidebar">
    <div class="container">
        <div class="row">
            <?php
                if ( is_active_sidebar( 'top_sidebar' ) ) :
                    dynamic_sidebar( 'top_sidebar' );
                endif;
             ?>
        </div><!--/row-->
    </div><!--/container-->
</div><!--/Top sidebar-->