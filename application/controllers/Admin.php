<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
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
	}

	

	/**
	*

		@HATH NA LAIE

	*
	*/

	/******
		
		Login



	*******/
	public function login($arg='')
	{
		$data['title'] = 'Login';
		$this->load->view('admin/login' ,$data);
	}

	public function process_login()
	{
		error_reporting(E_ALL);
		//$user = $this->check_login();
		if(!isset($_POST['username']) || $_POST['username'] == "")
		{
			$data['title'] = "Username/Password Error";
			$data['error'] = TRUE;
			$this->load->view('admin/login' ,$data);
		}
		else
		{
			$result = $this->model->login($_POST['username'], md5($_POST['password']));
			if(!$result)
			{
				$data['title'] = "Admin Panel";
				$data['error'] = TRUE;
				$this->load->view('admin/login' ,$data);
			}
			else
			{
				$_SESSION['user'] = serialize($result);
				$_SESSION['current'] = DEFAULT_CONTROLLER;
				redirect("admin/index");
			}
		}
	}
	public function check_login($redrc = FALSE)
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!= "" && isset($_SESSION['current']) )
		{
			$user = unserialize($_SESSION['user']);
			$username = $user['username'];
			$password = $user['password'];
			$new = $this->model->login($username, $password);
			if($new)
			{
				$_SESSION['user'] = serialize($new);
				return $new;
			}
			else
			{
				unset($_SESSION['user']);
				redirect('admin/login');
			}
		}
		else
		{
			if($redrc)
			{
				return FALSE;
			}
			redirect('admin/login');
		}
	}
	public function logout($arg='')
	{
		unset($_SESSION['user']);
		redirect('admin/login');
	}


	/*     Login         */

	public function template($page = '', $data = '')
	{
		$data['user'] = unserialize($_SESSION['user']);
		$data['order_notify']  = $this->model->order_notify();
		$this->load->view('admin/header',$data);
		$this->load->view($page,$data);
		$this->load->view('admin/footer',$data);
	}

	/**
	*

	@Main Functions Starts From Here
		
	*
	*/
	public function index()
	{
		$user = $this->check_login();
		$this->dashboard();
	}
	public function home()
	{
		$user = $this->check_login();
		$this->dashboard();
	}
	public function dashboard()
	{
		$this->orders('new');
	}
	//ORDERs
	public function orders($status = 'new')
	{
		$user = $this->check_login();
		$data['page_title'] = $status.' orders';
		$data['page_active'] = $status.'_orders';
		$data['data'] = $this->model->get_orders($status);
		$this->template('admin/orders',$data);
	}
	public function order_detail($order)
	{
		$user = $this->check_login();
		$data['order'] = $this->model->get_order_byid($order);
		if ($data['order']) {
			$data['page_title'] = $data['order']['status'].' orders';
			$data['page_active'] = $data['order']['status'].'_orders';
			$data['data'] = $this->model->get_order_detail($order);
			$this->template('admin/order_detail',$data);
		}
		else{
			redirect('orders/new');
		}
	}
	//RESERVATIONs
	public function reservations($status = 'new')
	{
		$user = $this->check_login();
		$data['page_title'] = $status.' reservations';
		$data['page_active'] = $status.'_reservations';
		$data['reservations'] = $this->model->reservations($status);
		$this->template('admin/reservations',$data);
	}
	//CONTACT_FORMs
	public function contact_forms($status = 'new')
	{
		$user = $this->check_login();
		$data['page_title'] = $status.' contact forms';
		$data['page_active'] = $status.'_contact_forms';
		$data['forms'] = $this->model->contact_forms($status);
		$this->template('admin/contact_forms',$data);
	}
	//CATs
	public function cats($status = 'all')
	{
		$user = $this->check_login();
		$data['page_title'] = $status.' categories';
		$data['page_active'] = $status.'_cats';
		$data['cats'] = $this->model->get_cats($status);
		$this->template('admin/cats',$data);
	}
	//PRODUCTs
	public function products()
	{
		$user = $this->check_login();
		$data['page_title'] = "Products";
		$data['page_active'] = 'products';
		$data['data'] = $this->model->get_products();
		$this->template('admin/products',$data);
	}
	//DRINKs
	public function drinks()
	{
		$user = $this->check_login();
		$data['page_title'] = "Drinks";
		$data['page_active'] = 'drinks';
		$data['data'] = $this->model->get_drinks();
		$this->template('admin/drinks',$data);
	}
	//ADDON
	public function addon()
	{
		$user = $this->check_login();
		$data['page_title'] = "Addon";
		$data['page_active'] = 'addon';
		$data['data'] = $this->model->get_addon();
		$this->template('admin/addon',$data);
	}
	//PAGES
	public function pages()
	{
		$user = $this->check_login();
		$data['page_title'] = "Pages";
		$data['page_active'] = 'pages';
		$data['data'] = $this->model->get_pages();
		$this->template('admin/pages',$data);
	}
	//DISCOUNT
	public function discount()
	{
		$user = $this->check_login();
		$data['page_title'] = "Promotion Codes";
		$data['page_active'] = 'discount';
		$data['data'] = $this->model->get_disconuts();
		$this->template('admin/discount',$data);
	}
	//Slider
	public function sliders()
	{
		$user = $this->check_login();
		$data['page_title'] = "Slider";
		$data['page_active'] = 'sliders';
		$data['data'] = $this->model->get_slider('all');
		$this->template('admin/sliders',$data);
	}
	public function blog()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'All Events';
		$data['menu'] = 'blog';
		$data['blog'] = $this->model->blog();
		$this->template('admin/blog', $data);
	}
	public function service_boxs()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'Service Box';
		$data['menu'] = 'service_box';
		$data['service_boxs'] = $this->model->service_boxs();
		$this->template('admin/service_boxs', $data);
	}
	public function gallery()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'Gallery';
		$data['menu'] = 'gallery';
		$data['gallery'] = $this->model->gallery();
		$this->template('admin/gallery', $data);
	}
	/**
	*

	@Add Functions
		
	*
	*/
	public function add_cat()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Category';
		$data['page_active'] = 'add_category';
		$this->template('admin/add_cat',$data);
	}
	public function add_product()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Products';
		$data['page_active'] = 'add_product';
		$data['cats'] = $this->model->get_cats('active');
		$this->template('admin/add_product',$data);
	}
	public function add_drink()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Drink';
		$data['page_active'] = 'add_drink';
		$this->template('admin/add_drink',$data);
	}
	public function add_addon()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Addon';
		$data['page_active'] = 'add_addon';
		$this->template('admin/add_addon',$data);
	}
	public function add_page($id)
	{
		$user = $this->check_login();
		$data['page_title'] = 'Edit Page';
		$data['page_active'] = 'pages';
		$data['q'] = $this->model->get_page_byid($id);
		$this->template('admin/add_page',$data);
	}
	public function add_slider()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Slider';
		$data['page_active'] = 'sliders';
		$data['products'] = $this->model->get_products();
		$this->template('admin/add_slider',$data);
	}
	public function add_blog()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Blog Post';
		$data['menu'] = 'blog';
		$this->template('admin/add_blog', $data);
	}
	public function add_service_box()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Service Box';
		$data['menu'] = 'blog';
		$this->template('admin/add_service_box', $data);
	}
	/**
	*

	@Insert Functions
		
	*
	*/
	public function post_cat()
	{
		$user = $this->check_login();
		$this->db->insert('category',$_POST);
		redirect("admin/cats/".$_POST['status']."/?msg=Category Added!");
	}
	public function post_product()
	{
		$user = $this->check_login();
		$_POST['update_status'] = 'yes';
		$deal['cats'] = $_POST['deal_cat_id'];unset($_POST['deal_cat_id']);
		$deal['sizes'] = $_POST['size'];unset($_POST['size']);
		$deal['counts'] = $_POST['count'];unset($_POST['count']);
		$this->db->insert('product',$_POST);
		$insert['product_id'] = $this->db->insert_id();
		foreach ($deal['cats'] as $key => $cat) {
			$insert['category_id'] = $cat;
			$insert['size'] = $deal['sizes'][$key];
			$insert['count'] = $deal['counts'][$key];
			$this->db->insert('deal_detail',$insert);
		}
		redirect("admin/products/?msg=Product Added!");
	}
	public function post_drink()
	{
		$user = $this->check_login();
		$this->db->insert('drink',$_POST);
		redirect("admin/add-drink/?msg=Drink Added!");
	}
	public function post_addon()
	{
		$user = $this->check_login();
		$this->db->insert('addon',$_POST);
		redirect("admin/add-addon/?msg=Addon Added!");
	}
	public function post_discount()
	{
		$user = $this->check_login();
		$this->db->insert('discount',$_POST);
		redirect("admin/discount/?msg=Discount Code Added!");
	}
	public function post_slider()
	{
		$user = $this->check_login();
		$this->db->insert('slider',$_POST);
		redirect("admin/sliders/?msg=Slider Added!");
	}
	public function post_blog()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("blog", $_POST);
		redirect("admin/blog/?msg=Blog Post Added!");
	}
	public function post_service_box()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("service_box", $_POST);
		redirect("admin/service-boxs/?msg=Service Box Added!");
	}
	public function post_gallery()
	{
		$user = $this->check_login();
		foreach($_FILES["image"]["tmp_name"] as $key => $img) {

			$_FILES['file']['name']       = $_FILES['image']['name'][$key];
            $_FILES['file']['type']       = $_FILES['image']['type'][$key];
            $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$key];
            $_FILES['file']['error']      = $_FILES['image']['error'][$key];
            $_FILES['file']['size']       = $_FILES['image']['size'][$key];

			$config['upload_path'] = 'uploads/';
	    	$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG';
	    	$config['encrypt_name'] = TRUE;
	    	$ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES["file"]['name']).'.'.$ext;
			$config['file_name'] = $new_name;
	    	$resp = $this->load->library('upload', $config);
	    	if ($resp) {
	        	$this->upload->do_upload('file');
				$insert['image'] = $this->upload->data()['file_name'];
				$this->db->insert("gallery", $insert);
	    	}
		}
		redirect("admin/gallery/?msg=Photos Added!");
	}
	/**
	*

	@Edit Functions
		
	*
	*/
	public function edit_cat()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo json_encode("Wrong Category ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_cat_byid($new_id);
			if (!($data['q'])) {
				redirect('admin/logout');
			}
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['page_title'] = 'Edit Category';
			$data['page_active'] = $data['q']['status'].'_cats';
			$this->template('admin/add_cat',$data);
		}
	}
	public function edit_product()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo json_encode("Wrong Product ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_product_byid($new_id);
			$data['cats'] = $this->model->get_cats('active');
			$data['deals'] = $this->model->get_product_deal_details($new_id);
			if (!($data['q'])) {
				redirect('admin/logout');
			}
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['page_title'] = 'Edit Product';
			$data['page_active'] = 'products';
			$this->template('admin/add_product',$data);
		}
	}
	public function edit_drink()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo json_encode("Wrong Drink ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_drink_byid($new_id);
			if (!($data['q'])) {
				redirect('admin/logout');
			}
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['page_title'] = 'Edit Drink';
			$data['page_active'] = 'drinks';
			$this->template('admin/add_drink',$data);
		}
	}
	public function edit_addon()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo json_encode("Wrong Addon ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_addon_byid($new_id);
			if (!($data['q'])) {
				redirect('admin/logout');
			}
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['page_title'] = 'Edit Addon';
			$data['page_active'] = 'addon';
			$this->template('admin/add_addon',$data);
		}
	}
	public function edit_slider()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo json_encode("Wrong Slider ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_slider_byid($new_id);
			if (!($data['q'])) {
				redirect('admin/logout');
			}
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['page_title'] = 'Edit slider';
			$data['page_active'] = 'sliders';
			$data['products'] = $this->model->get_products();
			$this->template('admin/add_slider',$data);
		}
	}
	public function setting()
	{
		$user = $this->check_login();
		$data['q'] = $this->model->setting();
		$data['page_title'] = "Edit: Setting";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'setting';
		$this->template('admin/setting', $data);
	}
	public function edit_blog()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Blog ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_blog_byid($new_id);
			$data['page_title'] = "Edit: Blog Post";
			$data['mode'] = "edit";
			$data['menu'] = 'blog';
			$this->template('admin/add_blog', $data);
		}
	}
	public function edit_service_box()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Service Box ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_service_box_byid($new_id);
			$data['page_title'] = "Edit: Service Box";
			$data['mode'] = "edit";
			$data['menu'] = 'service_boxs';
			$this->template('admin/add_service_box', $data);
		}
	}
	/**
	*

	@Update Functions
		
	*
	*/
	public function update_cat()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where('category_id', $aid);
		$data = $this->db->update('category', $_POST);
		if($data)
		{
			redirect("admin/cats/".$_POST['status']."/?msg=Edited Category");
		}
		else
		{
			redirect("admin/edit-cat/?id=".$aid."&msg=Error occured while Editing Category");
		}
	}
	public function update_product()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['update_status'] = 'yes';
		$this->db->where('product_id', $aid);
		$data = $this->db->update('product', $_POST);
		if($data)
		{
			redirect("admin/products/?msg=Edited Product");
		}
		else
		{
			redirect("admin/edit-product/?id=".$aid."&msg=Error occured while Editing product");
		}
	}
	public function update_drink()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where('drink_id', $aid);
		$data = $this->db->update('drink', $_POST);
		if($data)
		{
			redirect("admin/drinks/?msg=Edited Product");
		}
		else
		{
			redirect("admin/edit-drink/?id=".$aid."&msg=Error occured while Editing Drink");
		}
	}
	public function update_addon()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where('addon_id', $aid);
		$data = $this->db->update('addon', $_POST);
		if($data)
		{
			redirect("admin/addon/?msg=Edited Addon");
		}
		else
		{
			redirect("admin/edit-addon/?id=".$aid."&msg=Error occured while Editing Addon");
		}
	}
	public function update_slider()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where('slider_id', $aid);
		$data = $this->db->update('slider', $_POST);
		if($data)
		{
			redirect("admin/sliders/?msg=Edited Slider");
		}
		else
		{
			redirect("admin/edit-slider/?id=".$aid."&msg=Error occured while Editing Slider");
		}
	}
	public function update_setting()
	{
		$user = $this->check_login();
		$this->db->where('setting_id', '1');
		$data = $this->db->update('setting', $_POST);
		redirect("admin/setting/");
	}
	public function update_page($id)
	{
		$user = $this->check_login();
		$this->db->where('page_id', $id);
		$data = $this->db->update('page', $_POST);
		redirect("admin/pages/");
	}
	public function update_blog()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("blog_id",$aid);
		$data = $this->db->update("blog", $_POST);
		if($data)
		{
			redirect("admin/blog/?msg=Edited Blog Post");
		}
		else
		{
			redirect("admin/blog/?error=1&msg=Error occured while Editing Blog Post");
		}
	}
	public function update_service_box()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("service_box_id",$aid);
		$data = $this->db->update("service_box", $_POST);
		if($data)
		{
			redirect("admin/service-boxs/?msg=Edited service box Post");
		}
		else
		{
			redirect("admin/service-boxs/?error=1&msg=Error occured while Editing service box");
		}
	}
	/**
	*

	@Delete Functions
		
	*
	*/
	public function delete_drink($id)
	{
		$user = $this->check_login();
		$this->db->where('drink_id', $id);
   		$resp = $this->db->delete('drink');
		if($resp)
		{
			redirect("admin/drinks/?msg=Drinks has Deleted");
		}
		else
		{
			redirect("admin/drinks/?&msg=Drinks has failed to delete. Try Again!");
		}
	}
	public function delete_addon($id)
	{
		$user = $this->check_login();
		$this->db->where('addon_id', $id);
   		$resp = $this->db->delete('addon');
		if($resp)
		{
			redirect("admin/addon/?msg=Addon has Deleted");
		}
		else
		{
			redirect("admin/addon/?&msg=Addon has failed to delete. Try Again!");
		}
	}
	public function delete_discount($id)
	{
		$user = $this->check_login();
		$this->db->where('discount_id', $id);
   		$resp = $this->db->delete('discount');
		if($resp)
		{
			redirect("admin/discount/?msg=Discount Code has Deleted");
		}
		else
		{
			redirect("admin/discount/?&msg=Discount Code has failed to delete. Try Again!");
		}
	}
	public function delete_slider($id)
	{
		$user = $this->check_login();
		$this->db->where('slider_id', $id);
   		$resp = $this->db->delete('slider');
		if($resp)
		{
			redirect("admin/sliders/?msg=Slider has Deleted");
		}
		else
		{
			redirect("admin/sliders/?&msg=Slider has failed to delete. Try Again!");
		}
	}
	public function delete_blog()
	{
		$user = $this->check_login();
		$this->db->where('blog_id', $_GET['id']);
		$resp = $this->db->delete('blog');
		if($resp)
		{
			redirect("admin/blog/?msg=News has Deleted");
		}
		else
		{
			redirect("admin/blog/?error=1&msg=News has failed to delete. Try Again!");
		}
	}
	public function delete_service_box()
	{
		$user = $this->check_login();
		$this->db->where('service_box_id', $_GET['id']);
		$resp = $this->db->delete('service_box');
		if($resp)
		{
			redirect("admin/service-boxs/?msg=Service box has Deleted");
		}
		else
		{
			redirect("admin/service-boxs/?error=1&msg=Service box has failed to delete. Try Again!");
		}
	}
	public function delete_gallery()
	{
		$user = $this->check_login();
		$photo = $this->model->get_row("SELECT `image` FROM `gallery` WHERE `gallery_id` = '".$_GET['id']."';");
		$this->db->where('gallery_id', $_GET['id']);
		$resp = $this->db->delete('gallery');
		if($resp)
		{
			unlink('uploads/'.$photo['img']);
			redirect("admin/gallery?msg=Photo has Deleted");
		}
		else
		{
			redirect("admin/gallery?error=1&msg=Photo has failed to delete. Try Again!");
		}
	}
	/**
	*

	@AJAX Functions
		
	*
	*/
	public function post_photo_ajax()
	{
		$user = $this->check_login();
		if ($_FILES){
			$config['upload_path'] = 'uploads/';
        	$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES["img"]['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES["img"]['name']).'.'.$ext;
			$config['file_name'] = $new_name;
        	$resp = $this->load->library('upload', $config);
        	if ($resp) {
	        	$this->upload->do_upload('img');
				$FileName = $this->upload->data()['file_name'];
				echo json_encode(array("status"=>true,"data"=>$FileName));
        	}
        	else{
				echo json_encode(array("status"=>false,"data"=>'File Must be an image file.'));
        	}
		}
		else{
			redirect('logout');
		}
	}
	public function post_pdf_ajax()
	{
		$user = $this->check_login();
		if ($_FILES){
			$config['upload_path'] = 'uploads/';
        	$config['allowed_types'] = 'PDF|pdf';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES["img"]['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES["img"]['name']).'.'.$ext;
			$config['file_name'] = $new_name;
        	$resp = $this->load->library('upload', $config);
        	if ($resp) {
	        	$this->upload->do_upload('img');
				$FileName = $this->upload->data()['file_name'];
				echo json_encode(array("status"=>true,"data"=>$FileName));
        	}
        	else{
				echo json_encode(array("status"=>false,"data"=>'File Must be a PDF file.'));
        	}
		}
		else{
			redirect('logout');
		}
	}
	public function change_cat_status()
	{
		$user = $this->check_login();
		if ($_POST) {
			$update['status'] = $_POST['status'];
			$this->db->where('category_id',$_POST['id']);
			$resp = $this->db->update('category',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"changed."));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not changed, please try again or reload your web page."));
			}
		}
	}
	public function change_product_status()
	{
		$user = $this->check_login();
		if ($_POST) {
			$update['status'] = $_POST['status'];
			$this->db->where('product_id',$_POST['id']);
			$resp = $this->db->update('product',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"changed."));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not changed, please try again or reload your web page."));
			}
		}
	}
	public function change_drink_status($value='')
	{
		$user = $this->check_login();
		if ($_POST) {
			$update['status'] = $_POST['status'];
			$this->db->where('drink_id',$_POST['id']);
			$resp = $this->db->update('drink',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"changed."));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not changed, please try again or reload your web page."));
			}
		}
	}
	public function change_addon_status()
	{
		$user = $this->check_login();
		if ($_POST) {
			$update['status'] = $_POST['status'];
			$this->db->where('addon_id',$_POST['id']);
			$resp = $this->db->update('addon',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"changed."));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not changed, please try again or reload your web page."));
			}
		}
	}
	public function change_reservation_status()
	{
		$user = $this->check_login();
		if ($_POST) {
			$update['status'] = $_POST['status'];
			$this->db->where('reservation_id',$_POST['id']);
			$resp = $this->db->update('reservation',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"changed."));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not changed, please try again or reload your web page."));
			}
		}
	}
	public function change_contact_form_status()
	{
		$user = $this->check_login();
		if ($_POST) {
			$update['status'] = $_POST['status'];
			$this->db->where('contact_form_id',$_POST['id']);
			$resp = $this->db->update('contact_form',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"changed."));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not changed, please try again or reload your web page."));
			}
		}
	}
	public function change_order_status()
	{
		$user = $this->check_login();
		if ($_POST) {
			$update['status'] = $_POST['status'];
			$this->db->where('order_id',$_POST['id']);
			$resp = $this->db->update('order',$update);
			if ($resp) {
				$order = $this->model->get_order_byid($_POST['id']);
				if ($_POST['status'] == 'process' && strlen($order['sms']) > 3) {
					$mobile = str_replace('+', '', $order['phone']);
					$mobile = preg_replace('/-/', '', $mobile, 1);
					$mobile = preg_replace('/=/', '', $mobile, 1);
					$mobile = preg_replace('/00/', '', $mobile, 2);
					$mobile = preg_replace('/0/', '92', $mobile, 1);
					$sms_setting = $this->model->sms_setting();
					$mask = urlencode('HotPocket');
					$pass = urlencode('hotpocket1281');
					$id = urlencode('hotpocket');
					$msg = urlencode($order['sms']);
					file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

					if (strlen($order['email']) > 3) {
						setcookie('address',$_POST['address'],time() + (86400 * 30), "/");
						$to = $_POST['email'];
						$subject = 'Order Submitted | hotpocket.pk';
						$message = $order['sms'];
						$from = 'info@hotpockit.com';
						$headers = '';
					    $headers .= "From: ".$from."" ."\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						$headers .= "X-Priority: 3\r\n";
						$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
						mail($to, $subject, $message, $headers);
					}
				}
				else if ($_POST['status'] == 'done'){
					$mobile = str_replace('+', '', $order['phone']);
					$mobile = preg_replace('/-/', '', $mobile, 1);
					$mobile = preg_replace('/=/', '', $mobile, 1);
					$mobile = preg_replace('/00/', '', $mobile, 2);
					$mobile = preg_replace('/0/', '92', $mobile, 1);
					$sms_setting = $this->model->sms_setting();
					$mask = urlencode('HotPocket');
					$pass = urlencode('hotpocket1281');
					$id = urlencode('hotpocket');
					$msg = urlencode('Thank you '.$order['name'].' for choosing HotPocket, enjoy your meal.');
					file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

					if (strlen($order['email']) > 3) {
						setcookie('address',$_POST['address'],time() + (86400 * 30), "/");
						$to = $_POST['email'];
						$subject = 'Order Submitted | hotpocket.pk';
						$message = 'Thank you '.$order['name'].' for choosing HotPocket, enjoy your meal.';
						$from = 'info@hotpockit.com';
						$headers = ''; 
					    $headers .= "From: ".$from."" ."\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						$headers .= "X-Priority: 3\r\n";
						$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
						mail($to, $subject, $message, $headers);
					}
				}

				echo json_encode(array("status"=>true,"msg"=>"changed."));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not changed, please try again or reload your web page."));
			}
		}
	}
	public function get_notify()
	{
		$resp  = $this->model->order_notify();
		if ($resp) {
			$html = '';
			foreach ($resp['orders'] as $key => $new_order) {
				$html .= '<a class="list-group-item" href="'.BASEURL.'admin/orders/new" role="menuitem">';
					$html .= '<div class="media">';
						$html .= '<div class="media-left padding-right-10">';
							$html .= '<i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>';
						$html .= '</div>';
						$html .= '<div class="media-body">';
							$html .= '<h6 class="media-heading">A new order has been placed</h6>';
							$html .= '<time class="media-meta" datetime="2015-06-12T20:50:48+08:00">'.$this->get_time_difference_php($new_order['at']).'</time>';
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</a>';
			}
			echo json_encode(array("status"=>true,"count"=>$resp['count'],"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false));
		}
	}
	public function get_time_difference_php($created_time)
	{
	    $timezone = (DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, "PK"));
	    date_default_timezone_set($timezone[0]); //Change as per your default time
	    $str = strtotime($created_time);
	    $today = strtotime(date('Y-m-d H:i:s'));

	    // It returns the time difference in Seconds...
	    $time_differnce = $today-$str;

	    // To Calculate the time difference in Years...
	    $years = 60*60*24*365;

	    // To Calculate the time difference in Months...
	    $months = 60*60*24*30;

	    // To Calculate the time difference in Days...
	    $days = 60*60*24;

	    // To Calculate the time difference in Hours...
	    $hours = 60*60;

	    // To Calculate the time difference in Minutes...
	    $minutes = 60;

	    if(intval($time_differnce/$years) > 1)
	    {
	        return intval($time_differnce/$years)." years ago";
	    }else if(intval($time_differnce/$years) > 0)
	    {
	        return intval($time_differnce/$years)." year ago";
	    }else if(intval($time_differnce/$months) > 1)
	    {
	        return intval($time_differnce/$months)." months ago";
	    }else if(intval(($time_differnce/$months)) > 0)
	    {
	        return intval(($time_differnce/$months))." month ago";
	    }else if(intval(($time_differnce/$days)) > 1)
	    {
	        return intval(($time_differnce/$days))." days ago";
	    }else if (intval(($time_differnce/$days)) > 0) 
	    {
	        return intval(($time_differnce/$days))." day ago";
	    }else if (intval(($time_differnce/$hours)) > 1) 
	    {
	        return intval(($time_differnce/$hours))." hours ago";
	    }else if (intval(($time_differnce/$hours)) > 0) 
	    {
	        return intval(($time_differnce/$hours))." hour ago";
	    }else if (intval(($time_differnce/$minutes)) > 1) 
	    {
	        return intval(($time_differnce/$minutes))." minutes ago";
	    }else if (intval(($time_differnce/$minutes)) > 0) 
	    {
	        return intval(($time_differnce/$minutes))." minute ago";
	    }else if (intval(($time_differnce)) > 1) 
	    {
	        return intval(($time_differnce))." seconds ago";
	    }else
	    {
	        // return "few seconds ago";
	        return "Just Now";
	    }
	}
	/**
	*

	@Test Functions
		
	*
	*/
	public function test($arg='')
	{
		die;
		$query = $this->db->query('UPDATE `phase` SET `count`=`count`+1 WHERE `phase_id` = 1');
	}
}
