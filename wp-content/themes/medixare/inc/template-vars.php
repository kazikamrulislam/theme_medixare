<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'medixare_template_vars' );
if( !function_exists( 'medixare_template_vars' ) ) {
    function medixare_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'product':
                $prefix = 'product';
                break;
                case 'medixare_team':
                $prefix = 'team';
                break;  
                case 'medixare_service':
                $prefix = 'service';
                break; 
                default:
                $prefix = 'single_post';
                break;
            }
			
			$layout_settings    = get_post_meta( $post_id, 'medixare_layout_settings', true );
            
            MedixareTheme::$layout = ( empty( $layout_settings['medixare_layout'] ) || $layout_settings['medixare_layout']  == 'default' ) ? MedixareTheme::$options[$prefix . '_layout'] : $layout_settings['medixare_layout'];
			
            MedixareTheme::$top_bar = ( empty( $layout_settings['medixare_top_bar'] ) || $layout_settings['medixare_top_bar'] == 'default' ) ? MedixareTheme::$options['top_bar'] : $layout_settings['medixare_top_bar'];
            
            MedixareTheme::$top_bar_style = ( empty( $layout_settings['medixare_top_bar_style'] ) || $layout_settings['medixare_top_bar_style'] == 'default' ) ? MedixareTheme::$options['top_bar_style'] : $layout_settings['medixare_top_bar_style'];
			
			MedixareTheme::$header_opt = ( empty( $layout_settings['medixare_header_opt'] ) || $layout_settings['medixare_header_opt'] == 'default' ) ? MedixareTheme::$options['header_opt'] : $layout_settings['medixare_header_opt'];
            
            MedixareTheme::$header_style = ( empty( $layout_settings['medixare_header'] ) || $layout_settings['medixare_header'] == 'default' ) ? MedixareTheme::$options['header_style'] : $layout_settings['medixare_header'];
			
            MedixareTheme::$footer_style = ( empty( $layout_settings['medixare_footer'] ) || $layout_settings['medixare_footer'] == 'default' ) ? MedixareTheme::$options['footer_style'] : $layout_settings['medixare_footer'];
			
			MedixareTheme::$footer_area = ( empty( $layout_settings['medixare_footer_area'] ) || $layout_settings['medixare_footer_area'] == 'default' ) ? MedixareTheme::$options['footer_area'] : $layout_settings['medixare_footer_area'];

            MedixareTheme::$copyright_area = ( empty( $layout_settings['medixare_copyright_area'] ) || $layout_settings['medixare_copyright_area'] == 'default' ) ? MedixareTheme::$options['copyright_area'] : $layout_settings['medixare_copyright_area'];
			
            $padding_top = ( empty( $layout_settings['medixare_top_padding'] ) || $layout_settings['medixare_top_padding'] == 'default' ) ? MedixareTheme::$options[$prefix . '_padding_top'] : $layout_settings['medixare_top_padding'];
			
            MedixareTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['medixare_bottom_padding'] ) || $layout_settings['medixare_bottom_padding'] == 'default' ) ? MedixareTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['medixare_bottom_padding'];
			
            MedixareTheme::$padding_bottom = (int) $padding_bottom;
			
            MedixareTheme::$has_banner = ( empty( $layout_settings['medixare_banner'] ) || $layout_settings['medixare_banner'] == 'default' ) ? MedixareTheme::$options[$prefix . '_banner'] : $layout_settings['medixare_banner'];
            
            MedixareTheme::$has_breadcrumb = ( empty( $layout_settings['medixare_breadcrumb'] ) || $layout_settings['medixare_breadcrumb'] == 'default' ) ? MedixareTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['medixare_breadcrumb'];
            
            MedixareTheme::$bgtype = ( empty( $layout_settings['medixare_banner_type'] ) || $layout_settings['medixare_banner_type'] == 'default' ) ? MedixareTheme::$options[$prefix . '_bgtype'] : $layout_settings['medixare_banner_type'];
            
            MedixareTheme::$bgcolor = empty( $layout_settings['medixare_banner_bgcolor'] ) ? MedixareTheme::$options[$prefix . '_bgcolor'] : $layout_settings['medixare_banner_bgcolor'];
			
			if( !empty( $layout_settings['medixare_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['medixare_banner_bgimg'], 'full', true );
                MedixareTheme::$bgimg = $attch_url[0];
            } elseif( !empty( MedixareTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( MedixareTheme::$options[$prefix . '_bgimg'], 'full', true );
                MedixareTheme::$bgimg = $attch_url[0];
            } else {
                MedixareTheme::$bgimg = MEDIXARE_IMG_URL . 'breadcrumb-bg-3.jpg';
            }
			
            MedixareTheme::$pagebgcolor = empty( $layout_settings['medixare_page_bgcolor'] ) ? MedixareTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['medixare_page_bgcolor'];			
            
            if( !empty( $layout_settings['medixare_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['medixare_page_bgimg'], 'full', true );
                MedixareTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( MedixareTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( MedixareTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                MedixareTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                MedixareTheme::$options[$prefix . '_layout'] = 'full-width';
            } elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            } elseif( is_post_type_archive( "medixare_team" ) || is_tax( "medixare_team_category" ) ) {
                $prefix = 'team_archive';
            } elseif( is_post_type_archive( "medixare_service" ) || is_tax( "medixare_service_category" ) ) {
                $prefix = 'service_archive'; 
            }else {
                $prefix = 'blog';
            }
            
            MedixareTheme::$layout         		= MedixareTheme::$options[$prefix . '_layout'];
            MedixareTheme::$top_bar        		= MedixareTheme::$options['top_bar'];
            MedixareTheme::$header_opt      		= MedixareTheme::$options['header_opt'];
            MedixareTheme::$footer_area     		= MedixareTheme::$options['footer_area'];
            MedixareTheme::$copyright_area         = MedixareTheme::$options['copyright_area'];
            MedixareTheme::$top_bar_style  		= MedixareTheme::$options['top_bar_style'];
            MedixareTheme::$header_style   		= MedixareTheme::$options['header_style'];
            MedixareTheme::$footer_style   		= MedixareTheme::$options['footer_style'];
            MedixareTheme::$padding_top    		= MedixareTheme::$options[$prefix . '_padding_top'];
            MedixareTheme::$padding_bottom 		= MedixareTheme::$options[$prefix . '_padding_bottom'];
            MedixareTheme::$has_banner     		= MedixareTheme::$options[$prefix . '_banner'];
            MedixareTheme::$has_breadcrumb 		= MedixareTheme::$options[$prefix . '_breadcrumb'];
            MedixareTheme::$bgtype         		= MedixareTheme::$options[$prefix . '_bgtype'];
            MedixareTheme::$bgcolor        		= MedixareTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( MedixareTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( MedixareTheme::$options[$prefix . '_bgimg'], 'full', true );
                MedixareTheme::$bgimg = $attch_url[0];
            } else {
                MedixareTheme::$bgimg = MEDIXARE_IMG_URL . 'banner.jpg';
            }
			
            MedixareTheme::$pagebgcolor = MedixareTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( MedixareTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( MedixareTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                MedixareTheme::$pagebgimg = $attch_url[0];
            }
			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'medixare_body_classes' );
if( !function_exists( 'medixare_body_classes' ) ) {
    function medixare_body_classes( $classes ) {
		
		// Header
    	if ( MedixareTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}
		
        $classes[] = 'header-style-'. MedixareTheme::$header_style;		
        $classes[] = 'footer-style-'. MedixareTheme::$footer_style;

        if ( MedixareTheme::$top_bar == 1 || MedixareTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. MedixareTheme::$top_bar_style;
        }
        
        $classes[] = ( MedixareTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( MedixareTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if(class_exists('Woocommerce')){
            $classes[] = 'rt-woocommerce';
        }
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . MedixareTheme::$options['post_style'];
        }
        return $classes;
    }
}