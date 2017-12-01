<?php

    defined('APP') or die();

    $router->add_route([
        'route' =>'/hu',
        'lang' => 'hu',
        'menu' => 'Kezdőoldal',
        'name' => 'index',
        'template' => 'hu/index'
    ]);
    $router->add_route([
        'route' =>'/hu/rolunk',
        'lang' => 'hu',
        'menu' => 'Rólunk',
        'name' => 'about',
        'template' => 'hu/about'
    ]);
    $router->add_route([
        'route' =>'/hu/szolgaltatasok',
        'lang' => 'hu',
        'menu' => 'Szolgáltatások',
        'name' => 'services',
        'template' => 'hu/services'
    ]);
    $router->add_route([
        'route' =>'/hu/404',
        'lang' => 'hu',
        'name' => '404',
        'template' => 'hu/404'
    ]);

    $router->add_route([
        'route' =>'/en',
        'lang' => 'en',
        'menu' => 'Home',
        'name' => 'index',
        'template' => 'en/index'
    ]);
    $router->add_route([
        'route' =>'/en/about',
        'lang' => 'en',
        'menu' => 'About',
        'name' => 'about',
        'template' => 'en/about'
    ]);
    $router->add_route([
        'route' =>'/en/services',
        'lang' => 'en',
        'menu' => 'Services',
        'name' => 'services',
        'template' => 'hu/services'
    ]);
    $router->add_route([
        'route' =>'/en/404',
        'lang' => 'en',
        'name' => '404',
        'template' => 'en/404'
    ]);

    $router->add_route([
        'route' =>'/de',
        'lang' => 'de',
        'menu' => 'Home',
        'name' => 'index',
        'template' => 'de/index'
    ]);
    $router->add_route([
        'route' =>'/de/about',
        'lang' => 'de',
        'menu' => 'About',
        'name' => 'about',
        'template' => 'de/about'
    ]);
    $router->add_route([
        'route' =>'/de/services',
        'lang' => 'de',
        'menu' => 'Services',
        'name' => 'services',
        'template' => 'de/services'
    ]);
    $router->add_route([
        'route' =>'/de/404',
        'lang' => 'de',
        'name' => '404',
        'template' => 'de/404'
    ]);

    $router->add_route([
        'route' =>'/ru',
        'lang' => 'ru',
        'menu' => 'Home',
        'name' => 'index',
        'template' => 'ru/index'
    ]);
    $router->add_route([
        'route' =>'/ru/about',
        'lang' => 'ru',
        'menu' => 'About',
        'name' => 'about',
        'template' => 'ru/about'
    ]);
    $router->add_route([
        'route' =>'/ru/services',
        'lang' => 'ru',
        'menu' => 'Services',
        'name' => 'services',
        'template' => 'ru/services'
    ]);
    $router->add_route([
        'route' =>'/ru/404',
        'lang' => 'ru',
        'name' => '404',
        'template' => 'ru/404'
    ]);
