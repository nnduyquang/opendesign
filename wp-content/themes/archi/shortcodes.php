<?php 
// Custom Heading
add_shortcode('heading','heading_func');
function heading_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text'		=>	'',
		'tag'		=> 	'',
		'size'		=>	'',
		'color'		=>	'',
		'align'		=>	'',		
		'class'		=>	'',
	), $atts));
	
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');	
	$cl = (!empty($class) ? ' class= "'.$class.'"' : '');
	ob_start(); ?>
	
	<?php echo htmlspecialchars_decode('<'. $tag . $cl .' style="' . $size1 . $align1 . $color1 . '" > '. $text .'</'.$tag.'>'); ?>
	
<?php
    return ob_get_clean();
}

// Line solid
add_shortcode('line_solid', 'line_solid_func');
function line_solid_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'	=> '',
	), $atts));
	ob_start(); 
?>
	<div class="separator"><span><?php if($icon != ''){ ?><i class="fa fa-<?php echo esc_attr($icon); ?>"></i><?php }else{ echo '<i class="fa fa-circle"></i>';} ?></span></div>
	<div class="spacer-single"></div>	      
<?php
    return ob_get_clean();
}

// Our Team
add_shortcode('team', 'team_func');
function team_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',
		'name'		=>	'',
		'job'		=>	'',
		'icon1'		=>	'',
		'icon2'		=>	'',
		'icon3'		=>	'',
		'icon4'		=>	'',
		'url1'		=>	'',
		'url2'		=>	'',
		'url3'		=>	'',
		'url4'		=>	'',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];

	$icon11 = (!empty($icon1) ? '<a href="'.esc_url($url1).'" target="_blank"><i class="fa fa-'.esc_attr($icon1).' fa-lg"></i></a>' : '');
	$icon22 = (!empty($icon2) ? '<a href="'.esc_url($url2).'" target="_blank"><i class="fa fa-'.esc_attr($icon2).' fa-lg"></i></a>' : '');
	$icon33 = (!empty($icon3) ? '<a href="'.esc_url($url3).'" target="_blank"><i class="fa fa-'.esc_attr($icon3).' fa-lg"></i></a>' : '');
	$icon44 = (!empty($icon4) ? '<a href="'.esc_url($url4).'" target="_blank"><i class="fa fa-'.esc_attr($icon4).' fa-lg"></i></a>' : '');

	ob_start(); ?>

    <!-- team member -->
    <div class="de-team-list wow fadeInUp">
        <div class="team-pic">
        	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="" />            
        </div>
        <div class="team-desc">
            <h3><?php echo htmlspecialchars_decode($name); ?></h3>
            <?php if($job){ ?><p class="lead"><?php echo htmlspecialchars_decode($job); ?></p><?php } ?>
            <div class="small-border"></div>
            <?php if($content){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
            <div class="social">
                <?php echo htmlspecialchars_decode($icon11); ?>
                <?php echo htmlspecialchars_decode($icon22); ?>
                <?php echo htmlspecialchars_decode($icon33); ?>
                <?php echo htmlspecialchars_decode($icon44); ?>
            </div>
        </div>
    </div>
    <!-- team close -->

<?php
    return ob_get_clean();
}

// Video Player 
add_shortcode('videoplayer', 'videoplayer_func');
function videoplayer_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video'  => 	'',
	), $atts));
	ob_start(); ?>
	
	<iframe height="450" src="<?php echo esc_url($video); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
	
<?php
    return ob_get_clean();
}

// Buttons
add_shortcode('button', 'button_func');
function button_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btntext' 	=> '',
		'btnlink' 	=> '',
	), $atts));
	ob_start(); 
?>			

	<?php if ($btnlink != '') { ?>
		<a href="<?php echo esc_url($btnlink); ?>" class="btn btn-line-black btn-big"><?php echo htmlspecialchars_decode($btntext); ?></a>
	<?php } ?>
    
<?php 
	return ob_get_clean();
}

// Buttons 2
add_shortcode('button2', 'button2_func');
function button2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'linkbox'	=>  '',
		'class' 	=> '',
	), $atts));
	$url = vc_build_link( $linkbox );
	ob_start(); 
?>			
	<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
		echo '<a href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" class="btn ' . $class . '">' . esc_attr( $url['title'] ) . '</a>';
	} ?>
	
<?php 
	return ob_get_clean();
}

// Featured Boxes
add_shortcode('ot_featured_boxes', 'ot_featured_boxes_func');
function ot_featured_boxes_func($atts, $content = null){
   extract(shortcode_atts(array(
      'simple_textfield'   => '',
      'titles' => '',
      'columns' => '',
      'class'  => '',
   ), $atts));
   $titles = (array) vc_param_group_parse_atts( $titles );   
   ob_start(); 
?>

   <div class="display-table <?php echo esc_attr($class); ?>">
      <?php 
      	$i=1;
        foreach ( $titles as $data ) {
            $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
            $data['desc'] = isset( $data['desc'] ) ? $data['desc'] : '';
            $data['bgimage'] = isset( $data['bgimage'] ) ? $data['bgimage'] : '';
            $data['btntext'] = isset( $data['btntext'] ) ? $data['btntext'] : '';
            $data['btnlink'] = isset( $data['btnlink'] ) ? $data['btnlink'] : '';            
            $img = wp_get_attachment_image_src($data['bgimage'],'full');
            $img = $img[0];
      ?>
         <div class="<?php if($columns == 2){echo 'col-md-6';}elseif ($columns == 3) {echo 'col-md-4';}else{echo 'col-md-3';} ?> text-middle text-light wow fadeInRight" data-wow-delay="<?php echo esc_attr($i); ?>" data-bgimage="url(<?php echo esc_url($img); ?>)">
            <div class="padding60 overlay70">
                  <h3><?php echo $data['title']; ?></h3>
                  <p><?php echo $data['desc']; ?></p>
                  <?php if($data['btnlink'] != ''){ ?><a href="<?php echo esc_url($data['btnlink']); ?>" target="_blank" class="btn-line btn-fullwidth"><?php echo esc_attr($data['btntext']); ?></a><?php } ?>
            </div>
         </div>
      <?php $i++; } ?>
   </div>

<?php
    return ob_get_clean();
}

// Featured Boxes 2
add_shortcode('ot_featured_boxes2', 'ot_featured_boxes2_func');
function ot_featured_boxes2_func($atts, $content = null){
   extract(shortcode_atts(array(
      'simple_textfield'   => '',
      'titles' => '',
      'columns' => '',
      'class'  => '',
   ), $atts));
   $titles = (array) vc_param_group_parse_atts( $titles );   
   ob_start(); 
?>

   <div class="row">
      <?php 
      	$i=1;
        foreach ( $titles as $data ) {
            $data['title'] = isset( $data['title'] ) ? $data['title'] : '';
            $data['desc'] = isset( $data['desc'] ) ? $data['desc'] : '';
            $data['bgimage'] = isset( $data['bgimage'] ) ? $data['bgimage'] : '';
            $data['btntext'] = isset( $data['btntext'] ) ? $data['btntext'] : '';
            $data['btnlink'] = isset( $data['btnlink'] ) ? $data['btnlink'] : '';            
            $img = wp_get_attachment_image_src($data['bgimage'],'full');
            $img = $img[0];
      ?>
      	<div class="<?php if($columns == 2){echo 'col-md-6';}elseif ($columns == 3) {echo 'col-md-4';}else{echo 'col-md-3';} ?> <?php echo esc_attr($class); ?> text-middle text-light wow fadeInRight" data-wow-delay="<?php echo esc_attr($i); ?>">
            <div class="shadow-soft" data-bgimage="url(<?php echo esc_url($img); ?>)">
                <div class="padding40 overlay60">
                    <h3><?php echo $data['title']; ?></h3>
                  	<p><?php echo $data['desc']; ?></p>
                    <?php if($data['btnlink'] != ''){ ?><a href="<?php echo esc_url($data['btnlink']); ?>" target="_blank" class="btn-line btn-fullwidth"><?php echo esc_attr($data['btntext']); ?></a><?php } ?>
                </div>
            </div>
        </div>
      <?php $i++; } ?>
   </div>

<?php
    return ob_get_clean();
}

// Home HTML5 Video
add_shortcode('home_video', 'home_video_func');
function home_video_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video1'	=>  '',	
		'video2'	=>  '',
		'stitle'	=>  '',
		'btnlink'	=>  '',
		'btntext'	=>  '',
		'bgvideo'	=>  '',	
		'video_overlay'   =>  'overlay',
		'titles' => ''			
	), $atts));
	$titles = (array) vc_param_group_parse_atts( $titles );
	$img = wp_get_attachment_image_src($bgvideo,'full');
	$img = $img[0];
	ob_start(); 
