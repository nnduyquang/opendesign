<?php get_header(); ?>

<?php global $archi_option; ?>
<?php if($archi_option['subpage-switch']!=false){ ?>

    <!-- subheader begin -->
    <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                      <?php
                        if ( is_day() ) :
                          printf( __( 'Daily Archives: %s', 'archi' ), get_the_date() );

                        elseif ( is_month() ) :
                          printf( __( 'Monthly Archives: %s', 'archi' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'archi' ) ) );

                        elseif ( is_year() ) :
                          printf( __( 'Yearly Archives: %s', 'archi' ), get_the_date( _x( 'Y', 'yearly archives date format', 'archi' ) ) );

                        else :
                          _e( 'Archives', 'archi' );

                        endif;
                      ?> 
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

<!-- content begin -->
<div id="content">
    <div class="container">
        <div class="row">
            <?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] == 2 ){ ?>
                <div class="col-md-4">
                  <?php get_sidebar();?>
                </div>
            <?php } ?>

            <div class="<?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] != 1 ){echo 'col-md-8';}else{echo 'col-md-12';}?>">
                <ul class="blog-list">
                    <?php 
                      while (have_posts()) : the_post();
                      get_template_part( 'content', get_post_format() ) ;   // End the loop.
                      endwhile;
                    ?>
                </ul>

                <div class="text-center">
                    <ul class="pagination">
                        <?php echo archi_pagination(); ?>
                    </ul>
                </div>
            </div>

            <?php if(isset($archi_option['blog-layout']) and $archi_option['blog-layout'] == 3 ){ ?>
                <div class="col-md-4">
                  <?php get_sidebar();?>
                </div>
            <?php } ?>
            
        </div>
    </div>
</div>
<!-- content close -->
<?php get_footer(); ?>
