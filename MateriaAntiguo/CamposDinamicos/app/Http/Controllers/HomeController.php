<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCat;
use App\Product;
class HomeController extends Controller
{
   
    public function index()
    {
        return view ('home');
    }


    
}
