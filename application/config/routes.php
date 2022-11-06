<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Starting';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Custom Routes
$route['RegistrationCustomer'] = 'Common/RegistrationCustomer';
$route['registrationcustomer'] = 'Common/RegistrationCustomer';
$route['RegistrationVet'] = 'Common/RegistrationVet';
$route['registrationvet'] = 'Common/RegistrationVet';
$route['RegistrationSeller'] = 'Common/RegistrationSeller';
$route['registrationseller'] = 'Common/RegistrationSeller';
$route['Login'] = 'Common/Login';
$route['login'] = 'Common/Login';

$route['Home'] = 'Pages/Home';
$route['home'] = 'Pages/Home';
$route['EditProfileCustomer'] = 'Pages/EditProfileCustomer';
$route['EditProfileCustomer'] = 'Pages/EditProfileCustomer';

$route['Clinics'] = 'Pages/Clinics';
$route['clinics'] = 'Pages/Clinics';
$route['Clinics/page/(:any)'] = 'Pages/Clinics/index/';
$route['clinics/page/(:any)'] = 'Pages/Clinics/index/';
$route['Clinics/page'] = 'Pages/Clinics/index/';
$route['clinics/page'] = 'Pages/Clinics/index/';
$route['ClinicProfile/(:any)'] = 'Pages/ClinicProfile/index/$1';
$route['clinicprofile/(:any)'] = 'Pages/ClinicProfile/index/$1';

$route['Products'] = 'Pages/Products';
$route['products'] = 'Pages/Products';
$route['Products/page/(:any)'] = 'Pages/Products/index/';
$route['products/page/(:any)'] = 'Pages/Products/index/';
$route['Products/page'] = 'Pages/Products/index/';
$route['products/page'] = 'Pages/Products/index/';
$route['ProductInformation/(:any)'] = 'Pages/ProductInformation/index/$1';
$route['productinfromation/(:any)'] = 'Pages/ProductInformation/index/$1';

$route['ProfileVet'] = 'Pages/ProfileVet';
$route['profilevet'] = 'Pages/ProfileVet';
$route['EditProfileVet'] = 'Pages/EditProfileVet';
$route['editprofilevet'] = 'Pages/EditProfileVet';
$route['ViewRatingVet'] = 'Pages/ViewRatingVet';
$route['viewratingvet'] = 'Pages/ViewRatingVet';

$route['ProfileSeller'] = 'Pages/ProfileSeller';
$route['profileseller'] = 'Pages/ProfileSeller';
$route['EditProfileSeller'] = 'Pages/EditProfileSeller';
$route['editprofileseller'] = 'Pages/EditProfileSeller';
$route['ViewRatingProd'] = 'Pages/ViewRatingProd';
$route['viewratingprod'] = 'Pages/ViewRatingProd';
$route['ViewRatingProd/viewRating/(:any)'] = 'Pages/ViewRatingProd/viewRating/$1';
$route['viewratingprod/viewRating/(:any)'] = 'Pages/ViewRatingProd/viewRating/$1';

$route['AddProduct'] = 'Pages/AddProduct';
$route['addproduct'] = 'Pages/AddProduct';
$route['EditProduct/(:any)'] = 'Pages/AddProduct/editProduct/$1';
$route['editproduct/(:any)'] = 'Pages/AddProduct/editProduct/$1';


$route['ReviewVet/(:any)'] = 'Pages/Review/reviewVet/$1';
$route['reviewvet/(:any)'] = 'Pages/Review/reviewVet/$1';
$route['ReviewProduct/(:any)'] = 'Pages/Review/reviewProduct/$1';
$route['reviewproduct/(:any)'] = 'Pages/Review/reviewProduct/$1';