?>
	
	<div class="de-video-container full-height no-padding">
        <div class="de-video-content">
            <div class="text-center">
            	<?php if($stitle != ''){ ?>
	                <div class="teaser-text">
	                    <?php echo htmlspecialchars_decode($stitle); ?>
	                </div>
	                <div class="spacer-single"></div>
                <?php } ?>

                <div class="text-slider border-deco">
	                <?php 
						foreach ( $titles as $data ) {
							$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
					?>					 
						<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
					<?php } ?>  
                </div>
                <div class="spacer-single"></div>
                <?php if($btnlink != ''){ ?><a href="<?php echo esc_url($btnlink); ?>" target="_blank" class="btn-slider"><?php echo esc_attr($btntext); ?></a><?php } ?>
            </div>
        </div>

        <?php if ($video_overlay == 'dotted') { ?>
        	<div class="de-video-overlay dotted"></div>
        <?php }elseif ($video_overlay == 'overlay') {?>
        	<div class="de-video-overlay"></div>
        <?php }else{} ?> 

        <!-- load your video here -->
        <video autoplay="" loop="" muted="" poster="<?php echo esc_url($img); ?>">
            <?php if($video1 != ''){ ?> <source src="<?php echo esc_url($video1); ?>" type="video/mp4"> <?php } ?>
			<?php if($video2 != ''){ ?> <source src="<?php echo esc_url($video2); ?>" type="video/webm"> <?php } ?>
        </video>
    </div>

<?php
    return ob_get_clean();
}

// Home Parallax
add_shortcode('home_parallax', 'home_parallax_func');
function home_parallax_func($atts, $content = null){
	extract(shortcode_atts(array(	
		'stitle'	=>  '',
		'btnlink'	=>  '',
		'btntext'	=>  '',	
		'titles' => ''		
	), $atts));	
	$titles = (array) vc_param_group_parse_atts( $titles );
	ob_start(); 
?>	
   
    <div class="center-y text-center">
    	<?php if($stitle){ ?>
	        <div class="teaser-text">
	            <?php echo htmlspecialchars_decode($stitle) ?>
	        </div>
        <?php } ?>
        <div class="spacer-single"></div>
        <div class="text-slider border-deco">
        	<?php 
				foreach ( $titles as $data ) {
					$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
			?>					 
				<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
			<?php } ?>
        </div>
        <div class="spacer-single"></div>
        <?php if($btnlink != ''){ ?><a href="<?php echo esc_url($btnlink); ?>" target="_blank" class="btn-slider"><?php echo esc_attr($btntext); ?></a><?php } ?>
    </div>
   
<?php
    return ob_get_clean();
}

// Home Parallax 2 - use for Home Minimal
add_shortcode('home_parallax2', 'home_parallax2_func');
function home_parallax2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'logo'      =>  '',	
		'btnlink'	=>  '',	
		'titles' => ''
	), $atts));	
		$url_image = wp_get_attachment_image_src($logo, ''); 
		$image_src = $url_image[0];
		$titles = (array) vc_param_group_parse_atts( $titles );
	ob_start(); 
?>	
	<?php if ($logo != '') { ?>
		<div class="text-center">
	        <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	    </div>
	<?php } ?>

    <div class="center-y text-center">
        <div class="spacer-double"></div>
        <div class="text-slider border-deco">
        	<?php 
				foreach ( $titles as $data ) {
					$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
			?>					 
				<div class="text-item"><h1 class="title-2"><?php echo htmlspecialchars_decode($data['title']); ?></h1></div>    
			<?php } ?>
        </div>
        <div class="spacer-double"></div>
        <div class="spacer-double"></div>
    </div>

	<?php if($btnlink != ''){ ?>
		<a href="<?php echo esc_url($btnlink); ?>" class="scroll-to">
			<span class="mouse">
				<span class="scroll"></span>
			</span>
		</a>
	<?php } ?>
   
<?php
    return ob_get_clean();
}

// Home Text Static
add_shortcode('home_text', 'home_text_func');
function home_text_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'	=>  '',		
		'subtitle'	=>  '',		
	), $atts));	
	ob_start(); 
?>	
    <div class="center-y text-center">
    	<?php if ($title != '') { ?>
	        <div class="teaser-text">
		        <?php echo htmlspecialchars_decode($title) ?>	        
	        </div>
	        <div class="spacer-single"></div>
        <?php } ?>
        <?php if ($subtitle != '') { ?>
	        <h2 class="hero"><?php echo htmlspecialchars_decode($subtitle) ?></h2>
	        <div class="spacer-double"></div>
	        <div class="spacer-double"></div>
        <?php } ?>
    </div>
   
<?php
    return ob_get_clean();
}

// Home Parallax Image Landing
add_shortcode('home_landing', 'home_landing_func');
function home_landing_func($atts, $content = null){
	extract(shortcode_atts(array(
		'logo'	=>  '',		
		'title'	=>  '',
		'stitle'	=>  '',
		'linkbox'	=>  '',			
	), $atts));	
	$url = vc_build_link( $linkbox );
	$url_image = wp_get_attachment_image_src($logo, ''); 
	$image_src = $url_image[0];
	ob_start(); 
?>	
	
	<?php if ($logo != '') { ?>
		<div class="text-center">
	        <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
	    </div>
	<?php } ?>
   
    <div class="center-y text-center">
    	<?php if ($logo != '') { ?>
			<div class="spacer-single"></div>
		<?php }else{ ?> 
			<div class="spacer-double"></div>
		<?php } ?>

    	<?php if($title != ''){ ?>
	        <h1 class="title"><?php echo htmlspecialchars_decode($title) ?></h1>
	    <?php  }  ?> 
	    
	    <?php if($stitle != ''){ ?>
	    	<div class="small-border"></div>
	    <?php }else{ ?>   
	    	<div class="spacer-single"></div>
	    <?php } ?>

        <?php if($stitle != ''){ ?>        	
	        <span class="teaser"><?php echo htmlspecialchars_decode($stitle) ?></span>
	        <div class="spacer-double"></div>
        <?php } ?>
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-slider scroll-to" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
		} ?>        
    </div>
    
<?php
    return ob_get_clean();
}

// Home Landing Page HTML5 Video
add_shortcode('video_landing', 'video_landing_func');
function video_landing_func($atts, $content = null){
	extract(shortcode_atts(array(
		'logo'	=>  '',
		'mp4'	=>  '',	
		'webm'	=>  '',
		'title'	=>  '',
		'stitle'	=>  '',
		'linkbox'	=>  '',		
		'bgvideo'	=>  '',	
		'video_overlay'   =>  'overlay',		
	), $atts));
	$url = vc_build_link( $linkbox );
	$logo1 = wp_get_attachment_image_src($logo,'full');
	$logo1 = $logo1[0];

	$bgvideo1 = wp_get_attachment_image_src($bgvideo,'full');
	$bgvideo1 = $bgvideo1[0];
	ob_start(); 
?>
	<div class="full-height no-padding text-light" data-speed="5" data-type="background">
        <div class="de-video-container">
            <div class="de-video-content">
                <div class="text-center">
                	<?php if ($logo != '') { ?>
						<div class="text-center">
							<img src="<?php echo esc_url($logo1); ?>" alt="logo">
						</div>	
						<div class="spacer-double"></div>
						<div class="spacer-double"></div>
					<?php } ?>					
					
					<?php if($title != ''){ ?>
						<h1 class="title"><?php echo htmlspecialchars_decode($title); ?></h1>
						<div class="small-border"></div>
					<?php } ?>	
					
					<?php if($stitle != ''){ ?>
						<span class="teaser"><?php echo htmlspecialchars_decode($stitle); ?></span>
						<div class="spacer-double"></div>
                	<?php } ?>					
					
					<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
						echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-slider scroll-to" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
					} ?> 					                    
                </div>
            </div>

            <?php if ($video_overlay == 'dotted') { ?>
            	<div class="de-video-overlay dotted"></div>
            <?php }elseif ($video_overlay == 'overlay') {?>
            	<div class="de-video-overlay"></div>
            <?php }else{} ?>

            <video autoplay="" loop="" muted="" poster="<?php echo esc_url($bgvideo1); ?>">
                <?php if($mp4 != ''){ ?> <source src="<?php echo esc_url($mp4); ?>" type="video/mp4"> <?php } ?>
				<?php if($webm != ''){ ?> <source src="<?php echo esc_url($webm); ?>" type="video/webm"> <?php } ?>
            </video>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Home Moving Background - New added 23/9/2016
