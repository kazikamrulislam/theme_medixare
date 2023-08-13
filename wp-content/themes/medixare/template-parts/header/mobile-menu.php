<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = MedixareTheme_Helper::nav_menu_args();

if( !empty( MedixareTheme::$options['logo'] ) ) {
    $logo_dark = wp_get_attachment_image( MedixareTheme::$options['logo'], 'full' );
    $medixare_dark_logo = $logo_dark;
}else {
    $medixare_dark_logo = get_bloginfo( 'name' ); 
}

?>

<div class="amt-header-menu mean-container" id="meanmenu">
    <?php if ( MedixareTheme::$options['mobile_topbar'] ) { ?>
        <?php get_template_part('template-parts/header/mobile', 'topbar');?>
    <?php } ?>
    <div id="mobile-sticky-placeholder"></div>
    <div class="mobile-mene-bar" id="mobile-men-bar">
        <div class="mean-bar">
            <?php if ( has_nav_menu( 'primary' ) ) { ?>
            <span class="sidebarBtn ">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </span>
            <?php } ?>
            <div class="mobile-logo site-branding">
                <a class="dark-logo" href="<?php echo esc_url(home_url('/'));?>"><?php echo wp_kses( $medixare_dark_logo, 'alltext_allow' ); ?></a>
            </div> 
            <?php if ( MedixareTheme::$options['mobile_search'] ) { ?>
            <div class="info"><?php get_template_part( 'template-parts/header/icon', 'search' );?></div>
            <?php } ?>
        </div>    
        <div class="amt-slide-nav">
            <div class="offscreen-navigation">
                <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( $nav_menu_args );
                     } 
                ?>
            </div>
        </div>
    </div>
</div>
