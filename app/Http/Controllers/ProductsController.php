<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $product;
    public function __construct(Products $product) {
        $this->product = $product;
    }

    public function index (Request $request) {

        $search = $request->search;
        $findProducts = $this->product->getSearchProductsIndex(search: $search ?? '');
        
        return view('pages.products.pagination', compact('findProducts'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $getRegister = Products::find($id);
        $getRegister->delete();
        return response()->json(['success' => true]);
    }
}
