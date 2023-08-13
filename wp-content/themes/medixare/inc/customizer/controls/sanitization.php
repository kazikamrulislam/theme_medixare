<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    /* Related Post*/
    if (!function_exists('amttheme_is_related_post_enabled')) {
        function amttheme_is_related_post_enabled()
        {
            $show_related_post = get_theme_mod('show_related_post');
            if (empty($show_related_post)) {
                return false;
            }
            return true;
        }
    }

    if (!function_exists('amttheme_is_sticky_menu_enabled')) {
        function amttheme_is_sticky_menu_enabled()
        {
            $show_menu_color = get_theme_mod('sticky_menu');
            if (empty($show_menu_color)) {
                return false;
            }
            return true;
        }
    }

    if (!function_exists('amttheme_is_sticky_menu_enabled')) {
        function amttheme_is_sticky_menu_enabled()
        {
            $show_menu_hover_color = get_theme_mod('sticky_menu');
            if (empty($show_menu_hover_color)) {
                return false;
            }
            return true;
        }
    }

    /* Show or hide Menu Button Control */
    if ( ! function_exists( 'show_button_control' ) ) {
        function show_button_control() {
            $header_style = get_theme_mod('header_style');
            if ( ( $header_style == 1 ) || ( $header_style == 2 ) || ( $header_style == 3 ) || ( $header_style == 4 ) ) {
                return true;
            }
            return false;
        }
    }

    /* Related Post Delay*/
    if (!function_exists('amttheme_is_related_blog_delay_enabled')) {
        function amttheme_is_related_blog_delay_enabled()
        {
            $show_related_post = get_theme_mod('show_related_post');
            $show_related_auto_play_delay = get_theme_mod('related_blog_auto_play');
            if ( ( $show_related_post == 1 && $show_related_auto_play_delay == 1 ) ) {
                return true;
            }
            return false;
        }
    }   

    /* Check is Enabled Preloader */
    if (!function_exists('amttheme_is_preloader_enabled')) {
        function amttheme_is_preloader_enabled()
        {
            $preloader = get_theme_mod('preloader');
            if (empty($preloader)) {
                return false;
            }
            return true;
        }
    }

    /* Topbar check is enabled */
    if (!function_exists('amttheme_is_topbar_enabled')) {
        function amttheme_is_topbar_enabled()
        {
            $top_bar = get_theme_mod('top_bar');
            if (empty($top_bar)) {
                return false;
            }
            return true;
        }
    }

    /* Topbar Phone is enabled */
    if ( ! function_exists( 'amttheme_is_topbar_phone_enabled' ) ) {
        function amttheme_is_topbar_phone_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 || $top_bar_style == 3 ) && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar Menu is enabled */
    if ( ! function_exists( 'amttheme_is_topbar_menu_enabled' ) ) {
        function amttheme_is_topbar_menu_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 ) && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar Menu Field is enabled */
    if ( ! function_exists( 'amttheme_is_topbar_menu_field_enabled' ) ) {
        function amttheme_is_topbar_menu_field_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $menu_show = get_theme_mod('menu_show');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 ) && $top_bar == true && $menu_show == true ) {
                return true;
            }
            return false;
        }
    }

    /* Header Short Menu is enabled */
    if ( ! function_exists( 'amttheme_is_header_short_menu_enabled' ) ) {
        function amttheme_is_header_short_menu_enabled() {
            $header_style = get_theme_mod('header_style');
            if ( ( $header_style == 7 ) ) {
                return true;
            }
            return false;
        }
    }

    /* Header Short Menu Field is enabled */
    if ( ! function_exists( 'amttheme_is_header_short_menu_field_enabled' ) ) {
        function amttheme_is_header_short_menu_field_enabled() {
            $header_style = get_theme_mod('header_style');
            $menu_show2 = get_theme_mod('menu_show2');
            if ( ( $header_style == 7 ) && $menu_show2 == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar Social is enabled */
    if ( ! function_exists( 'amttheme_is_topbar_social_enabled' ) ) {
        function amttheme_is_topbar_social_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 || $top_bar_style == 3 || $top_bar_style == 4 ) && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar 3 check is enabled */
    if ( ! function_exists( 'amttheme_is_topbar3_enabled' ) ) {
        function amttheme_is_topbar3_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( $top_bar_style == 3 && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Ofcanvas */
    if ( ! function_exists( 'amttheme_offcanvas1_bgcolor_type_condition' ) ) {
        function amttheme_offcanvas1_bgcolor_type_condition() {
            $BgType = get_theme_mod('offcanvas_bgtype');
            if ( $BgType === 'offcanvas_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_offcanvas1_bgimg_type_condition' ) ) {
        function amttheme_offcanvas1_bgimg_type_condition() {
            $BgType = get_theme_mod('offcanvas_bgtype');
            if ( $BgType === 'offcanvas_img' ) {
                return true;
            }
            return false;
        }
    }

    /* = Single Page Layout
    ==========================================================*/

    /* bannar bg type image/color */
    
    if ( ! function_exists( 'amttheme_banner_bgcolor_type_condition' ) ) {
        function amttheme_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('page_bgtype');
            if ( $BgType === 'page_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_banner_bgimg_type_condition' ) ) {
        function amttheme_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('page_bgtype');
            if ( $BgType === 'page_bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /* bannar bg type image/color for post */
    
    if ( ! function_exists( 'amttheme_post_banner_bgcolor_type_condition' ) ) {
        function amttheme_post_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('blog_bgtype');
            if ( $BgType === 'blog_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_post_banner_bgimg_type_condition' ) ) {
        function amttheme_post_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('blog_bgtype');
            if ( $BgType === 'blog_bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /* bannar bg type image/color for Single post */
    
    if ( ! function_exists( 'amttheme_singl_post_banner_bgcolor_type_condition' ) ) {
        function amttheme_singl_post_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('single_post_bgtype');
            if ( $BgType === 'single_post_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_single_post_banner_bgimg_type_condition' ) ) {
        function amttheme_single_post_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('single_post_bgtype');
            if ( $BgType === 'single_post_bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /* bannar bg type image/color for team archiv */
    
    if ( ! function_exists( 'amttheme_team_archive_banner_bgcolor_type_condition' ) ) {
        function amttheme_team_archive_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('team_archive_bgtype');
            if ( $BgType === 'team_archive_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_team_archive_banner_bgimg_type_condition' ) ) {
        function amttheme_team_archive_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('team_archive_bgtype');
            if ( $BgType === 'team_archive_bgimg' ) {
                return true;
            }
            return false;
        }
    }

    /* bannar bg type image/color for team Single */
    
    if ( ! function_exists( 'amttheme_team_single_banner_bgcolor_type_condition' ) ) {
        function amttheme_team_single_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('team_bgtype');
            if ( $BgType === 'team_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_team_single_banner_bgimg_type_condition' ) ) {
        function amttheme_team_single_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('team_bgtype');
            if ( $BgType === 'team_bgimg' ) {
                return true;
            }
            return false;
        }
    }

    
    /* bannar bg type image/color for Service archiv */
    
    if ( ! function_exists( 'amttheme_service_archive_banner_bgcolor_type_condition' ) ) {
        function amttheme_service_archive_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('service_archive_bgtype');
            if ( $BgType === 'service_archive_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_service_archive_banner_bgimg_type_condition' ) ) {
        function amttheme_service_archive_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('service_archive_bgtype');
            if ( $BgType === 'service_archive_bgimg' ) {
                return true;
            }
            return false;
        }
    }

    /* bannar bg type image/color for service Single */
    
    if ( ! function_exists( 'amttheme_service_single_banner_bgcolor_type_condition' ) ) {
        function amttheme_service_single_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('service_bgtype');
            if ( $BgType === 'service_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_service_single_banner_bgimg_type_condition' ) ) {
        function amttheme_service_single_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('service_bgtype');
            if ( $BgType === 'service_bgimg' ) {
                return true;
            }
            return false;
        }
    }


    /* bannar bg type image/color for Search */
    
    if ( ! function_exists( 'amttheme_search_banner_bgcolor_type_condition' ) ) {
        function amttheme_search_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('search_bgtype');
            if ( $BgType === 'search_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_search_banner_bgimg_type_condition' ) ) {
        function amttheme_search_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('search_bgtype');
            if ( $BgType === 'search_bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /* bannar bg type image/color for error */
    
    if ( ! function_exists( 'amttheme_error_banner_bgcolor_type_condition' ) ) {
        function amttheme_error_banner_bgcolor_type_condition() {
            $BgType = get_theme_mod('error_bgtype');
            if ( $BgType === 'error_bgcolor' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_error_banner_bgimg_type_condition' ) ) {
        function amttheme_error_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('error_bgtype');
            if ( $BgType === 'error_bgimg' ) {
                return true;
            }
            return false;
        }
    }

    /*Single Scroll Post check is enabled option*/
    if ( ! function_exists( 'amttheme_is_single_scroll_post_enabled' ) ) {
        function amttheme_is_single_scroll_post_enabled() {
            $scroll_post_enable = get_theme_mod( 'scroll_post_enable', '1' );
            if ( $scroll_post_enable == '1' ) {
                return true;
            }
            return false;
        }
    }   
    
    /* Team related option */
    if (!function_exists('amttheme_is_related_team_enabled')) {
        function amttheme_is_related_team_enabled()
        {
            $show_related_team = get_theme_mod('show_related_team');
            if (empty($show_related_team)) {
                return false;
            }
            return true;
        }
    }
    /* Service related option */
    if (!function_exists('amttheme_is_related_service_enabled')) {
        function amttheme_is_related_service_enabled()
        {
            $show_related_service = get_theme_mod('show_related_service');
            if (empty($show_related_service)) {
                return false;
            }
            return true;
        }
    }

    /* Team Related Post Delay*/
    if (!function_exists('amttheme_is_related_team_delay_enabled')) {
        function amttheme_is_related_team_delay_enabled()
        {
            $show_related_post = get_theme_mod('show_related_team');
            $show_related_auto_play_delay = get_theme_mod('related_team_auto_play');
            if ( ( $show_related_post == 1 && $show_related_auto_play_delay == 1 ) ) {
                return true;
            }
            return false;
        }
    } 
    /* ad option before header */
    if ( ! function_exists( 'amttheme_head_before_ad_type_image_condition' ) ) {
        function amttheme_head_before_ad_type_image_condition() {
            $BgType = get_theme_mod('before_ad_type');
            $before_head_ad_option = get_theme_mod('before_head_ad_option');
            if ( $BgType === 'before_adimage' && $before_head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'amttheme_head_before_ad_type_custom_condition' ) ) {
        function amttheme_head_before_ad_type_custom_condition() {
            $BgType = get_theme_mod('before_ad_type');
            $before_head_ad_option = get_theme_mod('before_head_ad_option');
            if ( $BgType === 'before_adcustom' && $before_head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }


    // ad option after header
    if ( ! function_exists( 'amttheme_head_ad_type_image_condition' ) ) {
        function amttheme_head_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_type');
            $head_ad_option = get_theme_mod('head_ad_option');
            if ( $BgType === 'adimage' && $head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'amttheme_head_ad_type_custom_condition' ) ) {
        function amttheme_head_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_type');
            $head_ad_option = get_theme_mod('head_ad_option');
            if ( $BgType === 'adcustom' && $head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    // ad option content before header
    if ( ! function_exists( 'amttheme_cbefore_ad_type_image_condition' ) ) {
        function amttheme_cbefore_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_before_post_type');
            $before_post_ad_option = get_theme_mod('before_post_ad_option');
            if ( $BgType === 'post_before_adimage' && $before_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'amttheme_cbefore_ad_type_custom_condition' ) ) {
        function amttheme_cbefore_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_before_post_type');
            $before_post_ad_option = get_theme_mod('before_post_ad_option');
            if ( $BgType === 'post_before_adcustom' && $before_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    // ad option content after header
    if ( ! function_exists( 'amttheme_cafter_ad_type_image_condition' ) ) {
        function amttheme_cafter_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_after_post_type');
            $after_post_ad_option = get_theme_mod('after_post_ad_option');
            if ( $BgType === 'post_after_adimage' && $after_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'amttheme_cafter_ad_type_custom_condition' ) ) {
        function amttheme_cafter_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_after_post_type');
            $after_post_ad_option = get_theme_mod('after_post_ad_option');
            if ( $BgType === 'post_after_adcustom' && $after_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    /* Woo related option */
    if (!function_exists('amttheme_is_related_woo_enabled')) {
        function amttheme_is_related_woo_enabled()
        {
            $related_woo_product = get_theme_mod('related_woo_product');
            if (empty($related_woo_product)) {
                return false;
            }
            return true;
        }
    }

    /* Woo Related Post Delay*/
    if (!function_exists('amttheme_is_related_shop_delay_enabled')) {
        function amttheme_is_related_shop_delay_enabled()
        {
            $show_related_post = get_theme_mod('related_woo_product');
            $show_related_auto_play_delay = get_theme_mod('related_shop_auto_play');
            if ( ( $show_related_post == 1 && $show_related_auto_play_delay == 1 ) ) {
                return true;
            }
            return false;
        }
    }


    /* Footer All Copyright is Enabled */
    if ( ! function_exists( 'amttheme_is_footer_copyright_enabled' ) ) {
        function amttheme_is_footer_copyright_enabled() {
            $copyright_area = get_theme_mod('copyright_area');
            if ( $copyright_area == true ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 1 check is enabled option*/
    if ( ! function_exists( 'amttheme_is_footer_enabled' ) ) {
        function amttheme_is_footer_enabled() {
            $footer_style = get_theme_mod( 'footer_style' );
            if ( $footer_style == 1 || $footer_style == 2 || $footer_style == 3 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'amttheme_footer1_bgcolor_type_condition' ) ) {
        function amttheme_footer1_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer1_bg_type');
            if ( $BgType === 'footer1_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_footer1_bgimg_type_condition' ) ) {
        function amttheme_footer1_bgimg_type_condition() {
            $BgType = get_theme_mod('footer1_bg_type');
            if ( $BgType === 'footer1_bg_img' ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 2 check is enabled option*/
    if ( ! function_exists( 'amttheme_footer2_bgcolor_type_condition' ) ) {
        function amttheme_footer2_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer2_bg_type');
            if ( $BgType === 'footer2_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_footer2_bgimg_type_condition' ) ) {
        function amttheme_footer2_bgimg_type_condition() {
            $BgType = get_theme_mod('footer2_bg_type');
            if ( $BgType === 'footer2_bg_img' ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'amttheme_footer3_bgcolor_type_condition' ) ) {
        function amttheme_footer3_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer3_bg_type');
            if ( $BgType === 'footer3_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'amttheme_footer3_bgimg_type_condition' ) ) {
        function amttheme_footer3_bgimg_type_condition() {
            $BgType = get_theme_mod('footer3_bg_type');
            if ( $BgType === 'footer3_bg_img' ) {
                return true;
            }
            return false;
        }
    }

    /**
     * URL sanitization
     *
     * @param  string   Input to be sanitized (either a string containing a single url or multiple, separated by commas)
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'amttheme_url_sanitization' ) ) {
        function amttheme_url_sanitization( $input ) {
            if ( strpos( $input, ',' ) !== false) {
                $input = explode( ',', $input );
            }
            if ( is_array( $input ) ) {
                foreach ($input as $key => $value) {
                    $input[$key] = esc_url_raw( $value );
                }
                $input = implode( ',', $input );
            }
            else {
                $input = esc_url_raw( $input );
            }
            return $input;
        }
    }

    /**
     * Switch sanitization
     *
     * @param  string       Switch value
     * @return integer  Sanitized value
     */

    if ( ! function_exists( 'amttheme_switch_sanitization' ) ) {
        function amttheme_switch_sanitization( $input ) {
            if ( true === $input ) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Radio Button and Select sanitization
     *
     * @param  string       Radio Button value
     * @return integer  Sanitized value
     */
    if ( ! function_exists( 'amttheme_radio_sanitization' ) ) {
        function amttheme_radio_sanitization( $input, $setting ) {
            //get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

            if ( array_key_exists( $input, $choices ) ) {
                return $input;
            } else {
                return $setting->default;
            }
        }
    }

    /**
     * Integer sanitization
     *
     * @param  string       Input value to check
     * @return integer  Returned integer value
     */

    if ( ! function_exists( 'amttheme_sanitize_integer' ) ) {
        function amttheme_sanitize_integer( $input ) {
            return (int) $input;
        }
    }

    /**
     * Text sanitization
     *
     * @param  string   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'amttheme_text_sanitization' ) ) {
        function amttheme_text_sanitization( $input ) {
            if ( strpos( $input, ',' ) !== false) {
                $input = explode( ',', $input );
            }
            if( is_array( $input ) ) {
                foreach ( $input as $key => $value ) {
                    $input[$key] = sanitize_text_field( $value );
                }
                $input = implode( ',', $input );
            }
            else {
                $input = sanitize_text_field( $input );
            }
            return $input;
        }
    }

    if ( ! function_exists( 'amttheme_textarea_sanitization' ) ) {
        function amttheme_textarea_sanitization( $input ) {
            return $input;
        }
    }

    /**
     * Google Font sanitization
     *
     * @param  string   JSON string to be sanitized
     * @return string   Sanitized input
     */

    if ( ! function_exists( 'amttheme_google_font_sanitization' ) ) {
        function amttheme_google_font_sanitization( $input ) {
            $val =  json_decode( $input, true );
            if( is_array( $val ) ) {
                foreach ( $val as $key => $value ) {
                    $val[$key] = sanitize_text_field( $value );
                }
                $input = json_encode( $val );
            }
            else {
                $input = json_encode( sanitize_text_field( $val ) );
            }
            return $input;
        }
    }

    /**
     * Array sanitization
     *
     * @param  array    Input to be sanitized
     * @return array    Sanitized input
     */
    if ( ! function_exists( 'amttheme_array_sanitization' ) ) {
        function amttheme_array_sanitization( $input ) {
            if( is_array( $input ) ) {
                foreach ( $input as $key => $value ) {
                    $input[$key] = sanitize_text_field( $value );
                }
            }
            else {
                $input = '';
            }
            return $input;
        }
    }

    /**
     * Alpha Color (Hex & RGBa) sanitization
     *
     * @param  string   Input to be sanitized
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'amttheme_hex_rgba_sanitization' ) ) {
        function amttheme_hex_rgba_sanitization( $input, $setting ) {
            if ( empty( $input ) || is_array( $input ) ) {
                return $setting->default;
            }

            if ( false === strpos( $input, 'rgba' ) ) {
                // If string doesn't start with 'rgba' then santize as hex color
                $input = sanitize_hex_color( $input );
            } else {
                // Sanitize as RGBa color
                $input = str_replace( ' ', '', $input );
                sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
                $input = 'rgba(' . amttheme_in_range( $red, 0, 255 ) . ',' . amttheme_in_range( $green, 0, 255 ) . ',' . amttheme_in_range( $blue, 0, 255 ) . ',' . amttheme_in_range( $alpha, 0, 1 ) . ')';
            }
            return $input;
        }
    }

    /**
     * Only allow values between a certain minimum & maxmium range
     *
     * @param  number   Input to be sanitized
     * @return number   Sanitized input
     */
    if ( ! function_exists( 'amttheme_in_range' ) ) {
        function amttheme_in_range( $input, $min, $max ){
            if ( $input < $min ) {
                $input = $min;
            }
            if ( $input > $max ) {
                $input = $max;
            }
            return $input;
        }
    }

    /**
     * Date Time sanitization
     *
     * @param  string   Date/Time string to be sanitized
     * @return string   Sanitized input
     */

    if ( ! function_exists( 'amttheme_date_time_sanitization' ) ) {
        function amttheme_date_time_sanitization( $input, $setting ) {
            $datetimeformat = 'Y-m-d';
            if ( $setting->manager->get_control( $setting->id )->include_time ) {
                $datetimeformat = 'Y-m-d H:i:s';
            }
            $date = DateTime::createFromFormat( $datetimeformat, $input );
            if ( $date === false ) {
                $date = DateTime::createFromFormat( $datetimeformat, $setting->default );
            }
            return $date->format( $datetimeformat );
        }
    }

    /**
     * Slider sanitization
     *
     * @param  string   Slider value to be sanitized
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'amttheme_range_sanitization' ) ) {
        function amttheme_range_sanitization( $input, $setting ) {
            $attrs = $setting->manager->get_control( $setting->id )->input_attrs;

            $min = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
            $max = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
            $step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

            $number = floor( $input / $attrs['step'] ) * $attrs['step'];

            return amttheme_in_range( $number, $min, $max );
        }
    }

}
