<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//user routes
$route['register'] = 'users/register';
$route['register_submit'] = 'users/register_submit';
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
$route['logout'] = 'Users/logout';
$route['login_submit'] = 'Users/login_submit';
$route['my_account'] = 'Users/my_account';
$route['checkout'] = 'Users/checkout';
$route['forgot_password'] = 'Users/forgot_password';
$route['thank_you'] = 'Pages/thank_you';
$route['pages'] = 'Pages/view';
$route['default_controller'] = 'Home/index';

//$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;










