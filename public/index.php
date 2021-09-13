<?php
include_once __DIR__."/../vendor/autoload.php";
include_once __DIR__."/../app/functions.php";

$routes = [
    '/catalog/(?P<id>.+)' => [\App\Controllers\CatalogController::class, 'showProduct'],
    '/page/(?P<id>.+)' => [\App\Controllers\BlogController::class, 'showPage'],
    '/add_product' => [\App\Controllers\CatalogController::class, 'addProduct'],
    '/save_product' => [\App\Controllers\CatalogController::class, 'saveProduct'],
    '/add_page' => [\App\Controllers\BlogController::class, 'addPage'],
    '/save_page' => [\App\Controllers\BlogController::class, 'savePage'],
    '/catalog' =>[\App\Controllers\CatalogController::class, 'index'],
    '/contacts' => [\App\Controllers\HomeController::class, 'contacts'],
    '/' => [\App\Controllers\HomeController::class, 'index'],
];


$url = (explode('?', $_SERVER['REQUEST_URI']))[0];

//\App\Models\User::finById(1);

foreach ($routes as $route => $item){
    $route = str_replace('/', '\/', $route);
    preg_match('/^'.$route.'$/', $url, $matches);
    if (!empty($matches)){
        $args = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
        $controller = new $item[0];
        call_user_func_array([$controller, $item[1]], $args);
        break;
    }
}


if(empty($matches)){
    echo "Error 404";
}
?>