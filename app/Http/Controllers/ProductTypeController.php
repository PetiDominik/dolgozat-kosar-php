<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    public function index(){
        $types = response()->json(ProductType::all());
        return $types;
    }

    public function show($id){
        $type = response()->json(ProductType::find($id));
        return $type;
    }

    public function store(Request $request){
        $type = new ProductType();
        $type->name = $request->name;
        $type->description = $request->description;
        $type->cost = $request->cost;
        
        $type->save();
    }

    public function update(Request $request, $id){
        $type = ProductType::find($id);
        $type->name = $request->name;
        $type->description = $request->description;
        $type->cost = $request->cost;

        $type->save();
    }

    public function destroy($id){
        ProductType::find($id)->delete();
    }

    //Az adott termék típus (paraméter az elsődleges kulcs)-hoz tartozó összes termék adatait jelenítsd meg (fg+with)!
    public function productsByType($typeId) {
        return DB::select("SELECT *
                            FROM product_types pt
                                INNER JOIN products p ON pt.type_id=p.type_id
                            WHERE pt.type_id = $typeId");
    }
}
