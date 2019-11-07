<?php
defined('BASEPATH') or exit('No direct script access allowed');

//auth
$route['login'] = 'Auth/index';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['forgot'] = 'Auth/forgotPassword';
$route['change'] = 'Auth/changePassword';


//situs
$route['show/:num'] = "Situs/$1";

//komentar


//pengajuan situs
$route['proposal']="Situs/insert";




$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
