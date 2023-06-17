<?php

/* 
    Plugin Name: OWT LIST TABLE
    Description: This is list table
 */

add_action("admin_menu", "wpl_Out_list_table_menu");

function wpl_Out_list_table_menu() {
   
    add_menu_page("OWT List Table", "OWT List Table", "manage_options", "owt-list-table", "wpl_owt_list_table_fn");
}

function wpl_owt_list_table_fn() {
    
    ob_start();
    
//    include_once plugin_dir_path(__FILE__) . 'owt-table-list.php';
    $template = ob_get_contents();
    
    ob_end_clean();
    echo $template;
}