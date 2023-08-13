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

/**
 * 
 */
class AjaxLoadMore {
	
	function __construct() {
		add_action( 'wp_ajax_load_more_blog1', array(&$this, 'medixare_load_more_func_blog1' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog1', array(&$this, 'medixare_load_more_func_blog1' ));

    	add_action( 'wp_ajax_load_more_blog2', array(&$this, 'medixare_load_more_func_blog2' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog2', array(&$this, 'medixare_load_more_func_blog2' ));

    	add_action( 'wp_ajax_load_more_blog3', array(&$this, 'medixare_load_more_func_blog3' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog3', array(&$this, 'medixare_load_more_func_blog3' ));

    	add_action( 'wp_ajax_load_more_blog4', array(&$this, 'medixare_load_more_func_blog4' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog4', array(&$this, 'medixare_load_more_func_blog4' ));

    	add_action( 'wp_ajax_load_more_blog5', array(&$this, 'medixare_load_more_func_blog5' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog5', array(&$this, 'medixare_load_more_func_blog5' ));

    	add_action( 'wp_ajax_load_more_blog6', array(&$this, 'medixare_load_more_func_blog6' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog6', array(&$this, 'medixare_load_more_func_blog6' ));

    	add_action( 'wp_ajax_load_more_list_one', array(&$this, 'medixare_list_one_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_list_one', array(&$this, 'medixare_list_one_load_more_func' ));

	}

	/* - Ajax Loadmore Function for Bolg Layout 1
	--------------------------------------------------------*/
	public function medixare_load_more_func_blog1() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  MedixareTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$ul_class = $post_classes = '';

		$thumb_size = 'medixare-size3';

		$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

		$medixare_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

		$medixare_comments_number = number_format_i18n( get_comments_number() );
		$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
		$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

		$thumbnail = false;
		$wow = MedixareTheme::$options['blog_animation'];
		$effect = MedixareTheme::$options['blog_animation_effect'];

		if (  MedixareTheme::$layout == 'right-sidebar' || MedixareTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-md-6 col-12 amt-grid-item blog-layout-1 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-md-6 col-12 amt-grid-item blog-layout-1 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty(has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( MedixareTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}			

	    if( have_posts() ) : while( have_posts() ) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '' );
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );			
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) || ( !empty( has_post_thumbnail() ) || MedixareTheme::$options['display_no_preview_image'] == '1') ) { ?>
					<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
						<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<?php if ( has_post_thumbnail() || MedixareTheme::$options['display_no_preview_image'] == '1') { ?>
							<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) { 
								the_post_thumbnail( $thumb_size, ['class' => ''] ); 
								} elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {						
									echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_540X400.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								} ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="entry-content">
					<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
					<?php } ?>	
					<?php if ( $medixare_has_entry_meta ) { ?>			
					<ul class="entry-meta meta-dark-color">
						<?php if ( MedixareTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>								
						<?php } if ( MedixareTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) { ?>
						<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>				
					<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( MedixareTheme::$options['button_text'] );?><i class="fas fa-arrow-right"></i></a>
			        </div>		
				</div>
			</div>
		</div>

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 2
	--------------------------------------------------------*/
	public function medixare_load_more_func_blog2() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  MedixareTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$ul_class = $post_classes = '';

		$thumb_size = 'medixare-size6';

		$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

		$medixare_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

		$medixare_comments_number = number_format_i18n( get_comments_number() );
		$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
		$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

		$thumbnail = false;

		$wow = MedixareTheme::$options['blog_animation'];
		$effect = MedixareTheme::$options['blog_animation_effect'];

		if (  MedixareTheme::$layout == 'right-sidebar' || MedixareTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-6 col-lg-12 col-md-6 col-12 blog-layout-2 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-xl-6 col-lg-12 col-md-6 col-12 blog-layout-2 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty( has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( MedixareTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}		

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) || ( !empty( has_post_thumbnail() ) || MedixareTheme::$options['display_no_preview_image'] == '1') ) { ?>
				<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-top-left">
							<a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a>
						</div>
					<?php } ?>
					<?php if ( !empty ( has_post_thumbnail() ) || MedixareTheme::$options['display_no_preview_image'] == '1') { ?>
					<a class="figure-overlay" href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
						<?php } elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
							echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_560X680.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
						} ?>
					</a>
					<?php } ?>
				</div>
				<?php } ?>
				<div class="entry-content">
					<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
					<?php } ?>	
					<?php if ( $medixare_has_entry_meta ) { ?>			
					<ul class="entry-meta meta-light-color">
						<?php if ( MedixareTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>								
						<?php } if ( MedixareTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) { ?>
						<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<h3 class="entry-title title-size-lg title-light-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( $medixare_has_entry_meta ) { ?>
					<?php } ?>
					<?php if ( MedixareTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>
					<div class="post-read-more"><a class="button-style-1 button-text-light" href="<?php the_permalink();?>"><?php echo esc_html( MedixareTheme::$options['button_text'] );?><i class="fas fa-arrow-right"></i></a>
			        </div>			
				</div>
			</div>
		</div> 

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 3
	--------------------------------------------------------*/
	public function medixare_load_more_func_blog3() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  MedixareTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$ul_class = $post_classes = '';

		$thumb_size = 'medixare-size6';

		$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

		$medixare_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

		$medixare_comments_number = number_format_i18n( get_comments_number() );
		$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
		$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

		$thumbnail = false;

		$wow = MedixareTheme::$options['blog_animation'];
		$effect = MedixareTheme::$options['blog_animation_effect'];

		if (  MedixareTheme::$layout == 'right-sidebar' || MedixareTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-6 col-lg-12 col-md-6 col-12 blog-layout-3 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-xl-6 col-lg-12 col-md-6 col-12 blog-layout-3 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty( has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( MedixareTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}
		

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
					<a href="<?php the_permalink(); ?>" class="figure-overlay"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
							<?php } elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
								echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_560X680.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							}
						?>
					</a>
				</div>
				<div class="entry-content">
					<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
					<?php } ?>	
					<?php if ( $medixare_has_entry_meta ) { ?>			
					<ul class="entry-meta meta-light-color">
						<?php if ( MedixareTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>								
						<?php } if ( MedixareTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) { ?>
						<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<h3 class="entry-title title-size-lg title-light-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>		
				</div>
			</div>
		</div> 

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 4
	--------------------------------------------------------*/
	public function medixare_load_more_func_blog4() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  MedixareTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$thumb_size = 'medixare-size4';

		$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

		$medixare_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
		$medixare_time_html       = apply_filters( 'medixare_single_time', $medixare_time_html );

		$medixare_comments_number = number_format_i18n( get_comments_number() );
		$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
		$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

		$wow = MedixareTheme::$options['blog_animation'];
		$effect = MedixareTheme::$options['blog_animation_effect'];		

		if ( empty(has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( MedixareTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-4 ' . $wow . ' ' . $effect ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( !empty( has_post_thumbnail() ) || MedixareTheme::$options['display_no_preview_image'] == '1') ) { ?>
				<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
					<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories style-1 position-absolute"><?php echo medixare_category_prepare(); ?></span>
					<?php } ?>
					<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
						<?php } elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
								echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_700X600.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							}
						?>
					</a>				
				</div>
				<?php } ?>
				<div class="entry-content">	
					<?php if ( !has_post_thumbnail() ) { ?>
					<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
					<?php } } ?>		
					<?php if ( $medixare_has_entry_meta ) { ?>
					<ul class="entry-meta">
						<?php if ( MedixareTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>								
						<?php } if ( MedixareTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) { ?>
						<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( MedixareTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>
					<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( MedixareTheme::$options['button_text'] );?><i class="fas fa-arrow-right"></i></a>
			        </div>		
				</div>
			</div>
		</div>

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 5
	--------------------------------------------------------*/
	public function medixare_load_more_func_blog5() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  MedixareTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$thumb_size = 'medixare-size1';

		$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

		$medixare_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
		$medixare_time_html       = apply_filters( 'medixare_single_time', $medixare_time_html );

		$medixare_comments_number = number_format_i18n( get_comments_number() );
		$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
		$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

		$wow = MedixareTheme::$options['blog_animation'];
		$effect = MedixareTheme::$options['blog_animation_effect'];


		if ( empty(has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( MedixareTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-5 ' . $wow . ' ' . $effect ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) || ( !empty( has_post_thumbnail() ) || MedixareTheme::$options['display_no_preview_image'] == '1') ) { ?>
				<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-center"><a class="rt-play play-btn size-lg amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
					<?php if ( has_post_thumbnail() || MedixareTheme::$options['display_no_preview_image'] == '1') { ?>
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
						<?php } elseif ( empty( MedixareTheme::$options['display_no_preview_image'] == '1' ) ) {
								echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_1296X600.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							}
						?>
					</a>
					<?php } ?>				
				</div>
				<?php } ?>
				<div class="entry-content">
					<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
					<?php } ?>
					<?php if ( $medixare_has_entry_meta ) { ?>
					<ul class="entry-meta">
						<?php if ( MedixareTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>								
						<?php } if ( MedixareTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) { ?>
						<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<h3 class="entry-title title-size-xl title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( MedixareTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>	
					<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( MedixareTheme::$options['button_text'] );?><i class="fas fa-arrow-right"></i></a>
			        </div>	
				</div>
			</div>
		</div>

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 6
	--------------------------------------------------------*/
	public function medixare_load_more_func_blog6() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  MedixareTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$thumb_size = 'medixare-size2';

		$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

		$medixare_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

		$medixare_comments_number = number_format_i18n( get_comments_number() );
		$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
		$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

		$thumbnail = false;

		if ( empty(has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( MedixareTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}		

		$wow = MedixareTheme::$options['blog_animation'];
		$effect = MedixareTheme::$options['blog_animation_effect'];


	    if(have_posts()) : while(have_posts()) : the_post();
		    $id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-6 ' . $wow . ' ' . $effect ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( !empty( has_post_thumbnail() ) || MedixareTheme::$options['display_no_preview_image'] == '1') ) { ?>
					<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
						<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="amt-video video-btn-wrap position-center"><a class="rt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
								<?php } elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
								echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_1020X600.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							} ?>
						</a>
					</div>
				<?php } ?>
				<div class="entry-content">
					<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
						<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
					<?php } ?>	
					<?php if ( $medixare_has_entry_meta ) { ?>
					<ul class="entry-meta">
						<?php if ( MedixareTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>								
						<?php } if ( MedixareTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
						<?php } if ( MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) { ?>
						<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( MedixareTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>			
					<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( MedixareTheme::$options['button_text'] );?><i class="fas fa-arrow-right"></i></a>
			        </div>		
				</div>
			</div>
		</div>

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}


	/* - Ajax Loadmore Function for addon list layout 01
	--------------------------------------------------------*/
	public function medixare_list_one_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

		$medixare_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'medixare_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'medixare_views' ) ) ? true : false;

		$thumb_size = 'medixare-size3';

		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);
		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

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
		$i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :
			
		while ( $query->have_posts() ) : $query->the_post();				

			$content = MedixareTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$medixare_comments_number = number_format_i18n( get_comments_number() );
			$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
			$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number . '</span> ' . $medixare_comments_html;			
			$medixare_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );

			?>
			<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<div class="amt-item single-post-item">
					<div class="rt-image">
						<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="amt-video video-btn-wrap position-center"><a class="rt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<a href="<?php the_permalink(); ?>">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_700X600.jpg' ) . '" alt="'.get_the_title().'">';
								}
							?>
						</a>						
					</div>
					<div class="entry-content">						
						<?php if ( $data['post_category'] == 'yes' ) { ?>
							<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
							<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
							<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
							<span class="entry-categories style-2 meta-dark-color"><?php echo the_category( ', ' );?></span>
							<?php } ?>
						<?php } ?>	
						<?php if ( $medixare_has_entry_meta ) { ?>
						<ul class="entry-meta meta-dark-color">
							<?php if ( $data['post_date'] == 'yes' ) { ?>
							<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>	
							<?php } if ( $data['post_author'] == 'yes' ) { ?>	
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
						<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<?php if ( $data['content_display'] == 'yes' ) { ?>
							<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
						<?php } ?>							
						<?php if ( $data['post_read'] == 'yes' ) { ?>
						<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['read_more_text'] ); ?><i class="fas fa-arrow-right"></i></a>
				        </div>
				    	<?php } ?>
					</div>
				</div>
			</div>
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif; ?>
		<?php 
		wp_reset_postdata(); 
		wp_die();
	}	
}

new AjaxLoadMore();