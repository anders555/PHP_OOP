<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        Product::create([
            'name'=> 'new product',
            'description'=> 'new product desc',
            'price'=>100,
        ]);
        Lead::create([
            'name'=> 'new name',
            'query'=> 'new  query',
            'tel'=>'23146237462',
            'processed'=>'false',
        ]);
        return view('home.main');

    }
    public function aboutUs(){
        return view('home.about');
    }
}
