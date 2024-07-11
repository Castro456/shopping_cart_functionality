<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'LoginController/index';
$route['login/auth'] = 'LoginController/authentication';

$route['register'] = 'RegisterController/index';
$route['register/form-submission'] = 'RegisterController/register_new_account';

$route['logout'] = 'LoginController/logout';

$route['dashboard'] = 'DashboardController/index';
$route['product/delete/(:num)'] = 'DashboardController/delete_product/$1';
$route['product/edit/(:num)'] = 'DashboardController/edit_product/$1';
$route['product/update/(:num)'] = 'DashboardController/update_product/$1';
$route['product/create'] = 'DashboardController/create_product';
$route['product/store'] = 'DashboardController/store_product';

$route['cart'] = 'CartController/index';
$route['cart/add/(:num)'] = 'CartController/add/$1';
$route['cart/remove/(:any)'] = 'CartController/remove/$1';
$route['cart/clear'] = 'CartController/clear';
$route['cart/update'] = 'CartController/update';

$route['default_controller'] = 'DashboardController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
