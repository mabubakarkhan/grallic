<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['translate_uri_dashes'] = TRUE;
$route['default_controller'] = "home";
$controller_exceptions = array('admin','api','seo');
$route['404_override'] = '';

$route["index"] = 'Home/index';
$route["about-us"] = 'Home/about_us';
$route["contact-us"] = 'Home/contact_us';

$route["category/(.*)"] = 'Home/category/$1';
$route["product/(.*)"] = 'Home/product/$1';
$route["add-to-cart"] = 'Home/add_to_cart';
$route["delete-cart-item"] = 'Home/delete_cart_item';
$route["change-cart-value"] = 'Home/change_cart_value';
$route["checkout"] = 'Home/checkout';
$route["submit-order"] = 'Home/submit_order';

$route["post-photo-ajax"] = 'Home/post_photo_ajax';

$route["submit-contact-form"] = 'Home/submit_contact_form';


// Test matter
$route["test"] = 'Home/test';
$route["test/(.*)"] = 'Home/test/$1';





/* End of file routes.php */
/* Location: ./application/config/routes.php */