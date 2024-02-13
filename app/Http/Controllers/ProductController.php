<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return response()->json(Product::all());
    }

    public function show($id){
        return response()->json(Product::find($id));
    }

    public function store(Request $request){
        $item = new Product();
        $item->type_id = $request->type_id;
        $item->date = $request->date;
                
        $item->save();
    }

    public function update(Request $request, $id){
        $item = Product::find($id);
        $item->type_id = $request->type_id;
        $item->date = $request->date;

        $item->save();
    }

    public function destroy($id){
        Product::find($id)->delete();
    }
}
