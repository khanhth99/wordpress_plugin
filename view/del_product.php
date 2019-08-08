<?php
global $wpdb;
$prd_id = $_GET['prd_id'];
$wpdb->delete(
    'kh_product',
    array('prd_id' => $prd_id),
    array('%d')
);
header('location:admin.php?page=khanh-wp-my-setting-2-list');