add_shortcode('movingbg', 'movingbg_func');
function movingbg_func($atts, $content = null){
	extract(shortcode_atts(array(			
		'stitle'	=>  '',
		'bgmoving'	=> 	'',
		'linkbox'	=>	'',
		'time'	    => 	'',
		'titles' => '',
	), $atts));
	
	$url = vc_build_link( $linkbox );
	$img = wp_get_attachment_image_src($bgmoving,'full');
	$img = $img[0];

	$time1 = (!empty($time)) ? $time : 10;

	$titles = (array) vc_param_group_parse_atts( $titles );

	ob_start(); ?>

	<div class="de-video-container full-height no-padding">
		<div class="de-video-content">
			<div class="text-center">

		    	<?php if($stitle != ''){ ?>
			        <div class="teaser-text">
			            <?php echo htmlspecialchars_decode($stitle) ?>
			        </div>
			        <div class="spacer-single"></div>
		        <?php } ?>	

		        <div class="text-slider <?php if($stitle != ''){ echo'style-2'; }?> border-deco">
		            <?php 
						foreach ( $titles as $data ) {
							$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
					?>					 
						<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
					<?php } ?>
		        </div>

		        <?php if($stitle != ''){ ?>
		        	<div class="spacer-single"></div>
		        <?php }else{ ?>
					<div class="spacer-double"></div>
		        <?php } ?>

		        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '<a class="btn-slider" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" >' . esc_attr( $url['title'] ) . '</a>';
				} ?>		        
		    </div>	
		</div>			
		<div class="moving-home" style="background-image: url('<?php echo esc_url($img); ?>');"></div>				
	</div>
	<script type="text/javascript">		
		(function($) { "use strict";
			// Moving Background Image
			var x = 0;
	        setInterval(function(){
	            x-=1;
	            $('.moving-home').css('background-position', x + 'px 0');
	        }, <?php echo esc_attr($time1) ?>);
		})(jQuery);
	</script>		
<?php
    return ob_get_clean();
}

// Home Youtube Video - New added 23/9/2016
add_shortcode('home_youtubevideo', 'home_youtubevideo_func');
function home_youtubevideo_func($atts, $content = null){
	extract(shortcode_atts(array(				
		'stitle'	=>  '',
		'video_link'	=> 	'',
		'linkbox'	=>	'',	
		'video_overlay'   =>  'overlay',
		'titles' => ''
	), $atts));
	$titles = (array) vc_param_group_parse_atts( $titles );
	$url = vc_build_link( $linkbox );

	ob_start(); ?>

	<!-- youtube video background begin -->
    <div id="section-video-bg" class="full-height no-padding" data-speed="5" data-type="background">
        <div class="de-video-container">
            <div class="de-video-content">
                <div class="text-center">

                	<?php if($stitle != ''){ ?>
				        <div class="teaser-text">
				            <?php echo htmlspecialchars_decode($stitle) ?>
				        </div>
				        <div class="spacer-single"></div>
			        <?php }else{
			        	echo '<div class="spacer-double"></div>';
			        } ?>

					<div class="text-slider style-2 border-deco">
						<?php 
							foreach ( $titles as $data ) {
								$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
						?>					 
							<div class="text-item"><?php echo htmlspecialchars_decode($data['title']); ?></div>    
						<?php } ?>
					</div>

					<?php if($stitle != ''){ ?>
				        <div class="spacer-single"></div>
			        <?php }else{
			        	echo '<div class="spacer-double"></div>';
			        } ?>

			        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
						echo '<a class="btn-slider border-op-20" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" >' . esc_attr( $url['title'] ) . '</a>';
					} ?>
                </div>
            </div>

            <?php if ($video_overlay == 'dotted') { ?>
            	<div class="de-video-overlay dotted"></div>
            <?php }elseif ($video_overlay == 'overlay') {?>
            	<div class="de-video-overlay"></div>
            <?php }else{} ?>            
			
			<!-- Video Background - Here you need to replace the videoURL with your youtube video URL -->
			<a id="bgndVideo" class="player" data-property="{videoURL:'<?php echo esc_attr( $video_link ); ?>',containment:'#section-video-bg',autoPlay:true, mute:false, startAt:5, opacity:1}">youtube</a>
        </div>
    </div>
    <!-- youtube video background close -->	
<?php
    return ob_get_clean();
}

// Home Let it snow
add_shortcode('home_letitsnow', 'home_letitsnow_func');
function home_letitsnow_func($atts, $content = null){
	extract(shortcode_atts(array(	
		'title'     => '',
		'stitle'	=>  '',
		'linkbox'	=>  '',
		'logo'	=>  '',		
	), $atts));		
	$url = vc_build_link( $linkbox );
	$img = wp_get_attachment_image_src($logo, "full");
	$img = $img[0];
	ob_start(); 
?>	

	<div class="center-y text-center">
		<?php if($logo != ''){ ?>
			<div class="text-center sm-hide">
			    <img src="<?php echo esc_url($img); ?>" alt="logo">
			</div>
		<?php } ?>

		<div class="center-y text-center">
			<?php if($title != ''){ ?>
			    <div class="spacer-single"></div>
			    <h1 class="title-3"><strong><?php echo htmlspecialchars_decode($title) ?></strong></h1>
			    <div class="small-border"></div>
		    <?php } ?>
		    <?php if($stitle != ''){ ?>
			    <span class="teaser"><?php echo htmlspecialchars_decode($stitle) ?></span>
			    <div class="spacer-double"></div>
		    <?php } ?>
		    <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '" class="btn-slider scroll-to">' . esc_attr( $url['title'] ) . '</a>';
			} ?>
		</div>

		<div class="spacer-double"></div>
	</div>
   
<?php
    return ob_get_clean();
}

// Buttons Download - Landing Page
add_shortcode('download_btn', 'download_btn_func');
function download_btn_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon_fontawesome' 	=> '',
		'linkbox' 	=> '',
		'css' 	=> '',
	), $atts));
	$url = vc_build_link( $linkbox );
	ob_start(); 
?>			
	<div class="landing-download text-light text-center <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        <i class="<?php echo esc_attr($icon_fontawesome); ?> large id-color"></i>
        <div class="spacer-single"></div>
        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-line" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
		} ?>        
    </div>
    
<?php 
	return ob_get_clean();
}

// why choose us - Landing Page
add_shortcode('reasons', 'reasons_func');
function reasons_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon_fontawesome' 	=> '',
		'linkbox' 	=> '',
		'css' 	=> '',
		'number' 	=> '',
		'title' 	=> '',
		'desc' 	=> '',
		'reasons_type' => '',
		'box_style'  => '',
		'delay' => ''
	), $atts));
	$url = vc_build_link( $linkbox );
	$delay1 = (!empty($delay) ? esc_attr($delay) : '1' );
	ob_start(); 
?>			

	<div class="box-number <?php echo vc_shortcode_custom_css_class( $css ); if ($box_style == 'box_square'){echo 'square';} ?>">
        <span class="number bg-color wow rotateIn" data-wow-delay="<?php echo esc_attr($delay1); ?>s"> <?php if($reasons_type == 'icon_type'){ ?><i class="<?php echo esc_attr($icon_fontawesome); ?>"></i><?php }else{echo esc_attr($number); } ?></span>
        <div class="text">
            <h3>
	            <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '<a href="' . esc_attr( $url['url'] ) . '" class="btn-line" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
				} ?>  
					<span class="id-color"><?php echo esc_attr( $title ) ?></span>
				<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '</a>';
				} ?> 
			</h3>
            <p class="text-light"><?php echo htmlspecialchars_decode($desc); ?></p>
        </div>
    </div>
    
<?php 
	return ob_get_clean();
}

// Video Tour - Landing Page
add_shortcode('video_tour', 'video_tour_func');
function video_tour_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',		
		'video_url'		=>  '',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	ob_start(); ?>

	<a class="popup-youtube" href="<?php echo esc_url($video_url); ?>">
        <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive">
    </a>	

<?php
    return ob_get_clean();
}

// Info Apps
add_shortcode('info_apps', 'info_apps_func');
function info_apps_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',		
		'icon'		=>  '',
		'desc'	=>  '',
		'style' =>  'right',
		'css'   =>  '',
	), $atts));	
	ob_start(); ?>		

    <div class="<?php echo vc_shortcode_custom_css_class( $css ); ?> box-icon-simple <?php if($style == 'left'){echo 'left';}elseif($style == 'center'){echo 'center';}else{echo 'right';} ?>">
        <i class="icon-<?php echo esc_attr($icon); ?> wow bounceIn" data-wow-delay=".5s"></i>
        <div class="text">
            <h3><span class="id-color"><?php echo htmlspecialchars_decode($title); ?></span></h3>
            <?php echo htmlspecialchars_decode($desc); ?>
        </div>
    </div>    

<?php
    return ob_get_clean();
}

// Info Apps 2
add_shortcode('info_apps2', 'info_apps2_func');
function info_apps2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',		
		'icon'		=>  '',
		'desc'	=>  '',
		'animation_delay' => '',
		'css'   =>  '',
	), $atts));	
	ob_start(); ?>		

    <div class="<?php echo vc_shortcode_custom_css_class( $css ); ?> box-icon">
        <span class="icon wow fadeIn" data-wow-delay="<?php echo esc_attr($animation_delay); ?>s">
        	<i class="id-color icon-<?php echo esc_attr($icon); ?>"></i>
        </span>
        <div class="text">
            <h3><?php echo htmlspecialchars_decode($title); ?></h3>
            <p><?php echo htmlspecialchars_decode($desc); ?></p>
        </div>
    </div>    

