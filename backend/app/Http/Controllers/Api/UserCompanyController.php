<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCompany;
use Image;

class UserCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_company = UserCompany::all();
        return response()->json($user_company);
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
            'company_name' => 'required|max:255',
            'vat_number' => 'required|max:255',
            'street_1' => 'required|max:255',
            'zip_code' => 'required|max:20',
            'city' => 'required|max:255',
          
        ]);
        
        if ($request->logo) {
            $position = strpos($request->logo, ';');
            $sub = substr($request->logo, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time().".".$ext;
            $img = Image::make($request->logo)->
                resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
                });;
            $upload_path = 'backend/usercompany/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $user_company = new UserCompany;
            $user_company->company_name = $request->company_name;
            $user_company->id_number = $request->id_number;
            $user_company->display_name = $request->display_name;
            $user_company->vat_number = $request->vat_number;
            $user_company->email = $request->email;
            $user_company->phone = $request->phone;
            $user_company->street_1 = $request->street_1;
            $user_company->street_2 = $request->street_2;
            $user_company->zip_code = $request->zip_code;
            $user_company->city = $request->city;
            $user_company->state = $request->state;
            $user_company->web_page = $request->web_page;
            $user_company->logo = $image_url;
            $user_company->save();
        }
        else {
            $user_company = new UserCompany;
            $user_company->company_name = $request->company_name;
            $user_company->id_number = $request->id_number;
            $user_company->display_name = $request->display_name;
            $user_company->vat_number = $request->vat_number;
            $user_company->email = $request->email;
            $user_company->phone = $request->phone;
            $user_company->street_1 = $request->street_1;
            $user_company->street_2 = $request->street_2;
            $user_company->zip_code = $request->zip_code;
            $user_company->city = $request->city;
            $user_company->state = $request->state;
            $user_company->web_page = $request->web_page;
            $user_company->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
