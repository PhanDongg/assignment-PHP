<h3>Post data</h3>
<?php
    $post_detail = get_post($post_id);

    global $wpdb;//wp_posts
    
    //update
    $wpdb->update($wpdb->posts,array(
        "post_title"=>"",
        "post_content"=>"",
        "post_slug"=>""
         ), array (
        "id"=>$post_id  
            ) );
    
    //delete
    $wpdb->delete($wpdb->posts, array (
       "id" => $post_id 
    ));
?>
<form>
    
    <p>
        <label> Title </label>
        <input type="text" name="txt_name" value="<?php echo $post_detail->post_title; ?>"/>
    </p>
    
    <p>
        <label>Content</label>
        <textarea name="txt_content"><?php echo $post_detail->post_content; ?></textarea>
    </p>
    
<!--    <p>
    <label>Post Slug</label>
    <input type="text" name="txt_slug" value="<?php echo $post_detail->post_name; ?>"/>
    </p>-->

    <p>
        <button type="submit" name="btnsubmit"> Submit Details </button>
    </p>

</form>

