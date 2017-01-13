<?php
    if($_POST['ecom_hidden'] == 'Y') {
        //Form data sent
        $dbhost = $_POST['ecom_dbhost'];
        update_option('ecom_dbhost', $dbhost);
         
        $dbname = $_POST['ecom_dbname'];
        update_option('ecom_dbname', $dbname);
         
        $dbuser = $_POST['ecom_dbuser'];
        update_option('ecom_dbuser', $dbuser);
         
        $dbpwd = $_POST['ecom_dbpwd'];
        update_option('ecom_dbpwd', $dbpwd);
 
        $prod_img_folder = $_POST['ecom_prod_img_folder'];
        update_option('ecom_prod_img_folder', $prod_img_folder);
 
        $store_url = $_POST['ecom_store_url'];
        update_option('ecom_store_url', $store_url);
        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
        $dbhost = get_option('ecom_dbhost');
        $dbname = get_option('ecom_dbname');
        $dbuser = get_option('ecom_dbuser');
        $dbpwd = get_option('ecom_dbpwd');
        $prod_img_folder = get_option('ecom_prod_img_folder');
        $store_url = get_option('ecom_store_url');
    }
?>

<div class="wrap">
    <?php    echo "<h2>" . __( 'OSCommerce Product Display Options', 'ecom_trdom' ) . "</h2>"; ?>
     
    <form name="ecom_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="ecom_hidden" value="Y">
        <?php    echo "<h4>" . __( 'OSCommerce Database Settings', 'ecom_trdom' ) . "</h4>"; ?>
        <p><?php _e("Database host: " ); ?><input type="text" name="ecom_dbhost" value="<?php echo $dbhost; ?>" size="20"><?php _e(" ex: localhost" ); ?></p>
        <p><?php _e("Database name: " ); ?><input type="text" name="ecom_dbname" value="<?php echo $dbname; ?>" size="20"><?php _e(" ex: oscommerce_shop" ); ?></p>
        <p><?php _e("Database user: " ); ?><input type="text" name="ecom_dbuser" value="<?php echo $dbuser; ?>" size="20"><?php _e(" ex: root" ); ?></p>
        <p><?php _e("Database password: " ); ?><input type="text" name="ecom_dbpwd" value="<?php echo $dbpwd; ?>" size="20"><?php _e(" ex: secretpassword" ); ?></p>
        <hr />
        <?php    echo "<h4>" . __( 'OSCommerce Store Settings', 'ecom_trdom' ) . "</h4>"; ?>
        <p><?php _e("Store URL: " ); ?><input type="text" name="ecom_store_url" value="<?php echo $store_url; ?>" size="20"><?php _e(" ex: http://www.yourstore.com/" ); ?></p>
        <p><?php _e("Product image folder: " ); ?><input type="text" name="ecom_prod_img_folder" value="<?php echo $prod_img_folder; ?>" size="20"><?php _e(" ex: http://www.yourstore.com/images/" ); ?></p>
         
     
        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'ecom_trdom' ) ?>" />
        </p>
    </form>
</div>