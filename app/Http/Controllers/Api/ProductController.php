<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store)
    {
        return $store->products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
        $data = [
            'store_id' => $store->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];

        $this->product->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  Store $store
     * @param  int  $id_product
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store, $id_product)
    {
        return $store->products->where('id', $id_product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @param  Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $product->update($request->all());

        // return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}