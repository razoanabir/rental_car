<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{
    //-----------------------------------------------view-data---------------------------------------
    public function view()
    {
        $dashboard_data = Home::first();
        $data = PersonalInformation::first();
        return view('admin.personalInformation.view',compact('dashboard_data','data'));
    }
//----------------------------------store-data----------------------------------------
    public function store(Request $request)
        {
            //validation-field-to-save-date
            $request->validate(
                [
                'main_address'   => 'required|string',
                'mail_id'        => 'required|string',                
                'website_link'   => 'required|string',
                'facebook_link'  => 'required|string',
                'twitter_link'   => 'required|string',
                'instagram_link' => 'required|string',
                'linked_in_link' => 'required|string',
                'google_map'     => 'required|string',
                'contact_number' => 'required|string',
                
            ]);
            
            //importing-new-data
            $data = PersonalInformation::first();
            $data->fill($request->only([
                'main_address',
                'mail_id',
                'website_link',
                'facebook_link',
                'twitter_link',
                'instagram_link',
                'linked_in_link',
                'google_map',
                'contact_number',
            ]));
            $data->save();

            return back()->with('msg', 'Data has been updated successfully');
        }
}
