<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
global $archi_option; 
?>

/* 01 MAIN STYLES
****************************************************************************************************/
	/* default color: #FAB702 */

	<?php if($archi_option['preload-switch']!=false){ ?>
		/* Preload Colors */
		#jpreOverlay {background-color: <?php echo esc_attr( $archi_option['preload-background-color'] ); ?>;}
		#jprePercentage {color: <?php echo esc_attr( $archi_option['preload-text-color'] ); ?>;}
		#jpreBar{background-color: <?php echo esc_attr( $archi_option['main-color'] ); ?>;}
	<?php } ?>

	/* Subheader Colors */
	#subheader{
		<?php if ($archi_option['bg_allpage']['url'] != '') { ?>background-image:url(<?php echo esc_url($archi_option['bg_allpage']['url']); ?>); <?php } ?>
		background-color:<?php echo esc_attr($archi_option['subpage-bgcolor']); ?>;
	}
	#subheader h1, #subheader .crumb {
    	color: <?php echo esc_attr($archi_option['subpage-textcolor']); ?>;
    }	

	/* Header Colors */
	@media only screen and (min-width: 992px) {		
		header, header.header-bg, .de-navbar-left header, .de-navbar-left #de-sidebar, .mainmenu li li a, .mainmenu li li li a{
		  background-color:<?php echo esc_attr($archi_option['header-background-color']); ?>;
		}
		.de-navbar-left header .mainmenu li {
			border-color:<?php echo esc_attr($archi_option['header-border-color']); ?>;
		}
		header.smaller, header.header-bg.small{
		  background-color:<?php echo esc_attr($archi_option['header-small-background-color']); ?> !important;
		  border-bottom-color: <?php echo esc_attr($archi_option['header-small-border-bottom-color']); ?> !important; 
		}
		.de-navbar-left header.smaller{background-color:<?php echo esc_attr($archi_option['header-background-color']); ?> !important;}
		.no-subheader header{
			border-bottom-color: <?php echo esc_attr($archi_option['header-small-border-bottom-color']); ?>; 
		}
		#mainmenu a, .mainmenu li li a, .mainmenu li li li a, .mainmenu li a {
		  color: <?php echo esc_attr($archi_option['header-text-color']); ?>;
		}
	}
	.de-navbar-left header {border-bottom: solid 0px <?php echo esc_attr($archi_option['header-small-border-bottom-color']); ?>; }
	#mainmenu li a:after, #mainmenu li a.mPS2id-highlight, .mainmenu li a.mPS2id-highlight, .de-navbar-left header .mainmenu > li > a:hover {color: <?php echo esc_attr( $archi_option['main-color'] ); ?>;}
	nav ul#mainmenu > li.current-menu-ancestor > a, .mainmenu li.current-menu-item > a, nav ul.mainmenu > li.current-menu-ancestor > a {color: <?php echo esc_attr( $archi_option['main-color'] ); ?>;opacity:1;}
	#mainmenu li.current-menu-ancestor li.current-menu-ancestor > a, #mainmenu li li.active > a {background-color:<?php echo esc_attr( $archi_option['main-color'] ); ?>;color:#111;}

	/*Topbar Border Bottom Color */
	header .info {
		border-bottom-color: <?php echo esc_attr($archi_option['topbar-border-color']['rgba']); ?>;
		color: <?php echo esc_attr($archi_option['topbar-text-color']); ?>;
	}
	header .info ul.social-list li i {color: <?php echo esc_attr($archi_option['topbar-text-color']); ?>;}

	@media only screen and (max-width: 992px) {
		header.header-bg{
            background: <?php echo esc_attr($archi_option['header-background-color']); ?>;
        }
        #mainmenu li a, #mainmenu li li a{color: <?php echo esc_attr($archi_option['header-text-color']); ?>;}
	}

	/* Content Colors */	
	.bg-color, .de_light .bg-fixed.bg-color,
	section.call-to-action,
	#mainmenu li li a:hover,
	header.header-mobile #mainmenu li li.active a,
	.blog-list .date,
	.blog-read .date,
	.slider-info .text1,
	#filters a.selected,
	.btn-primary,
	.bg-id-color,
	.pagination .current,
	.pagination .current,
	.pagination .current:hover,
	.pagination .current:hover,
	.pagination .current:focus,
	.pagination .current span:focus,
	.dropcap,
	.fullwidthbanner-container a.btn,
	.feature-box-big-icon i,
	#testimonial-full,
	.icon-deco i,
	.blog-list .date-box .day,
	.bloglist .date-box .day,
	.feature-box-small-icon .border,
	.small-border,	
	.date-post,
	.team-list .small-border,
	.de-team-list .small-border,
	.btn-line:hover,a.btn-line:hover,
	.btn-line.hover,a.btn-line.hover,
	.owl-arrow span,
	.de-progress .progress-bar,
	#btn-close-x:hover,
	.box-fx .info,	
	.de_testi blockquote:before,
	.menu-sidebar-menu-container ul li.current_page_item a,
	.widget_nav_menu ul li:hover,
	.btn-more,
	.widget .small-border,
	.product img:hover,
	#btn-search,
	.form-submit #submit,
	#wp-calendar tbody td#today,
	.de_tab.tab_steps .de_nav li span,
	#services-list li a:hover,
	.de_light #services-list li.active,
	#services-list li.active, .button.btn.btn-line:hover,.woocommerce #respond input#submit, .woocommerce a.button, 
	.woocommerce button.button, .woocommerce input.button, .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, 
	.woocommerce button.button.alt, .woocommerce input.button.alt, .added_to_cart:hover, #back-to-top, .header-light #menu-btn:hover,
	.owl-theme .owl-controls .owl-buttons div, .mb_YTVTime, .socials-sharing a.socials-item:hover, a.btn-custom
	{
		background-color:<?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
		background-color: #DAD8DA;
		color: #5D6F93;
	}
	.post-image .owl-theme .owl-controls .owl-page.active span,
	ul li.menu-item-has-children ul li.active a, , .pricing-dark.pricing-box .price-row, 
	.de_light .pricing-dark.pricing-box .price-row {
	   background-color:<?php echo esc_attr( $archi_option['main-color'] ); ?>!important;
	}

	.feature-box i,
	#mainmenu li:hover > ul,
	.slider_text h1,
	.id-color,
	.pricing-box li h1,
	.title span,
	i.large:hover,
	.feature-box-small-icon-2 i,
	address div i,
	.pricing-dark .pricing-box li.price-row,
	.price,#mainmenu .current_page_parent.menu-item-has-children > a,
	#mainmenu a:hover,
	#mainmenu a.active,
	.dark .feature-box-small-icon i,
	a.btn-slider:after,
	.feature-box-small-icon i,
	a.btn-line:after,
	.team-list .social a,
	.de_contact_info i,
	.de_count,
	.dark .btn-line:hover:after, .dark a.btn-line:hover:after, .dark a.btn-line.hover:after,
	a.btn-text:after,
	.separator span  i,
	address div strong,
	address span strong,
	.de_testi_by,
	.pf_text,
	.dark .btn-line:after, .dark  a.btn-line:after,
	.crumb a,
	.post-info a,
	.comments_number,
	.date .c_reply a,
	.search-form:before,	
	h3 b,nav ul#mainmenu > li.current-menu-ancestor > a, .woocommerce .star-rating span,
	.woocommerce .star-rating:before, .woocommerce div.product p.price, .woocommerce div.product span.price,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .de_light.woocommerce p.stars a,
	.de_light.woocommerce p.stars a, .pricing-box h1, .de_light .pricing-box h1, h1.title strong, header .info ul.social-list li a:hover i,
	header .info ul.info-list li span, header .info ul.info-list li strong, header .info ul.info-list li i, .added_to_cart:after,
	.portfolio-icon:hover, .portfolio-icon a:hover i, ul li.menu-item-has-children ul li.active a,
	.de-navbar-left #subheader .crumb a, .mb_YTVPBar, .post-controls a:hover strong, .folio-style2 .folio-info h3 a:hover,
	.text-slider .text-item b
	{
		color:<?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}

	.pricing-dark.pricing-box h1, .de_light .pricing-dark.pricing-box h1 {color: #fff;}

	.feature-box i,
	#filters a:hover,
	#filters a.selected,
	.pagination .current,
	.pagination .current,
	.pagination .current:hover,
	.pagination .current:hover,
	.pagination .current:focus,
	.pagination .current:focus
	.feature-box-big-icon i:after,
	.social-icons i,
	.btn-line:hover,a.btn-line:hover,
	.btn-line.hover,a.btn-line:hover,
	.product img:hover,
	.wpcf7 input[type=text]:focus,.wpcf7 input[type=email]:focus,.wpcf7 input[type=tel]:focus,.wpcf7 textarea:focus, #search:focus,
	.de_light .wpcf7  input[type=text]:focus,.de_light .wpcf7  input[type=tel]:focus,.de_light .wpcf7 textarea:focus,
	.de_light .wpcf7 #search:focus, .comment-form input[type='text']:focus,.comment-form input[type='email']:focus,.comment-form textarea:focus, 
	.socials-sharing a.socials-item:hover
	{
		border-color:<?php echo esc_attr( $archi_option['main-color'] ); ?>;
		outline: 0px;
	}

	.comment-form textarea:focus{
		border:1px solid <?php echo esc_attr( $archi_option['main-color'] ); ?>!important;
	}

	.box-fx .inner,
	.dark .box-fx .inner,
	.post-image,
	.arrow-up
	{
		border-bottom-color:<?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}

	.arrow-down{
		border-top-color:<?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}

	.callbacks_nav {
		background-color:<?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}

	.de_tab .de_nav li span {
		border-top: 3px solid <?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}

	.feature-box-big-icon i:after {
		border-color: <?php echo esc_attr( $archi_option['main-color'] ); ?> transparent; /*same colour as the lower of the bubble's gradient*/
	}

	.de_review li.active img{
		border:solid 4px <?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}
	.post-text blockquote {
	    border-left: 5px solid <?php echo esc_attr( $archi_option['main-color'] ); ?>;
	}

	/**** Custom CSS Footer ****/
	footer {
	    background: <?php echo esc_attr($archi_option['footer_bgcolor']); ?>;
	    color: <?php echo esc_attr($archi_option['footer_textcolor']); ?>;
	}
	.subfooter {
	    background: <?php echo esc_attr($archi_option['footer_bottom_bgcolor']); ?>;
	}

	<?php if($archi_option['archicrumb-switch']!=true){ ?>
		/*CSS Code Disable or Enable Breadcrumb*/	
		#subheader .crumb {display:none;}
	<?php } ?>

	@media only screen and (max-width: 992px) {
		/* Styling Mobile Side Navigation */
        body.de-navbar-left .side-header, body.de-navbar-left  header.side-header .mainmenu{ background: <?php echo esc_attr($archi_option['hm-background-color']); ?>;}
        body.de-navbar-left  header.side-header .mainmenu a{color: <?php echo esc_attr($archi_option['hm-text-color']); ?>;}
        body.de-navbar-left  header.side-header .mainmenu > li {
        	border-bottom-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;
        }
        .mainmenu li ul{border-top-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;}
        .mainmenu li ul li a{
        	border-left-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;
    		border-bottom-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;
        }
        #menu-btn:hover{
        	background: <?php echo esc_attr( $archi_option['main-color'] ); ?>;
        }

        /* Styling Mobile Header */
        header.header-bg, header, header.transparent {background: <?php echo esc_attr($archi_option['hm-background-color']); ?>;}
        header #mainmenu li ul li:first-child{border-top-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;}
        #mainmenu li{border-bottom-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;}
        #mainmenu li ul li a{
        	border-left-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;
    		border-bottom-color: <?php echo esc_attr($archi_option['hm-border-color']); ?>;
        }
        #mainmenu li a, #mainmenu li li a{
        	color: <?php echo esc_attr($archi_option['hm-text-color']); ?>;
        }
    }