<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;

$medixare_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'medixare_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'medixare_views' ) ) ? true : false;

$medixare_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'medixare_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'medixare_views' ) ) ? true : false;

$thumb_size = 'medixare-size1';

$p_ids = array();
foreach ( $data['posts_not_in'] as $p_idsn ) {
    $p_ids[] = $p_idsn['post_not_in'];
}
$args = array(
    'posts_per_page'    => $data['itemlimit']['size'],
    'order'             => $data['post_ordering'],
    'orderby'           => $data['post_orderby'],
    'offset'            => $data['number_of_post_offset'],
    'post__not_in'      => $p_ids,
    'post_type'         => 'post'
);

if(!empty($data['catid'])){
    if( $data['query_type'] == 'category'){
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $data['catid'],                    
            ],
        ];

    }
}
if(!empty($data['postid'])){
    if( $data['query_type'] == 'posts'){
        $args['post__in'] = $data['postid'];
    }
}

$query = new WP_Query( $args );
$temp = MedixareTheme_Helper::wp_set_temp_query( $query );

?>

<div class="rt-thumb-slider-default medixare-horizontal-slider rt-thumb-slider-<?php echo esc_attr( $data['slider_style'] );?> <?php echo esc_attr( $data['nav_style'] );?>">
    <div class="swiper-container horizontal-slider" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
        <div class="swiper-wrapper">
        <?php
        if ( $query->have_posts() ) :?>
        <?php while ( $query->have_posts() ) : $query->the_post();?>
        <?php
        
            $content = MedixareTheme_Helper::get_current_post_content();
            $content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
            $content = "<p>$content</p>";
            $title = wp_trim_words( get_the_title(), $data['title_count'], '' );
            $medixare_comments_number = number_format_i18n( get_comments_number() );
            $medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare-core' ) : esc_html__( 'Comments' , 'medixare-core' );
            $medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number . '</span> ' . $medixare_comments_html;
        
            $medixare_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

            ?>
            <div class="swiper-slide">
                <div class="rt-item rt-slide" data-bg-image="<?php echo get_the_post_thumbnail_url(); ?>">
                   <div class="container">
                      <div class="row <?php echo esc_attr( $data['content_align'] );?>">
                         <div class="col-md-10 col-12">
                            <div class="entry-content">
                               <?php if ( $data['post_category'] == 'yes' ) { ?>
                                    <?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
                                    <span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
                                    <?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
                                    <span class="entry-categories style-2 meta-dark-color"><?php echo the_category( ', ' );?></span>
                                    <?php } ?>
                                <?php } ?>  
                                <?php if ( $data['post_date'] == 'yes' ) { ?> 
                                    <ul class="entry-meta meta-light-color">
                                        <li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>             
                                    </ul>
                                <?php } ?>
                               <h1 class="entry-title title-size-lg title-light-color mb-3"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h1>
                               <?php if ( $data['content_display'] == 'yes' ) { ?>
                                    <div class="entry-text body-light-color"><?php echo wp_kses_post( $content );?></div>
                                <?php } ?>                            
                               <?php if ( $medixare_has_entry_meta1 ) { ?>
                                <ul class="entry-meta meta-light-color">
                                    <?php if ( $data['post_author'] == 'yes' ) { ?>
                                    <li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>
                                    <?php } if ( $data['post_comment'] == 'yes' ) { ?>
                                    <li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
                                    <?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'medixare_reading_time' ) ) { ?>
                                    <li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
                                    <?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'medixare_views' ) ) { ?>
                                    <li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                                <?php if ( $data['post_read'] == 'yes' ) { ?>
                                    <div class="post-read-more"><a class="button-style-1 button-text-light" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['read_more_text'] ); ?><i class="fas fa-arrow-right"></i></a></div>
                                <?php } ?>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
        <?php endwhile;?>        
        <?php endif;?>
         <!-- end swiper-slide -->        
        </div>
    </div>
    <?php if ( $data['display_arrow'] == 'yes' ) { ?>
        <div class="swiper-navigation">
            <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
            <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
        </div>
    <?php } ?>
    <?php MedixareTheme_Helper::wp_reset_temp_query( $temp );?>
</div>