<?php
    return ob_get_clean();
}

// Testimonial Silder
add_shortcode('testslide','testslide_func');
function testslide_func($atts, $content = null){
	extract(shortcode_atts(array(
		'visible'	=>		'',
		'number'	=>		'',
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	ob_start(); 
?>
		
	<div id="testimonial-carousel" class="de_carousel  wow fadeInUp" data-wow-delay=".3s">
	<?php
		$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => $number1,
		);
		$testimonial = new WP_Query($args);
		if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
		$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
	?>
        <div class="col-md-6 item">
            <div class="de_testi">
                <blockquote>
                    <?php the_content(); ?>
                    <div class="de_testi_by">
                        <?php the_title(); ?>, <?php echo htmlspecialchars_decode($job); ?>
                    </div>
                </blockquote>

            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
    <script>
    	jQuery(document).ready(function() {		
			'use strict';
			jQuery("#testimonial-carousel").owlCarousel({
			    items : <?php echo esc_attr($visible); ?>,
				itemsDesktop : [1199,2],
				itemsDesktopSmall : [980,2],
			    itemsTablet: [768,1],
			    itemsTabletSmall: false,
			    itemsMobile : [479,1],
			    navigation : false,
				autoHeight : true,
		   		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		    });
		});
    </script>
<?php
    return ob_get_clean();
}

// Testimonial Grid
add_shortcode('testgrid','testgrid_func');
function testgrid_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'testimonial_columns'   => 	4,
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	ob_start(); 
?>
	
	<div id="testimonial-masonry" class="masonry">
		<?php
			$args = array(
				'post_type' => 'testimonial',
				'posts_per_page' => $number1,
			);
			$testimonial2 = new WP_Query($args);
			if($testimonial2->have_posts()) : while($testimonial2->have_posts()) : $testimonial2->the_post();
			$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
		?>
			<div class="<?php if ($testimonial_columns == 2) {echo 'col-md-6'; }elseif ($testimonial_columns == 3) { echo 'col-md-4'; }else{echo 'col-md-3';} ?> item">
				<div class="de_testi">
					<blockquote>
						<?php the_content(); ?>
						<div class="de_testi_by">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="de_testi_pic">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php endif; ?>
							<div class="de_testi_company">
								<strong><?php the_title(); ?></strong>, <?php echo htmlspecialchars_decode($job); ?>
							</div>
						</div>
					</blockquote>					
				</div>
			</div>     
		<?php endwhile; wp_reset_postdata(); endif; ?>		
	</div>
<?php
    return ob_get_clean();
}

// Services Grid
add_shortcode('services','services_func');
function services_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'style'     =>		'imageabove',
		'services_columns'   => 	4,
		'button_style'     =>	'full',
		'btntext'  =>  '',
		'show_btn'  =>	'yes',
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>
<div id="services-masonry" class="masonry row">
	<?php
		$args = array(
			'post_type' => 'service',
			'posts_per_page' => $number1,
		);
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); 
	?>

	<div class="<?php if ($services_columns == 2) {echo 'col-md-6'; }elseif ($services_columns == 3) { echo 'col-md-4'; }else{echo 'col-md-3';} ?> item">
		
		<?php if($style == 'noimage'){ ?>
		
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>

			<?php if ($show_btn != 'no') { ?>
				<div class="spacer-single-10"></div>								
				<a href="<?php the_permalink(); ?>" class="btn-line <?php if($button_style == 'full'){echo 'btn-fullwidth';} ?>"><?php echo esc_attr($btntext); ?></a>
			<?php } ?>

		<?php }elseif($style == 'imagebelow'){ ?>
			
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="spacer-single-10"></div>
		        <?php the_post_thumbnail('full', array( 'class' => 'img-responsive' )); ?>
			<?php endif; ?>

			<?php if ($show_btn != 'no') { ?>
				<div class="spacer-single"></div>			
				<a href="<?php the_permalink(); ?>" class="btn-line <?php if($button_style == 'full'){echo 'btn-fullwidth';} ?>"><?php echo esc_attr($btntext); ?></a>		
			<?php } ?>
		<?php }else{ ?>			
				
			<?php if ( has_post_thumbnail() ) : ?>
		        <?php the_post_thumbnail('full', array( 'class' => 'img-responsive' )); ?>
		        <div class="spacer-single"></div>
			<?php endif; ?>   
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>

			<?php if ($show_btn != 'no') { ?>
				<div class="spacer-single-10"></div>								
				<a href="<?php the_permalink(); ?>" class="btn-line <?php if($button_style == 'full'){echo 'btn-fullwidth';} ?>"><?php echo esc_attr($btntext); ?></a>
			<?php } ?>
		<?php } ?>

	</div>

	<?php endwhile; wp_reset_postdata(); endif; ?>	
</div>	

<?php
    return ob_get_clean();
}	

// Services Grid 2
add_shortcode('services2','services2_func');
function services2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'services_columns'  =>  3,
		'btntext' => '',
		'show_btn'  =>	'yes',
	), $atts));
	$number1 = (!empty($number) ? $number : 3);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>

<div class="display-table">
	<?php
		$i = 0;
		$args = array(
			'post_type' => 'service',
			'posts_per_page' => $number1,
		);
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); $i++;
	?>

		<div class="<?php if ($services_columns == 2) {echo 'box-two-columns'; }elseif ($services_columns == 3) { echo 'box-one-third'; }else{echo 'box-four-columns';} ?> text-middle text-light wow fadeInRight" data-wow-delay="<?php echo esc_attr($i); ?>s" style="background-image: url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>);">
            <div class="padding40 overlay70">
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt(); ?>

                <?php if ($show_btn != 'no') { ?>
                	<a href="<?php the_permalink(); ?>" class="btn-line btn-fullwidth"><?php echo esc_attr($btntext); ?></a>
                <?php } ?>
            </div>
        </div>
	
	<?php endwhile; wp_reset_postdata(); endif; ?>	
</div>	

<?php
    return ob_get_clean();
}		

// Services Grid 3
add_shortcode('services3','services3_func');
function services3_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'services_columns'  =>  3,
		'btntext' => '',
		'show_btn'  =>	'yes',
	), $atts));
	$number1 = (!empty($number) ? $number : 3);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>

<div class="row">
	<?php
		$i = 0;
		$args = array(
			'post_type' => 'service',
			'posts_per_page' => $number1,
		);
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); $i++;
	?>

		<div class="<?php if ($services_columns == 2) {echo 'col-md-6'; }elseif ($services_columns == 3) { echo 'col-md-4'; }else{echo 'col-md-3';} ?> text-middle text-light wow fadeInRight" data-wow-delay="<?php echo esc_attr($i); ?>s">
            <div class="shadow-soft" data-bgimage="url(<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id()));?>)">
                <div class="padding40 overlay60">
                    <h3><?php the_title(); ?></h3>
                	<?php the_excerpt(); ?>

                	<?php if ($show_btn != 'no') { ?>
                    	<a href="<?php the_permalink(); ?>" class="btn-line btn-fullwidth"><?php echo esc_attr($btntext); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
	
	<?php endwhile; wp_reset_postdata(); endif; ?>	
</div>	

<?php
    return ob_get_clean();
}	

// Services List
add_shortcode('serviceslist','serviceslist_func');
function serviceslist_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'btntext' => '',
		'show_btn'  =>	'yes',
	), $atts));
	$number1 = (!empty($number) ? $number : 4);
	$btntext = (!empty($btntext) ? $btntext : 'Read More');
	ob_start(); 
