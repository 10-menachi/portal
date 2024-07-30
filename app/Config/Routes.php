<?php

use App\Controllers\Admin\Dashboard;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [\App\Controllers\Login::class,'getIndex']);

$routes->get('/login', [\App\Controllers\Login::class,'getIndex']);
$routes->post('/login/auth', [\App\Controllers\Login::class,'postAuth']);
$routes->get('/logout', [\App\Controllers\Login::class,'getLogout']);

$routes->get('/excel', [\App\Controllers\Home::class,'excel']);

$routes->get('/admin', [App\Controllers\Admin\Dashboard::class,'getIndex'],['filter' => 'admin-auth']);
