<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
		// Preloader	
		if ( MedixareTheme::$options['preloader'] ) {	
			if( !empty( MedixareTheme::$options['preloader_image'] ) ) {
				$pre_bg = wp_get_attachment_image_src( MedixareTheme::$options['preloader_image'], 'full', true );
				$preloader_img = $pre_bg[0];
				echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
			}else { ?>				
				<div id="preloader" class="loader">
			      	<div class="cssload-loader">
				        <div class="cssload-inner cssload-one"></div>
				        <div class="cssload-inner cssload-two"></div>
				        <div class="cssload-inner cssload-three"></div>
			      	</div>
			    </div>
			<?php }	            
		}
	?>
	<?php if ( MedixareTheme::$options['color_mode'] ) { ?>
	<div class="header__switch header__switch--wrapper">
        <span class="header__switch__settings"><i class="fas fa-sun"></i></span>
        <label class="header__switch__label" for="headerSwitchCheckbox">
          	<input class="header__switch__input" type="checkbox" name="headerSwitchCheckbox" id="headerSwitchCheckbox">
          	<span class="header__switch__main round"></span>
        </label>
        <span class="header__switch__dark"><i class="fas fa-moon"></i></span>
    </div>
	<?php } ?>

	<?php if ( is_singular() && ( MedixareTheme::$options['scroll_indicator_enable'] == '1' ) && ( MedixareTheme::$options['scroll_indicator_position'] == 'top' ) ){ ?>
	<div class="medixare-progress-container">
		<div class="medixare-progress-bar" id="medixareBar"></div>
	</div>
	<?php } ?>
	
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'medixare' ); ?></a>		
		<header id="masthead" class="site-header">
			<div id="header-<?php echo esc_attr( MedixareTheme::$header_style ); ?>" class="header-area">
				<?php if ( MedixareTheme::$top_bar == 1 || MedixareTheme::$top_bar === "on" ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', MedixareTheme::$top_bar_style ); ?>
				<?php } ?>
				<?php if ( MedixareTheme::$header_opt == 1 || MedixareTheme::$header_opt === "on" ){ ?>
				<?php get_template_part( 'template-parts/header/header', MedixareTheme::$header_style ); ?>
				<?php } ?>

				<?php if ( MedixareTheme::$options['head_ad_option'] ) { ?>
				<div class="header-ad">
					<div class="container">
						<div class="header-ad-item">
							<?php if ( MedixareTheme::$options['ad_type'] == 'adimage' ) { ?>
							<?php if (MedixareTheme::$options['ad_img_link']){
								$target = MedixareTheme::$options['ad_img_target']? 'target="_blank"':'';
								echo '<a '.$target.'  href="'.esc_url( MedixareTheme::$options['ad_img_link'] ).'">'.wp_get_attachment_image( MedixareTheme::$options['adimage'], 'full' ).'</a>';

							} else {
								echo wp_get_attachment_image( MedixareTheme::$options['adimage'], 'full' );
							} ?>	

							<?php } else {
								echo MedixareTheme::$options['adcustom'];
							} ?>		
						</div>
					</div>
				</div>
				<?php } ?>				
			</div>
		</header>		
		<?php get_template_part('template-parts/header/mobile', 'menu');?>

		<div id="header-search" class="header-search">
            <button type="button" class="close">×</button>
            <form class="header-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Type your search........', 'medixare' ); ?>">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
	        	
		<div id="content" class="site-content">			
			<?php
				if ( MedixareTheme::$has_banner === 1 || MedixareTheme::$has_banner === "on" ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>
			