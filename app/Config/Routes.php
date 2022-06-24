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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
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
$routes->get('/', 'Home::index');

// Route Login
$routes->get('login', 'Auth::index', ['filter' => 'guest']);
$routes->post('login/auth', 'Auth::login', ['filter' => 'guest']);

// Route CMS Dashboard
$routes->get('cms/dashboard', 'CMS\Dashboard::index', ['filter' => 'auth']);

// Route Logout
$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

// Route CMS User
$routes->get('cms/user', 'CMS\User::index', ['filter' => 'auth']);
$routes->get('cms/user/loadData', 'CMS\User::loadData', ['filter' => 'auth']);
$routes->get('cms/user/add', 'CMS\User::create', ['filter' => 'auth']);
$routes->post('cms/user/save', 'CMS\User::save', ['filter' => 'auth']);
$routes->get('cms/user/edit/(:num)', 'CMS\User::edit/$1', ['filter' => 'auth']);
$routes->post('cms/user/update/(:num)', 'CMS\User::update/$1', ['filter' => 'auth']);
$routes->get('cms/user/delete/(:num)', 'CMS\User::delete/$1', ['filter' => 'auth']);

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
