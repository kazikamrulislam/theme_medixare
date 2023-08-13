<?php 
// Security check
defined('ABSPATH') || die();

class RTOjQuery{

    public function __construct(){

        add_filter('wp_default_scripts', [&$this, 'dequeue_jquery_migrate']);
        add_action('wp_enqueue_scripts', [&$this, 'lazy_background']);

    }

    public function dequeue_jquery_migrate(&$scripts){

        global $amt_optimize;

        
        if ( 
            (!empty($amt_optimize->options->get_option('rt_jquery_migrate')) && $amt_optimize->options->get_option('rt_jquery_migrate') == true)
        ) {

            $scripts->remove( 'jquery' ); 
            $scripts->add( 'jquery', false, array( 'jquery-core' ) ); 

        }

    }

    public function lazy_background(){
        
        global $amt_optimize;
        
        if( !empty($amt_optimize->options->get_option('rt_jquery_passive_event_listener')) && $amt_optimize->options->get_option('rt_jquery_passive_event_listener') == true ){

            wp_register_script('jquery-passive-event',  $amt_optimize->config['FolderURL']. 'js/jquery.passive.event.js', array('jquery'),'1.0', true);
            wp_enqueue_script('jquery-passive-event');

        }

    }

}

new RTOjQuery();