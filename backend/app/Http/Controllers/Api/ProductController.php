<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')
                    ->join('clients', 'products.client_id', '=', 'clients.id')
                    ->select('clients.name AS client_name', 'products.*')
                    ->orderBy('products.id', 'DESC')
                    ->get();
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',  
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->sales_account = $request->sales_account;
        $product->sales_tax = $request->sales_tax;
        $product->unit_price = $request->unit_price;
        $product->total = $request->total;
        $product->barcode = $request->barcode;
        $product->factory_code = $request->factory_code;
        $product->weight = $request->weight;
        $product->product_quantity = $request->product_quantity;
        $product->client_id = $request->client_id;
        $product->purchase_tax = $request->purchase_tax;
        $product->unit_cost = $request->unit_cost;
        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['sku'] = $request->sku;
        $data['description'] = $request->description;
        $data['sales_account'] = $request->sales_account;
        $data['sales_tax'] = $request->sales_tax;
        $data['unit_price'] = $request->unit_price;
        $data['total'] = $request->total;
        $data['barcode'] = $request->barcode;
        $data['factory_code'] = $request->factory_code;
        $data['weight'] = $request->weight;
        $data['product_quantity'] = $request->product_quantity;
        $data['client_id'] = $request->client_id;
        $data['purchase_tax'] = $request->purchase_tax;
        $data['unit_cost'] = $request->unit_cost;
        $product = DB::table('products')->where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        DB::table('products')->where('id', $id)->delete();
    }
}
