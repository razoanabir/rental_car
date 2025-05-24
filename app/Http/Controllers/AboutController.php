<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use Illuminate\Http\Request;

class AboutController extends Controller
{
//---------------------------method-for-image-upload//update//delete-------------------------
    protected function updateImage(Request $request, About $data, $image)
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
        $data = About::first();
        $dashboard_data = Home::first();
        return view('admin.about.view',compact('data','dashboard_data'));
    }
//----------------------------------store-data----------------------------------------
    public function store(Request $request)
        {
            //validation-field-to-save-date
            $request->validate(
                [
                'title'                 => 'required|string',
                'details_about_us'      => 'required|string',                
                'vission_title'         => 'required|string',
                'vission_details'       => 'required|string',
                'mission_title'         => 'required|string',
                'mission_details'       => 'required|string',
                'experience'            => 'required|string',
                'support_1'             => 'required|string',
                'support_2'             => 'required|string',
                'support_3'             => 'required|string',
                'support_4'             => 'required|string',
                'owner_name'            => 'required|string',
                'owner_designation'     => 'required|string',
                'total_cars'            => 'required|string',
                'happy_clients'         => 'required|string',
                'car_centers'           => 'required|string',
                'total_kilometers'      => 'required|string',
                'details_about_support' => 'required|string',


            ]);
            
            //importing-new-data
            $data = About::first();
            $data->fill($request->only([
                'title',
                'details_about_us',
                'vission_title',
                'vission_details',
                'mission_title',
                'mission_details',
                'details_about_support',
                'experience',
                'support_1',
                'support_2',
                'support_3',
                'support_4',
                'owner_name',
                'owner_designation',
                'total_cars',
                'happy_clients',
                'car_centers',
                'total_kilometers',
            ]));
            $this->updateImage($request, $data, 'image_1');
            $this->updateImage($request, $data, 'image_2');
            $this->updateImage($request, $data, 'owner_image');
            $this->updateImage($request, $data, 'mission_image');
            $this->updateImage($request, $data, 'vission_image');
            $data->save();

            return back()->with('msg', 'Data has been updated successfully');
        }
}
