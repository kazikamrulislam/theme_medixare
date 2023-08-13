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

?>

<div class="amt-about-inner__section amt-about-features pt-130 pb-90">
    <div class="row amt-features-row">
        <div class="col-lg-6">
            <div class="amt-about-inner__imgs-wrapper mr-40">
                <div class="row gx-2">
                    <div class="col-lg-7">
                        <div class="amt-about-inner__img mb-30">
                            <div class="img-1 mb-10 w-img">
                                <?php if (!empty($data['image-1']['id'])) {
                                    Group_Control_Image_Size::print_attachment_image_html($data, 'image-1');
                                } else {
                                    echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/about-3.jpg') . '" alt="' . get_the_title() . '">';
                                } ?>
                            </div>
                            <div class="img-2 mb-10 w-img">
                                <?php if (!empty($data['image-2']['id'])) {
                                    Group_Control_Image_Size::print_attachment_image_html($data, 'image-2');
                                } else {
                                    echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/about-4.jpg') . '" alt="' . get_the_title() . '">';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="amt-about-inner__img mb-30">
                            <div class="img-1 mb-10 w-img">
                                <?php if (!empty($data['image-3']['id'])) {
                                    Group_Control_Image_Size::print_attachment_image_html($data, 'image-3');
                                } else {
                                    echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/about-5.jpg') . '" alt="' . get_the_title() . '">';
                                } ?>
                            </div>
                            <div class="img-2 mb-10 w-img">
                                <?php if (!empty($data['image-4']['id'])) {
                                    Group_Control_Image_Size::print_attachment_image_html($data, 'image-4');
                                } else {
                                    echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/about-6.jpg') . '" alt="' . get_the_title() . '">';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="amt-section__title_wrapper mr-70 mb-30">
                <h1 class="amt-section__title mb-25"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h1>
                <?php if ($data['content_display'] == 'yes') { ?>
                    <p><?php echo wp_kses_post($data['text']); ?></p>
                <?php } ?>
                <div class="amt-section__list mb-40">
                    <ul <?php $this->print_render_attribute_string('icon_list'); ?>>
                        <?php
                        foreach ($data['icon_list'] as $index => $item) :
                            $repeater_setting_key = $this->get_repeater_setting_key('text', 'icon_list', $index);

                            $this->add_render_attribute($repeater_setting_key, 'class', 'icon-list-text');

                            $migration_allowed = Icons_Manager::is_migration_allowed();
                        ?>
                            <li <?php $this->print_render_attribute_string('list_item'); ?>>
                                <?php
                                if (!isset($item['icon']) && !$migration_allowed) {
                                    $item['icon'] = isset($fallback_defaults[$index]) ? $fallback_defaults[$index] : 'fa fa-check';
                                }

                                $migrated = isset($item['__fa4_migrated']['selected_icon']);
                                $is_new = !isset($item['icon']) && $migration_allowed;
                                if (!empty($item['icon']) || (!empty($item['selected_icon']['value']) && $is_new)) :
                                ?>
                                    <span class="icon-list-icon">
                                        <?php
                                        if ($is_new || $migrated) {
                                            Icons_Manager::render_icon($item['selected_icon'], ['aria-hidden' => 'true']);
                                        } else { ?>
                                            <i class="<?php echo esc_attr($item['icon']); ?>" aria-hidden="true"></i>
                                        <?php } ?>
                                    </span>
                                <?php endif; ?>
                                <span <?php $this->print_render_attribute_string($repeater_setting_key); ?>><?php $this->print_unescaped_setting('text', 'icon_list', $index); ?></span>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <div class="amt-section-btn-wrapper">
                    <?php if ($data['button_display'] == 'yes') { ?>
                        <a <?php $this->print_render_attribute_string($btn_key); ?> class="tp-btn"><?php echo $data['amt-button']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>