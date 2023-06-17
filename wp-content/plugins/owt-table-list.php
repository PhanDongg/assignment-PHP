<?php

//tinhs nang sort chuwa duowc
//searcho chuwa dc. ddeen phut thu 11
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class OWTTableList extends WP_List_Table {

    //define data set for wp_list_table => data
    //prepare_items
    public function prepare_items() {

        $orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
        $order = isset($_GET['order']) ? trim($_GET['order']) : "";

        $datas = $this->wp_list_table_data($orderby, $order);

        //phân trang
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $total_items = count($datas);

        $this->set_pagination_args(array(
            "total_items" => $total_items,
            "per_page" => $per_page
        ));
        $this->items = array_slice($datas, (($current_page - 1) * $per_page), $per_page);

        //1-1 => 0 * 3 = 0 , 1 , 2
        //-1 => 1*3 = 3, 4, 5

        $columns = $this->get_columns();

        $hidden = $this->get_hidden_columns();

        $sortable = $this->get_sortable_columns();

//        $this->_column_headers = array($columns);
        //an di cot
        $this->_column_headers = array($columns, $hidden, $sortable);
    }

    public function wp_list_table_data($orderby = '', $order = '') {

        global $wpdb;
        if ($orderby == "title" && $order == "desc") {

            $all_posts = $wpdb->get_results(
                    "SELECT * from" . $wpdb->posts . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_title DESC"
            );
        } else {
            $all_posts = $wpdb->get_results(
                    "SELECT *from " . $wpdb->posts . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY id desc"
            );
//            $all_posts = get_posts(array(
//                "post_type" => "post",
//                "post_status" => "publish"
//            ));
        }

//        print_r($all_posts);

        $posts_array = array();

        if (count($all_posts) > 0) {

            foreach ($all_posts as $index => $post) {
                $posts_array[] = array(
                    "id" => $post->ID,
                    "title" => $post->post_title,
                    "content" => $post->post_content,
//                    "slug"=>$post->post_name,
                    "post_date" => $post->post_date,
                    "post_date_gmt" => $post->post_date_gmt,
                    "post_status" => $post->post_status
                );
            }
        }
        return $posts_array;
    }

    public function get_hidden_columns() {

        return array("post_status"); //tham số là cột cần ẩn
    }

    public function get_sortable_columns() {

        return array(
            "title" => array("title", true), //true là có sắp xếp theo ESC hoac DESC
            "content" => array("content", true),
            "post_date" => array("post_date", true),
            "post_date_gmt" => array("post_date_gmt", true),
            "post_status" => array("post_status", true),
        );
    }

    //get column
    public function get_columns() {

        $columns = array(
            "id" => "ID",
            "title" => "Tiêu Đề",
            "content" => "Nội Dung",
//            "slug" =>  "Post Slug",
            "post_date" => "Ngày Bắt Đầu",
            "post_date_gmt" => "Ngày Kết Thúc",
            "post_status" => "Trạng Thái"
        );

        return $columns;
    }

    //get default
    public function column_default($item, $column_name) {

        switch ($column_name) {

            case 'id':
            case 'title':
            case 'content':
//            case 'slug':
            case 'post_date':
            case 'post_date_gmt':
            case 'post_status':
                return $item[$column_name];
            default:
                return "no value";
        }
    }
    
    public function column_title($item) {
        
        $action = array(
            "edit"=>"<a href='?page=".$_GET['page']."&action=owt-edit&post_id=".$item['id']."'>Edit</a>",
//            "edit"=>"<a href='?page="'>EIDT</a>"
            "delete"=>"<a href='?page=".$_GET['page']."&action=owt-delete&post_id=".$item['id']."'>Delete</a>"
        );
        return sprintf('%1$s %2$s', $item['title'], $this->row_actions($action));
    }

}

function owt_show_data_list_table() {

    $owt_table = new OWTTableList();

    $owt_table->prepare_items();

    echo '<h3>QUẢN LÍ THÔNG BÁO</h3>';

//    echo "<form method='post' name = 'frm_search_post' action='".$_SERVER['PHP_SELF']."?page=owt-list-table'>";
//    $owt_table -> search_box("Search Post(s)", "search_post_id");
//    echo "</form>";

    echo "<form method='post' name='frm_search_post' action='" . $_SERVER['PHP_SELF'] . "?page=owt-list-table'>";
    $owt_table->search_box("Search Post(s)", "search_post_id");
    echo "</form>";

    $owt_table->display();
}

owt_show_data_list_table();
