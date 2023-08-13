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
      .swiper.medixareswiper{
        width: 100%;
        height: 100%;
        padding: 30px 0;
      }
      /* .swiper-container-horizontal>.swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction {
        bottom: 0px; 
        left: 50%;
        width: 100%;
      } */
      .swiper-wrapper{
        align-items: center;
      }
      .swiper-slide {
        text-align: center;
        font-size: 18px;
        /* background: #fff; */
        /* Center slide text vertically */
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
        /* width: 100%;
        height: 100%; */
        object-fit: contain;
      }
      <?php if ($data['smooth_sliding']=='yes') {
        echo ".swiper-android .swiper-slide, .swiper-wrapper {
          transition-timing-function: linear;
        }";
      }?>
      .swiper-button-next, .swiper-button-prev{
        background-image: <?php ?>;
      }
      .partner_btn_next{
        z-index: 1000;
      }
      .partner_btn_prev{
        z-index: 1000;
      }
    </style>

    <div class="swiper medixareswiper">
      <div class="swiper-wrapper">
      <?php
            foreach ( $data['slider_items'] as $index => $item ) :
            ?>
            <div class="swiper-slide">
                <div class="amt-single-partner-item">
                    <?php if ( !empty( $item['slider_img']['id'] ) ) { 
                    echo wp_get_attachment_image( $item['slider_img']['id'], 'full' ); 
                    } else { 
                        echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/brand-2.jpg') . '" alt="' . get_the_title() . '">';
                    } ?>
                </div>
            </div>
        <?php
            endforeach;
        ?>

      </div>
      <?php
      $show_partners_dots = ( in_array( $data['partners-navigation'], [ 'partners_dots', 'partners_both' ] ) );
      $show_partners_arrows = ( in_array( $data['partners-navigation'], [ 'partners_arrows', 'partners_both' ] ) );
      ?>
      <?php if ( $show_partners_arrows ) : ?>
        <div class="swiper-button-next partner_btn_next"></div>
        <div class="swiper-button-prev partner_btn_prev"></div>
      <?php endif; ?>
      
      <?php if ( $show_partners_dots ) : ?>
        <div class="swiper-pagination partner_pagination"></div>
      <?php endif; ?>
      
    </div>


<?php 
$scripts = '
<script>
    jQuery( document ).ready(function() {
          var medixareswiper = new Swiper(".medixareswiper", {';
$scripts .= 'slidesPerView: '.$data['slide_perview'].',
            spaceBetween: '.$data['space_between']['size'].',
            slidesPerGroup: '.$data['slide_per_group'].',
            speed: '.$data['autoplay_speed'].',';
            
if ($data['autoplay']=="yes") {
  $scripts .= 'autoplay: {delay:3000},';
}elseif ($data['smooth_sliding']=='yes') {
  $scripts .= 'autoplay: {delay:1},';
}
if ($data['loop']=="yes") {
  $scripts .= 'loop: true,';
}
$scripts .= '            
            pagination: {
              el: ".partner_pagination",
              clickable: true,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            breakpoints: {
              320: {
                slidesPerView: '.$data['slide_perview_mobile'].',
                spaceBetween: '.$data['space_between_mobile']['size'].',
              },
              768: {
                slidesPerView: '.$data['slide_perview_tablet'].',
                spaceBetween: '.$data['space_between_tablet']['size'].',
              },
              1024: {
                slidesPerView: '.$data['slide_perview'].',
                spaceBetween: '.$data['space_between']['size'].',
              },
            },
          });
    });
</script>';

echo $scripts;

?>