?>

	<?php
		$i = 0;
		$args = array(
			'post_type' => 'service',
			'posts_per_page' => $number1,
		);
		$services = new WP_Query($args);
		if($services->have_posts()) : while($services->have_posts()) : $services->the_post(); $i++;
	?>

		
		<section class="side-bg no-padding service-list" id="section-service-<?php echo esc_attr($i); ?>">

			<?php if ($i % 2 == 1) { ?>
			
            <div class="image-container col-md-5 pull-left" data-delay="0">
                <div class="background-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
            </div>
			
            <div class="container">
                <div class="row">
                    <div class="inner-padding">
                        <div data-wow-delay=".5s" class="col-md-6 col-md-offset-6 wow fadeInRight">
                            <h3 class="id-color"><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <?php if ($show_btn != 'no') { ?>
								<div class="spacer-single"></div>
	                            <a class="btn-line" href="<?php the_permalink(); ?>"><?php echo esc_attr($btntext); ?></a>
							<?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <?php }else{ ?>

            <div data-delay="0" class="image-container col-md-5 col-md-offset-7 pull-right right0">
                <div class="background-image" style="background-image:url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
            </div>
			
            <div class="container">
                <div class="row">
                    <div class="inner-padding">
                        <div data-wow-delay=".5s" class="col-md-6 wow fadeInLeft">
                            <h3 class="id-color"><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                            <?php if ($show_btn != 'no') { ?>
								<div class="spacer-single"></div>
	                            <a class="btn-line" href="<?php the_permalink(); ?>"><?php echo esc_attr($btntext); ?></a>
							<?php } ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </section>            
	
	<?php endwhile; wp_reset_postdata(); endif; ?>	

<?php
    return ob_get_clean();
}		

// Text Typing
add_shortcode('text_typing','text_typing_func');
function text_typing_func($atts, $content = null){
	extract(shortcode_atts(array(
		'text_static' => '',
		'titles' => ''
	), $atts));	
	$titles = (array) vc_param_group_parse_atts( $titles );
	ob_start(); 
?>

<div class="typing-wrap">
    <?php echo esc_attr($text_static); ?>
	<div class="typed-strings">
		<?php 
			foreach ( $titles as $data ) {
				$data['title'] = isset( $data['title'] ) ? $data['title'] : '';
		?>
			<p><?php echo esc_attr($data['title']); ?></p>	
		<?php } ?>								
	</div>
    <span class="typed"></span>
</div>

<?php
    return ob_get_clean();
}	
			
// Process
add_shortcode('process','process_func');
function process_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>		'',
		'idcate_process' => ''
	), $atts));
	$number1 = (!empty($number) ? $number : 6);
	ob_start(); ?>

    <div class="de_tab tab_steps">
        <ul class="de_nav">
	        <?php
	        	$i=0;
	        	if ($idcate_process != '') {
	        		$args = array(
						'tax_query' => array(
							array(
								'taxonomy' => 'category_process',
								'field' => 'slug',
								'terms' => explode(',',$idcate_process)
							),
						),
						'post_type' => 'process',
						'showposts' => $number1,
					);
	        	}else{
		        	$args = array(
						'post_type' => 'process',
						'showposts' => $number1,
					);
		        }
				$process = new WP_Query($args);
				if($process->have_posts()) : while($process->have_posts()) : $process->the_post(); 
			?>
	            <li class="<?php if($i==0){echo 'active';} ?> wow fadeIn" data-wow-delay="<?php echo esc_attr($i*0.4); ?>s">
		            <span><?php the_title(); ?></span>
		            <div class="v-border"></div>
	            </li>
	            
	        <?php $i++; endwhile; wp_reset_postdata();  endif; ?>
        </ul>

        <div class="de_tab_content">
	        <?php
				if ($idcate_process != '') {
	        		$args = array(
						'tax_query' => array(
							array(
								'taxonomy' => 'category_process',
								'field' => 'slug',
								'terms' => explode(',',$idcate_process)
							),
						),
						'post_type' => 'process',
						'showposts' => $number1,
					);
	        	}else{
		        	$args = array(
						'post_type' => 'process',
						'showposts' => $number1,
					);
		        }
				$process = new WP_Query($args);
				if($process->have_posts()) : while($process->have_posts()) : $process->the_post();		
			?>
	            <div id="tab-<?php the_ID(); ?>" class="de_tab_content_inner">
	                <?php the_content(); ?>
	            </div>
	        <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Quick View (use)
add_shortcode('quickview', 'quickview_func');
function quickview_func($atts, $content = null){
	extract(shortcode_atts(array(				
		'title'		=>  '',
		'photo'		=> 	'',
		'columns'   =>  '',
		'img_position' => ''
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];

	$img_halfrow = array();	
	$content_halfrow = array();	
	
	if ($img_position == 'imgright') {
		$img_halfrow[] =  'pull-right right0';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4 col-md-offset-8';
			$content_halfrow[] = 'col-md-8';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5 col-md-offset-7';
			$content_halfrow[] = 'col-md-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7 col-md-offset-5';
			$content_halfrow[] = 'col-md-4';
		}else {
			$img_halfrow[] = 'col-md-6 col-md-offset-6';
			$content_halfrow[] = 'col-md-5';
		}
	}else {		
		$img_halfrow[] =  'pull-left';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4';
			$content_halfrow[] = 'col-md-8 col-md-offset-4';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5';
			$content_halfrow[] = 'col-md-6 col-md-offset-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7';
			$content_halfrow[] = 'col-md-3 col-md-offset-9';
		}else {
			$img_halfrow[] = 'col-md-6';
			$content_halfrow[] = 'col-md-5 col-md-offset-7';
		}
	}

	ob_start(); ?>
	<div class="side-bg">
		<div class="image-container <?php echo implode( ' ', $img_halfrow ); ?>" style="background-image:url(<?php echo esc_url($img); ?>); ?>" data-delay="0"></div>

        <div class="container">
            <div class="row">
                <div class="inner-padding">
                    <div class="<?php echo implode( ' ', $content_halfrow ); ?> wow fadeInRight" data-wow-delay=".2s">
                        <h2><?php echo htmlspecialchars_decode($title); ?></h2><br/>
                        <?php echo htmlspecialchars_decode($content); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
	</div>

<?php
    return ob_get_clean();
}

// Quick View - Landing Page
add_shortcode('quickview2', 'quickview2_func');
function quickview2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>  '',
		'photo'		=> 	'',
		'columns'   =>  '',
		'img_position' => ''
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];

	$img_halfrow = array();	
	$content_halfrow = array();	
	
	if ($img_position == 'imgright') {
		$img_halfrow[] =  'pull-right right0';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4 col-md-offset-8';
			$content_halfrow[] = 'col-md-8';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5 col-md-offset-7';
			$content_halfrow[] = 'col-md-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7 col-md-offset-5';
			$content_halfrow[] = 'col-md-4';
		}else {
			$img_halfrow[] = 'col-md-6 col-md-offset-6';
			$content_halfrow[] = 'col-md-5';
		}
	}else {		
		$img_halfrow[] =  'pull-left';
		if($columns == 4){
			$img_halfrow[] = 'col-md-4';
			$content_halfrow[] = 'col-md-8 col-md-offset-4';
		}elseif ($columns == 5) {
			$img_halfrow[] = 'col-md-5';
			$content_halfrow[] = 'col-md-6 col-md-offset-6';
		}elseif ($columns == 7) {
			$img_halfrow[] = 'col-md-7';
			$content_halfrow[] = 'col-md-3 col-md-offset-9';
		}else {
			$img_halfrow[] = 'col-md-6 col-sm-6';
			$content_halfrow[] = 'col-md-5 col-md-offset-7';
		}
	}

	ob_start(); ?>

	<div class="side-bg">
		<div class="image-container <?php echo implode( ' ', $img_halfrow ); ?>" data-delay="0">
	        <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive hidden-phone wow slideInLeft" data-wow-duration="1.5s">
	    </div>

	    <div class="container">
	        <div class="row">
	            <div class="inner-padding">
	                <div class="<?php echo implode( ' ', $content_halfrow ); ?> wow fadeInRight" data-wow-delay=".25s">
	                    <h2><?php echo htmlspecialchars_decode($title); ?></h2>
	                    <?php echo htmlspecialchars_decode($content); ?>
	                </div>
	                <div class="clearfix"></div>
	            </div>
	        </div>
	    </div>	
	</div>
	
<?php
    return ob_get_clean();
}

