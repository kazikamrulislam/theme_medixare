<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

?>
<?php if (!empty(MedixareTheme::$options['nav_button_txt'] )) { ?>
<div class="nav_btn-icon">
	<!-- <a href="#header-nav_btn" title="<?php esc_attr_e( 'Search', 'medixare');?>">Appointment</a> -->
	<div class="amt-nav-buttons">
		<a href="#" class="amt-nav-contact">
			<div href="#"><?php echo MedixareTheme::$options['nav_button_txt']; ?></div>
		</a>
	</div>
</div>
<?php }?>
