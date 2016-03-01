<?php

// Main Styles
function thb_main_styles() {
		 $url_prefix = is_ssl() ? 'https:' : 'http:';
		 // Register 
		 wp_register_style('thb-foundation', THB_THEME_ROOT . '/assets/css/foundation.min.css', null, null);
		 wp_register_style("thb-fa", $url_prefix.'//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', null, null);
		 wp_register_style("thb-app", THB_THEME_ROOT .  "/assets/css/app.css", null, null);
		 
		 // Enqueue
		 wp_enqueue_style('thb-foundation');
		 wp_enqueue_style('thb-fa');
		 wp_enqueue_style('thb-app');
		 wp_enqueue_style('style', get_stylesheet_uri(), null, null);	
		 
		 $thb_custom_css = '
		   .arrow_pointer .hesperiden.tparrows.tp-leftarrow,
		   .arrow_pointer .carousel .owl-controls .owl-nav div.owl-prev {
		     cursor: url("'.THB_THEME_ROOT.'/assets/img/arrow-left.svg"), 
		     				 url("'.THB_THEME_ROOT.'/assets/img/arrow-left.cur"), e-resize;
		   }
		   .arrow_pointer .hesperiden.tparrows.tp-rightarrow,
		   .arrow_pointer .carousel .owl-controls .owl-nav div.owl-next {
		     cursor: url("'.THB_THEME_ROOT.'/assets/img/arrow-right.svg"), 
		     				 url("'.THB_THEME_ROOT.'/assets/img/arrow-right.cur"), w-resize;
		   }
		   .arrow_pointer.background--dark .hesperiden.tparrows.tp-leftarrow,
		   .background--dark .arrow_pointer .carousel .owl-controls .owl-nav div.owl-prev,
		   .arrow_pointer .carousel.background--dark .owl-controls .owl-nav div.owl-prev,
		   .arrow_pointer.background--dark .carousel .owl-nav div.owl-prev {
		     cursor: url("'.THB_THEME_ROOT.'/assets/img/arrow-left-dark.svg"),
		     				 url("'.THB_THEME_ROOT.'/assets/img/arrow-left-dark.cur"), w-resize;
		   }
		   .arrow_pointer.background--dark .hesperiden.tparrows.tp-rightarrow,
		   .background--dark .arrow_pointer .carousel .owl-controls .owl-nav div.owl-next,
		   .arrow_pointer .carousel.background--dark .owl-controls .owl-nav div.owl-next,
		   .arrow_pointer.background--dark .carousel .owl-nav div.owl-next {
		     cursor: url("'.THB_THEME_ROOT.'/assets/img/arrow-right-dark.svg"),
		     				 url("'.THB_THEME_ROOT.'/assets/img/arrow-right-dark.cur"), e-resize;
		   }
		   .product-images.carousel .owl-item.active a {
		     cursor: url("'.THB_THEME_ROOT.'/assets/img/zoom.svg"), 
		     				 url("'.THB_THEME_ROOT.'/assets/img/zoom.cur"), ew-resize;
		   }
		  ';
		 wp_add_inline_style( 'thb-app', $thb_custom_css );
}

add_action('wp_enqueue_scripts', 'thb_main_styles');

// Main Scripts
function thb_register_js() {
	
	if (!is_admin()) {
		$url_prefix = is_ssl() ? 'https:' : 'http:';
		// Register 
		wp_register_script('modernizr', THB_THEME_ROOT . '/assets/js/plugins/modernizr.custom.min.js', 'jquery', null);
		wp_register_script('gmapdep', $url_prefix.'//maps.google.com/maps/api/js?sensor=false', false, null, false);
		wp_register_script('vendor', THB_THEME_ROOT . '/assets/js/vendor.min.js', 'jquery', null, TRUE);
		wp_register_script('app', THB_THEME_ROOT . '/assets/js/app.min.js', 'jquery', null, TRUE);
		
		// Enqueue
		if ( is_page_template( 'template-contact.php' ) ) {
			wp_enqueue_script('gmapdep');
		}
		wp_enqueue_script('modernizr');
		wp_enqueue_script('vendor');
		wp_enqueue_script('app');
		wp_localize_script( 'app', 'themeajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
		
		// YITH Ajax Product Search
		if ( class_exists( 'YITH_WCAS' ) ) {
			wp_enqueue_script('yith_wcas_frontend' );
		}
		
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'thb_register_js');

// Admin Scripts
function thb_admin_scripts() {
	wp_register_script('thb-admin-meta', THB_THEME_ROOT .'/assets/js/admin-meta.min.js', array('jquery'));
	wp_enqueue_script('thb-admin-meta');
	
	wp_register_style("thb-admin-css", THB_THEME_ROOT . "/assets/css/admin.css");
	wp_enqueue_style('thb-admin-css'); 
	if (class_exists('WPBakeryVisualComposerAbstract')) {
		wp_enqueue_style( 'vc_extra_css', THB_THEME_ROOT . '/assets/css/vc_extra.css' );
	}
}
add_action('admin_enqueue_scripts', 'thb_admin_scripts');

/* WooCommerce */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
?>