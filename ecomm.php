<?php

  /*
  Plugin Name: Ecomm
  Plugin URI: http://www.kacpermyslinski.com
  Description: Plugin for displaying products from an OSCommerce shopping cart database
  Author: K-dot labs
  Version: 1.0
  Author URI: http://www.kacpermyslinski.com
  */

  function ecom_getproducts($product_cnt=1) {
  	//Connect to the osCommerce database
  	$oscommercedb = new wpdb(get_option('ecom_dbuser'), get_option('ecom_dbpwd'), get_option('ecom_dbname'), get_option('ecom_dbhost'));

    $retval = '';
    for ($i=0; $i<$product_cnt; $i++) {
        //Get a random product
        $product_count = 0;
        while ($product_count == 0) {
            $product_id = rand(0,30);
            $product_count = $oscommercedb->get_var("SELECT COUNT(*) FROM products WHERE products_id=$product_id AND products_status=1");
        }
         
        //Get product image, name and URL
        $product_image = $oscommercedb->get_var("SELECT products_image FROM products WHERE products_id=$product_id");
        $product_name = $oscommercedb->get_var("SELECT products_name FROM products_description WHERE products_id=$product_id");
        $store_url = get_option('ecom_store_url');
        $image_folder = get_option('ecom_prod_img_folder');
 
        //Build the HTML code
        $retval .= '<div class="ecom_product">';
        $retval .= '<a href="'. $store_url . 'product_info.php?products_id=' . $product_id . '"><img src="' . $image_folder . $product_image . '" /></a><br />';
        $retval .= '<a href="'. $store_url . 'product_info.php?products_id=' . $product_id . '">' . $product_name . '</a>';
        $retval .= '</div>';
 
    }
    return $retval;
  }

	function ecom_admin() {
		include('ecom_import_admin.php');
	}

  function ecom_admin_actions() {
  	add_options_page("OSCommerce Product Display", "OSCommerce Product Display", 1, "OSCommerce Product Display", "ecom_admin");
  }

  add_action('admin_menu', 'ecom_admin_actions');

?>