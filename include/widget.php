<?php
add_action('widgets_init', function() {
    register_widget('khanh_Widget');
});	
class khanh_Widget extends WP_Widget
{

    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'khanh_Widget',
            'description' => 'My Widget is awesome',
        );
        parent::__construct(
            'khanh_Widget',
            'khanh Widget',
            $widget_ops
        );
        
    }
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function khanh_Widget()
    {
        $tpwidget_options = array(
            'classname' => 'khanh_widget_class', //ID của widget
            'description' => 'Mô tả của widget'
        );
        $this->WP_Widget('khanh_widget_id', 'khanh Widget', $tpwidget_options);
    }

    /**
     * Tạo form option cho widget
     */
    function form($instance)
    {

        //Biến tạo các giá trị mặc định trong form
        $default = array(
            'title' => 'Tiêu đề widget'
        );

        //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định
        $instance = wp_parse_args((array) $instance, $default);

        //Tạo biến riêng cho giá trị mặc định trong mảng $default
        $title = esc_attr($instance['title']);

        //Hiển thị form trong option của widget
        echo "<p>Nhập tiêu đề <input type='text' class='widefat' name='" . $this->get_field_name('title') . "' value='" . $title . "' /></p>";
    }

    /**
     * save widget form
     */

    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /**
     * Show widget
     */

    function widget($args, $instance)
    {

        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;

        //In tiêu đề widget
        echo $before_title . $title . $after_title;

        // Nội dung trong widget

        echo "ABC XYZ";

        // Kết thúc nội dung trong widget

        echo $after_widget;
    }
}

