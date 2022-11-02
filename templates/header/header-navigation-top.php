<?php
$nav_style = leaf_get_option('nav_style',false);
$top_tabs = leaf_get_option('top_tabs');
$top_nav_content = leaf_get_option('top_nav_content');
?>
<div id="top-nav" class="nav-style-<?php echo esc_attr($nav_style) ?>">
    <nav class="navbar navbar-default main-color-1-bg dark-div">
        <div class="container-fluid">
            <div class="top-menu">
                <div class="navbar-left top-info">
                	<?php echo wp_kses_post($top_nav_content); ?>
                </div>
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if($top_tabs && count($top_tabs)){
						foreach($top_tabs as $tab_id => $tab){ ?>
							<li class="menu-item">
                                <a href="<?php echo esc_url($tab['link']?$tab['link']:'#'); ?>" data-target="#top-tab-<?php echo esc_attr($tab_id); ?>" <?php if(!$tab['link']){ ?>data-toggle="collapse"<?php } ?> data-parent="#top-tab" class="top-tab-link" title="<?php echo esc_attr($tab['title']) ?>">
                                    <i class="fa <?php echo esc_attr($tab['icon']); ?>"></i>
                                    <?php if($tab['show_title']=='on'){ echo esc_html($tab['title']); } ?>
                                </a>
                            </li>
						<?php }//foreach
					}//if top tabs
					?>
                    <?php if (class_exists('Woocommerce') && (ot_get_option('enable_cart')!='off') ) {
                        global $woocommerce;
                        $cart_url = @wc_get_cart_url();
                        $checkout_url = @wc_get_checkout_url();
                        if($cart_url){
                    ?>
                    <li class="menu-item menu-item-has-children parent dropdown mycart sub-menu-left">
                        <a href="<?php echo esc_url($cart_url);?>" class="menu-link"><span class="lnr lnr-cart"></span></a>
                        <ul class="dropdown-menu menu-depth-1">
                            <li class="sub-menu-item  menu-item-depth-1 menu-item menu-item-type-post_type"><a href="<?php echo esc_url($cart_url);?>" class="menu-link  sub-menu-link"><?php esc_html_e('View Cart','conferpress') ?><?php echo ' ('.$woocommerce->cart->get_cart_contents_count(),')';?></a></li>
                            <li class="sub-menu-item menu-item-depth-1 menu-item menu-item-type-post_type"><a href="<?php echo esc_url($checkout_url);?>" class="menu-link  sub-menu-link"><?php esc_html_e('Check Out','conferpress') ?></a></li>
                        </ul>
                    </li>
                    <?php } }?>
                    <?php 
                    if(function_exists('icl_get_languages')){
                        $arr_lg = icl_get_languages('skip_missing=0');
                        if(!empty($arr_lg)){ ?>
                        <li class="menu-item dropdown sub-menu-left leaf-wpml-selector">
                            <?php
                            $lang_html = '';
                            foreach($arr_lg as $item){
                                if($item['active']){
                                    echo '<a href="'.esc_url($item['url']).'"><img src="'.esc_url($item['country_flag_url']).'"/></a>';
                                }
                                $lang_html .= '<li class=""><a title="'.esc_attr($item['translated_name']).'" href="'.esc_url($item['url']).'"><img title="'.esc_attr($item['translated_name']).'" src="'.esc_url($item['country_flag_url']).'"/></a></li>';
                            }
                            if($lang_html){
                                echo '<ul class="dropdown-menu menu-depth-1">'.$lang_html.'</ul>';
                            }
                            ?>
                        </li>
                        <?php
                        }
                    } ?>
                    <?php if(ot_get_option('enable_search')!='off'){ ?>
                    <li class="menu-item"><a class="search-toggle collapsed" data-toggle="collapse" data-target="#nav-search" href="#"><span class="lnr lnr-magnifier"></span></a></li>
                    <?php }?>
                </ul>
                <div class="clearfix"></div>
            </div><!--/top-menu-->
        </div>
    </nav>
</div><!--/top-nav-->

<div id="top-tab" class="tab-content top-tab-content main-color-1-bg dark-div">
    <?php if($top_tabs && count($top_tabs)){
		foreach($top_tabs as $tab_id => $tab){ ?>
        	<div class="panel">
                <div role="tabpanel" class="panel-inner collapse" id="top-tab-<?php echo esc_attr($tab_id); ?>">
                	<?php if($tab['fullwidth']!='on'){ ?><div class="container"><?php } ?>
                    	<?php echo do_shortcode(wp_kses_post($tab['content'])); ?>
                    <?php if($tab['fullwidth']!='on'){ ?></div><?php } ?>
                </div>
            </div>
		<?php }//foreach
	}//if top tabs
	?>
    <div class="clearfix"></div>
</div><!--top-tab-content-->