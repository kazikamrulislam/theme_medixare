<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'medixare_widgets_init' );
function medixare_widgets_init() {
	// Register Custom Widgets
	register_widget( 'MedixareTheme_About_Widget' );
	register_widget( 'MedixareTheme_Footer_About_Widget' );
	register_widget( 'MedixareTheme_Address_Widget' );
	register_widget( 'MedixareTheme_Social_Widget' );
	register_widget( 'MedixareTheme_Post_Box' );
	register_widget( 'MedixareTheme_Post_Tab' );
	register_widget( 'MedixareTheme_Feature_Post' );
	register_widget( 'MedixareTheme_Category_Widget' );	
}