// Latest Blog
add_shortcode('latestblog','latestblog_func');
function latestblog_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>	'',
		'excerpt'   =>	'',
		'read_more' =>  '',
	), $atts));

	$number1 = (!empty($number) ? $number : 6);
	$excerpt1 = (!empty($excerpt) ? $excerpt : 19);

	 ob_start(); ?>	
	
    <div class="clearfix"></div>			
    <ul id="blog-carousel" class="blog-list blog-snippet wow fadeInUp">
    	<?php 
		    $args = array(   
		        'post_type' => 'post',   
		        'posts_per_page' => $number1,
		    );  
		    $wp_query = new WP_Query($args);
		    while($wp_query->have_posts()) : $wp_query->the_post(); 
	    ?>
        <li class="col-md-6 item">
            <div class="post-content">
                <div class="post-image">
                    <?php $format = get_post_format();
                    	  $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
 						  $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
                    <?php if($format=='audio'){ ?>
	                    <?php if ( has_post_thumbnail() ) { ?>
	                    	<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumb-blog') ?>
							</a>
						<?php }else{ ?>
	                      <iframe style="width:100%;height:300px;" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
	        			<?php } ?>
                  	<?php } elseif($format=='video'){ ?>
	                  	<?php if ( has_post_thumbnail() ) {  
	                  		the_post_thumbnail('thumb-blog'); 
	                  	}else{ ?>
	                        <iframe height="300" src="<?php echo esc_url( $link_video ); ?>"></iframe>
	       				<?php } ?>

                  	<?php } elseif($format=='gallery'){ ?>
                  	
                  	<?php if ( has_post_thumbnail() ) { ?>
                  		<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumb-blog') ?>	
						</a>												
					<?php }else{ ?>
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
                                autoPlay: 3000,
                                singleItem: true,                               								                          
                              });
                            });                         
                          })(this.jQuery);
                        </script>
                    <?php } ?>
          
                  	<?php } else { $format=='image' ?>
                  	<?php if ( has_post_thumbnail() ) { ?>
                  		<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumb-blog') ?>
						</a>
					<?php }else{ ?>
                      <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                        <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                        <?php if($images){ ?>
                        <?php                                                        
                          foreach ( $images as $image ) {                              
                          ?>
                          <?php $img = $image['full_url']; ?>
							<a href="<?php the_permalink(); ?>">
                          		<img src="<?php echo esc_url($img); ?>" alt="">
                          	</a>
                          <?php } ?>
                        <?php } ?>
                  	<?php } ?>
                  	<?php } ?>
                  	<?php } ?>
                </div>
                <div class="date-box">
                    <div class="day"><?php the_time('d'); ?></div>
                    <div class="month"><?php the_time('M'); ?></div>
                </div>
                <div class="post-text">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo archi_blog_excerpt($excerpt1); ?></p>
                </div>
                <?php if(!empty($read_more)): ?>
                	<a href="<?php the_permalink(); ?>" class="btn-more"><?php echo esc_html__('Read More', 'archi'); ?></a>
                <?php endif; ?>
            </div>
        </li>
       <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    
<?php
    return ob_get_clean();
}

// Our Facts
add_shortcode('ourfacts', 'ourfacts_func');
function ourfacts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'number'    => 	'',
		'icon'		=>  '',
	), $atts));
	ob_start(); ?>

	<div class="de_count">
        <?php if($icon != ''){ ?><i class="icon-<?php echo esc_attr($icon); ?> wow zoomIn" data-wow-delay="0"></i><?php } ?>
        <h3 class="timer" data-to="<?php echo esc_attr($number); ?>" data-speed="2500">0</h3>
        <span><?php echo htmlspecialchars_decode($title); ?></span>
    </div>

<?php
    return ob_get_clean();
}

// Logos Client
add_shortcode('logos', 'logos_func');
function logos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'visible'		=>  '',
		'custom_links_target'		=>  '',
	), $atts));
	$custom_links_target = (!empty($custom_links_target) ? $custom_links_target : '_self' );
	ob_start(); ?>

    <div class="logo-carousel">
        <ul id="logo-carousel" class="slides">
            <?php $img_ids = explode(",",$gallery);
            foreach( $img_ids AS $img_id ){
            $meta = wp_prepare_attachment_for_js($img_id);			
			$title = $meta['title'];	
			$caption = $meta['caption'];
			$description = $meta['description'];	
            $image_src = wp_get_attachment_image_src($img_id,''); ?>
            <li>
            <?php if ($caption != '') { ?>
            	<a href="<?php echo esc_url($caption); ?>" target="<?php echo esc_attr($custom_links_target); ?>" ><img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>"></a>
            <?php }else{ ?>
                <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php } ?>    
            </li>
            <?php } ?>
        </ul>
    </div> 
    <script type="text/javascript">
    	jQuery(document).ready(function() {		
			'use strict';
			jQuery("#logo-carousel").owlCarousel({
		    items : <?php echo esc_attr($visible); ?>,
		    itemsDesktop : [1199, 4],
	        itemsDesktopSmall : [979, 3],
	        itemsTablet : [768, 3],
	        itemsTabletSmall : [767, 2],
	        itemsMobile : [479, 1],
		    navigation : false,
			pagination : false,
			autoPlay : true
		    });		   
		});
    </script>
<?php
    return ob_get_clean();
}

// Portfolio Gallery - Landing Page
add_shortcode('folio_gallery', 'folio_gallery_func');
function folio_gallery_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>        
	<div class="container">
        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
                    <?php 
	                  $categories = get_terms('categories');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                   
                </ul>
            </div>
        </div>
        <!-- portfolio filter close -->
    </div>

    <div id="gallery" class="gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{} ?> wow fadeInUp" data-wow-delay=".3s">
        <?php 
		  global $post;	
          $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){	                
                $cate_slug .= $cate->slug .' ';     
              } 
          }
          $format = get_post_format($post->ID);	
          $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);		  
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe">
                <a class="<?php if($format=='video'){echo 'video-link';}else{echo 'image-link';} ?>" title="<?php the_title(); ?>" href="<?php if($format=='video'){echo esc_url($link_video);}else{ echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); } ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

// Portfolio Gallery 2
add_shortcode('folio_gallery2', 'folio_gallery2_func');
function folio_gallery2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'All Designs');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>        
	<div class="container">
        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
                    <?php 
	                  $categories = get_terms('categories');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                   
                </ul>
            </div>
        </div>
        <!-- portfolio filter close -->
    </div>

    <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp" data-wow-delay=".3s">	
        <?php 
		  global $post;		
          $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){	                
                $cate_slug .= $cate->slug .' ';     
              } 
          }
          $format = get_post_format($post->ID);	
          $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
        ?>             
        <!-- gallery item -->
        <div class="<?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 6) { echo 'col-md-2'; }else{echo 'col-md-3';} ?> item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe">
                <a class="<?php if($format=='video'){echo 'video-link';}else{echo 'image-link';} ?>" title="<?php the_title(); ?>" href="<?php if($format=='video'){echo esc_url($link_video);}else{ echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); } ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

// OT Image Gallery Style 1
add_shortcode('ot_image_glallery', 'ot_image_glallery_func');
function ot_image_glallery_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'columns'		=>  '',
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));
	$id = uniqid( 'gallery-images-popup-' );
	ob_start(); ?>

	<div class="row archi-image-gallery grid_gallery gallery de-gallery">	
        <?php 
			$img_ids = explode(",",$gallery);
	        foreach( $img_ids AS $img_id ){
	            $meta = wp_prepare_attachment_for_js($img_id);			
				$title = $meta['title'];	
				$caption = $meta['caption'];
				$description = $meta['description'];	
	            $image_src = wp_get_attachment_image_src($img_id,''); 
        ?>     
	        <!-- gallery item -->
	        <div class="<?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 6) { echo 'col-md-2'; }else{echo 'col-md-3';} ?> item">
	            <div class="picframe">            	
	                <a class="<?php echo esc_attr($id); ?>" title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($image_src[0]); ?>">
	                    <span class="overlay">
	                        <span class="pf_text">
	                            <span class="project-name"><?php echo esc_attr($title); ?></span>
	                        </span>
	                    </span>
	                </a>
	                <?php 	     				
		                if ($cropimage == 'yes') {		                	
							$params_crop_image = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( $image_src[0], $params_crop_image );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" />
					<?php }else{ ?>
		                	<img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>"> 
		            <?php } ?>
	            </div>
	        </div>
	        <!-- close gallery item -->  
        <?php } ?>   
    </div>

    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
	   		jQuery('.<?php echo esc_attr($id); ?>').magnificPopup({
				type: 'image',
				closeOnContentClick: false,
				closeBtnInside: false,
				mainClass: 'mfp-with-zoom mfp-img-mobile',
				image: {
					verticalFit: true,
					titleSrc: function(item) {
						return item.el.attr('title');
						//return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
					}
				},
				gallery: {
					enabled: true
				}		
			});     
		 });
    </script>
<?php
    return ob_get_clean();
}

// OT Image Gallery Style 2
add_shortcode('ot_image_glallery2', 'ot_image_glallery2_func');
function ot_image_glallery2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'columns'		=>  '',
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));
	$id = uniqid( 'gallery-images-popup-' );
	ob_start(); ?>

	<div class="archi-image-gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{ echo 'pf_4_cols'; } ?>">	
        <?php 
			$img_ids = explode(",",$gallery);
	        foreach( $img_ids AS $img_id ){
	            $meta = wp_prepare_attachment_for_js($img_id);			
				$title = $meta['title'];	
				$caption = $meta['caption'];
				$description = $meta['description'];	
	            $image_src = wp_get_attachment_image_src($img_id,''); 
        ?>     
	        <!-- gallery item -->
	        <div class="item">
	            <div class="picframe">            	
	                <a class="<?php echo esc_attr($id); ?>" title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($image_src[0]); ?>">
	                    <span class="overlay">
	                        <span class="pf_text">
	                            <span class="project-name"><?php echo esc_attr($title); ?></span>
	                        </span>
	                    </span>
	                </a>
		            <?php 	     				
		            if ($cropimage == 'yes') {		                							
						$params_crop_image = array( 'width' => $width, 'height' => $height, 'crop' => true );
						$image = bfi_thumb( $image_src[0], $params_crop_image );	
					?>
						<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" />
					<?php }else{ ?>
		                <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($title); ?>"> 
		            <?php } ?>
	            </div>
	        </div>
	        <!-- close gallery item -->  
        <?php } ?>   
    </div>

    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
	   		jQuery('.<?php echo esc_attr($id); ?>').magnificPopup({
				type: 'image',
				closeOnContentClick: false,
				closeBtnInside: false,
				mainClass: 'mfp-with-zoom mfp-img-mobile',
				image: {
					verticalFit: true,
					titleSrc: function(item) {
						return item.el.attr('title');
						//return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
					}
				},
				gallery: {
					enabled: true
				}		
			});     
		 });
    </script>
