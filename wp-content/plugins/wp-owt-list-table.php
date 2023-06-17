<?php

/*
  Plugin Name: Quản Lí Thông Báo
  Plugin URI: kenh14.vn
  Description: assginment
  Version: 1.0
  Author: David Dong
  Author URI:  facebook.com/phan.dong.144
 */

add_action("admin_menu", "wpl_Out_list_table_menu");

function wpl_Out_list_table_menu() {

    add_menu_page("Quản Lí Thông Báo", "Quản Lí Thông Báo", "manage_options", "owt-list-table", "wpl_owt_list_table_fn");
}

function wpl_owt_list_table_fn() {

    $action = isset($_GET['action']) ? trim($_GET['action']) : "";

    if ($action == "owt-edit") {

        $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : "";
        
        ob_start();

        include_once plugin_dir_path(__FILE__) . 'owt-edit-fn.php';

        $template = ob_get_contents();

        ob_end_clean();
        echo $template;
    } else {

        ob_start();

        include_once plugin_dir_path(__FILE__) . 'owt-table-list.php';

        $template = ob_get_contents();

        ob_end_clean();
        echo $template;
    }
}
