<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Basket::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Basket::insert([
            'product_id' => $request->product_id,
            'number' => $request->number,
            'count' => $request->count,
            'datetime' => $request->datetime,
            'buyer' => $request->buyer,
            'done' => $request->done
            
        ]);

        //return Basket::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Basket::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $basket = Basket::find($id);
        $basket->update($request->all());
        return $basket;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Basket::destroy($id);
    }
}
