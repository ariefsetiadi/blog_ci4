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

// Route CMS Category
$routes->get('cms/category', 'CMS\Category::index', ['filter' => 'auth']);
$routes->get('cms/category/loadData', 'CMS\Category::loadData', ['filter' => 'auth']);
$routes->get('cms/category/add', 'CMS\Category::create', ['filter' => 'auth']);
$routes->post('cms/category/save', 'CMS\Category::save', ['filter' => 'auth']);
$routes->get('cms/category/edit/(:num)', 'CMS\Category::edit/$1', ['filter' => 'auth']);
$routes->post('cms/category/update/(:num)', 'CMS\Category::update/$1', ['filter' => 'auth']);
$routes->get('cms/category/delete/(:num)', 'CMS\Category::delete/$1', ['filter' => 'auth']);

// Route CMS Article
$routes->get('cms/article', 'CMS\Article::index', ['filter' => 'auth']);
$routes->get('cms/article/loadData', 'CMS\Article::loadData', ['filter' => 'auth']);
$routes->get('cms/article/add', 'CMS\Article::create', ['filter' => 'auth']);
$routes->post('cms/article/save', 'CMS\Article::save', ['filter' => 'auth']);
$routes->get('cms/article/show/(:num)', 'CMS\Article::show/$1', ['filter' => 'auth']);
$routes->get('cms/article/edit/(:num)', 'CMS\Article::edit/$1', ['filter' => 'auth']);
$routes->post('cms/article/update/(:num)', 'CMS\Article::update/$1', ['filter' => 'auth']);
$routes->get('cms/article/delete/(:num)', 'CMS\Article::delete/$1', ['filter' => 'auth']);

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
