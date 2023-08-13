<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Group_Control_Image_Size;
use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;

$btn_key = 'btn_link';
$this->add_link_attributes($btn_key, $data['link_url']);

?>

<style>
    .tp-about-2__section {
        background-image: url("<?php echo MedixareTheme_Helper::get_asset_file('element/about-2.jpg');?>");
    }
</style>

<div class="tp-about-2__section fix">
    <div class="tp-about__wrapper pt-140 p-relative">
        <div class="tp-about-2__info-box">
            <div class="tp-about-2__info-content">
            <?php if ( $data['subtitle_display'] == 'yes' ) { ?>
                <span class="tp-about-2__info-subtitle has-circle mb-15"><?php echo wp_kses_post($data['sub_title']); ?></span>
            <?php } ?>
                <?php if ( $data['title_display'] == 'yes' ) { ?>	
                    <h3 class="tp-about-2__info-title mb-20"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h3>
                <?php } ?>	
                <div class="tp-about-2__inf-btn-wrapper <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
                    <?php if ( $data['button_display'] == 'yes' ) { ?>
                        <a <?php $this->print_render_attribute_string($btn_key); ?> class="tp-white-btn"><?php echo $data['amt-button']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="tp-about-2__info-box-top">
            <div class="tp-about-2__info-number">
                <h3 class="counter" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo wp_kses_post($data['period']); ?></h3>
                <span class="tp-about-2__info-text"><?php echo wp_kses_post($data['period-number']); ?><br></span>
            </div>
        </div>
    </div>
</div>