<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();

         
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required'
        ]);
        //return Product::create($request->all());

        $data = Product::insert([
            'group_id' => $request->group_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price
            
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       return Product::destroy($id);
    }

    /**
     * Search for a name
     * @param str $name
     * @return \Illuminate\Http\Response
     */
    
    public function search($name)
    {
       return Product::where('name','like','%'.$name.'%')->get();
    }


    public function priceGreaterThan10(){

        $product = DB::table('product')
       
       -> where ('price' ,'>=','10')
       ->get();

    }
    public function countProducts(Request $request)
    {
        $data = DB::table('baskets')
            ->join('products', 'baskets.product_id', '=', 'products.id')
            ->join('grupas', 'products.group_id', '=', 'grupas.id')
            ->where('baskets.datetime', '>=', $request->date_from)
            ->where('baskets.datetime', '<=', $request->date_to)
            ->select('grupas.name', DB::raw('SUM(baskets.count) as count'))
            ->groupBy('grupas.name')
            ->get();
    
        $grid = [];
    
        foreach ($data as $row) {
            $grid[] = [
                'Grupa' => $row->name,
                'Broj' => $row->count,
            ];
        }
    
        return $grid;
    }
    
        


}







