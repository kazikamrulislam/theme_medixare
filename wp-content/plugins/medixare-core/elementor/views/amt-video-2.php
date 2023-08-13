<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme_Helper;
use Elementor\Group_Control_Image_Size;

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html($data, 'icon_image_size', 'video_image');

$btn_key = 'btn_link';
$this->add_link_attributes($btn_key, $data['link_url']);

?>


<style>
	.amt-hero__section-2 {
		position: relative;
        background-image: url("<?php echo MedixareTheme_Helper::get_asset_file('element/header-bg-shape.jpg'); ?>");
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
    }
	.amt-hero-shapes img {
		height: 84px;
		width: 84px;
		object-fit: cover;
		border-radius: 50%;
		z-index: 5;
	}
	/* Title */
	.amt-hero-title-wrapper {
		margin-bottom: 100px;
	}
	.amt-hero__title {
		font-size: 80px;
		font-weight: 800;
		line-height: 1.1;
		letter-spacing: -1px;
		margin-bottom: 35px;
	}
	.amt-hero__title span {
		font-weight: 400;
		display: block;
	}
	.amt-section__details {
		color: #74696b;
		font-size: 18px;
		font-weight: 500;
	}
	.amt-hero-title-wrapper p {
		color: #d0d0d0;
		font-size: 20px;
		line-height: 1.6;
		padding-right: 10px;
		margin-bottom: 30px;
	}
	.amt-section__details .video-button {
		color: #ff4460;
		font-weight: 700;
		text-transform: uppercase;
		cursor: pointer;
	}
	.amt-section__details .video-button:hover {
		color: #ff9b40;
	}
	.amt-hero-shape-1 {
		position: absolute;
		left: 2%;
		top: 5%;
		z-index: 2;
	}
	.amt-hero-shape-2 {
		position: absolute;
		left: 8%;
		top: 30%;
		z-index: 2;
	}
	.amt-hero-shape-3 {
		position: absolute;
		left: 2%;
		top: 56%;
		z-index: 2;
	}
	.amt-hero-shape-4 {
		position: absolute;
		right: 2%;
		top: 5%;
		z-index: 2;
	}
	.amt-hero-shape-5 {
		position: absolute;
		right: 8%;
		top: 30%;
		z-index: 2;
	}
	.amt-hero-shape-6 {
		position: absolute;
		right: 2%;
		top: 56%;
		z-index: 2;
	}
@media only screen  and (min-width: 768px )and (max-width: 992px){
	.amt-hero-title-wrapper {
    	margin-bottom: 70px;
	}
	.amt-hero__title {
		font-size: 56px;
		margin-bottom: 20px;
	}
	.amt-hero-title-wrapper p {
		font-size: 16px;
		margin-bottom: 16px;
	}
}
@media only screen and (max-width: 767.99px) {
	.amt-hero-title-wrapper {
    	margin-bottom: 40px;
	}
	.amt-hero-shapes {
		display: none;
	}
	.amt-hero__title {
		font-size: 36px;
		margin-bottom: 20px;
	}
	.amt-hero-title-wrapper p {
		font-size: 16px;
		margin-bottom: 16px;
	}
}
</style>

<div class="amt-hero__section-2 pb-65 pt-50 ">
	<div class="amt-hero-shapes z-index-1 p-relative">
		<div class="amt-hero-shape-1 fly">
			<div class="stuff">
				<?php if (!empty($data['image-1']['id'])) {
					Group_Control_Image_Size::print_attachment_image_html($data, 'image-1');
				} else {
					echo '<img class="wp-post-image" data-depth="3" src="' . MedixareTheme_Helper::get_asset_file('element/hero-shape-1.png') . '" alt="' . get_the_title() . '">';
				} ?>
			</div>
		</div>
		<div class="amt-hero-shape-2 fly">
			<div class="stuff2">
				<?php if (!empty($data['image-2']['id'])) {
					Group_Control_Image_Size::print_attachment_image_html($data, 'image-2');
				} else {
					echo '<img class="wp-post-image" data-depth="2" src="' . MedixareTheme_Helper::get_asset_file('element/hero-shape-2.png') . '" alt="' . get_the_title() . '">';
				} ?>
			</div>
		</div>
		<div class="amt-hero-shape-3 fly">
			<div class="stuff3">
				<?php if (!empty($data['image-3']['id'])) {
					Group_Control_Image_Size::print_attachment_image_html($data, 'image-3');
				} else {
					echo '<img class="wp-post-image" data-depth="4" src="' . MedixareTheme_Helper::get_asset_file('element/hero-shape-3.png') . '" alt="' . get_the_title() . '">';
				} ?>
			</div>
		</div>
		<div class="amt-hero-shape-4 fly">
			<div class="stuff4">
				<?php if (!empty($data['image-4']['id'])) {
					Group_Control_Image_Size::print_attachment_image_html($data, 'image-4');
				} else {
					echo '<img class="wp-post-image" data-depth="2" src="' . MedixareTheme_Helper::get_asset_file('element/hero-shape-4.png') . '" alt="' . get_the_title() . '">';
				} ?>
			</div>
		</div>
		<div class="amt-hero-shape-5 fly">
			<div class="stuff5">
				<?php if (!empty($data['image-5']['id'])) {
					Group_Control_Image_Size::print_attachment_image_html($data, 'image-5');
				} else {
					echo '<img class="wp-post-image" data-depth="3" src="' . MedixareTheme_Helper::get_asset_file('element/hero-shape-5.png') . '" alt="' . get_the_title() . '">';
				} ?>
			</div>
		</div>
		<div class="amt-hero-shape-6 fly">
			<div class="stuff6">
				<?php if (!empty($data['image-6']['id'])) {
					Group_Control_Image_Size::print_attachment_image_html($data, 'image-6');
				} else {
					echo '<img class="wp-post-image" data-depth="4" src="' . MedixareTheme_Helper::get_asset_file('element/hero-shape-6.png') . '" alt="' . get_the_title() . '">';
				} ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="amt-hero-title-wrapper text-center mb-100">
					<h1 class="amt-hero__title"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h1>
					<div class="amt-section__details">
						<p><?php echo wp_kses_post($data['text']); ?>: <a <?php $this->print_render_attribute_string($btn_key); ?> class="video-button"> <?php echo $data['amt-button']; ?>
						<?php if ( $data['arrow_display'] == 'yes' ) { ?>
							<i class="fas fa-arrow-right"></i> 
						<?php } ?>
					</a> </p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="amt-video-layout motion-effects">
					<div class="amt-video">
						<div class="amt-img">
						<?php if (!empty($data['video_image']['id'])) {
                                    Group_Control_Image_Size::print_attachment_image_html($data, 'video_image');
                                } else {
                                    echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/hero-1.jpg') . '" alt="' . get_the_title() . '">';
                                } ?>
						</div>
						<div class="amt-icon">
							<a class="amt-play amt-video-popup" href="<?php echo esc_url($data['videourl']['url']); ?>"><i class="fas fa-play"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>