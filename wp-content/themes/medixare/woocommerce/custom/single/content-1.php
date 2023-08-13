<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\medixare;
?>
<div class="single-product-top">
	<div class="amt-left">
		<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
		<div class="clear"></div>
	</div>
	<div class="amt-right">
		<?php do_action( 'woocommerce_single_product_summary' ); ?>
	</div>
</div>
<div class="single-product-bottom">
	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
</div>