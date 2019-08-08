<?php
/**
 * Plugin Name: Plugin Demo khanh
 * Plugin URI:
 * Description: Plugin test
 * Version: 1999
 * Author: khanh duy
 * License: GPLv2 or later
 */
define('khanh_WP_PLUGIN_URL',plugin_dir_url(__FILE__));
define('khanh_WP_PLUGIN_DIR',plugin_dir_path(__FILE__));
define('khanh_WP_VIEW_DIR',plugin_dir_path(__FILE__));
echo '';
//  $path = dirname (__FILE__).'include/admin.php';
//  echo $path;
//register_activation_hook (__FILE__,'khanh_mp_active');
//function khanh_mp_active(){
    // $khanh_mp_options = array(
    //     'course' => 'wordpress',
    //     'author' => 'khanh group'
    // );
    // add_option("khanh_mp_options",$khanh_mp_options,"","yes");
        // global $wpdb;
        // $table = $wpdb->prefix."khanh_mp_plugintest";
//}
// $includeDir = plugin_dir_path(__FILE__).'/include';
// include_once $includeDir.'/public.php';
// $khanh_pl = new khanh_wp_myplugin();
// add_action('wp_footer',array($khanh_pl,'khanh_wp_creat'));
require_once khanh_WP_PLUGIN_DIR.'/include/widget.php';
if(!is_admin()){
    require_once khanh_WP_PLUGIN_DIR.'/include/public.php';
    
    new khanh_wp_myplugin();
}else{
    require_once khanh_WP_PLUGIN_DIR.'/include/admin.php';
    new khanhMyAdmin();
}