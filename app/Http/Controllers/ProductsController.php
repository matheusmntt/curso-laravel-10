<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index () {
        $findProducts = Products::all();
        
        return view('pages.products.pagination', compact('findProducts'));
    }
}
