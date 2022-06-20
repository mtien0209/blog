<?php
/**
 * Displays main header
 *
 * @package Fashion Photography
 */

$fashion_photography_sticky_header = get_theme_mod('fashion_photography_sticky_header');
    $data_sticky = "false";
    if ($fashion_photography_sticky_header) {
        $data_sticky = "true";
    }
?>

<div class="main_header py-2" data-sticky="<?php echo esc_attr($data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-8 align-self-center">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('fashion_photography_logo_title',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php }?>
                            <?php else : ?>
                                <?php if( get_theme_mod('fashion_photography_logo_title',true) != ''){ ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php }?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('fashion_photography_logo_text',true) != ''){ ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                    <?php } ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-2 col-sm-2 col-4 align-self-center">
                <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-6 align-self-center pt-3 pt-lg-0 pt-md-0">
                <?php if(get_theme_mod('fashion_photography_facebook_url') != '' || get_theme_mod('fashion_photography_twitter_url') != '' || get_theme_mod('fashion_photography_intagram_url') != '' || get_theme_mod('fashion_photography_linkedin_url') != '' || get_theme_mod('fashion_photography_pintrest_url') != ''){ ?>
                    <div class="social-link text-center text-md-right">
                        <?php if(get_theme_mod('fashion_photography_facebook_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('fashion_photography_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('fashion_photography_twitter_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('fashion_photography_twitter_url','')); ?>"><i class="fab fa-twitter"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('fashion_photography_intagram_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('fashion_photography_intagram_url','')); ?>"><i class="fab fa-instagram"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('fashion_photography_linkedin_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('fashion_photography_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i></a>
                        <?php }?>
                        <?php if(get_theme_mod('fashion_photography_pintrest_url') != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('fashion_photography_pintrest_url','')); ?>"><i class="fab fa-pinterest-p"></i></a>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-6 align-self-center pt-3 pt-lg-0 pt-md-0">
                <div class="product-asset text-right">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation mr-4" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','fashion-photography' ); ?>"><i class="fas fa-shopping-bag"></i></a>
                    <?php }?>
                    <span class="search-box mr-4"><a href="#"><i class="fas fa-search"></i></a></span>
                    <?php if(get_theme_mod('fashion_photography_rightside_box',true) != ''){ ?>
                        <button class="right-sidbar-btn" onclick="fashion_photography_right_sidebar_openNav()">&#9776;</button>
                    <?php }?>
                </div>
                <div id="rightSidenav" class="rightsidenav">
                    <div class="rightside-box">
                        <a href="javascript:void(0)" class="rightclosebtn" onclick="fashion_photography_right_sidebar_closeNav()"><i class="fas fa-times"></i></a>                    
                        <div class="sidebar-logo">
                            <?php if ( has_custom_logo() ) : ?>
                                <div class="site-logo"><?php the_custom_logo(); ?></div>
                            <?php endif; ?>
                            <?php $blog_info = get_bloginfo( 'name' ); ?>
                                <?php if ( ! empty( $blog_info ) ) : ?>
                                    <?php if ( is_front_page() && is_home() ) : ?>
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php else : ?>
                                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php
                                    $description = get_bloginfo( 'description', 'display' );
                                    if ( $description || is_customize_preview() ) :
                                ?>
                                <p class="site-description"><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="contact-info-box">
                            <?php if(get_theme_mod('fashion_photography_rightside_address') != ''){ ?>
                                <h6><i class="fas fa-map-marker-alt mr-2"></i><?php esc_html_e('Location','fashion-photography'); ?></h6>
                                <p><?php echo esc_html(get_theme_mod('fashion_photography_rightside_address','')); ?></p>
                            <?php }?>
                            <?php if(get_theme_mod('fashion_photography_rightside_email') != ''){ ?>
                                <h6><i class="fas fa-envelope mr-2"></i><?php esc_html_e('Email us','fashion-photography'); ?></h6>
                                <p><?php echo esc_html(get_theme_mod('fashion_photography_rightside_email','')); ?></p>
                            <?php }?>
                            <?php if(get_theme_mod('fashion_photography_rightside_call') != ''){ ?>
                                <h6><i class="fas fa-phone mr-2"></i><?php esc_html_e('Call us','fashion-photography'); ?></h6>
                                <p><?php echo esc_html(get_theme_mod('fashion_photography_rightside_call','')); ?></p>
                            <?php }?>
                        </div>

                        <?php if(get_theme_mod('fashion_photography_facebook_url') != '' || get_theme_mod('fashion_photography_twitter_url') != '' || get_theme_mod('fashion_photography_intagram_url') != '' || get_theme_mod('fashion_photography_linkedin_url') != '' || get_theme_mod('fashion_photography_pintrest_url') != ''){ ?>
                            <div class="rightside-links text-center">
                                <hr>
                                <h5 class="mb-4"><?php esc_html_e('FOLLOW US','fashion-photography'); ?></h5>
                                <?php if(get_theme_mod('fashion_photography_facebook_url') != ''){ ?>
                                    <a href="<?php echo esc_url(get_theme_mod('fashion_photography_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i></a>
                                <?php }?>
                                <?php if(get_theme_mod('fashion_photography_twitter_url') != ''){ ?>
                                    <a href="<?php echo esc_url(get_theme_mod('fashion_photography_twitter_url','')); ?>"><i class="fab fa-twitter"></i></a>
                                <?php }?>
                                <?php if(get_theme_mod('fashion_photography_intagram_url') != ''){ ?>
                                    <a href="<?php echo esc_url(get_theme_mod('fashion_photography_intagram_url','')); ?>"><i class="fab fa-instagram"></i></a>
                                <?php }?>
                                <?php if(get_theme_mod('fashion_photography_linkedin_url') != ''){ ?>
                                    <a href="<?php echo esc_url(get_theme_mod('fashion_photography_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i></a>
                                <?php }?>
                                <?php if(get_theme_mod('fashion_photography_pintrest_url') != ''){ ?>
                                    <a href="<?php echo esc_url(get_theme_mod('fashion_photography_pintrest_url','')); ?>"><i class="fab fa-pinterest-p"></i></a>
                                <?php }?>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="serach_outer">
            <div class="serach_inner">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>