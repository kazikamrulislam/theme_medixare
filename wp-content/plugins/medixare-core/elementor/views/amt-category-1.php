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
<div class="rt-category rt-category-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
	<?php foreach( $terms as $term ) { ?>
		<div class="<?php echo esc_attr( $col_class );?>">
			<div class="rt-item">
				<?php 
				$get_image  = get_term_meta( $term->term_id , 'rt_category_image', 'true' ); 
				if ( $get_image ) {	
					echo wp_get_attachment_image( $get_image, 'full' );
				}else {
					echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage.jpg' ) . '" alt="'.get_the_title().'">';
				}
				?>
				<div class="rt-content">
		            <h4 class="rt-cat-name">
		                <a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>"><?php echo esc_html( $term->name ); ?></a> 
		            </h4>
		            <?php if( $data['cat_count'] == 'yes' ) { ?>
		            <p class="rt-cat-count">
		                <span class="anim-overflow">(<?php echo esc_html( $term->count ); ?>)</span>
		            </p>
		        	<?php } ?>
		        </div>
		    </div>
		</div>
	<?php } ?>
	</div>
</div>