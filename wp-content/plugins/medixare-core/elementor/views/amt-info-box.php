<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Group_Control_Image_Size;
use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;
use Elementor\Icons_Manager;

$btn_key = 'btn_link';
$this->add_link_attributes($btn_key, $data['link_url']);

$btn2_key = 'btn2_link';
$this->add_link_attributes($btn2_key, $data['link2_url']);

?>
<div class="amt-about__info-wrapper">
    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-6 g-0 amt-box-bg-1">
                <div class="amt-about__info-box d-md-flex d-block">
                    <div class="amt-about__info-icon mr-30">
                        <span><i class="<?php echo esc_attr($data['about-icon']['value']); ?>" aria-hidden="true"></i></span>
                    </div>
                    <div class="amt-about__info-content">
                        <?php if ($data['title_display'] == 'yes') { ?>
                            <h3 class="amt-about__info-title mb-15"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h3>
                        <?php } ?>
                        <?php if ($data['content_display'] == 'yes') { ?>
                            <p><?php echo wp_kses_post($data['text-1']); ?></p>
                        <?php } ?>
                        <div class="amt-about__inf-btn-wrapper <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
                            <?php if ($data['button_display'] == 'yes') { ?>
                                <a <?php $this->print_render_attribute_string($btn_key); ?> class="amt-info-btn"><?php echo $data['amt-button']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 g-0 amt-box-bg-2">
                <div class="amt-about__info-box d-md-flex ab-orange-bg d-block">
                    <div class="amt-about__info-icon mr-30">
                        <span><i class="<?php echo esc_attr($data['story-icon']['value']); ?>" aria-hidden="true"></i></span>
                    </div>
                    <div class="amt-about__info-content">
                        <?php if ($data['title_display'] == 'yes') { ?>
                            <h3 class="amt-about__info-title mb-15"><?php echo wp_kses_post($data['title-4']); ?> <span><?php echo wp_kses_post($data['title-5']); ?></span> <?php echo wp_kses_post($data['title-6']); ?></h3>
                        <?php } ?>
                        <?php if ($data['content_display'] == 'yes') { ?>
                            <p><?php echo wp_kses_post($data['text-2']); ?></p>
                        <?php } ?>
                        <div class="amt-about__inf-btn-wrapper <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
                            <?php if ($data['button_display'] == 'yes') { ?>
                                <a <?php $this->print_render_attribute_string($btn2_key); ?> class="amt-info-btn"><?php echo $data['amt-button-1']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>