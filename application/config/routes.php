<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['service_centers/add'] = 'service_centers/add';
//$route['service_centers/(:any)'] = 'service_centers/index/$1';

$route['default_controller'] = 'login';
// $route['order/add_center_filter'] = 'order/add_center_filter';
// $route['order/asign_center'] = 'order/asign_center';
// $route['order/order_without_city'] = 'order/order_without_city';
// $route['order/add_center_filter_without_city'] = 'order/add_center_filter_without_city';
// $route['order/add_remark'] = 'order/add_remark';
// $route['order/update_remark'] = 'order/update_remark';
// $route['order/add'] = 'order/add';
// $route['order/add_vehicle_ajax'] = 'order/add_vehicle_ajax';
// $route['order/mobile_no_ajax'] = 'order/mobile_no_ajax';
// $route['order/reg_no_ajax'] = 'order/reg_no_ajax';
// $route['order/add_review_to_user'] = 'order/add_review_to_user';
// $route['order/add_review_to_center'] = 'order/add_review_to_center';
// $route['order/get_services'] = 'order/get_services';
// $route['order/add_new_services'] = 'order/add_new_services';
// $route['order/update_services_amount'] = 'order/update_services_amount';
// $route['order/update_order_details'] = 'order/update_order_details';
// $route['order/final_submission_cencel'] = 'order/final_submission_cencel';
// $route['order/assign_queuing_approve'] = 'order/assign_queuing_approve';
// $route['order/(:any)'] = 'order/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
