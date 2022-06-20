<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">

  <section id="post-section" class="pt-3 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <?php $fashion_photography_post_section = array();
            $mod = intval( get_theme_mod( 'fashion_photography_post_section' ));
            if ( 'page-none-selected' != $mod ) {
              $fashion_photography_post_section[] = $mod;
            }
            if( !empty($fashion_photography_post_section) ) :
            $args = array(
              'post_type' => 'post',
              'post__in' => $fashion_photography_post_section,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
          ?>
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="top-post-box mb-4 mb-md-0">
              <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" class="w-100"/>
              <div class="top-post-inner-box">
                <h1><?php the_title(); ?></h1>
                <div class="my-4 readmore">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','fashion-photography'); ?></a>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <?php $fashion_photography_post_section = array();
            for ($i=1; $i <= 4; $i++) { 
              $mod = intval( get_theme_mod( 'fashion_photography_post_section_part' .$i));
              if ( 'page-none-selected' != $mod ) {
                $fashion_photography_post_section[] = $mod;
              }
            }
            if( !empty($fashion_photography_post_section) ) :
            $args = array(
              'post_type' => 'post',
              'post__in' => $fashion_photography_post_section,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
          ?>
          <div class="row">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-lg-6 col-md-6">
                <div class="top-post-box box-post<?php echo($i); ?>">
                  <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
                  <div class="top-post-inner-box">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile;
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
            endif;?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="content-section">
    <div class="container py-5">
      <?php
        if ( have_posts() ) : 
          while ( have_posts() ) : the_post();
            the_content();
          endwhile; 
        endif; 
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>