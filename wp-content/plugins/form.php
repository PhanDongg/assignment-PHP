<?php
/*
  Plugin Name: PhanDong_Form_Register
  Plugin URI: https://kenh14.vn/
  Description: Plugin tạo form đăng kí
  Author: David Dong
  Version: 1.0
  Author URI: facebook.com/phan.dong.144
 */

//1. đăng kí shortcode
//2. lập form html css
//3. xử lí logic code

add_shortcode('form_dang_ki', 'phandong_form');

function phandong_form() {

    ob_start();
    //điều kiện khi người dùng có bấm button gửi
    if (isset($_POST['gui'])) {

        $ho_ten = isset($_POST['hovaten']) ? $_POST['hovaten'] : '';
        $so_dien_thoai = isset($_POST['so_dien_thoai']) ? $_POST['so_dien_thoai'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $noi_dung_lien_he = isset($_POST['noi_dung_lien_he']) ? $_POST['noi_dung_lien_he'] : '';

        if ($ho_ten == '' || $so_dien_thoai == '' || $noi_dung_lien_he == '') {
            echo ' <p class = "error">vui lòng nhập đầy đủ thông tin</p>';
        } else {
            //gửi đến mail cho admin nếu user đăng kí thành công
            $to = get_option('admin_email');
            $subject = 'có liên hệ mới';
            $body = 'Họ và Tên: $ho_ten <br> Số Điện Thoại: $so_dien_thoai <br> Email: $email <br> Nội dung liên hệ: noi_dung_lien_he';
            $headers = array('Content-Type: text/html; charset=UTF-8');
            wp_mail($to, $subject, $body, $headers);
            echo ' <p class = "success">cảm ơn bạn đã đăng kí</p>';
        }
    }
    ?>
    <form method="POST" class="myForm">
        <label> Họ và Tên (*)</label><br>
        <input type="text" name="hovaten">   
        <label> Số Điện Thoại (*)</label><br>
        <input type="text" name="so_dien_thoai">
        <label> Email</label><br>
        <input type="text" name="email">
        <label> Nội dung liên hệ (*)</label><br>
        <input type="text" name="noi_dung_lien_he">
        <input type="submit" value="register" name="gui"/>
    </form>
    <?php
    return ob_get_clean();
}

