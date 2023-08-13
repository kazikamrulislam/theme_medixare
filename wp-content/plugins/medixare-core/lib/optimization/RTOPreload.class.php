<?php 
// Security check
defined('ABSPATH') || die();

class RTOPreload{

    public function __construct(){

        add_action('wp_head', [&$this, 'preload']);
        add_action('wp_head', [&$this, 'preconnect']);

    }

    public function preload(){

        global $amt_optimize;
        
        if( !empty( trim($amt_optimize->options->get_option('rt_preload_list')) ) )
            $urls = array_map('trim', explode(',', ($amt_optimize->options->get_option('rt_preload_list'))));
        else return;

        foreach ($urls as $url) {
            echo "<link rel='preload' href='{$url}' as='font' type='font/woff2' crossorigin />";
        }


    }

    public function preconnect(){
        
        global $amt_optimize;
        
        if( !empty( trim($amt_optimize->options->get_option('rt_preconnect_list')) ) )
            $urls = array_map('trim', explode(',', ( trim($amt_optimize->options->get_option('rt_preconnect_list')) )));
        else return;

        foreach ($urls as $url) {
            echo "<link rel='preconnect' href='{$url}' />";
        }

    }

}

new RTOPreload();