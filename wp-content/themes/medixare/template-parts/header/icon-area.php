<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

?>
<div class="header-icon-area">
	<?php	
	if ( MedixareTheme::$options['search_icon'] ) {
		get_template_part( 'template-parts/header/icon', 'search' );
	}
	if ( MedixareTheme::$options['vertical_menu_icon'] && has_nav_menu( 'topright' ) ){
		get_template_part( 'template-parts/header/icon', 'offcanvas' );
	}
	?>
</div>