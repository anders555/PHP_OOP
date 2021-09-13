<?php


namespace App\Controllers;


use App\Core\DB;
use App\Models\Page;
use App\Models\Product;

class CatalogController
{
    public function index(){
        $products = Product::search();
        render('catalog/index', [
            'templateProducts' => $products
        ]);
    }

    public function showProduct($id)
    {
        $product = Product::finById($id);

        if (!$product) {
            echo "404";
        } else {
            render('catalog/index', ['product' => $product]);
        }
    }

    public function addProduct()
    {
        render('catalog/add_product');
    }

    public function saveProduct()
    {
        $sql = "INSERT INTO products (`name`, `price`)
                    VALUES('{$_POST['name']}', '{$_POST['price']}')";
        print_r($sql);
        DB::getConnection()->query($sql);
        //TODO save
    }
}