<?php
    return ob_get_clean();
}

// Portfolio Filter
add_shortcode('foliof', 'foliof_func');
function foliof_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);	

	ob_start(); ?>  

	<div class="container">
    	<!-- portfolio filter begin -->
	    <div class="row">
	        <div class="col-md-12 text-center">
	            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
	            	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
	                <?php 
	                  $categories = get_terms('categories');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                    
	            </ul>
	        </div>
	    </div>
    	<!-- portfolio filter close -->
    </div>

    <div id="gallery" class="gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{} ?> wow fadeInUp" data-wow-delay=".3s">
        <?php 
          $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.'<span>, </span> ' ;
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe">
                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
				<?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

// Portfolio Filter 2
add_shortcode('foliof2', 'foliof2_func');
function foliof2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<div class="container">
    	<!-- portfolio filter begin -->
	    <div class="row">
	        <div class="col-md-12 text-center">
	            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
	            	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
	                <?php 
	                  $categories = get_terms('categories');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                    
	            </ul>
	        </div>
	    </div>
    	<!-- portfolio filter close -->
    </div>

    <div id="gallery" class="gallery grid_gallery full-gallery de-gallery wow fadeInUp" data-wow-delay=".3s">
        <?php 
          $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.'<span>, </span> ' ;
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?> <?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 4) { echo 'col-md-3'; }elseif ($columns == 6) { echo 'col-md-2'; }else{} ?>">
            <div class="picframe">
                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

// Portfolio Filter 3
add_shortcode('foliof3', 'foliof3_func');
function foliof3_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<!-- portfolio filter begin -->
    <div class="row">
        <div class="col-md-12">
            <ul id="filters" class="wow fadeInUp filter3" data-wow-delay="0s">
            	<li class="pull-right"><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
                <?php 
                  $categories = get_terms('categories');
                   foreach( (array)$categories as $categorie){
                    $cat_name = $categorie->name;
                    $cat_slug = $categorie->slug;
                    $cat_count = $categorie->count;
                  ?>
                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>                    
            </ul>
        </div>
    </div>
	<!-- portfolio filter close -->

    <div id="gallery" class="gallery grid_gallery full-gallery de-gallery row wow fadeInUp" data-wow-delay=".3s">
        <?php 
          $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.'<span>, </span> ' ;
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?> <?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 4) { echo 'col-md-3'; }elseif ($columns == 6) { echo 'col-md-2'; }else{} ?>">
            <div class="picframe">
                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

//Portfolio Inverted Style
add_shortcode('foliofinverted', 'foliofinverted_func');
function foliofinverted_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<!-- portfolio filter begin -->
    <div class="row">
        <div class="col-md-12">
            <ul id="filters" class="wow fadeInUp filter3" data-wow-delay="0s">
            	<li class="pull-right"><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
                <?php 
                  $categories = get_terms('categories');
                   foreach( (array)$categories as $categorie){
                    $cat_name = $categorie->name;
                    $cat_slug = $categorie->slug;
                    $cat_count = $categorie->count;
                  ?>
                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
                <?php } ?>                    
            </ul>
        </div>
    </div>
	<!-- portfolio filter close -->

    <div id="gallery" class="gallery grid_gallery full-gallery de-gallery hover-1 row wow fadeInUp" data-wow-delay=".3s">
        <?php 
          $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.'<span>, </span> ' ;
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?> <?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 4) { echo 'col-md-3'; }elseif ($columns == 6) { echo 'col-md-2'; }else{} ?>">
            <div class="picframe">
                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
                    <span class="overlay-1">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

// Portfolio Style 2
add_shortcode('foliostyle2', 'foliostyle2_func');
function foliostyle2_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	8,
		'columns'   => 	3,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));

	$all1 = (!empty($all) ? $all : 'ALL PROJECTS');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>  

	<div class="container">
    	<!-- portfolio filter begin -->
	    <div class="row">
	        <div class="col-md-12 text-center">
	            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
	            	<li><a href="#" data-filter="*" class="selected"><?php echo htmlspecialchars_decode($all1); ?></a></li>                    
	                <?php 
	                  $categories = get_terms('categories');
	                   foreach( (array)$categories as $categorie){
	                    $cat_name = $categorie->name;
	                    $cat_slug = $categorie->slug;
	                    $cat_count = $categorie->count;
	                  ?>
	                  <li><a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a></li>
	                <?php } ?>                    
	            </ul>
	        </div>
	    </div>
    	<!-- portfolio filter close -->
    </div>

    <div id="gallery" class="row folio-style2 gallery wow fadeInUp" data-wow-delay=".3s">
        <?php 
          $args = array(   
            'post_type' => 'portfolio',   
            'posts_per_page' => $num1,	            
          );  
          $wp_query = new WP_Query($args);
          while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
          $cates = get_the_terms(get_the_ID(),'categories');
          $cate_name ='';
          $cate_slug = '';
              foreach((array)$cates as $cate){
              if(count($cates)>0){
                $cate_name .= $cate->name.' ' ;
                $cate_slug .= $cate->slug .' ';     
              } 
          }
        ?>             
        <!-- gallery item -->
        <div class="<?php if ($columns == 2) {echo 'col-md-6'; }elseif ($columns == 3) { echo 'col-md-4'; }elseif ($columns == 6) { echo 'col-md-2'; }else{echo 'col-md-3';} ?> item <?php echo esc_attr($cate_slug); ?>">            
            <div class="folio-image">
	            <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
	            	<?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>
	            </a>
            </div>
            <div class="folio-info">
				<h3>
					<a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
		                <?php the_title(); ?>
		            </a>
				</h3>
				<p><?php echo htmlspecialchars_decode($cate_name); ?></p>		
			</div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

