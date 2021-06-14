<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::all();
        return response()->json($document);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $document = new Document;
        $document->type = $request->type;
        $document->user_company_id = $request->user_company_id;
        $document->client_id = $request->client_id;
        $document->email = $request->email;
        $document->issue_date = $request->issue_date;
        $document->expiring_date = $request->expiring_date;
        $document->serial_number = $request->serial_number;
        $document->payment_method = $request->payment_method;
        $document->note = $request->notes;
        $document->subtotal = $request->subtotal;
        $document->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = DB::table('documents')->where('id', $id)->first();
        return response()->json($document);
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
        $data['type'] = $request->type;
        $data['user_company_id'] = $request->user_company_id;
        $data['client_id'] = $request->client_id;
        $data['email'] = $request->email;
        $data['issue_date'] = $request->issue_date;
        $data['expiring_date'] = $request->expiring_date;
        $data['serial_number'] = $request->serial_number;
        $data['payment_method'] = $request->payment_method;
        $data['note'] = $request->notes;
        $data['subtotal'] = $request->subtotal;
        $document = DB::table('documents')->where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = DB::table('documents')->where('id', $id)->first();
        DB::table('documents')->where('id', $id)->delete();
    }
}