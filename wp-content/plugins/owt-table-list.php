<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class OWTTableList extends WP_List_Table {

    //define data set for wp_list_table => data
    //prepare_items
    public function prepare_items() {

        $orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
        $order = isset($_GET['order']) ? trim($_GET['order']) : "";

        $this->items = $this->wp_list_table_data($orderby, $order);

        $columns = $this->get_columns();

        $hidden = $this->get_hidden_columns();

        $sortable = $this->get_sortable_columns();

//        $this->_column_headers = array($columns);
        //an di cot
        $this->_column_headers = array($columns, $hidden, $sortable);
    }

    public function wp_list_table_data($orderby = '', $order = '') {

        $all_posts = get_posts(array (
            "post_type"=> "post",
            "post_status"=> "publish"
        ));
        
//        print_r($all_post);
        $posts_array = array();
        
        if (count($all_posts) > 0) {
            
            foreach ($all_posts as $index => $post) {
                $posts_array[] = array(
                    "id"=>$post->ID,
                    "title"=>$post->post_title,
                    "content"=>$post->post_content,
                    "slug"=>$post->post_name
                );
            }
        }
        return $posts_array;
    }

    public function get_hidden_columns() {

        return array("id"); //tham số là cột cần ẩn
    }

    public function get_sortable_columns() {

        return array(
            "name" => array("name", true), //true là có sắp xếp theo ESC hoac DESC
//            "email" => array("email", false)
        );
    }

    //get column
    public function get_columns() {

        $columns = array(
            "id" => "ID",
            "title" => "Title",
            "content" => "Content",
            "slug" =>  "Post Slug"
        );

        return $columns;
    }

    //get default
    public function column_default($item, $column_name) {

        switch ($column_name) {

            case 'id':
            case 'title':
            case 'content':
            case 'slug':
                return $item[$column_name];
            default:
                return "no value";
        }
    }

}

function owt_show_data_list_table() {

    $owt_table = new OWTTableList();

    $owt_table->prepare_items();

    echo '<h3>This is List Table</h3>';

    $owt_table->display();
}

owt_show_data_list_table();
