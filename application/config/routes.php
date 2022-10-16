<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//user routes
$route['register'] = 'users/register';
$route['register_submit'] = 'users/register_submit';
$route['register/(:any)'] = 'users/register/$1';
$route['register_submit/(:any)'] = 'users/register_submit/$1';
$route['users/dashboard'] = 'users/dashboard';
$route['comments/create/(:any)'] = 'comments/create/$1';
$route['categories'] = 'category/index';
$route['categories/create'] = 'category/create';
$route['categories/posts/(:any)'] = 'category/posts/$1';
$route['categories/delete/(:any)'] = 'category/delete/$1';
$route['posts/index'] = 'posts/index';
$route['posts/update'] = 'posts/update';
$route['posts/delete/(:any)'] = 'posts/delete/$1';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['classes'] = "Classes/index";
$route['classes/(:any)'] = 'Classes/index/$1';
$route['membership'] = 'Membership/index';
$route['membership/(:any)'] = 'Membership/index/$1';
$route['membership_submit'] = 'Membership/save';
$route['personal_trainer'] = 'PersonalTrainer/index';
$route['login'] = 'Users/login';
$route['login/(:any)'] = 'Users/login/$1';
$route['logout'] = 'Users/logout';
$route['login_submit'] = 'Users/login_submit';
$route['login_submit/(:any)'] = 'Users/login_submit/$1';
$route['my_account'] = 'Users/my_account';
$route['forgot_password'] = 'Users/forgot_password';
$route['thank_you'] = 'Pages/thank_you';
$route['pages'] = 'Pages/view';
$route['default_controller'] = 'Home/index';

$route['checkout'] = 'Checkout/index';
$route['cart'] = 'Checkout/cart';
$route['add_to_cart'] = 'Checkout/addToCart';
$route['remove_cart'] = 'Checkout/removeCart';
$route['checkout_submit'] = 'Checkout/save';

//$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;










