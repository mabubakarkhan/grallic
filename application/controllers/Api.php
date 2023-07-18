<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
        parent::__construct();
        error_reporting(0);
        $this->load->database();
        $this->load->model('Model_functions','model');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('date');
	}
	/**
	*

	@Main Functions Starts From Here
		
	*
	*/
	public function index()
	{
		echo json_encode('invalid call!');
	}
	public function home()
	{
		redirect('index');
	}
	public function get_cats()
	{
		$cats = $this->model->get_cats('active');
		echo json_encode($cats);
	}
	public function get_deal_products()
	{
		$products = $this->model->get_deal_products();
		echo json_encode($products);
	}
	public function get_other_products()
	{
		$products = $this->model->get_non_deal_products();
		echo json_encode($products);
	}
	public function category($id)
	{
		$cat = $this->model->get_cat_byid($id);
		if ($cat) {
			$products = $this->model->products($cat['category_id']);
			//echo json_encode(array("cat"=>$cat,"products"=>$products));
			echo json_encode($products);
		}
		else{
			echo json_encode(array("status"=>false));
		}
	}
	public function product($id)
	{
		$data['product'] = $this->model->product_byid($id);
		if ($data['product']['deal'] == 'yes') {
			$deal_detail = $this->model->get_product_deal_details($id);
			foreach ($deal_detail as $key => $dd) {
				$deal[$key]['deal'] = $dd;
				$deal[$key]['deal_products'] = $this->model->products($dd['category_id']);
			}
			$data['deals'] = $deal;
		}
		$data['drinks'] = $this->model->drinks($id);
		$data['addons'] = $this->model->addon($id);
		echo json_encode($data);
	}
	public function settings()
	{
		$data = $this->model->setting();
		echo json_encode($data['delivery_charges']);
	}
	/* ORDER */
	public function discount()
	{
		if (isset($_REQUEST['code']) && strlen($_REQUEST['code']) > 1) {
			$discount = $this->model->get_discount($_REQUEST['code']);
			if ($discount) {
				echo json_encode(array("value"=>$discount['discount']));
			}
			else{
				echo json_encode(array("value"=>0));
			}
		}
	}

	/* Save Contact */
	public function save_contact_user()
	{
		$this->db->insert('contact_book',$_REQUEST);
		echo json_encode(array("status"=>true));
	}
	public function save_contact_admin()
	{
		$this->db->insert('contact_book_admin',$_REQUEST);
		echo json_encode(array("status"=>true));
	}
	/* Save Car */
	public function save_car()
	{
		$check = $this->model->get_row("SELECT `car_id` FROM `car` WHERE `car_number` = '".$_REQUEST['car_number']."';");
		if (!($check)) {
			if ( (isset($_REQUEST['user_id']) && strlen($_REQUEST['user_id']) > 0) && (isset($_REQUEST['name']) && strlen($_REQUEST['name']) > 1) && (isset($_REQUEST['phone']) && strlen($_REQUEST['phone']) > 9) && (isset($_REQUEST['car_number']) && strlen($_REQUEST['car_number']) > 1) && (strlen($_FILES['image_1']['name']) > 1) && (strlen($_FILES['image_2']['name']) > 1) && (strlen($_FILES['image_3']['name']) > 1) && (strlen($_FILES['image_4']['name']) > 1) && (strlen($_FILES['image_5']['name']) > 1) && (strlen($_FILES['image_6']['name']) > 1) ) {

				for ($i=1; $i < 7; $i++) {

					$_FILES['file']['name']       = $_FILES['image_'.$i]['name'];
		            $_FILES['file']['type']       = $_FILES['image_'.$i]['type'];
		            $_FILES['file']['tmp_name']   = $_FILES['image_'.$i]['tmp_name'];
		            $_FILES['file']['error']      = $_FILES['image_'.$i]['error'];
		            $_FILES['file']['size']       = $_FILES['image_'.$i]['size'];

					$config['upload_path'] = 'uploads/';
			    	$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG';
			    	$config['encrypt_name'] = TRUE;
			    	$ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
					$new_name = md5(time().$_FILES["file"]['name']).'.'.$ext;
					$config['file_name'] = $new_name;
			    	$resp = $this->load->library('upload', $config);
			    	if ($resp) {
			        	$this->upload->do_upload('file');
						$_REQUEST['image_'.$i] = $this->upload->data()['file_name'];
			    	}

				}//image uploading loop

				$this->db->insert('car',$_REQUEST);
				echo json_encode(array("status"=>true));

			}//if
			else{
				for ($i=1; $i < 7; $i++) {

					if (strlen($_FILES['image_'.$i]['name']) > 2) {
						$_FILES['file']['name']       = $_FILES['image_'.$i]['name'];
			            $_FILES['file']['type']       = $_FILES['image_'.$i]['type'];
			            $_FILES['file']['tmp_name']   = $_FILES['image_'.$i]['tmp_name'];
			            $_FILES['file']['error']      = $_FILES['image_'.$i]['error'];
			            $_FILES['file']['size']       = $_FILES['image_'.$i]['size'];

						$config['upload_path'] = 'uploads/';
				    	$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG';
				    	$config['encrypt_name'] = TRUE;
				    	$ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
						$new_name = md5(time().$_FILES["file"]['name']).'.'.$ext;
						$config['file_name'] = $new_name;
				    	$resp = $this->load->library('upload', $config);
				    	if ($resp) {
				        	$this->upload->do_upload('file');
							$_REQUEST['image_'.$i] = $this->upload->data()['file_name'];
				    	}
					}
					else{
						$_REQUEST['image_'.$i] = '';
					}

				}//image uploading loop

				$this->db->insert('car_temp',$_REQUEST);
				echo json_encode(array("status"=>false));
			}//else
		}//check (if)
		else{
			echo json_encode(array("status"=>false));
		}
	}
	/* USER */
	public function login()
	{
		if ($_REQUEST) {
			$phone = $_REQUEST['phone'];
			$pass = md5($_REQUEST['password']);
			$check = $this->model->get_row("SELECT `user_id`,`password` FROM `user` WHERE `phone` = '$phone';");
			if ($check) {
				if ($check['password'] == $pass) {
					echo json_encode(array("status"=>true,"id"=>$check['user_id']));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"password not correct."));
				}
			}//login
			else{
				$insert['phone'] = $phone;
				$insert['password'] = $pass;
				$resp = $this->db->insert('user',$insert);
				if ($resp) {
					$id = $this->db->insert_id();
					echo json_encode(array("status"=>true,"id"=>$id));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"signup fail, please try again."));
				}
			}//signup
		}
	}
	public function get_cars($id)
	{
		$data = $this->model->get_results("SELECT * FROM `car` WHERE `user_id` = '$id';");
		echo json_encode($data);
	}
	public function slider()
	{
		$data = $this->model->get_results("SELECT * FROM `slider` WHERE `platform` = 'app';");
		echo json_encode($data);
	}


	/**
	*
	*
	*	@ORDER
	*
	*
	**/
	public function my_orders($user,$status = 'new')
	{
		$data = $this->model->get_results("
			SELECT `order_id`,`user_id`,`name`,`phone`,`email`,`area`,`address`,`items`,`sub_total`,`delivery_charges`,`discount_code`,`discount`,`total`,`note`,`at`,`status` 
			FROM `order` 
			WHERE `user_id` = '$user' AND `status` = '$status' AND `platform` = 'app' 
			ORDER BY `at` DESC
		;");
		echo json_encode($data);
	}
	public function get_order_detail($order)
	{
		$data = $this->model->get_results("SELECT * FROM `order_item` WHERE `order_id` = '$order' ORDER BY `order_item_id` ASC;");
		echo json_encode($data);
	}
	public function post_order()
	{
		$json = file_get_contents('php://input');
		$post = json_decode($json);
		$delivery_charges = $this->model->setting();
		$insert['user_id'] = $post->user_id;
		$insert['name'] = $post->name;
		$insert['email'] = $post->email;
		$insert['phone'] = $post->contact;
		$insert['address'] = $post->address;
		$insert['note'] = $post->notes;
		$insert['delivery_charges'] = $delivery_charges['delivery_charges'];
		$insert['sub_total'] = $post->total_amount-$delivery_charges['delivery_charges'];
		$insert['items'] = count($post->data);
		$insert['total'] = $post->total_amount;
		$insert['platform'] = 'app';
		$discount = $this->model->get_discount($post->discount);
		if ($discount) {
			$insert['discount_code'] = $post->discount;
			$insert['discount'] = $discount['discount'];
		}
		else{
			$insert['discount_code'] = '';
			$insert['discount'] = 0;
		}
		$order = $insert;
		$resp = $this->db->insert('order',$order);
		$resp = true;
		$sms = 'Hi '.$post->name.', your ';

		if ($resp) {
			$order_id = $this->db->insert_id();
			foreach ($post->data as $key => $item_) {
				$product = $this->model->product_byid($item_->product_id);
				$size = explode('-', $item_->pizza_size);
				$item['order_id'] = $order_id;
				$item['product_id'] = $product['product_id'];
				$item['product'] = $product['title'];
				$item['deal'] = $product['deal'];
				$item['detail'] = $product['detail'];
				$item['image'] = $product['image'];
				$item['size'] = $size[0];
				$item['price'] = $size[1];
				$item['qty'] = $item_->qty;
				if (intval($item_->addon_id) > 0) {
					$addon = $this->model->get_addon_byid($item_->addon_id);
					$item['addon'] = $addon['title'];
					$item['addon_price'] = $addon['price'];
					$item['addon_qty'] = $item_->addon_qty;
					$item['addon_price_total'] = $addon['price']*$item_->addon_qty;
				}
				else{
					$item['addon'] = '';
					$item['addon_price'] = 0;
					$item['addon_qty'] = 0;
					$item['addon_price_total'] = 0;
				}
				if (intval($item_->drink_id) > 0) {
					$drink = $this->model->get_drink_byid($item_->drink_id);
					$item['drink'] = $drink['title'];
					$item['drink_price'] = $drink['price'];
					$item['drink_qty'] = $item_->drink_qty;
					$item['drink_price_total'] = $drink['price']*$item_->drink_qty;
				}
				else{
					$item['drink'] = '';
					$item['drink_price'] = 0;
					$item['drink_qty'] = 0;
					$item['drink_price_total'] = 0;
				}
				$item['price_total'] = $item['price']+$item['drink_price_total']+$item['addon_price_total'];
				
				$this->db->insert('order_item',$item);
				if ($key == 0) {
					$sms .= $product['title'];
				}
				else{
					$sms .= ', '.$product['title'];
				}
			}
			$sms .= ' is on its way. Your order amount is RS. '.$post->total_amount.' and order number is '.$order_id.'.';

			$this->db->where('order_id',$order_id);
			$this->db->update('order',array("sms"=>$sms));

			$mobile = str_replace('+', '', $post->contact);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$sms_setting = $this->model->sms_setting();
			$mask = urlencode('HotPocket');
			$pass = urlencode('hotpocket1281');
			$id = urlencode('hotpocket');
			$msg = urlencode('Your order is submitted, we will contact back very soon.');
			file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

			$mobile = str_replace('+', '', '923327147122');
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$sms_setting = $this->model->sms_setting();
			$mask = urlencode('HotPocket');
			$pass = urlencode('hotpocket1281');
			$id = urlencode('hotpocket');
			$msg = urlencode($sms);
			file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

			if (strlen($post->email) > 3) {
				$to = $post->email;
				$subject = 'Order Submitted | hotpocket.pk';
				$message = 'Your order is submitted, we will contact back very soon.';
				$from = 'info@hotpockit.com';
				$headers = '';
			    $headers .= "From: ".$from."" ."\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
				mail($to, $subject, $message, $headers);
			}
			$to = 'usman_ghani940@yahoo.com';
			$subject = 'New Order | hotpocket.pk';
			$message = $sms;
			$from = 'info@hotpockit.com';
			$headers = ''; 
		    $headers .= "From: ".$from."" ."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
			mail($to, $subject, $message, $headers);
			echo json_encode(array("status"=>true));
		}
		else{
			echo json_encode(array("status"=>false));
		}
	}
	public function post_order_2()
	{
		$post = json_decode($_REQUEST['data']);
		$delivery_charges = $this->model->setting();
		$insert['user_id'] = $_REQUEST['user_id'];
		$insert['name'] = $_REQUEST['name'];
		$insert['email'] = $_REQUEST['email'];
		$insert['phone'] = $_REQUEST['contact'];
		$insert['address'] = $_REQUEST['address'];
		$insert['note'] = $_REQUEST['notes'];
		$insert['delivery_charges'] = $delivery_charges['delivery_charges'];
		$insert['sub_total'] = $_REQUEST['total_amount']-$delivery_charges['delivery_charges'];
		$insert['items'] = $_REQUEST['items'];
		$insert['total'] = $_REQUEST['total_amount'];
		$insert['platform'] = 'app';
		$discount = $this->model->get_discount($_REQUEST['discount']);
		if ($discount) {
			$insert['discount_code'] = $_REQUEST['discount'];
			$insert['discount'] = $discount['discount'];
		}
		else{
			$insert['discount_code'] = '';
			$insert['discount'] = 0;
		}
		$order = $insert;
		$resp = $this->db->insert('order',$order);
		$resp = true;
		$sms = 'Hi '.$_REQUEST['name'].', your ';

		if ($resp) {
			$order_id = $this->db->insert_id();
			foreach ($post->data as $key => $item_) {
				$product = $this->model->product_byid($item_->product_id);
				$size = explode('-', $item_->pizza_size);
				$item['order_id'] = $order_id;
				$item['product_id'] = $product['product_id'];
				$item['product'] = $product['title'];
				$item['deal'] = $product['deal'];
				$item['detail'] = $product['detail'];
				$item['image'] = $product['image'];
				$item['size'] = $size[0];
				$item['price'] = $size[1];
				$item['qty'] = $item_->qty;
				if (intval($item_->addon_id) > 0) {
					$addon = $this->model->get_addon_byid($item_->addon_id);
					$item['addon'] = $addon['title'];
					$item['addon_price'] = $addon['price'];
					$item['addon_qty'] = $item_->addon_qty;
					$item['addon_price_total'] = $addon['price']*$item_->addon_qty;
				}
				else{
					$item['addon'] = '';
					$item['addon_price'] = 0;
					$item['addon_qty'] = 0;
					$item['addon_price_total'] = 0;
				}
				if (intval($item_->drink_id) > 0) {
					$drink = $this->model->get_drink_byid($item_->drink_id);
					$item['drink'] = $drink['title'];
					$item['drink_price'] = $drink['price'];
					$item['drink_qty'] = $item_->drink_qty;
					$item['drink_price_total'] = $drink['price']*$item_->drink_qty;
				}
				else{
					$item['drink'] = '';
					$item['drink_price'] = 0;
					$item['drink_qty'] = 0;
					$item['drink_price_total'] = 0;
				}
				$item['price_total'] = $item['price']+$item['drink_price_total']+$item['addon_price_total'];
				
				$this->db->insert('order_item',$item);
				if ($key == 0) {
					$sms .= $product['title'];
				}
				else{
					$sms .= ', '.$product['title'];
				}
			}
			$sms .= ' is on its way. Your order amount is RS. '.$_REQUEST['total_amount'].' and order number is '.$order_id.'.';

			$this->db->where('order_id',$order_id);
			$this->db->update('order',array("sms"=>$sms));

			$mobile = str_replace('+', '', $_REQUEST['contact']);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$sms_setting = $this->model->sms_setting();
			$mask = urlencode('HotPocket');
			$pass = urlencode('hotpocket1281');
			$id = urlencode('hotpocket');
			$msg = urlencode('Your order is submitted, we will contact back very soon.');
			file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

			$mobile = str_replace('+', '', '923327147122');
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$sms_setting = $this->model->sms_setting();
			$mask = urlencode('HotPocket');
			$pass = urlencode('hotpocket1281');
			$id = urlencode('hotpocket');
			$msg = urlencode($sms);
			file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

			if (strlen($_REQUEST['email']) > 3) {
				$to = $_REQUEST['email'];
				$subject = 'Order Submitted | hotpocket.pk';
				$message = 'Your order is submitted, we will contact back very soon.';
				$from = 'info@hotpockit.com';
				$headers = '';
			    $headers .= "From: ".$from."" ."\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
				mail($to, $subject, $message, $headers);
			}
			$to = 'usman_ghani940@yahoo.com';
			$subject = 'New Order | hotpocket.pk';
			$message = $sms;
			$from = 'info@hotpockit.com';
			$headers = ''; 
		    $headers .= "From: ".$from."" ."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
			mail($to, $subject, $message, $headers);
			echo json_encode(array("status"=>true));
		}
		else{
			echo json_encode(array("status"=>false));
		}
	}
	/**
	*
	*
	*	@TEST
	*
	*
	**/
	public function test()
	{
		die;
		error_reporting(E_ALL);

		$_REQUEST['user_id'] = 1;
		$_REQUEST['email'] = 'ali@khan.com';
		$_REQUEST['name'] = 'Ali Khan';
		$_REQUEST['contact'] = '03331234567';
		$_REQUEST['address'] = 'hello lahore, pakistan';
		$_REQUEST['discount'] = 'Nov21';
		$_REQUEST['notes'] = 'Hello World';
		$_REQUEST['total_amount'] = '3400';
		$_REQUEST['data'][0] = array(
			"product_id"=>'1',
			"qty"=>'1',
			"price"=>'1100',
			"pizza_size"=>'small-550',
			"addon_id" => '2',
			"addon_qty" => '1',
			"addon_price" => '50',
			"drink_id" => '2',
			"drink_qty" => '2',
			"drink_price" => '50'
		);
		$_REQUEST['data'][1] = array(
			"product_id"=>'2',
			"qty"=>'2',
			"price"=>'1200',
			"pizza_size"=>'small-600',
			"addon_id" => '1',
			"addon_qty" => '1',
			"addon_price" => '25',
			"drink_id" => '1',
			"drink_qty" => '1',
			"drink_price" => '25'
		);

		// ------------------------------

		$json['user_id'] = 1;
		$json['email'] = 'ali@khan.com';
		$json['name'] = 'Ali Khan';
		$json['contact'] = '03331234567';
		$json['address'] = 'hello lahore, pakistan';
		$json['discount'] = 'Nov21';
		$json['notes'] = 'Hello World';
		$json['total_amount'] = '3400';
		$_POST['data'][0] = array(
			"product_id"=>'1',
			"qty"=>'1',
			"price"=>'1100',
			"pizza_size"=>'small-550',
			"addon_id" => '2',
			"addon_qty" => '1',
			"addon_price" => '50',
			"drink_id" => '2',
			"drink_qty" => '2',
			"drink_price" => '50'
		);
		$_POST['data'][1] = array(
			"product_id"=>'2',
			"qty"=>'2',
			"price"=>'1200',
			"pizza_size"=>'small-600',
			"addon_id" => '1',
			"addon_qty" => '1',
			"addon_price" => '25',
			"drink_id" => '1',
			"drink_qty" => '1',
			"drink_price" => '25'
		);
		$json['items'] = count($_POST['data']);
		
		// ------------------------------
		
		$json['data'] = json_encode($_POST);

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://localhost/MM/hot_piza/api/post-order-2',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $json
			/*CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
	  		),*/
		));

		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}
}