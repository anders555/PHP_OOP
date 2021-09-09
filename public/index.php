<?php
include_once __DIR__."/../vendor/autoload.php";
include_once __DIR__."/../app/functions.php";

$routes = [
    '/catalog/(\d+)' => [\App\Controllers\CatalogController::class, 'showProduct'],
    '/catalog' =>[\App\Controllers\CatalogController::class, 'index'],
    '/contacts' => [\App\Controllers\HomeController::class, 'contacts'],
    '/' => [\App\Controllers\HomeController::class, 'index'],
];


$url = (explode('?', $_SERVER['REQUEST_URI']))[0];

foreach ($routes as $route => $item){
    $route = str_replace('/', '\/', $route);
    preg_match('/^'.$route.'$/', $url, $matches);
    if (!empty($matches)){
        $controller = new $item[0];
        $controller->{$item[1]}();
        break;
    }
}


if(empty($matches)){
    echo "Error 404";
}
?>