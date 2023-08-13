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

?>

<div class="amt-contact-from__section_1 theme-bg pt-130 pb-130">
    <div class="row amt-justify-control">
        <div class="col-xl-12 col-md-12">
            <div class="tp-contact__info-box-wrapper white-bg">
                <h3 class="tp-contact__title"><?php echo wp_kses_post($data['contact-title']); ?></h3>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="tp-contact__info-box">
                            <div class="tp-contact__info-icon-2">
                                <i class="<?php echo esc_attr($data['address-icon']['value']); ?>" aria-hidden="true"></i>
                            </div>
                            <?php if ($data['title_display'] == 'yes') { ?>
                                <h3 class="tp-contact__info-title"><?php echo wp_kses_post($data['address-title']); ?></h3>
                            <?php } ?>
                            <span>
                                <?php if (!empty($data['address'])) { ?>
                                    <a href="#"><?php echo wp_kses_post($data['address']); ?></a>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="tp-contact__info-box">
                            <div class="tp-contact__info-icon-2">
                                <i class="<?php echo esc_attr($data['email-icon']['value']); ?>" aria-hidden="true"></i>
                            </div>
                            <?php if ($data['title_display'] == 'yes') { ?>
                                <h3 class="tp-contact__info-title"><?php echo wp_kses_post($data['email-title']); ?></h3>
                            <?php } ?>

                            <span>
                                <?php if (!empty($data['email-1'])) { ?>
                                    <a href="mailto:<?php echo wp_kses_post($data['email-1']); ?>"><?php echo wp_kses_post($data['email-1']); ?></a>
                                <?php } ?>
                            </span><br>
                            <span>
                                <?php if (!empty($data['email-2'])) { ?>
                                    <a href="mailto:<?php echo wp_kses_post($data['email-2']); ?>"><?php echo wp_kses_post($data['email-2']); ?></a>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="tp-contact__info-box">

                            <div class="tp-contact__info-icon-2">
                                <i class="<?php echo esc_attr($data['phone-icon']['value']); ?>" aria-hidden="true"></i>
                            </div>

                            <?php if ($data['title_display'] == 'yes') { ?>
                                <h3 class="tp-contact__info-title"><?php echo wp_kses_post($data['number-title']); ?></h3>
                            <?php } ?>
                            <span>
                                <?php if (!empty($data['phone-1'])) { ?>
                                    <a href="callto:<?php echo wp_kses_post($data['phone-1']); ?>"><?php echo wp_kses_post($data['phone-1']); ?></a>
                                <?php } ?>
                            </span><br>
                            <span>
                                <?php if (!empty($data['phone-2'])) { ?>
                                    <a href="callto:<?php echo wp_kses_post($data['phone-2']); ?>"><?php echo wp_kses_post($data['phone-2']); ?></a>
                                <?php } ?>
                            </span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>