<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;
use \AMT_Posts;
use MedixareTheme;


if ( !class_exists( 'AMT_Posts' ) ) {
	return;
}

$post_types = array(
	'medixare_team'       => array(
		'title'           => __( 'Team Member', 'medixare-core' ),
		'plural_title'    => __( 'Team', 'medixare-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Team', 'medixare-core' ),
		),
		'rewrite'         => MedixareTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
	'medixare_service'       => array(
		'title'           => __( 'Services', 'medixare-core' ),
		'plural_title'    => __( 'Service', 'medixare-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Services', 'medixare-core' ),
		),
		'rewrite'         => MedixareTheme::$options['service_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
);

$taxonomies = array(
	'medixare_team_category' => array(
		'title'        => __( 'Team Category', 'medixare-core' ),
		'plural_title' => __( 'Team Categories', 'medixare-core' ),
		'post_types'   => 'medixare_team',
		'rewrite'      => array( 'slug' => MedixareTheme::$options['team_cat_slug'] ),
	),
	'medixare_service_category' => array(
		'title'        => __( 'Service Category', 'medixare-core' ),
		'plural_title' => __( 'Service Categories', 'medixare-core' ),
		'post_types'   => 'medixare_service',
		'rewrite'      => array( 'slug' => MedixareTheme::$options['service_cat_slug'] ),
	),
);

$Posts = AMT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );