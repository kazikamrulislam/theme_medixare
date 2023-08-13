<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Gamxo_Core;

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

extract($data);

$btn_key = 'btn_link';
$this->add_link_attributes($btn_key, $data['link_url']);

?>

<style>
    <?php if ($data['shape_display'] == 'yes') {
        echo ".amt-section__title2.has-border::before{
            display:inline-block;
      }";
    } ?>
    .amt-section__title2.has-border::before {
        content: "";
        width: 45px;
        margin-right: 20px;
        border-bottom: 4px solid #ff4460;
    }
    .amt-section__details {
        color: #74696b;
        font-size: 18px;
        font-weight: 500;
        text-align: end;
    }
    .amt-section__details p {
        margin: 0;
    }
    .amt-section__details .title-btn-2 {
        color: #ff4460;
        font-weight: 700;
        text-transform: uppercase;
        cursor: pointer;
    }
    .amt-section__details .title-btn-2 i {
        margin-left: 10px;
    }
    @media (max-width: 1200px){
        .amt-section__details {
            font-size: 16px;
        }
    }
    @media (max-width: 1200px){
        .amt-section__details {
            font-size: 16px;
        }
    }
    @media (max-width: 991.98px){
        .amt-section__title2 {
            font-size: 34px;
        }
        .amt-section__details {
            font-size: 16px;
        }
        .amt-section__title2.has-border::before {
            width: 30px;
            margin-right: 10px;
        }
    }    
    @media (max-width: 767.98px){
        .amt-section__title2 {
            font-size: 28px;
        }
        .amt-section__title2.has-border::before {
            width: 30px;
            margin-right: 10px;
        }
        .amt-section__details {
            font-size: 16px;
        }
        .mobile-alignment{
            text-align: center;
        }
        .amt-section__details {
            font-size: 16px;
        }
    }
</style>

<div class="amt-section-wrapper mb-45">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 mobile-alignment">
            <?php if ($data['subtitle_display'] == 'yes') { ?>
                <span class="amt-section__subtitle has-circle-border mb-15"><?php echo wp_kses_post($data['sub_title']); ?></span>
            <?php } ?>
            <div class="amt-section__title2_wrapper">
                <h3 class="amt-section__title amt-section__title2 has-border"><?php echo wp_kses_post($data['title-4']); ?> <span><?php echo wp_kses_post($data['title-5']); ?></span> <?php echo wp_kses_post($data['title-6']); ?></h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="amt-section__details mobile-alignment">
                <p><?php echo wp_kses_post($data['text2']); ?> <a class="title-btn-2" <?php $this->print_render_attribute_string($btn_key); ?>> <?php echo $data['amt-button']; ?>
                        <?php if ($data['arrow_display'] == 'yes') { ?>
                            <i class="fas fa-arrow-right"></i>
                        <?php } ?>
                    </a> </p>
            </div>
        </div>
    </div>
</div>