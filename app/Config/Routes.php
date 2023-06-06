<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Login routes
$routes->get('login', 'Login::index', ['as' => 'login']);
$routes->post('login/authenticate', 'Login::authenticate');

// Other routes
$routes->get('/', 'Login::index');
$routes->get('welcome_message', 'Home::index', ['as' => 'welcome_message']);
$routes->get('pages', 'Pages::index', ['as' => 'pages']);
$routes->get('schedule', 'Schedule::index', ['as' => 'schedule']);
$routes->post('pages/deleteProject', 'Pages::deleteProject');
$routes->get('pages/edit/(:num)', 'Pages::editProject/$1', ['as' => 'edit_project']);
$routes->get('pages/edit/(:num)', 'Pages::editProject/$1');
$routes->post('pages/updateProject', 'Pages::updateProject');
$routes->post('pages/add', 'Pages::add');



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
