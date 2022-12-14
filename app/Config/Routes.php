<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/register', 'Auth::save');
$routes->post('/login', 'Auth::auth');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/dashboard/save-business', 'Dashboard::save_business');
$routes->get('/logout', 'Auth::logout');
$routes->post('/dashboard/send-reply', 'Dashboard::send_reply');
$routes->get('/dashboard/myprofile', 'Dashboard::myprofile');
$routes->post('/myprofile', 'Auth::editmyprofile');
$routes->get('/dashboard/accountsettings', 'Dashboard::accountsettings');
$routes->post('/accountsettings', 'Auth::editaccountsettings');
$routes->get('/cron', 'Dashboard::cron');
$routes->get('/forgotpassword', 'Auth::forgotpassword');
$routes->post('/forgotpassword', 'Auth::processforgotpassword');
$routes->get('/sendemail', 'Auth::sendemail');
$routes->post('/sendemail', 'Auth::processsendemail');
$routes->get('/checkreviews', 'Auth::checkreviews');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
