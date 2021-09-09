<?php


namespace App\Controllers;


class HomeController
{
    public function index(){
       render('home/index', [
           'name' => 'Andrew'
       ]);
    }
    public function contacts(){
        echo 'contacts';
    }
}