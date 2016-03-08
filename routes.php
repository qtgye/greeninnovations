<?php

//create alias for Router
use \core\router,
    \helpers\url;

//define routes
// Router::any('', '\controllers\welcome@index');
// Router::any('/subpage', '\controllers\welcome@subpage');


// Front End

Router::get('/','\controllers\PagesController@home');
Router::get('about','\controllers\PagesController@about');
Router::get('services','\controllers\PagesController@services');
Router::get('technologies','\controllers\PagesController@technologies');
Router::get('projects','\controllers\PagesController@projects');
Router::get('news','\controllers\PagesController@news');


 // Authentication routes...
Router::get('login', '\controllers\AuthController@getLogin');
// Router::post('login', '\controllers\AuthController@postLogin');
Router::post('login', function ()
{
    echo '<pre style="display: table; font-size: 10px">';
        var_dump('TEST');
    echo '</pre>';
    echo '<pre style="display: table; font-size: 10px">';
        var_dump($_POST);
    echo '</pre>';
});
Router::get('logout', '\controllers\AuthController@getLogout');


// admin routes

// specific routes
Router::get('/admin/info','\controllers\AdminPagesController@info');

// common routes
Router::get('/admin','\controllers\AdminPagesController@index');
Router::get('/admin/(:any)','\controllers\AdminPagesController@all');
Router::get('/admin/(:any)/new','\controllers\AdminPagesController@create');
Router::get('/admin/(:any)/(:num)','\controllers\AdminPagesController@edit');

Router::post('/admin/(:any)/(:num)','\controllers\AdminPagesController@update');

// store
Router::post('/admin/media','\controllers\MediaController@store');    
Router::post('/admin/product','\controllers\ProductsController@store');
Router::post('/admin/partner','\controllers\PartnersController@store');
Router::post('/admin/faq','\controllers\FAQsController@store');
Router::post('/admin/news','\controllers\NewsController@store');
Router::post('/admin/project','\controllers\ProjectsController@store');
Router::post('/admin/info','\controllers\InfosController@update');

// ajax
Router::get('/api/get_upload_limit', '\controllers\AdminPagesController@get_upload_limit');
Router::any('/api/media', '\controllers\MediaController@ajax');
Router::any('/api/info', '\controllers\InfosController@ajax');
Router::any('/api/(:any)', '\controllers\AdminPagesController@ajax');
// Router::any('/api/partner', '\controllers\PartnersController@ajax');
// Router::any('/api/faq', '\controllers\FAQsController@ajax');
// Router::any('/api/news', '\controllers\NewsController@ajax');
// Router::any('/api/project', '\controllers\ProjectsController@ajax');
// Router::any('/api/info', '\controllers\InfosController@ajax');
//if no route found
Router::error('\core\error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();


?>