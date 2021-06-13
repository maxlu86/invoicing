<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return response()->json($client);
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
            'company_type' => 'required|max:255',
            'name' => 'required|max:255',
            'vat_number' => 'required|max:255',
            'street_1' => 'required|max:255',
            'zip_code' => 'required|max:20',
            'city' => 'required|max:255',
          
        ]);
        
        $client = new Client;
        $client->company_type = $request->company_type;
        $client->name = $request->name;
        $client->id_number = $request->id_number;
        $client->display_name = $request->display_name;
        $client->vat_number = $request->vat_number;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->street_1 = $request->street_1;
        $client->street_2 = $request->street_2;
        $client->zip_code = $request->zip_code;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->country = $request->country;
        $client->internal_notes = $request->internal_notes;
        $client->web_page = $request->web_page;
        $client->payment_method = $request->payment_method;
        $client->sales_account = $request->sales_account;
        $client->purchase_account = $request->purchase_account;
        $client->reference = $request->reference;
        $client->due_date = $request->due_date;
        $client->discount = $request->discount;
        $client->payment_day = $request->payment_day;
        $client->sales_tax = $request->sales_tax;
        $client->purchase_tax = $request->purchase_tax;
        $client->save();
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = DB::table('clients')->where('id', $id)->first();
        return response()->json($client);
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
        $data['company_type'] = $request->company_type;
        $data['name'] = $request->name;
        $data['id_number'] = $request->id_number;
        $data['display_name'] = $request->display_name;
        $data['vat_number'] = $request->vat_number;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['street_1'] = $request->street_1;
        $data['street_2'] = $request->street_2;
        $data['zip_code'] = $request->zip_code;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['country'] = $request->country;
        $data['internal_notes'] = $request->internal_notes;
        $data['web_page'] = $request->web_page;
        $data['payment_method'] = $request->payment_method;
        $data['sales_account'] = $request->sales_account;
        $data['purchase_account'] = $request->purchase_account;
        $data['reference'] = $request->reference;
        $data['due_date'] = $request->due_date;
        $data['discount'] = $request->discount;
        $data['payment_day'] = $request->payment_day;
        $data['sales_tax'] = $request->sales_tax;
        $data['purchase_tax'] = $request->purchase_tax;
        $client = DB::table('clients')->where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = DB::table('clients')->where('id', $id)->first();
        DB::table('clients')->where('id', $id)->delete();
    }
}
