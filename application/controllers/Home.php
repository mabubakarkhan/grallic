<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

		@HATH NA LAIE

	*
	*/
	/*     TEMPLATE     */

	public function template($page = '', $data = '')
	{
		$data['seo_tags'] = $this->model->seo_tags();
		$data['cats'] = $this->model->get_cats('active');
		$this->load->view('header',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}
	/**
	*

	@Main Functions Starts From Here
		
	*
	*/
	public function home()
	{
		$this->index();
	}
	public function index()
	{
		$data['page'] = $this->model->get_page_byid(1);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$data['open_graph'] = $data['page']['open_graph'];
		$data['home_page'] = true;
		$data['deal_products'] = $this->model->get_deal_products();
		$data['products'] = $this->model->get_non_deal_products();
		$data['home_products'] = $this->model->get_home_products();
		$data['slider'] = $this->model->get_results("
			SELECT s.*, p.title AS product, p.slug AS product_slug 
			FROM `slider` AS s 
			LEFT JOIN `product` AS p ON s.product_id = p.product_id 
			WHERE s.platform = 'website'
		;");
		$data['news'] = $this->model->blog();
		$this->template('index',$data);
	}
	public function about_us()
	{
		$data['page'] = $this->model->get_page_byid(2);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$data['open_graph'] = $data['page']['open_graph'];
		$data['home_page'] = false;
		$data['activeAboutUs'] = 'active';
		$this->template('about_us',$data);
	}
	public function contact_us()
	{
		$data['page'] = $this->model->get_page_byid(3);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$data['open_graph'] = $data['page']['open_graph'];
		$data['home_page'] = false;
		$data['activeContactUs'] = 'active';
		$this->template('contact_us',$data);
	}
	public function category($slug)
	{
		$data['cat_'] = $this->model->get_row("SELECT * FROM `category` WHERE `slug` = '$slug';");
		if ($data['cat_']) {
			$data['meta_title'] = $data['cat_']['meta_title'];
			$data['meta_key'] = $data['cat_']['meta_key'];
			$data['meta_desc'] = $data['cat_']['meta_desc'];
			$data['open_graph'] = $data['page']['open_graph'];
			$data['home_page'] = false;
			$data['products'] = $this->model->products($data['cat_']['category_id']);
			$this->template('category',$data);
		}
		else{
			redirect('index');
		}
	}
	public function product($slug, $size = 'zero')
	{
		/*$id = explode('-', $slug);
		$id = $id[count($id)-1];*/
		if ($size == 'zero') {
			$data['Size'] = false;
		}
		else{
			$data['Size'] = $size;
		}
		$data['product'] = $this->model->product_by_slug($slug);
		$id = $data['product']['product_id'];
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
		$data['home_page'] = false;
		$data['meta_title'] = $data['product']['meta_title'];
		$data['meta_key'] = $data['product']['meta_key'];
		$data['meta_desc'] = $data['product']['meta_desc'];
		$data['open_graph'] = $data['page']['open_graph'];
		$this->template('product',$data);
	}
	public function checkout()
	{
		if ($_SESSION['cart']) {
			$data['home_page'] = false;
			$data['meta_title'] = 'Checkout';
			$data['meta_key'] = 'Checkout';
			$data['meta_desc'] = 'Checkout';
			$data['setting'] = $this->model->setting();
			$this->template('checkout',$data);
		}
		else{
			redirect('home');
		}
	}
	public function submit_order()
	{
		if ($_POST && $_SESSION['cart']) {

			setcookie('name',$_POST['name'], time() + (86400 * 30), "/");
			setcookie('phone',$_POST['phone'],time() + (86400 * 30), "/");
			setcookie('area',$_POST['area'],time() + (86400 * 30), "/");
			setcookie('address',$_POST['address'],time() + (86400 * 30), "/");

			$delivery_charges = $this->model->setting();

			$order['name'] = $_POST['name'];
			$order['phone'] = $_POST['phone'];
			$order['area'] = $_POST['area'];
			$order['address'] = $_POST['address'];
			$order['email'] = $_POST['email'];
			$order['items'] = count($_SESSION['cart']);
			$order['sub_total'] = $_SESSION['total'];
			$order['delivery_charges'] = $delivery_charges['delivery_charges'];
			$order['total'] = $_SESSION['total']+$delivery_charges['delivery_charges'];
			$resp = $this->db->insert('order',$order);
			$sms = 'Hi '.$_POST['name'].', your ';
			if ($resp) {
				$order_id = $this->db->insert_id();
				foreach ($_SESSION['cart'] as $key => $post) {
					$post['order_id'] = $order_id;
					$this->db->insert('order_item',$post);
					if ($key == 0) {
						$sms .= $post['product'];
					}
					else{
						$sms .= ', '.$post['product'];
					}
					unset($_SESSION['cart'][$key]);
				}
				$sms .= ' is on its way. Your order amount is RS. '.$_SESSION['total'].' and order number is '.$order_id.'.';

				$this->db->where('order_id',$order_id);
				$this->db->update('order',array("sms"=>$sms));

				unset($_SESSION['total']);
				unset($_SESSION['cart']);
				$data['home_page'] = false;
				$data['meta_title'] = 'Order';

				$mobile = str_replace('+', '', $_POST['phone']);
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

				if (strlen($_POST['email']) > 3) {
					setcookie('address',$_POST['address'],time() + (86400 * 30), "/");
					$to = $_POST['email'];
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

				$data['meta_title'] = 'Thank You For Order On Hot Pocket';
				$data['meta_key'] = 'Thank You For Order On Hot Pocket';
				$data['meta_desc'] = 'Thank You For Order On Hot Pocket';
				$this->template('submit_order',$data);
			}
			else{
				redirect('checkout');
			}
		}
		else{
			redirect('home');
		}
	}
	/**
	*

	@AJAX
		
	*
	*/
	public function add_to_cart()
	{
		parse_str($_POST['data'], $post);
		$product = $this->model->product_byid($post['product_id']);
		if ($product) {
			if ($product['deal'] == 'no') {

				if (strlen($post['size']) > 1) {
					$cart['size'] = $post['size'];
					$product['price'] = $product[$post['size']];
				}
				else{
					$cart['size'] = '';
					$product['price'] = $product['price'];
				}

				$cart['product_id'] = $product['product_id'];
				$cart['deal'] = 'no';
				$cart['product'] = $product['title'];
				$cart['detail'] = $product['detail'];
				$cart['image'] = $product['image'];
				$cart['price'] = $product['price'];
				$cart['qty'] = $post['qty'];
				if (isset($post['addon'][0]) && intval($post['addon'][0]) > 0) {
					$addon = $this->model->get_addon_byid($post['addon'][0]);
					$cart['addon'] = $addon['title'];
					$cart['addon_price'] = $addon['price'];
					$cart['addon_qty'] = $post['addon_qty'];
					$cart['addon_price_total'] = $addon['price']*$post['addon_qty'];
				}
				else{
					$cart['addon_price_total'] = 0;
				}
				if (isset($post['drink'][0]) && intval($post['drink'][0]) > 0) {
					$drink = $this->model->get_drink_byid($post['drink'][0]);
					$cart['drink'] = $drink['title'];
					$cart['drink_price'] = $drink['price'];
					$cart['drink_qty'] = $post['drink_qty'];
					$cart['drink_price_total'] = $drink['price']*$post['drink_qty'];
				}
				else{
					$cart['drink_price_total'] = 0;
				}
				$cart['price_total'] = ($product['price'] * $post['qty']) + $cart['drink_price_total'] + $cart['addon_price_total'];
				if ($_SESSION['cart']) {
					$_SESSION['cart'][count($_SESSION['cart'])] = $cart;
					$_SESSION['total'] = $cart['price_total']+$_SESSION['total'];
				}
				else{
					$_SESSION['cart'][0] = $cart;
					$_SESSION['total'] = $cart['price_total'];
				}
			}
			else{

				$cart['product_id'] = $product['product_id'];
				$cart['deal'] = 'yes';
				$cart['detail'] = $product['detail'].'<br>';
				//for ($i=0; $i < $product['deal_piza_count']; $i++) { 
				for ($i=0; $i < count($post['deal_product']); $i++) { 
					if ($i == 0) {
						$cart['detail'] .= $post['deal_product'][$i];
					}
					else{
						$cart['detail'] .= ', '.$post['deal_product'][$i];
					}
				}
				$cart['detail'] .= '<br>';
				for ($i=0; $i < $product['deal_drink_count']; $i++) { 
					if ($i == 0) {
						$cart['detail'] .= $post['deal_drink'][$i];
					}
					else{
						$cart['detail'] .= ', '.$post['deal_drink'][$i];
					}
				}

				$cart['product'] = $product['title'];
				//$cart['detail'] = $product['detail'];
				$cart['image'] = $product['image'];
				$cart['price'] = $product['price'];
				$cart['qty'] = 1;
				if (isset($post['addon']) && intval($post['addon']) > 0) {
					$addon = $this->model->get_addon_byid($post['addon']);
					$cart['addon'] = $addon['title'];
					$cart['addon_price'] = $addon['price'];
					$cart['addon_price_total'] = $addon['price']*$post['qty'];
				}
				else{
					$cart['addon_price_total'] = 0;
				}
				if (isset($post['drink']) && strlen($post['drink']) > 0) {
					$cart['drink'] = $post['drink'];
					$cart['drink_price'] = 0;
					$cart['drink_price_total'] = 0;
				}
				else{
					$cart['drink_price_total'] = 0;
				}
				//$cart['price_total'] = ($product['price'] * $post['qty']) + $cart['drink_price_total'] + $cart['addon_price_total'];
				$cart['price_total'] = $product['price'];
				if ($_SESSION['cart']) {
					$_SESSION['cart'][count($_SESSION['cart'])] = $cart;
					$_SESSION['total'] = $cart['price_total']+$_SESSION['total'];
				}
				else{
					$_SESSION['cart'][0] = $cart;
					$_SESSION['total'] = $cart['price_total'];
				}
			}

			$html = '';
			foreach ($_SESSION['cart'] as $key => $q) {
				$html .= '<div class="deal-box">';
					$html .= '<a href="javascript://" class="close-box delete-cart-item" data-key="'.$key.'">×</a>';
					$html .= '<h3>'.$q['product'].'</h3>';
					if (strlen($q['size']) > 1) {
						$html .= '<p>'.$q['size'].'</p>';
					}
					$html .= '<p>'.$q['detail'].'</p>';
					if (strlen($q['drink']) > 0) {
						$html .= '<span>Slect Drink:  '.$q['drink'].' ('.$q['drink_qty'].')</span>';
					}
					if (strlen($q['addon']) > 0) {
						$html .= '<span>Add Ons:  '.$q['addon'].' ('.$q['addon_qty'].')</span>';
					}
					$html .= '<strong>PKR '.$q['price_total'].'</strong>';
					$html .= '<div class="counter" data-key="'.$key.'">';
						$html .= '<button class="quantity-arrow-minus quantity-arrow-minus-cart"> - </button>';
						$html .= '<input class="quantity-num quantity-num-cart" type="number" value="'.$q['qty'].'" />';
						$html .= '<button class="quantity-arrow-plus quantity-arrow-plus-cart"> + </button>';
					$html .= '</div>';
				$html .= '</div>';
			}
			echo json_encode(array("status"=>true,"html"=>$html,"count"=>count($_SESSION['cart']),"total"=>$_SESSION['total']));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"baz aja, masti kreyan ae shooreya"));
		}
	}
	public function delete_cart_item()
	{
		$key = $_POST['key'];
		$_SESSION['total'] = $_SESSION['cart'][$key]['price_total'] - $_SESSION['total'];
		$_SESSION['total'] = str_replace('-', '', $_SESSION['total']);
		unset($_SESSION['cart'][$key]);
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		$html = '';
		$html2 = '';
		foreach ($_SESSION['cart'] as $key => $q) {
			$html .= '<div class="deal-box">';
				$html .= '<a href="javascript://" class="close-box delete-cart-item" data-key="'.$key.'">×</a>';
				$html .= '<h3>'.$q['product'].'</h3>';
				if (strlen($q['size']) > 1) {
					$html .= '<p>'.$q['size'].'</p>';
				}
				$html .= '<p>'.$q['detail'].'</p>';
				if (strlen($q['drink']) > 0) {
					$html .= '<span>Slect Drink:  '.$q['drink'].' ('.$q['drink_qty'].')</span>';
				}
				if (strlen($q['addon']) > 0) {
					$html .= '<span>Add Ons:  '.$q['addon'].' ('.$q['addon_qty'].')</span>';
				}
				$html .= '<strong>PKR '.$q['price_total'].'</strong>';
				$html .= '<div class="counter" data-key="'.$key.'">';
					$html .= '<button class="quantity-arrow-minus quantity-arrow-minus-cart"> - </button>';
					$html .= '<input class="quantity-num quantity-num-cart" type="number" value="'.$q['qty'].'" />';
					$html .= '<button class="quantity-arrow-plus quantity-arrow-plus-cart"> + </button>';
				$html .= '</div>';
			$html .= '</div>';

			$tempCount = $key+1;
			$html2 .= '<tr>';
				$html2 .= '<td>'.$tempCount.'</td>';
				$html2 .= '<td>';
					$html2 .= '<div class="img-holder">';
						$html2 .= '<img src="'.UPLOADS.$q['image'].'" alt="'.$q['title'].'">';
					$html2 .= '</div>';
					$html2 .= '<div class="txt-holder">';
						$html2 .= '<strong>'.$q['product'].'</strong>';
						if (strlen($q['size']) > 1) {
							$html2 .= '<p>'.$q['size'].'</p>';
						}
						$html2 .= '<p>'.$q['detail'].'</p>';
					$html2 .= '</div>';
				$html2 .= '</td>';
				$html2 .= '<td>'.$q['qty'].'</td>';
				if (strlen($q['addon']) > 1) {
					$html2 .= '<td>'.$q['addon'].' ('.$q['addon_qty'].')</td>';
				}
				if (strlen($q['drink']) > 1) {
					$html2 .= '<td>'.$q['drink'].' ('.$q['drink_qty'].')</td>';
				}
				$html2 .= '<td>PKR '.$q['price_total'].'</td>';
			$html2 .= '</tr>';
		}
		$html2 .= '<tr>';
			$html2 .= '<td colspan="4" style="border-right: none;"></td>';
			$html2 .= '<td style="border-left: none;">Delivery Charges</td>';
			$html2 .= '<td>150</td>';
		$html2 .= '</tr>';
		$html2 .= '<tr>';
			$html2 .= '<td colspan="4" style="border-right: none;"></td>';
			$html2 .= '<td style="border-left: none;"><strong>Total</strong></td>';
			$html2 .= '<td><strong>'.number_format($Total+150).'</strong></td>';
		$html2 .= '</tr>';
		echo json_encode(array("status"=>true,"html"=>$html,"html2"=>$html2,"count"=>count($_SESSION['cart']),"total"=>$_SESSION['total']));
	}
	public function change_cart_value()
	{
		if ($_POST) {
			$item = $_SESSION['cart'][$_POST['key']];
			if ($item['qty'] > $_POST['qty']) {
				$diff = $item['qty'] - $_POST['qty'];
				$minus = true;
			}
			else{
				$diff = $_POST['qty'] - $item['qty'];
				$plus = true;
			}
			$item['qty'] = $_POST['qty'];
			if ($minus == true) {
				$item['addon_qty'] = $item['addon_qty']-$diff;
				$item['drink_qty'] = $item['drink_qty']-$diff;
			}
			if ($plus == true) {
				$item['addon_qty'] = $item['addon_qty']+$diff;
				$item['drink_qty'] = $item['drink_qty']+$diff;
			}
			$item['addon_price_total'] = $item['addon_price'] * $item['addon_qty'];
			$item['drink_price_total'] = $item['drink_price'] * $item['drink_qty'];
			$total = $item['price'] * $_POST['qty'];
			$item['price_total'] = $total + $item['drink_price_total'] + $item['addon_price_total'];
			$_SESSION['cart'][$_POST['key']] = $item;

			$html = '';
			$html2 = '';
			$Total = 0;
			foreach ($_SESSION['cart'] as $key => $q) {
				$html .= '<div class="deal-box">';
					$html .= '<a href="javascript://" class="close-box delete-cart-item" data-key="'.$key.'">×</a>';
					$html .= '<h3>'.$q['product'].'</h3>';
					if (strlen($q['size']) > 1) {
						$html .= '<p>'.$q['size'].'</p>';
					}
					$html .= '<p>'.$q['detail'].'</p>';
					if (strlen($q['drink']) > 0) {
						$html .= '<span>Slect Drink:  '.$q['drink'].' ('.$q['drink_qty'].')</span>';
					}
					if (strlen($q['addon']) > 0) {
						$html .= '<span>Add Ons:  '.$q['addon'].' ('.$q['addon_qty'].')</span>';
					}
					$html .= '<strong>PKR '.$q['price_total'].'</strong>';
					$html .= '<div class="counter" data-key="'.$key.'">';
						$html .= '<button class="quantity-arrow-minus quantity-arrow-minus-cart"> - </button>';
						$html .= '<input class="quantity-num quantity-num-cart" type="number" value="'.$q['qty'].'" />';
						$html .= '<button class="quantity-arrow-plus quantity-arrow-plus-cart"> + </button>';
					$html .= '</div>';
				$html .= '</div>';

				$tempCount = $key+1;
				$html2 .= '<tr>';
					$html2 .= '<td>'.$tempCount.'</td>';
					$html2 .= '<td>';
						$html2 .= '<div class="img-holder">';
							$html2 .= '<img src="'.UPLOADS.$q['image'].'" alt="'.$q['title'].'">';
						$html2 .= '</div>';
						$html2 .= '<div class="txt-holder">';
							$html2 .= '<strong>'.$q['product'].'</strong>';
							if (strlen($q['size']) > 1) {
								$html2 .= '<p>'.$q['size'].'</p>';
							}
							$html2 .= '<p>'.$q['detail'].'</p>';
						$html2 .= '</div>';
					$html2 .= '</td>';
					$html2 .= '<td>'.$q['qty'].'</td>';
					$html2 .= '<td>'.$q['addon'].' ('.$q['addon_qty'].')</td>';
					$html2 .= '<td>'.$q['drink'].' ('.$q['drink_qty'].')</td>';
					$html2 .= '<td>PKR '.$q['price_total'].'</td>';
				$html2 .= '</tr>';

				$Total = $Total + $q['price_total'];
			}

			$html2 .= '<tr>';
				$html2 .= '<td colspan="4" style="border-right: none;"></td>';
				$html2 .= '<td style="border-left: none;">Delivery Charges</td>';
				$html2 .= '<td>150</td>';
			$html2 .= '</tr>';
			$html2 .= '<tr>';
				$html2 .= '<td colspan="4" style="border-right: none;"></td>';
				$html2 .= '<td style="border-left: none;"><strong>Total</strong></td>';
				$html2 .= '<td><strong>'.number_format($Total+150).'</strong></td>';
			$html2 .= '</tr>';

			$_SESSION['total'] = $Total;
			echo json_encode(array("status"=>true,"html"=>$html,"html2"=>$html2,"count"=>count($_SESSION['cart']),"total"=>$_SESSION['total']));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"empty request"));
		}
	}
	public function submit_contact_form()
	{
		if ($_POST) {
			parse_str($_POST['data'],$post);
			$to = 'usman_ghani940@yahoo.com';
			$subject = 'New Contact Us Form | hotpocket.pk';
			$message = '<h1>Name: '.$post['name'].'</h1>';
			$message .= '<h1>Email: '.$post['email'].'</h1>';
			$message .= '<h1>Subject: '.$post['subject'].'</h1>';
			$message .= '<p>Any Note: '.$post['msg'].'</p>';
			$from = 'info@hotpockit.com';
			$headers = ''; 
		    $headers .= "From: ".$from."" ."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

			$mobile = str_replace('+', '', '923327147122');
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$sms_setting = $this->model->sms_setting();
			$mask = urlencode('HotPocket');
			$pass = urlencode('hotpocket1281');
			$id = urlencode('hotpocket');
			$msg = urlencode($message);
			file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
			mail($to, $subject, $message, $headers);
			echo json_encode(array("status"=>true,"msg"=>"message submitted, we'll contact back you very soon. Thank You :)"));
		}
		else{
			die('ok kro');
		}
	}
}