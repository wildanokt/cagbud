<?php
defined('BASEPATH') or exit('No direct script access allowed');

//auth
$route['login'] = 'Auth/index';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['forgot'] = 'Auth/forgotPassword';
$route['change'] = 'Auth/changePassword';



$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
