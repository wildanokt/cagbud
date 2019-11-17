<?php
defined('BASEPATH') or exit('No direct script access allowed');

//auth
$route['login'] = 'Auth/index';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['forgot'] = 'Auth/forgotPassword';
$route['change'] = 'Auth/changePassword';

//admin
$route['mimin'] = 'Admin/index';
$route['logina'] = 'Admin/login';
$route['logouta'] = 'Admin/logout';
$route['a_manage'] = 'Admin/situs';

//user
$route['profile'] = 'User/profile';
$route['edit_profile'] = 'User/editProfile';

//situs
$route['situs'] = 'Situs/index';
$route['situs/(:num)'] = "Situs/show/$1";
$route['managemen'] = 'Situs/manage';
$route['update_situs/(:num)'] = 'Situs/update/$1';
$route['hapus_situs/(:num)'] = 'Situs/delete/$1';

//pengajuan situs
$route['input_proposal'] = "Situs/insert";

//komentar
$route['input_komentar'] = 'Komentar/insert';
$route['edit_komentar/(:num)'] = 'Komentar/edit/$1';
$route['delete_komentar/(:num)/(:num)'] = 'Komentar/delete/$1/$2';

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
