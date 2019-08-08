<?php
require_once khanh_WP_PLUGIN_DIR.'/include/support.php';
class khanh_wp_myplugin{
    public function __construct(){
            //echo '<br/>'.__class__;
            add_filter('the_title', array($this,'theTitle'),10,2);
    }
    public function theTitle($title,$id){
        // $str = "Tiêu đề bài viết";
        // return $str;
        if($id == 2){
            $title = str_replace('Page','Xin chào',$title);
        }
        return $title;
    }
}