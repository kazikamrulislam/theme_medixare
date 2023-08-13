<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;
use MedixareTheme_Helper;
use WP_Query;

if( is_rtl() ) {
    $rtl = 'rtl';
}else {
    $rtl = 'ltr';
}
$ticker_data = array(
    'speed'             =>$data['ticker_speed'],
    'titleText'         =>$data['ticker_title'],
    'displayType'       =>$data['display_type'],
    'pauseOnItems'      =>$data['ticker_delay'],
    'direction'         => $rtl,
);
$ticker_data = json_encode( $ticker_data );

?>

<div class="amt-news-ticker" data-xld ='<?php echo esc_attr( $ticker_data );?>'>
    <ul id="amt-news-ticker" class="js-hidden">
    <?php
        $no_duplicate_post = array();
            $post_number = $data['ticker_item'];          
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $post_number,
                'post__not_in' => $no_duplicate_post
            );
            
            $the_query = new WP_Query( $args );
            
            while ( $the_query->have_posts() ) {

                $the_query->the_post();
                
                $no_duplicate_post[] = get_the_ID();
            ?>
                <li class="news-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php }
        wp_reset_postdata();
     ?>
    </ul>
</div>
