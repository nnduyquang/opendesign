<?php
  global $archi_option;
  $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
  $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
get_header(); ?>

<?php if($archi_option['subpage-switch']!=false){ ?>

  <!-- subheader begin -->
  <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1>
                    <?php if($archi_option['the_blog_single'] != '') {  echo htmlspecialchars_decode( do_shortcode( $archi_option['the_blog_single'] ) ); }else{ the_title(); } ?>
                  </h1>
                  <?php archi_breadcrumbs(); ?> 
              </div>
          </div>
      </div>
  </section>
  <!-- subheader close -->

<?php }else{ ?>
    <section class="no-subpage"></section>
<?php } ?>

<!-- CONTENT BLOG -->
<div id="content">
  <div class="container">
      <div class="row">

          <?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] == 2 ){ ?>
            <div class="col-md-4">
              <?php get_sidebar();?>
            </div>
          <?php } ?>

          <div class="<?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] != 1 ){echo 'col-md-8';}else{echo 'col-md-12';}?>">
            <?php if ( have_posts() ) : ?>
              <?php while (have_posts()) : the_post(); ?>

                <ul class="blog-list">
                  <li class="single">                  
                    <div class="post-content">
                        <div class="post-image">
                          <?php $format = get_post_format(); ?>
                            <?php if($format=='audio'){ ?>
                              <iframe style="width:100%" src="<?php echo esc_url( $link_audio ); ?>"></iframe>            
                            <?php } elseif($format=='video'){ ?>
                              <iframe height="420" src="<?php echo esc_url( $link_video ); ?>"></iframe>           
                            <?php } elseif($format=='gallery'){ ?>
                              <div id="owl-demo-<?php the_ID(); ?>" class="owl-carousel">
                                <?php if( function_exists( 'rwmb_meta' ) ) { ?>  
                                    <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
                                    <?php if($images){ ?>
                                      
                                        <?php                                                        
                                          foreach ( $images as $image ) {                              
                                        ?>
                                        <?php $img = $image['full_url']; ?>
                                          <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div> 
                                        <?php } ?>                   
                                      
                                    <?php } ?>
                                  <?php } ?>
                              </div>
                              <script type="text/javascript">
                                (function($){
                                  "use strict";                              
                                  $(document).ready(function() {
                                      $("#owl-demo-<?php the_ID(); ?>").owlCarousel({
                                        items : 1,
                                        autoPlay: <?php if($archi_option['post-slide-autoplay']!=false){echo 'true';}else{echo 'false';} ?>,
                                        slideSpeed : <?php echo esc_attr($archi_option['post-slide-speed']); ?>,
                                        paginationSpeed : <?php echo esc_attr($archi_option['post-slide-pagination-speed']); ?>,
                                        rewindSpeed : <?php echo esc_attr($archi_option['post-slide-rewind-speed']); ?>,
                                        singleItem:true,
                                        transitionStyle : <?php if($archi_option['post-slide-transition']!=false){echo "'fade'";}else{echo "false";} ?>,                                    
                                      });
                                    });                              
                                })(this.jQuery);
                              </script>
                
                            <?php } elseif ($format=='image'){ ?>
                            <?php if( function_exists( 'rwmb_meta' ) ) { ?>  
                              <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                              <?php if($images){ ?>
                              <?php                                                        
                                foreach ( $images as $image ) {                              
                                ?>
                                <?php $img = $image['full_url']; ?>
                                <img src="<?php echo esc_url($img); ?>" alt="">
                                <?php } ?>
                              <?php } ?>
                            <?php } ?>

                            <?php }else{ $format=='stadard' ?>
                                <?php if(get_the_post_thumbnail()){ ?>              
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
                                <?php } ?>
                            <?php } ?>

                        </div>
                        <div class="date-box">
                            <div class="day"><?php the_time('d'); ?></div>
                            <div class="month"><?php the_time('M'); ?></div>
                        </div>
                        <div class="post-text page-content">
                          <h3 class="single-title"><?php the_title(); ?></h3>
                           <?php the_content(); ?>
                        </div>
                    </div>
                      
                    <div class="post-info">
                      <span>
                        <i class="fa fa-user"></i><?php _e('By : ','archi') ?><?php the_author_posts_link(); ?>
                      </span> 
                      <?php if(has_tag()) { ?>
                      <span>
                        <i class="fa fa-tag"></i><?php the_tags('', ', ' ); ?>
                      </span> 
                      <?php } ?>
                      <?php if ( comments_open() ) : ?>
                        <span>
                          <i class="fa fa-comment"></i><span class="comments_number"><?php comments_number( __('0 comment', 'archi'), __('1 comment', 'archi'), __('% comments', 'archi') ); ?></span>
                        </span> 
                      <?php  endif; ?>               
                    </div>
                </li>
              </ul>
              <div class="col-xs-12">
                <div class="share-holder">
                  <h4><?php esc_html_e('Share:', 'archi'); ?></h4>
                  <div class="social-links rounded-share-icons">
                    <a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>">
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a class="twitter" href="https://twitter.com/share?text=<?php the_title(); ?>">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a class="linkedin" href="https://linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>">
                      <i class="fa fa-linkedin"></i>
                    </a>
                    <a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
                      <i class="fa fa-pinterest"></i>
                    </a>
                    <a class="tumblr" href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>&name=<?php the_title(); ?>&description=<?php the_excerpt(); ?>">
                      <i class="fa fa-tumblr"></i>
                    </a>
                    <a class="google-plus" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div class="post-controls clearfix">
                <?php 
                  // Previous/next post navigation.
                  the_post_navigation( array(
                    'next_text' => '<span class="post-title"><em>' . __( 'Older Post', 'archi' ) . '</em><strong>%title</strong></span>',
                    'prev_text' => '<span class="post-title"><em>' . __( 'Newer Post', 'archi' ) . '</em><strong>%title</strong></span>',
                  ) ); 
                ?>
              </div>

              <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class='comments-box'>
                  <h4><?php comments_number( __('0 comment', 'archi'), __('1 comment', 'archi'), __('% comments', 'archi') ); ?><h4>
                  
                </div>                
              <?php  endif; ?> 

              <?php if ( comments_open() || get_comments_number() ) : ?>
                <?php comments_template(); ?>
              <?php  endif; ?> 

              <?php endwhile;?>

            <?php else : ?>
              <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'archi'); ?></p>
            <?php endif; ?>
          </div>

          <?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] == 3 ){ ?>
            <div class="col-md-4">
              <?php get_sidebar();?>
            </div>
          <?php } ?>

        </div>
    </div>
</div>
<!-- END CONTENT BLOG -->

<?php get_footer(); ?>	





  