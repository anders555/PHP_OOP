<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request){
//        $category = Category::query()->find($category);
//        //можно убрать query, он тут для подсвечивания следующего метода
//        if(!$category){
//            abort(404);
//        }
//        dd($request->input('id', '2'));
    return view('catalog.catalog');
    }

    public function category(Request $request,Category $category){
        $categories = Category::all();
        $products = Product::query()->paginate(9);
        return view('catalog.catalog',
            compact('category', 'categories', 'products')
        );
    }

    public function product(Request $request,Category $category, $product){
        return view('catalog.product');
        $products = Product::all();
    }
}
