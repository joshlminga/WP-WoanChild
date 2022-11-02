<div class="custom-header-content">
	<?php 
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
	echo do_shortcode($ct_hd); ?>
</div><!--custom-header-content-->