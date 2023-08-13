<?php
// Customizer Default Data

if ( ! function_exists( 'amttheme_generate_defaults' ) ) {
    function amttheme_generate_defaults() {
        $customizer_defaults = array(

            // General            
            'logo'                                  => '',
            'logo_light'          	                => '',
            'logo_width'                            => '',
            'mobile_logo_width'                     => '',
			'image_blend'			                => 'normal',			
			'container_width'		                => '',
            'preloader'          	                => 0,
            'preloader_image'    	                => '',
			'preloader_bg_color' 	                => '',
            'back_to_top'     		                => 1,
            'display_no_preview_image'              => 0,

            // Contact Socials
            'phone'                         => '',
            'phone_show'   	                => 1,
            'social_show'                   => 1,
            'menu_show'                     => 0,
            'menu_show2'                    => 1,
            'email'   			            => '',
            'email_show'                    => 1,
            'address_show'                  => 1,
            'topbar_menu'                   => 1,
            'topbar_menu2'                  => 1,
            'address'   		            => '',
            'sidetext'   		            => '',
            'phone_label'   	            => '',
            'address_label'                 => '',
            'sidetext_label'   	            => '',
            'social_label'   	            => '',			
            'social_facebook'  	            => '',
            'social_twitter'   	            => '',
            'social_linkedin'               => '',
            'social_behance' 	            => '',
            'social_dribbble'  	            => '',
            'social_youtube'                => '',
            'social_pinterest'              => '',
            'social_instagram'              => '',
            'social_skype'                  => '',
            'social_rss'       	            => '',
            'social_snapchat'               => '',
			
			// Color
			'primary_color' 			=> '',
			'secondary_color' 			=> '',
			'body_color' 				=> '',
			'menu_dark_color' 			=> '',
            'menu_light_color'          => '',
			'menu_hover_color' 			=> '',			
			'submenu_color' 			=> '',
			'submenu_hover_color' 		=> '',
			'submenu_bgcolor' 			=> '',
			'submenu_hover_bgcolor' 	=> '',

            //dark color mode
            'color_mode'                => 0,
            'code_mode_type'            => 'light-mode',
            'dark_mode_bgcolor'         => '',
            'dark_mode_light_bgcolor'   => '',
            'dark_mode_color'           => '',
            'dark_mode_border_color'    => '',

			// news ticker
			'ticker_enable' 			=> 1,
			'ticker_title_text' 		=> 'TRENDING',
			'ticker_delay' 				=> '2000',
			'ticker_speed' 				=> '0.10',
			'ticker_style' 				=> 'reveal',
			'ticker_post_number' 		=> 5,
			'ticker_swiper_bg_color' 	=> '',
			'ticker_text_color' 		=> '',
			'ticker_text_hover_color' 	=> '',

			// reading progress bar
			'scroll_indicator_enable' 	=> 0,
			'scroll_indicator_bgcolor' 	=> '',
			'scroll_indicator_height' 	=> 4,
			'scroll_indicator_position' => 'top',

            // Topbar Color
            'topbar_bg_color'          => '',         
            'topbar_link_color'        => '',          
            'topbar_link_hover_color'  => '', 
			'topbar_text_color'	       => '',
            'topbar_icon_color'        => '',
            

            // header
			'top_bar'  					=> 0,
			'top_bar_style'  			=> 1,
			'top_bar_date'  			=> 1,

			'top_bar_update'  			=> 1,
            'topbar_menu'               => '',
			'top_bar_bgcolor'			=> '',
			'top_bar_color'				=> '',

			'mobile_topbar'  			=> 0,
			'mobile_date'  				=> 1,
			'mobile_phone'  			=> 1,
			'mobile_email'  			=> 0,
			'mobile_address'  			=> 1,
			'mobile_social'  			=> 0,
			'mobile_search'  			=> 0,
			
            'header_bg_color'           => '',
            'header_menu_color'         => '',
            'header_menu_hover_color'   => '',
			'sticky_menu'       		=> 1,
			'header_opt'       			=> 1,
            'header_style'      		=> 2,
            'search_icon'      			=> 0,
            'cart_icon'                 => 0,
            'nav_button'                => 0,
            'nav_button_txt'            => 'Appointment',
            'vertical_menu_icon' 		=> 0,
            'offcanvas_bgtype'          => 'offcanvas_img',
            'offcanvas_color'           => '#0f1012',
            'offcanvas_img'             => '',

            // Ad option
            'header_ad_heading'       	=> '',
            'ad_type'       			=> 'adimage',
            'adimage'       			=> '',
            'adcustom'       			=> '',
            'ad_img_link'       		=> '',
            'head_ad_option'       		=> 0,
            'ad_img_target'       		=> 0,

            'before_head_ad_option'     => 0,
            'before_ad_type'            => 'before_adimage',
            'before_adimage'            => '',
            'before_adcustom'           => '',
            'before_ad_img_link'        => '',
            'before_ad_img_target'      => 0,

            'before_post_ad_heading'    => '',
            'before_post_ad_option'     => 0,
            'ad_before_post_type'      	=> 'post_before_adimage',
            'post_before_adimage'      	=> '',
            'post_before_ad_img_link'   => '',
            'post_before_ad_img_target' => 0,
            'post_before_adcustom'      => '',

            'after_post_ad_heading'     => '',
            'after_post_ad_option'      => 0,
            'ad_after_post_type'      	=> 'post_after_adimage',
            'post_after_adimage'      	=> '',
            'post_after_ad_img_link'    => '',
            'post_after_ad_img_target'  => 0,
            'post_after_adcustom'       => '',

			
			// Footer All   
            'footer_area'                => 1, 
            'footer_style'               => 1,        
            'copyright_area'             => 1,
            'copyright_text'      		 => '&copy; ' . date('Y') . ' medixare. All Rights Reserved by <a target="_blank" rel="nofollow" href="' . MEDIXARE_AUTHOR_URI . '">AddonMonster</a>',
            'copyright_bg_color'         => '',
            'copyright_text_color'       => '',
            'copyright_link_color'       => '',
            'copyright_link_hover_color' => '',


            // Footer One
            'f1_widget_area'             => 4,
            'f1_wc1'                     => 3,
            'f1_wc2'                     => 3,
            'f1_wc3'                     => 3,
            'f1_wc4'                     => 3,            
            'footer1_title_color'        => '',
            'footer1_title_shape_color'  => '',
            'footer1_text_color'         => '',
            'footer1_link_color'         => '',
            'footer1_link_hover_color'   => '',
            'footer1_link_hover_bg_color'=> '',
            'footer1_bg_type'            => 'footer1_bg_color',
            'footer1_bg_color'           => '',
            'footer1_bg_img'             => '',
            'footer1_overlay_opacity'    => 0.75,   


            // Footer Two
            'f2_widget_area'             => 4,
            'f2_wc1'                     => 3,
            'f2_wc2'                     => 3,
            'f2_wc3'                     => 3,
            'f2_wc4'                     => 3,
            'footer2_title_color'        => '',
            'footer2_title_shape_color'  => '',
            'footer2_text_color'         => '',
            'footer2_link_color'         => '',
            'footer2_link_hover_color'   => '',
            'footer2_link_hover_bg_color'=> '',
            'footer2_bg_type'            => 'footer2_bg_color',
            'footer2_bg_color'           => '',
            'footer2_bg_img'             => '',
            'footer2_overlay_opacity'    => 0.75,       
   			
			// Banner 
			'breadcrumb_link_color' 	  => '',
			'breadcrumb_link_hover_color' => '',
			'breadcrumb_active_color' 	  => '',
			'breadcrumb_seperator_color'  => '',
			'banner_bg_opacity' 		  => 0,
			'banner_top_padding'    	  => 110,
            'banner_bottom_padding' 	  => 110,
            'breadcrumb_active' 		  => 0,
			
			// Post Type Slug
			'team_slug' 				=> 'team',
			'team_cat_slug' 			=> 'team-category',
			'service_slug' 				=> 'service',
			'service_cat_slug' 			=> 'service-category',
	
			
            // Page Layout Setting 
            'page_layout'               => 'full-width',
			'page_padding_top'          => 80,
            'page_padding_bottom'       => 80,
            'page_banner'               => 1,
            'page_breadcrumb'           => 0,
            'page_bgtype'               => 'page_bgcolor',
            'page_bgcolor'              => '#000000',
            'page_bgimg'                => '',
            'page_page_bgimg'           => '',
            'page_page_bgcolor'         => '#ffffff',
			
			//Blog Layout Setting 
            'blog_layout'               => 'right-sidebar',
			'blog_padding_top'          => 80,
            'blog_padding_bottom'       => 80,
            'blog_banner'               => 1,
            'blog_breadcrumb'           => 0,			
			'blog_bgtype'               => 'blog_bgcolor',
            'blog_bgcolor'              => '#000000',
            'blog_bgimg'                => '',
            'blog_page_bgimg'           => '',
            'blog_page_bgcolor'         => '#ffffff',
            'button_text'               => 'Read More',
			
			//Single Post Layout Setting 
			'single_post_layout'         => 'right-sidebar',
			'single_post_padding_top'    => 80,
            'single_post_padding_bottom' => 80,
            'single_post_banner'         => 1,
            'single_post_breadcrumb'     => 0,			
			'single_post_bgtype'         => 'single_post_bgcolor',
            'single_post_bgcolor'        => '#000000',
            'single_post_bgimg'          => '',
            'single_post_page_bgimg'     => '',
            'single_post_page_bgcolor'   => '#ffffff',

            //service Layout Setting 
			'service_archive_layout'         => 'full-width',
            'service_archive_padding_top'    => 80,
            'service_archive_padding_bottom' => 80,
            'service_archive_banner'         => 1,
            'service_archive_breadcrumb'     => 0,			
			'service_archive_bgtype'         => 'service_archive_bgcolor',
            'service_archive_bgcolor'        => '#000000',
            'service_archive_bgimg'          => '',
            'service_archive_page_bgimg'     => '',
            'service_archive_page_bgcolor'   => '#ffffff',

            //Team Layout Setting 
			'team_archive_layout'         => 'full-width',
			'team_archive_padding_top'    => 80,
            'team_archive_padding_bottom' => 80,
            'team_archive_banner'         => 1,
            'team_archive_breadcrumb'     => 0,			
			'team_archive_bgtype'         => 'team_archive_bgcolor',
            'team_archive_bgcolor'        => '#000000',
            'team_archive_bgimg'          => '',
            'team_archive_page_bgimg'     => '',
            'team_archive_page_bgcolor'   => '#ffffff',
			
			//Service Single Layout Setting 
			'service_layout'                 => 'full-width',
			'service_padding_top'            => 80,
            'service_padding_bottom'         => 80,
            'service_banner'                 => 1,
            'service_breadcrumb'             => 0,			
			'service_bgtype'                 => 'service_bgcolor',
            'service_bgcolor'                => '#000000',
            'service_bgimg'                  => '',
            'service_page_bgimg'             => '',
            'service_page_bgcolor'           => '#ffffff',
			//Team Single Layout Setting 
			'team_layout'                 => 'full-width',
			'team_padding_top'            => 80,
            'team_padding_bottom'         => 80,
            'team_banner'                 => 1,
            'team_breadcrumb'             => 0,			
			'team_bgtype'                 => 'team_bgcolor',
            'team_bgcolor'                => '#000000',
            'team_bgimg'                  => '',
            'team_page_bgimg'             => '',
            'team_page_bgcolor'           => '#ffffff',
			
			//Search Layout Setting 
			'search_layout' => 'right-sidebar',
			'search_padding_top'    => 80,
            'search_padding_bottom' => 80,
            'search_banner' => 1,
            'search_breadcrumb' => 0,			
			'search_bgtype' => 'search_bgcolor',
            'search_bgcolor' => '#000000',
            'search_bgimg' => '',
            'search_page_bgimg' => '',
            'search_page_bgcolor' => '#ffffff',
            'search_excerpt_length' => 40,
			
			//Error Layout Setting 
			'error_padding_top'    => 80,
            'error_padding_bottom' => 80,
            'error_banner' => 1,
            'error_breadcrumb' => 0,			
			'error_bgtype' => 'error_bgcolor',
            'error_bgcolor' => '#000000',
            'error_bgimg' => '',
            'error_page_bgimg' => '',
            'error_page_bgcolor' => '#ffffff',

            // Blog Archive
			'blog_style'				=> 'style5',
            'blog_loadmore'             => 'pagination',
            'load_more_limit'           => 4,
			'post_banner_title'  		=> '',
			'post_content_limit'  		=> '20',
			'blog_content'  			=> 1,
			'blog_date'  				=> 1,
			'blog_author_name'  		=> 1,
			'blog_comment_num'  		=> 0,
			'blog_cats'  				=> 1,
			'blog_view'  				=> 0,
			'blog_length'  				=> 0,
            'blog_post_sort'            => 'recent',
			'author_bg_image'  			=> '',
			'blog_animation'  			=> 'hide',
			'blog_animation_effect'  	=> 'fadeInUp',
			
			// Post
            'post_style'                => 'style1',
			'scroll_post_enable'		=> 0,
            'post_scroll_limit'         => 1,
			'post_featured_image'		=> 1,
			'post_author_name'			=> 1,
			'post_date'					=> 1,
			'post_comment_num'			=> 1,
			'post_cats'					=> 1,
			'post_tags'					=> 1,
			'post_share'				=> 1,
			'post_links'				=> 0,
			'post_author_bio'			=> 0,
			'post_view'					=> 1,
			'post_length'				=> 0,
			'post_published'			=> 0,
			'show_related_post'			=> 0,
			'show_related_post_number'	=> 5,
			'related_title'				=> 'Related Post',
			'show_related_post_title_limit'	=> 8,
			'related_post_query'		=> 'cat',
			'related_post_sort'			=> 'recent',
			'post_time_format'			=> 'modern',
			'related_blog_auto_play'	    => 1,
			'related_blog_auto_play_speed'	=> 1500,            
            'related_blog_auto_play_delay'  => 1200,            

			
			// Post Share
			'post_share_facebook' 		=> 1,
			'post_share_twitter' 		=> 1,
			'post_share_youtube' 		=> 1,
			'post_share_linkedin' 		=> 1,
			'post_share_pinterest' 		=> 0,
			'post_share_whatsapp' 		=> 1,
			'post_share_cloud' 			=> 1,
			'post_share_dribbble' 		=> 1,
			'post_share_tumblr' 		=> 0,
			'post_share_reddit' 		=> 0,

			// Service
			'service_archive_style' 		=> 'style1',
			'service_arexcerpt_limit' 		=> 12,
			'service_icon_display' 			=> 0,
			'service_ar_excerpt' 			=> 0,
			'service_ar_button' 			=> 0,
			'show_related_service' 		    => 1,
			'service_related_title' 		=> 'Related Service',
			'related_service_number' 		=> 5,
			'related_service_title_limit' 	=> 5,

			// Team single
			'team_social' 			    => 1,
			'team_position' 			=> 1,
			'team_excerpt' 			    => 1,
			'team_awards' 				=> 1,
			'team_skill' 				=> 1,
			'team_education' 			=> 1,
			'team_excerpt_limit' 		=> 30,
            
			// Team
			'team_archive_style' 		=> 'style1',
			'team_arexcerpt_limit' 		=> 12,
			'team_ar_excerpt' 			=> 0,
			'team_ar_position' 			=> 1,
			'team_ar_social' 			=> 1,
			'team_info' 				=> 1,
			'show_related_team' 		=> 1,
			'team_related_title' 		=> 'Related Team',
			'related_team_number' 		=> 5,
			'related_team_title_limit' 	=> 5,
            'related_team_auto_play'        => 1,
            'related_team_auto_play_speed'  => 1500,            
            'related_team_auto_play_delay'  => 1200, 
			
            // Error
            'error_bodybg_color' 		=> '#ffffff',
            'error_text1_color' 		=> '',
            'error_text2_color' 		=> '',
			'error_image' 				=> '',
            'error_text1' 				=> 'Oops! That page cannot be found',
            'error_text2' 				=> 'Sorry, but the page you are looking for does not existing',
            'error_buttontext' 			=> 'GO TO HOME PAGE',
            'error_animation' 			=> 'hide',
            'error_animation_effect' 	=> 'fadeInUp',

            //Shop Archive Layout Setting 
            'shop_layout' => 'left-sidebar',
            'shop_padding_top'    => 80,
            'shop_padding_bottom' => 80,
            'shop_banner' => 1,
            'shop_breadcrumb' => 0,         
            'shop_bgtype' => 'bgcolor',
            'shop_bgcolor' => '#f7f7f7',
            'shop_bgimg' => '',
            'shop_page_bgimg' => '',
            'shop_page_bgcolor' => '#ffffff',

            'products_cols_width' => 4,
            'products_per_page' => 8,
            'wc_shop_cart_icon' => 1,
            'wc_shop_quickview_icon' => 1,
            'wc_shop_wishlist_icon' => 0,
            'wc_shop_compare_icon' => 0,
            'wc_shop_rating' => 0,
            'related_shop_auto_play'        => 1,
            'related_shop_auto_play_speed'  => 1500,            
            'related_shop_auto_play_delay'  => 1200, 
            
            //Product Single Layout Setting 
            'product_layout' => 'full-width',
            'product_padding_top'    => 80,
            'product_padding_bottom' => 80,
            'product_banner' => 1,
            'product_breadcrumb' => 0,          
            'product_bgtype' => 'bgcolor',
            'product_bgcolor' => '#f7f7f7',
            'product_bgimg' => '',
            'product_page_bgimg' => '',
            'product_page_bgcolor' => '#ffffff',

            'wc_product_social_icon' => 0,
            'wc_product_meta' => 1,
            'wc_product_wishlist_icon' => 0,
            'wc_product_compare_icon' => 0,
            'wc_product_quickview_icon' => 1,
            'related_woo_product' => 1,
            'related_product_title' => 'Related Products',
            
            // Typography
            'typo_body' => json_encode(
                array(
                    'font' => 'Manrope',
                    'regularweight' => 'normal',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '1.9',

            //Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Manrope',
                    'regularweight' => '500',
                )
            ),
            'typo_menu_size' => '15px',
            'typo_menu_height'=> '1.9',

            //Sub Menu Typography
            'typo_sub_menu' => json_encode(
                array(
                    'font' => 'Manrope',
                    'regularweight' => '500',
                )
            ),
            'typo_submenu_size' => '14px',
            'typo_submenu_height'=> '1.9',


            // Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Manrope',
                    'regularweight' => '500',
                )
            ),
            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h1_size' => '40px',
            'typo_h1_height' => '1.2',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h2_size' => '36px',
            'typo_h2_height'=> '1.4',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h3_size' => '24px',
            'typo_h3_height'=> '1.4',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h4_size' => '20px',
            'typo_h4_height'=> '1.5',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h5_size' => '16px',
            'typo_h5_height'=> '1.5',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '500',
                )
            ),
            'typo_h6_size' => '14px',
            'typo_h6_height'=> '1.6',

            
        );

        return apply_filters( 'amttheme_customizer_defaults', $customizer_defaults );
    }
}