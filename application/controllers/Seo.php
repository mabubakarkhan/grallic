<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends CI_Controller {

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
	**/

	public function __construct()
	{
        parent::__construct();
        error_reporting(0);
        $this->load->database();
        $this->load->model('Model_functions','model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
	}

	/**
	*

		@HATH NA LAIE

	*
	*/
	public function template($page = '', $data = '')
	{
		$this->load->view('seo/header',$data);
		$this->load->view($page,$data);
        $this->load->view('seo/footer',$data);
    }
    /**
    *

        @LOGIN

    *
    */
    public function login()
    {
    	if ($_SESSION['seo']['login'] == true) {
    		redirect('seo/index');
    	}
        $data['title'] = 'Login';
		$this->load->view('seo/login',$data);
    }
    public function post_login()
    {
    	if ($_POST['username'] == 'seo' && $_POST['password'] == 'P@kistan321') {
    		$_SESSION['seo']['login'] = true;
    		redirect('seo/index');
    	}
    	else{
    		redirect('seo/login');
    	}
    }
	public function logout()
	{
		unset($_SESSION['seo']);
		redirect('seo/index');
	}

	/**
	*

		@PAGES

	*
	*/
	public function index()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'All Categories';
			$data['cats'] = $this->model->get_cats('all');
			$this->template('seo/index',$data);
		}
		else{
			redirect('seo/login');
		}
	}
	public function products()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'All Products';
			$data['products'] = $this->model->get_products();
			$this->template('seo/products',$data);
		}
		else{
			redirect('seo/login');
		}
	}
	public function pages()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'All Pages';
			$data['pages'] = $this->model->get_pages();
			$this->template('seo/pages',$data);
		}
		else{
			redirect('seo/login');
		}
	}
	public function blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'Blog';
			$data['blog'] = $this->model->blog();
			$this->template('seo/blog',$data);
		}
		else{
			redirect('seo/login');
		}
	}
	public function tags()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'Tags';
			$data['q'] = $this->model->seo_tags();
			$this->template('seo/tags',$data);
		}
		else{
			redirect('seo/login');
		}
	}

	/**
	*

		@AJAX

	*
	*/
	public function get_cat()
	{
		if ($_SESSION['seo']['login'] == true) {
			$cat = $this->model->get_cat_byid($_POST['id']);
			if ($cat) {
				echo json_encode(array("status"=>true,"data"=>$cat));
			}
			else{
				echo json_encode(array("status"=>false));
			}
		}
	}
	public function submit_cat()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$id = $post['id'];unset($post['id']);
			$this->db->where('category_id',$id);
			$resp = $this->db->update('category',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	public function get_product()
	{
		if ($_SESSION['seo']['login'] == true) {
			$cat = $this->model->get_product_byid($_POST['id']);
			if ($cat) {
				echo json_encode(array("status"=>true,"data"=>$cat));
			}
			else{
				echo json_encode(array("status"=>false));
			}
		}
	}
	public function submit_product()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$id = $post['id'];unset($post['id']);
			$this->db->where('product_id',$id);
			$resp = $this->db->update('product',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	public function get_page()
	{
		if ($_SESSION['seo']['login'] == true) {
			$page = $this->model->get_page_byid($_POST['id']);
			if ($page) {
				echo json_encode(array("status"=>true,"data"=>$page));
			}
			else{
				echo json_encode(array("status"=>false));
			}
		}
	}
	public function submit_page()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$id = $post['id'];unset($post['id']);
			$this->db->where('page_id',$id);
			$resp = $this->db->update('page',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	public function get_blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			$blog = $this->model->get_blog_byid($_POST['id']);
			if ($blog) {
				echo json_encode(array("status"=>true,"data"=>$blog));
			}
			else{
				echo json_encode(array("status"=>false));
			}
		}
	}
	public function update_blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			$id = $_POST['id'];unset($_POST['id']);
			if (strlen($_FILES["img"]['name']) > 4){
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
					$_POST['image'] = $FileName;
	        	}
	        	else{
	        		redirect('seo/blog?error=true&msg=File Must be an image file.');
	        	}
			}
			$this->db->where('blog_id',$id);
			$resp = $this->db->update('blog',$_POST);
			if ($resp) {
				redirect('seo/blog?error=false&msg=submitted');
			}
			else{
				redirect('seo/blog?error=true&msg=not submitted');
			}
		}
	}
	public function post_blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			if (strlen($_FILES["img"]['name']) > 4){
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
					$_POST['image'] = $FileName;
	        	}
	        	else{
	        		redirect('seo/blog?error=true&msg=File Must be an image file.');
	        	}
			}
			$resp = $this->db->insert('blog',$_POST);
			if ($resp) {
				redirect('seo/blog?error=false&msg=submitted');
			}
			else{
				redirect('seo/blog?error=true&msg=not submitted');
			}
		}
	}
	public function submit_tags()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$this->db->where('seo_setting_id',1);
			$resp = $this->db->update('seo_setting',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	/**
	*

		@TEST

	*
	*/
	public function test()
	{

		$mobile = 923331234567;
		$mask = 'Mask';
		$password = 'password';
		$username = 'username';
		$msg = 'Hello World!';

		$ch = curl_init();
		$mask = urlencode($mask);
		$pass = urlencode($password);
		$id = urlencode($username);
		$msg = urlencode($msg);
		
		curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch);
		curl_close ($ch);
		print_r($server_output);
	}
}
