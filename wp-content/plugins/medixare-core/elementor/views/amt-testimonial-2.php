<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

namespace Elementor;

use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
use MedixareTheme;
use MedixareTheme_Helper;
?>

<style>
    .swiper.medixareswiper2 {
        width: 100%;
        height: 100%;
        padding: 30px 0;
    }
    .swiper-wrapper {
        align-items: center;
    }
    .swiper-slide {
        text-align: left !important;
        font-size: 18px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .swiper-slide img {
        display: block;
        object-fit: contain;
    }
    <?php if ($data['smooth_sliding'] == 'yes') {
        echo ".swiper-android .swiper-slide, .swiper-wrapper {
          transition-timing-function: linear;
    }";
    } ?>
    .swiper-button-next,
    .swiper-button-prev {
        background-image: <?php ?>;
    }
    .testi_btn_next {
        z-index: 1000;
    }
    .testi_btn_prev {
        z-index: 1000;
    }
</style>

<div class="swiper medixareswiper2 amt-testimonial-2">
    <div class=" swiper-wrapper">
        <?php
        foreach ($data['testimonial_items'] as $index => $item) :
        ?>
            <div class="swiper-slide">
                <div class="amt-testimonial__content">
                    <div class="amt-testimonial__avata p-relative">
                        <div class="author_image">
                            <?php if (!empty($item['testimonial_author_img']['id'])) {
                                echo wp_get_attachment_image($item['testimonial_author_img']['id'], 'full');
                            } else {
                                echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/hero-shape-2.png') . '" alt="' . get_the_title() . '">';
                            }
                            ?>
                        </div>
                        <div class="amt-testimonial__avata-quote">
                            <span>
                            <?php if ( $data['icon_display'] == 'yes' ) { ?>
                                <i class="<?php echo esc_attr($data['testimonial_icon']['value']); ?>" aria-hidden="true"></i>
                              <?php } ?>
                            </span>
                        </div>
                    </div>
                    <div class="tp-testimonial__reviewer-wrapper mb-40">
                        <div class="author_meta">
                            <div class="author_name">
                                <h3 class="author-name-value"><a href="<?php ?>"><?php echo esc_attr($item['testimonial_author_name']); ?></a></h3>
                            </div>
                            <h4 class="author_designation"><a href="<?php ?>"><?php echo esc_attr($item['testimonial_author_designation']); ?></a></h4>
                        </div>
                        <div class="star-ratings">
                            <div class="fill-ratings" style="width: <?php echo (($item['testimonial_reting']) * 20) ?>%; color:#000;">
                                <span>★★★★★</span>
                            </div>
                            <div class="empty-ratings">
                                <span>★★★★★</span>
                            </div>
                        </div>
                    </div>
                    <div class="amt_testimonial_content">
                        <?php echo esc_attr($item['testimonial_description']); ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
    <?php
    $show_dots = (in_array($data['navigation'], ['dots', 'both']));
    $show_arrows = (in_array($data['navigation'], ['arrows', 'both']));
    ?>
    <?php if ($show_arrows) : ?>
        <!-- <div class="swiper-button-next testi_btn_next"></div>
        <div class="swiper-button-prev testi_btn_prev"></div> -->
    <?php endif; ?>

    <?php if ($show_dots) : ?>
        <div class="swiper-pagination testi_pagination"></div>
    <?php endif; ?>
</div>



<?php
$scripts = '
<script>
    jQuery( document ).ready(function() {
          var medixareswiper2 = new Swiper(".medixareswiper2", {';
$scripts .= 'slidesPerView: ' . $data['slide_perview2'] . ',
            spaceBetween: ' . $data['space_between']['size'] . ',
            slidesPerGroup: ' . $data['slide_per_group'] . ',
            speed: ' . $data['autoplay_speed'] . ',';

if ($data['autoplay'] == "yes") {
    $scripts .= 'autoplay: {delay:3000},';
} elseif ($data['smooth_sliding'] == 'yes') {
    $scripts .= 'autoplay: {delay:1},';
}
if ($data['loop'] == "yes") {
    $scripts .= 'loop: true,';
}
$scripts .= '            
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
            // navigation: {
            //   nextEl: ".swiper-button-next",
            //   prevEl: ".swiper-button-prev",
            // },
            breakpoints: {
              320: {
                slidesPerView: ' . $data['slide_perview2_mobile'] . ',
                spaceBetween: ' . $data['space_between_mobile']['size'] . ',
              },
              768: {
                slidesPerView: ' . $data['slide_perview2_tablet'] . ',
                spaceBetween: ' . $data['space_between_tablet']['size'] . ',
              },
              1024: {
                slidesPerView: ' . $data['slide_perview2'] . ',
                spaceBetween: ' . $data['space_between']['size'] . ',
              },
            },
          });
    });
</script>';

echo $scripts;

?>