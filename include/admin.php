<?php
require_once khanh_WP_PLUGIN_DIR . '/include/support.php';
class khanhMyAdmin
{
    //private $_menuslug = 'khanh-wp-setting';
    public function __construct()
    {
        //echo '<br>'.__METHOD__;
        add_action('admin_menu', array($this, 'settingMenu2'));
        //add_action('admin_init', array($this, 'register_activation'));
        add_action( 'admin_head', function() {
            remove_submenu_page( 'khanh-wp-my-setting-2', 'khanh-wp-my-setting-2-edit-prd' );
        });
        add_action( 'admin_head', function() {
            remove_submenu_page( 'khanh-wp-my-setting-2', 'khanh-wp-my-setting-2-del-prd' );
        });
    }
    public function settingPage2()
    {
        //require_once khanh_WP_VIEW_DIR.'/view/phao.php';
        //addDB();
    }
    public function category()
    {
        //require_once khanh_WP_VIEW_DIR .'/view/add_category.php';
        require_once khanh_WP_VIEW_DIR .'/view/categorys.php';
        //add_Category();
      
    }
    public function allproduct()
    {
        require_once khanh_WP_VIEW_DIR.'/view/list_product.php';
        //get_customer_gain();
    }
    public function addproduct(){
        require_once khanh_WP_VIEW_DIR.'/view/add_products.php';
        addDB();
    }
    public function editprd(){
        require_once khanh_WP_PLUGIN_DIR.'/view/edit_product.php';
        edit_product();
    }
    public function delprd(){
        require_once khanh_WP_PLUGIN_DIR.'/view/del_product.php';
    }
    public function settingMenu2()
    {
        $menu_slug = 'khanh-wp-my-setting-2';
        add_menu_page(
            'My Setting title',
            'Products',
            Null,
            $menu_slug,
            array($this, 'settingPage2'),
            khanh_WP_PLUGIN_URL . '/images/box.png',
            5
        );
        add_submenu_page($menu_slug, 'All product', 'All product', 'manage_options', $menu_slug . '-list', array($this, 'allproduct'));
        add_submenu_page($menu_slug, 'Add product', 'Add product', 'manage_options', $menu_slug . '-add-prd', array($this, 'addproduct'));
        add_submenu_page($menu_slug, 'Category', 'Category', 'manage_options', $menu_slug . '-cate', array($this, 'category'));
        add_submenu_page($menu_slug, 'Edit product', 'Edit product', 'manage_options', $menu_slug . '-edit-prd', array($this, 'editprd'));
        add_submenu_page($menu_slug, 'Delete product', 'Delete product', 'manage_options', $menu_slug . '-del-prd', array($this, 'delprd'));
    }
    
    public function register_activation()
    {
        // register_setting('khanh_wp_options', 'khanh_wp_name', array($this, 'validate_setting'));
        //
        //register_activation_hook(__FILE__, 'pu_insert_custom_table');
        // $ten_Section_setting = 'khanh_wp_ho_section';
        //add_settings_section($ten_Section_setting, 'Nhập Họ Tên', array($this, 'main_section_view'), $this->_menuslug);
        //add_settings_field('khanh_wp_title', 'Họ', array($this, 'new_title_input'), $this->_menuslug, $ten_Section_setting);
        //
        //$ho_Section_setting = 'khanh_wp_ten_section';
        //add_settings_section('khanh-wp-exit-section', 'Họ', array($this, 'main_section_view'), $this->_menuslug);
        // add_settings_field('khanh_wp_title_2', 'Tên', array($this, 'new_title2_input'), $this->_menuslug, $ten_Section_setting);
        // add_settings_field('khanh_wp_position', 'Quyền', array($this, 'demo_select_display'), $this->_menuslug, $ten_Section_setting);
        // add_settings_field('khanh_wp_male', 'Nam', array($this, 'demo_select_nam'), $this->_menuslug, $ten_Section_setting);
        // add_settings_field('khanh_wp_female', 'Nữ', array($this, 'demo_select_nu'), $this->_menuslug, $ten_Section_setting);
    }
    // public function addDB()
    // {
    //     if (isset($_POST['submit'])) {
    //         global $wpdb;
    //         $table = $wpdb->prefix . 'kh_product';
    //         $prd_name = $_POST['prd_name'];
    //         $prd_price = $_POST['prd_price'];
    //         $prd_category = $_POST['prd_category'];
    //         $prd_detail = $_POST['prd_detail'];
    //         $sql = $wpdb->prepare("INSERT INTO $table (prd_name,prd_price,prd_category,prd_detail) value('$prd_name','$prd_price','$prd_category','$prd_detail')");
    //         $wpdb->query($sql);
    //     }
    // }

}
