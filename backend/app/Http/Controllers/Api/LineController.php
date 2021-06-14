<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Line;
use DB;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $line = DB::table('lines')
                    ->join('products', 'lines.product_id', '=', 'products.id')
                    ->select(
                        'products.name AS product_name', 
                        'products.description AS product_description',
                        'products.unit_price AS product_price',
                        'products.sales_tax AS product_tax',
                        'lines.*')
                    ->orderBy('lines.position', 'ASC')
                    ->get();
        return response()->json($line);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $line = new line;
        $line->position = $request->position;
        $line->description = $request->description;
        $line->product_id = $request->product_id;
        $line->quantity = $request->quantity;
        $line->price = $request->price;
        $line->tax = $request->tax;
        $line->total = $request->total;
        
        $line->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $line = DB::table('lines')->where('id', $id)->first();
        return response()->json($line);
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
        $data['position'] = $request->position;
        $data['description'] = $request->description;
        $data['product_id'] = $request->product_id;
        $data['quantity'] = $request->quantity;
        $data['price'] = $request->price;
        $data['tax'] = $request->tax;
        $data['total'] = $request->total;
        $line = DB::table('lines')->where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $line = DB::table('lines')->where('id', $id)->first();
        DB::table('lines')->where('id', $id)->delete();
    }
}