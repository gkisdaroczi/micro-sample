<?php

	defined('APP') or die();

	error_reporting(-1);

	include (APP . '/autoload.php');

    $current_url_array = $router->current_url_as_array();
    $current_lang = $current_url_array[0];

    $lang->init([
        ['lang' => 'hu'],
        ['lang' => 'en'],
        ['lang' => 'de'],
        ['lang' => 'ru'],
    ], $current_lang);

    if (!in_array($current_lang, $lang->langs(true))) {
        $router->redirect('/hu');
    }

    include (APP . '/routes.php');

    $current_url = $router->current_url();
    $current_route = $router->current_route();
    $langs = $lang->other_langs();
    $template = $current_route['template'];

    foreach ($langs as &$lang) {
        if (empty($template)) {
            $name = 'index';
        } else {
            $name = $current_route['name'];
        }

        $lang['url'] = $router->search([
            'name' => $name,
            'lang' => $lang['lang'],
        ], 'route')[0];
    }

    if (empty($template)) {
        $template = $router->search([
            'name' => '404',
            'lang' => $current_lang,
        ], 'template')[0];
    }

    if (empty($template)) {
        die();
    }

    $nav = [];
    $routes = $router->search(['lang' => $current_lang]);

    foreach ($routes as $route) {
        if (!key_exists('menu', $route)) {
            continue;
        }

        array_push($nav, [
            'url' => $route['route'],
            'menu' => $route['menu'],
            'active' => ($route['route']  == $current_route['route']) ? 'active' : '',
        ]);
    }

    View::load('tpl_common_head', [
        'title' => 'Sample app',
        'description' => '',
        'keywords' => '',
        'meta_url' => '',
        'meta_title' => '',
        'meta_description' => '',
        'meta_image' => '',
        'langs' => $langs,
        'current_lang' => $current_lang,
        'nav' => $nav,
    ]);
    View::load($template, null, 'html');
    View::load('tpl_common_foot');
