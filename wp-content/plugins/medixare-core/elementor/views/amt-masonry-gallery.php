<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;
namespace Elementor;

use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;

?>
<style>
/* * {
  box-sizing:border-box;
} */
/* html {
  background: yellow;
  display: grid;
  height: 100vh;
  padding:0.5em;
} */
/* body {
  background: black;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-template-rows: repeat(24, 1fr);
  grid-auto-flow: column dense;
  max-height: 100%;
  max-width: 100%;
  aspect-ratio: 1 / 0.88;
  gap: 5px;
  padding: 2vmin;
  margin: auto;
  border-radius:10px;
} */

/* .masonry_gallery img {
  max-height: 100%;
  max-width: 100%;
  box-shadow:0 0 0 1px white;
  border-radius:5px;
  display:block;
}
.masonry_gallery img:nth-child(1) {
  grid-row: 1 / span 17;
  grid-column: 1;
}
.masonry_gallery img:nth-child(2) {
  grid-row: 18 / span 8;
  grid-column: 1;
}
.masonry_gallery img:nth-child(3) {
  grid-row: 1 / span 12;
  grid-column: 2;
}
.masonry_gallery img:nth-child(4) {
  grid-row: 13 / span 12;
  grid-column: 2;
}
.masonry_gallery img:nth-child(5) {
  grid-row: 1 / span 8;
  grid-column: 3;
}
.masonry_gallery img:nth-child(6) {
  grid-row: 9 / span 8;
  grid-column: 3;
}
.masonry_gallery img:nth-child(7) {
  grid-row: 17 / span 8;
  grid-column: 3;
} */
#photos {
   /* Prevent vertical gaps */
   line-height: 0;
   
   -webkit-column-count: 3;
   -webkit-column-gap:   0px;
   -moz-column-count:    3;
   -moz-column-gap:      10px;
   column-count:         3;
   column-gap:           0px;
}

#photos img {
  /* Just in case there are inline attributes */
  width: 100% !important;
  height: auto !important;
  padding: 10px
  ;
}

@media (max-width: 1200px) {
  #photos {
  -moz-column-count:    3;
  -webkit-column-count: 3;
  column-count:         3;
  }
}
@media (max-width: 1000px) {
  #photos {
  -moz-column-count:    3;
  -webkit-column-count: 3;
  column-count:         3;
  }
}
@media (max-width: 800px) {
  #photos {
  -moz-column-count:    2;
  -webkit-column-count: 2;
  column-count:         2;
  }
}
@media (max-width: 400px) {
  #photos {
  -moz-column-count:    1;
  -webkit-column-count: 1;
  column-count:         1;
  }
}
</style>
<section id="photos">
    <div class="masonry_gallery">
        <!-- <img src="https://picsum.photos/id/1025/265/490">
        <img src="https://picsum.photos/id/1027/265/200">
        <img src="https://picsum.photos/id/103/265/345">
        <img src="https://picsum.photos/id/1035/265/345">
        <img src="https://picsum.photos/id/1051/265/230">
        <img src="https://picsum.photos/id/1039/265/230">
        <img src="https://picsum.photos/id/1054/265/230"> -->
        <?php
            foreach ( $data['masonry_gallery'] as $index => $item ) :
            ?>
                <?php if ( !empty( $item['masonry_image']['id'] ) ) { 
                echo wp_get_attachment_image( $item['masonry_image']['id'], 'full' ); 
                } else { 
                    echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/about-6.jpg') . '" alt="' . get_the_title() . '">';
                } ?>
        <?php
            endforeach;
        ?>
    </div>
</section>

<script>
    function getRandomSize(min, max) {
        return Math.round(Math.random() * (max - min) + min);
    }

var allImages = "";

    for (var i = 0; i < 30; i++) {
        var width = getRandomSize(200, 400);
        var height =  getRandomSize(200, 400);
        allImages += '<img src="https://placekitten.com/'+width+'/'+height+'?random='+i+'" alt="gallery photo">';
    }

    $('#photos').append(allImages);
</script>