<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

if ( is_404() ) {
	$medixare_title = "Error Page";
}
elseif ( is_search() ) {
	$medixare_title = esc_html__( 'Search Results for : ', 'medixare' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$medixare_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$medixare_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'medixare' ) );
	}
}
elseif ( is_archive() ) {
	$medixare_title = get_the_archive_title();
} elseif (is_single()) {
	$medixare_title  = get_the_title();

} else {
	$medixare_title = get_the_title();	                   
}

?>

<?php if ( MedixareTheme::$has_banner == 1 || MedixareTheme::$has_banner == 'on' ) { ?>
	<div class="entry-banner">
		<div class="container">
			<div class="entry-banner-content">
				<?php if ( !is_single() ) { ?>
					<?php if (is_page()) { ?>
						<h1 class="entry-title"><?php echo wp_kses($medixare_title, 'alltext_allow');?></h1>
					<?php } else { ?>
						<h1 class="entry-title"><?php echo wp_kses($medixare_title, 'alltext_allow');?></h1>
					<?php } ?>
				<?php } ?>
				<?php if ( MedixareTheme::$has_breadcrumb == 1 ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>