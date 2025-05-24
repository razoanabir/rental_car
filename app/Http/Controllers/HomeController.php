<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//---------------------------method-for-image-upload//update//delete-------------------------
    protected function updateImage(Request $request, Home $data, $image)
    {

        if ($request->hasFile($image)) {
            // Delete the existing file if it exists
            $existingFilePath = $data->{$image};

            if ($existingFilePath && file_exists(public_path($existingFilePath))) {
                unlink(public_path($existingFilePath));
            }

            // Get the uploaded file
            $file = $request->file($image);
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Move the file to the public/option directory
            $file->move(public_path('uploads'), $fileName);

            // Update the image path in the database
            $data->{$image} = 'uploads/' . $fileName;
        }
    }

//-----------------------------------------------view-data---------------------------------------
    public function view()
    {
        $dashboard_data = Home::first();
        $data = Home::first();
        
        return view('admin.home.view',compact('dashboard_data','data'));
    }
//----------------------------------store-data----------------------------------------
    public function store(Request $request)
    {
        //validation-field-to-save-date
        $request->validate(
            [
                'title'     => 'required|string',
                'details'   => 'required|string',
                'site_title'=> 'required|string',

        ]);
        
        //importing-new-data
        $data = Home::first();
        $data->fill($request->only([
            'title',
            'details',
            'site_title',
        ]));
        $this->updateImage($request, $data, 'image');
        $this->updateImage($request, $data, 'site_icon');
        $this->updateImage($request, $data, 'logo');

        $data->save();

        return back()->with('msg', 'Data has been updated successfully');
    }
}
