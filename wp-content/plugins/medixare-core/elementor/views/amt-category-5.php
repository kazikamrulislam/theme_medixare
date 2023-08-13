<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;
 
$thumb_size = 'medixare-size4';

$args = array (
    'taxonomy' => 'category',  
    'hide_empty' => true,  
    'include' => 'all',  
    'fields' => 'all', 
);

if ( $data['catid'] ) {
	$args['include'] = $data['catid'];
}

$terms = get_terms($args );
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";
?>
<div class="amt-category amt-category-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
	<?php $i = $data['delay']; $j = $data['duration']; foreach( $terms as $term ) { ?>
		<div class="<?php echo esc_attr( $col_class );?>">
			<div class="amt-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>">
					<?php 
						$get_image  = get_term_meta( $term->term_id , 'amt_category_image', 'true' );
						if ( $get_image ) {	
							echo wp_get_attachment_image( $get_image, $thumb_size );
						}else {
							echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage.jpg' ) . '" alt="'.get_the_title().'">';
						}
					?>
					<div class="amt-content">
			            <h4 class="amt-cat-name"><?php echo esc_html( $term->name ); ?></h4>
			            <?php if( $data['cat_count'] == 'yes' ) { ?>
			            <p class="amt-cat-count">(<?php echo esc_html( $term->count ); ?>)</p>
			        	<?php } ?>
			        </div>
		        </a>
		    </div>
		</div>
	<?php $i = $i + 0.5; $j = $j + 0.2; } ?>
	</div>
</div>