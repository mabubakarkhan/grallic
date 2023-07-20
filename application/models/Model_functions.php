<?php
class Model_functions extends CI_Model {

	public function get_results($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			return $res->result_array();
		}
		else
		{
			return false;
		}
	}
	public function get_row($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			$resp = $res->result_array();
			return $resp[0];
		}
		else
		{
			return false;
		}
	}
	public function login($username,$password)
	{
		return $this->get_row("SELECT * FROM `admin` WHERE `username`= '$username' AND `password` = '$password';");
	}
	public function setting()
	{
		return $this->get_row("SELECT * FROM `setting` WHERE `setting_id` = '1';");
	}
	public function sms_setting()
	{
		return $this->get_row("SELECT * FROM `sms_setting` WHERE `sms_setting_id` = '1';");
	}
	//ORDERs
	public function order_notify($value='')
	{
		$count  = $this->get_row("SELECT COUNT(`order_id`) AS 'Count' FROM `order` WHERE `status` = 'new';");
		if ($count['Count'] > 0) {
			$final['count'] = $count['Count'];
			$final['orders'] = $this->get_orders('new');
			return $final;
		}
		else{
			return false;
		}
	}
	public function get_orders($status = 'new')
	{
		if ($status == 'all') {
			return $this->get_results("SELECT * FROM `order` ORDER BY `at` DESC;");
		}
		else{
			return $this->get_results("SELECT * FROM `order` WHERE `status` = '$status' ORDER BY `at` DESC;");
		}
	}
	public function get_order_byid($id)
	{
		return $this->get_row("SELECT * FROM `order` WHERE `order_id` = '$id';");
	}
	public function get_order_detail($order)
	{
		return $this->get_results("SELECT * FROM `order_item` WHERE `order_id` = '$order' ORDER BY `product` ASC;");
	}
	//CATs
	public function get_cats($status)
	{
		if ($status == 'all') {
			return $this->get_results("SELECT * FROM `category` ORDER BY `title` ASC;");
		}
		else{
			return $this->get_results("SELECT * FROM `category` WHERE `status` = '$status' ORDER BY `title` ASC;");
		}
	}
	public function get_cat_byid($id)
	{
		return $this->get_row("SELECT * FROM `category` WHERE `category_id` = '$id';");
	}
	//Products
	public function get_products()
	{
		return $this->get_results("
			SELECT p.*, c.title AS Category, c.deal 
			FROM `product` AS p 
			INNER JOIN `category` AS c ON p.category_id = c.category_id
			ORDER BY p.title ASC;
		");
	}
	public function get_home_products()
	{
		return $this->get_results("
			SELECT p.*, c.title AS Category, c.deal 
			FROM `product` AS p 
			INNER JOIN `category` AS c ON p.category_id = c.category_id
			WHERE p.status = 'active' AND p.show_home = 'yes' 
			ORDER BY p.title ASC;
		");
	}
	public function get_product_byid($id)
	{
		return $this->get_row("SELECT * FROM `product` WHERE `product_id` = '$id';");
	}
	public function product_byid($id)
	{
		return $this->get_row("
			SELECT p.*, c.title AS 'Category', c.deal 
			FROM `product` AS p 
			INNER JOIN `category` AS c ON p.category_id = c.category_id 
			WHERE p.product_id = '$id' AND p.status = 'active' AND c.status = 'active' 
		;");
	}
	public function product_by_slug($slug)
	{
		return $this->get_row("
			SELECT p.*, c.title AS 'Category', c.deal 
			FROM `product` AS p 
			INNER JOIN `category` AS c ON p.category_id = c.category_id 
			WHERE p.slug = '$slug' AND p.status = 'active' AND c.status = 'active' 
		;");
	}
	public function products($cat)
	{
		return $this->get_results("
			SELECT p.*, c.title AS Category 
			FROM `product` AS p 
			INNER JOIN `category` AS c ON p.category_id = c.category_id
			WHERE p.category_id = '$cat' AND p.status = 'active' 
			ORDER BY p.price ASC;
		");
	}
	public function get_product_deal_details($product)
	{
		return $this->get_results("
			SELECT dd.*, c.title AS category 
			FROM `deal_detail` AS dd 
			INNER JOIN `category` AS c ON dd.category_id = c.category_id 
			WHERE dd.product_id = '$product';
		");
	}
	//Drinks
	public function get_drinks()
	{
		return $this->get_results("SELECT * FROM `drink` ORDER BY `title` ASC;");
	}
	public function get_drink_byid($id)
	{
		return $this->get_row("SELECT * FROM `drink` WHERE `drink_id` = '$id';");
	}
	public function drinks()
	{
		return $this->get_results("SELECT * FROM `drink` WHERE `status` = 'active' ORDER BY `title` ASC;");
	}
	//Addon
	public function get_addon()
	{
		return $this->get_results("SELECT * FROM `addon` ORDER BY `title` ASC;");
	}
	public function get_addon_byid($id)
	{
		return $this->get_row("SELECT * FROM `addon` WHERE `addon_id` = '$id';");
	}
	public function addon()
	{
		return $this->get_results("SELECT * FROM `addon` WHERE `status` = 'active' ORDER BY `title` ASC;");
	}
	//Deal Products
	public function get_deal_products()
	{
		$cats = $this->get_row("SELECT GROUP_CONCAT(`category_id`) AS 'ids' FROM `category` WHERE `status` = 'active' AND `deal` = 'yes';");
		if ($cats) {
			$ids = $cats['ids'];
			return $this->get_results("SELECT * FROM `product` WHERE `category_id` IN($ids) AND `status` = 'active' ORDER BY `price` ASC;");
		}
		else{
			return false;
		}
	}
	public function get_deal_products_api()
	{
		$cats = $this->get_row("SELECT GROUP_CONCAT(`category_id`) AS 'ids' FROM `category` WHERE `status` = 'active' AND `deal` = 'yes' AND `update_status` = 'yes';");
		if ($cats) {
			$ids = $cats['ids'];
			return $this->get_results("SELECT * FROM `product` WHERE `category_id` IN($ids) AND `status` = 'active' AND `update_status` = 'yes' ORDER BY `price` ASC;");
		}
		else{
			return false;
		}
	}
	public function get_non_deal_products()
	{
		$cats = $this->get_row("SELECT GROUP_CONCAT(`category_id`) AS 'ids' FROM `category` WHERE `status` = 'active' AND `deal` = 'no';");
		if ($cats) {
			$ids = $cats['ids'];
			return $this->get_results("SELECT * FROM `product` WHERE `category_id` IN($ids) AND `status` = 'active' ORDER BY `price` ASC;");
		}
		else{
			return false;
		}
	}
	public function get_non_deal_products_api()
	{
		$cats = $this->get_row("SELECT GROUP_CONCAT(`category_id`) AS 'ids' FROM `category` WHERE `status` = 'active' AND `deal` = 'no' AND `update_status` = 'yes';");
		if ($cats) {
			$ids = $cats['ids'];
			return $this->get_results("SELECT * FROM `product` WHERE `category_id` IN($ids) AND `status` = 'active' AND `update_status` = 'yes' ORDER BY `price` ASC;");
		}
		else{
			return false;
		}
	}
	/* Pages */
	public function get_page_byid($id)
	{
		return $this->get_row("SELECT * FROM `page` WHERE `page_id` = '$id';");
	}
	public function get_pages()
	{
		return $this->get_results("SELECT * FROM `page` ORDER BY `title` ASC;");
	}
	/* Pages */
	public function blog_home()
	{
		return $this->get_results("SELECT * FROM `blog` ORDER BY `updated_at` DESC LIMIT 4;");
	}
	public function blog()
	{
		return $this->get_results("SELECT * FROM `blog` ORDER BY `updated_at` DESC;");
	}
	public function get_blog_byid($id)
	{
		return $this->get_row("SELECT * FROM `blog` WHERE `blog_id` = '$id';");
	}
	public function get_blog_by_slug($slug)
	{
		return $this->get_row("SELECT * FROM `blog` WHERE `slug` = '$slug';");
	}
	public function service_boxs()
	{
		return $this->get_results("SELECT * FROM `service_box` ORDER BY `updated_at` DESC;");
	}
	public function get_service_box_byid($id)
	{
		return $this->get_row("SELECT * FROM `service_box` WHERE `service_box_id` = '$id';");
	}
	/* SEO Tags */
	public function seo_tags()
	{
		return $this->get_row("SELECT * FROM `seo_setting` WHERE `seo_setting_id` = 1;");
	}
	/* Discount */
	public function get_disconuts()
	{
		return $this->get_results("SELECT * FROM `discount` ORDER BY `code` ASC;");
	}
	public function get_discount($code)
	{
		return $this->get_row("SELECT `discount` FROM `discount` WHERE `code` = '$code' AND `status` = 'active';");
	}
	/* Slider */
	public function get_slider()
	{
		return $this->get_results("
			SELECT s.*, p.title AS product
			FROM `slider` AS s 
			LEFT JOIN `product` AS p ON s.product_id = p.product_id 
		;");
	}
	public function get_slider_byid($id)
	{
		return $this->get_row("SELECT * FROM `slider` WHERE `slider_id` = '$id';");
	}
}