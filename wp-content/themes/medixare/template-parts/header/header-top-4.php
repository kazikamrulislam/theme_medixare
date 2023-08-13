<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$medixare_socials = MedixareTheme_Helper::socials();

?>

<div id="tophead" class="header-top-bar d-flex align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
		<?php if ( MedixareTheme::$options['ticker_enable'] ) {  ?>
			<div class="amt-news-ticker-holder">
				<div class="header-icon-box"><i class="fas fa-bolt icon"></i></div><?php medixare_news_ticker(); ?>			
			</div>		
			<?php } ?>
			<?php if ( MedixareTheme::$options['social_show'] ) { ?>	
			<div class="tophead-right">
				<div class="tophead-item header-link-item">									
					<ul class="tophead-social">
						<?php foreach ( $medixare_socials as $medixare_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $medixare_social['url'] );?>"><i class="fab <?php echo esc_attr( $medixare_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>					
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>