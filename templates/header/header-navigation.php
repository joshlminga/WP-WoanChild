<?php 
$nav_style = leaf_get_option('nav_style',false);
$nav_des = leaf_get_option('nav_des','on');
$nav_layout = leaf_get_option('nav_layout',false);
$top_nav_enable = leaf_get_option('top_nav_enable','on');
?>

<div class="wrap-nav">
<?php if($nav_layout){echo '<div class="nav-layout-boxed">';} ?>

<?php if($top_nav_enable!='off'){ get_template_part( 'templates/header/header', 'navigation-top' ); } ?>

<div id="main-nav" class="<?php if(leaf_get_option('nav_schema',false)){?> light-nav <?php }else{ ?> dark-div <?php } ?>" <?php if(leaf_get_option('nav_sticky','on')=='on'){?>data-spy="affix" data-offset-top="280"<?php } ?>>
    <nav class="navbar navbar-inverse <?php if($nav_style){ ?> style-off-canvas <?php }?>">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <?php if(leaf_get_option('logo_image') == ''):?>
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/web-logo.png" alt="<?php esc_attr_e('Home','conferpress'); ?>"></a>
                <?php else:?>
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e('Home','conferpress'); ?>"><img src="<?php echo esc_url(leaf_get_option('logo_image')); ?>" alt="<?php esc_attr_e('Home','conferpress'); ?>"/></a>
                <?php endif;?>
                
                <?php if(leaf_get_option('sticky_logo_image') != '' && leaf_get_option('nav_sticky','on')=='on'):?>
                <a class="logo sticky" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e('Home','conferpress'); ?>"><img src="<?php echo esc_url(leaf_get_option('sticky_logo_image')); ?>" alt="<?php esc_attr_e('Home','conferpress'); ?>"/></a>
                <?php endif;?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-menu hidden-xs <?php if($nav_style){?> hidden <?php }?>">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        if(has_nav_menu( 'primary-menus' )){
                            wp_nav_menu(array(
                                'theme_location'  => 'primary-menus',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'walker'=> new leaf_walker_nav_menu()
                            ));	
                        }else{?>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','conferpress') ?></a></li>
                            <?php wp_list_pages('depth=1&number=4&title_li=' ); ?>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
            <button type="button" class="mobile-menu-toggle <?php if($nav_style){?> <?php }else{ ?> visible-xs <?php }?>">
                <span class="sr-only"><?php esc_html_e('Menu','conferpress') ?></span>
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>
</div><!-- #main-nav -->
<?php if($nav_layout){echo '</div>';} ?>
</div><!--nav-wrap-->