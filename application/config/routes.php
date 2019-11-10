<?php
defined('BASEPATH') or exit('No direct script access allowed');

//auth
$route['login'] = 'Auth/index';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['forgot'] = 'Auth/forgotPassword';
$route['change'] = 'Auth/changePassword';


//situs
$route['situs'] = 'Situs/index';
$route['situs/(:num)'] = "Situs/show/$1";
$route['managemen'] = 'Situs/manage';

//komentar
$route['input_komentar'] = 'Komentar/insert';

//pengajuan situs
$route['input_proposal'] = "Situs/insert";




$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