// Portfolio Category
add_shortcode('cate_portfolio', 'cate_portfolio_func');
function cate_portfolio_func($atts, $content = null){
	extract(shortcode_atts(array(
		'show'      =>  '',
	    'idcate'  =>   '',
		'columns'   => 	4,
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));	
	$show1 = (!empty($show) ? $show : 8);
	ob_start(); ?>  

    <div id="gallery" class="gallery full-gallery de-gallery pf_full_width <?php if ($columns == 2) {echo 'pf_2_cols'; }elseif ($columns == 3) { echo 'pf_3_cols'; }elseif ($columns == 5) { echo 'pf_5_cols'; }elseif ($columns == 6) { echo 'pf_6_cols'; }else{} ?> wow fadeInUp" data-wow-delay=".3s">
        <?php 						
			$args = array(
				'tax_query' => array(
					array(
						'taxonomy' => 'categories',
						'field' => 'slug',
						'terms' => explode(',',$idcate)
					),
				),
				'post_type' => 'portfolio',
				'showposts' => $show1,
			);
			
			$wp_query = new WP_Query($args);					
			while ($wp_query -> have_posts()) : $wp_query -> the_post();  
			$cates = get_the_terms(get_the_ID(),'categories');
			$cate_name ='';
			$cate_slug = '';
				  foreach((array)$cates as $cate){
					if(count($cates)>0){
						$cate_name .= $cate->name.' ' ;
						$cate_slug .= $cate->slug .' ';     
					} 
			} 			
		?>          
        <!-- gallery item -->
        <div class="item <?php echo esc_attr($cate_slug); ?>">
            <div class="picframe">
                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
                    <span class="overlay">
                        <span class="pf_text">
                            <span class="project-name"><?php the_title(); ?></span>
                        </span>
                    </span>
                </a>
                <?php if ( has_post_thumbnail() ) : ?>
	                <?php 	     				
		                if ($cropimage == 'yes') {
		                	$thumbnail = get_post( get_post_thumbnail_id() );
							$image_title = $thumbnail->post_title;
							$image_caption = $thumbnail->post_excerpt;
							$image_description = $thumbnail->post_content;
							$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
							// Crop
							$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
							$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
					?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
					<?php	
		                }else{
		                	the_post_thumbnail( 'thumb-portfolio' ); 
		                }			
	                ?>
				<?php endif; ?>
            </div>
        </div>
        <!-- close gallery item -->
       <?php endwhile; wp_reset_postdata(); ?>
    </div>
<?php
    return ob_get_clean();
}

// Portfolio Carousel Style
add_shortcode('portfolio_carousel', 'portfolio_carousel_func');
function portfolio_carousel_func($atts, $content = null){
	extract(shortcode_atts(array(
		'show'      =>  '',
	    'idcate'  =>   '',
		'visible'   => 	'',
		'slideplay' => 	'',
		'cropimage' => 'no',
		'width'     => 	700,
		'height'	=> 	466,
	), $atts));	
		$show1 = (!empty($show) ? $show : 8);
		$visible = (!empty($visible) ? $visible : 4);
		$slideplay = (!empty($slideplay) ? $slideplay : 'false');
		$id = uniqid( 'gallery-carousel-' );
	ob_start(); ?>  

    <div id="<?php echo esc_attr($id); ?>" class="owl-slide gallery-carousel">
    	<?php 	
    		if ($idcate != '') {					
				$args = array(
					'tax_query' => array(
						array(
							'taxonomy' => 'categories',
							'field' => 'slug',
							'terms' => explode(',',$idcate)
						),
					),
					'post_type' => 'portfolio',
					'showposts' => $show1,
				);
			}else{
				$args = array(
					'post_type' => 'portfolio',
					'showposts' => $show1,
				);
			}
			
			$wp_query = new WP_Query($args);					
			while ($wp_query -> have_posts()) : $wp_query -> the_post();  		
		?>  
	        <!-- gallery carousel-item -->
	        <div class="carousel-item">
	            <div class="picframe">
	                <a <?php global $archi_option; if($archi_option['ajax_work']!=false){ ?>class="simple-ajax-popup-align-top"<?php } ?> href="<?php the_permalink(); ?>">
	                    <span class="overlay-v">
	                        <span class="pf_text">
	                            <span class="project-name"><?php the_title(); ?></span>
	                        </span>
	                    </span>
	                </a>
	                <?php if ( has_post_thumbnail() ) : ?>
		                <?php 	     				
			                if ($cropimage == 'yes') {
			                	$thumbnail = get_post( get_post_thumbnail_id() );
								$image_title = $thumbnail->post_title;
								$image_caption = $thumbnail->post_excerpt;
								$image_description = $thumbnail->post_content;
								$image_alt = get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true );
								// Crop
								$params = array( 'width' => $width, 'height' => $height, 'crop' => true );
								$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params );	
						?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php echo esc_attr($image_title); ?>" />
						<?php	
			                }else{
			                	the_post_thumbnail( 'thumb-portfolio' ); 
			                }			
		                ?>
					<?php endif; ?>
	            </div>
	        </div>
	        <!-- close gallery carousel-item -->
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
		   	jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
		   		items: <?php echo esc_attr($visible); ?>,
		        navigation: true,
		        pagination: false,
		        autoPlay : <?php echo esc_attr($slideplay); ?>,
		   		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		    });     
		 });
    </script>
<?php
    return ob_get_clean();
}

// Pricing Tables
add_shortcode('pricingtable','pricing_func');
function pricing_func($atts, $content = null){
    extract( shortcode_atts( array(
      'title'   	=> '',
      'price'		=> '',
      'time'		=> '',
      'width'		=> '',
      'btntext'		=> '',
      'btnlink'		=> '',
      'featured'		=> '',
      'style'		=> '',
   ), $atts ) );

    ob_start(); ?>

    <div class="pricing-box <?php if($style == 'dark') echo 'pricing-dark';?><?php if($featured == 'yes') echo ' pricing-featured';?>" style="width: <?php echo esc_attr($width); ?>;">
    	<div class="title-row">
            <h4><?php echo htmlspecialchars_decode($title); ?></h4>
        </div>
        <div class="price-row">
            <h1><?php echo htmlspecialchars_decode($price); ?></h1>
            <?php if($time) { ?><span><?php echo htmlspecialchars_decode($time); ?></span><?php } ?>
        </div>
        <?php echo htmlspecialchars_decode($content); ?>
        <?php if($btnlink != '') { ?><div class="btn-row"><a href="<?php echo esc_url($btnlink); ?>" class="btn btn-primary"><?php echo htmlspecialchars_decode($btntext); ?></a></div><?php } ?>
    </div>

<?php
    return ob_get_clean();
}

// Project Slider - image carousel
add_shortcode('image_carousel', 'image_carousel_func');
function image_carousel_func($atts, $content = null){
 extract(shortcode_atts(array(
  'gallery'  =>  '',
 ), $atts));
 $id = uniqid( 'image-carousel-' );
 ob_start(); ?>

    <div class="logo-carousel">
        <ul id="<?php echo esc_attr($id); ?>" class="slides">
            <?php $img_ids = explode(",",$gallery);
            foreach( $img_ids AS $img_id ){
            $image_src = wp_get_attachment_image_src($img_id,'full'); ?>
	            <li><img src="<?php echo esc_url($image_src[0]); ?>" alt=""></li>
            <?php } ?>
        </ul>
    </div>       
    <script type="text/javascript">
	    jQuery(document).ready(function() {  
	   		'use strict';
		   	jQuery("#<?php echo esc_attr($id); ?>").owlCarousel({
		   		singleItem: true,
		      	navigation : true,
		   		pagination : false,
		   		autoPlay : true,
		   		autoHeight: true,
		   		navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		    });     
		 });
    </script>
<?php
    return ob_get_clean();
}

// Google Map
add_shortcode('ggmap','ggmap_func');
function ggmap_func($atts, $content = null){
    extract( shortcode_atts( array(
	  'height'		=> '',	
      'lat'   		=> '',
      'long'	  	=> '',
      'zoom'		=> '',
      'address'		=> '',
	  'mapcolor'	=> '',
	  'icon'		=> '',
	  'style'		=> 'dark',
	  'gmap_custom_style' => '',
   ), $atts ) );

       $id = uniqid('gmap-');		
	   $gmap_custom_style = rawurldecode( base64_decode( strip_tags( $gmap_custom_style ) ) );
	   $icon1 = wp_get_attachment_image_src($icon,'full');
	   $icon1 = $icon1[0];
   		
    ob_start(); ?>
    	 
    <div id="<?php echo esc_attr($id); ?>" style="<?php if($height) echo 'height: '.$height.'px;'; ?>"></div>
		
	<script type="text/javascript">	
		(function($) { "use strict"
		    $(document).ready(function(){
		     
		        var locations = [
					['<div class="infobox"><span><?php echo esc_js( $address );?><span></div>', <?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>, 2]
		        ];
			
				var map = new google.maps.Map(document.getElementById('<?php echo esc_attr($id); ?>'), {
				  	zoom: <?php echo esc_js( $zoom );?>,
					scrollwheel: false,
					navigationControl: true,
					mapTypeControl: false,
					scaleControl: false,
					draggable: true,			
					styles: 
						<?php if ($style == 'light') {
						echo '[{
					        "featureType": "road.highway",
					        "elementType": "labels",
					        "stylers": [
					            {
					                "hue": "#ffffff"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": 100
					            },
					            {
					                "visibility": "off"
					            }
					        ]
					    },
					    {
					        "featureType": "landscape.natural",
					        "elementType": "all",
					        "stylers": [
					            {
					                "hue": "#ffffff"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": 100
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "road",
					        "elementType": "all",
					        "stylers": [
					            {
					                "hue": "#ffe94f"
					            },
					            {
					                "saturation": 100
					            },
					            {
					                "lightness": 4
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "road.highway",
					        "elementType": "geometry",
					        "stylers": [
					            {
					                "hue": "#ffe94f"
					            },
					            {
					                "saturation": 100
					            },
					            {
					                "lightness": 4
					            },
					            {
					                "visibility": "on"
					            }
					        ]
					    },
					    {
					        "featureType": "water",
					        "elementType": "geometry",
					        "stylers": [
					            {
					                "hue": "#333333"
					            },
					            {
					                "saturation": -100
					            },
					            {
					                "lightness": -74
					            },
					            {
					                "visibility": "off"
					            }
					        ]
					    }]';
				}elseif($style=='dark'){ 
					echo '[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]';
				}else{
					echo $gmap_custom_style;
				} ?>,
					center: new google.maps.LatLng(<?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>),
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			
				var infowindow = new google.maps.InfoWindow();
			
				var marker, i;
			
				for (i = 0; i < locations.length; i++) {  
					marker = new google.maps.Marker({ 
						position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
						map: map ,
						icon: '<?php echo esc_js( $icon1 );?>',
						title: '<?php echo esc_js($address); ?>'
					});
				  	google.maps.event.addListener(marker, (function(marker, i) {
						return function() {
							infowindow.setContent(locations[i][0]);
							infowindow.open(map, marker);
						}
				  	})(marker, i));
				}
		        
		    });

		})(jQuery);   	
	</script>
<?php
    return ob_get_clean();
}