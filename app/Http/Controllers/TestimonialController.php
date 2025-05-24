<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use File;

class TestimonialController extends Controller
{
//---------------------------method-for-image-upload//update//delete-------------------------
    protected function updateImage(Request $request, Testimonial $data, $image)
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
//----------------------------------view-data----------------------------------------
    public function view()
        {
            $dashboard_data = Home::first();
            $data = Testimonial::get();
            return view('admin.testimonial.view', compact('dashboard_data','data'));
        }
//----------------------------------add-data-----------------------------------------
    public function add()
        {
            $dashboard_data = Home::first();
            return view('admin.testimonial.add',compact('dashboard_data'));
        }
//----------------------------------edit-data-----------------------------------------
    public function edit($id)
        {
            $dashboard_data = Home::first();
            $data = Testimonial::findOrFail($id);
            return view('admin.testimonial.edit', compact('dashboard_data','data'));
        }
//----------------------------------store-data----------------------------------------
    public function store(Request $request)
        {
            //validation-field-to-save-date
            $request->validate(
                [
                'name'       => 'required|string',
                'profession' => 'required|string',
                'star'       => 'required|string',
                'review'     => 'required|string',
                'image'      => 'required|image|mimes:jpg,png,jpeg,gif,bmp,svg,webp',
            ]);
            
            //importing-new-data
            $data = new Testimonial();
            $data->fill($request->only([
                'name',
                'profession',
                'star',
                'review',    
            ]));
            $this->updateImage($request, $data, 'image');
            $data->save();

            return back()->with('msg', 'Data has been added successfully');
        }
//----------------------------------------update-data-------------------------------------
    public function update(Request $request, $id)
    {
        //validation-field-to-update-date
        $request->validate(
            [
                'name'       => 'required|string',
                'profession' => 'required|string',
                'star'       => 'required|string',
                'review'     => 'required|string',
            ]
        );

        //updating-existing-data 
        $testimonialData = Testimonial::findOrFail($id);
        $data = $testimonialData;
        $data->fill($request->only([
            'name',
            'profession',
            'star',
            'review',    
        ]));
        $this->updateImage($request, $data, 'image');
        $data->save();

        return back()->with('msg', "Data has been updated successfully");
    }
//------------------------------------------delete-data------------------------------------------------------
    public function delete($id)
    {
        $data = Testimonial::findOrFail($id);
        // Get the existing image path
        $imagePath = $data->image;
        // Check if the image file exists
        if ($imagePath && file_exists(public_path($imagePath))) {
        // Delete the image file
            unlink(public_path($imagePath));
        }
        // Delete the record from the database
        $data->delete();
        return back()->with('msg', "Data has been deleted successfully");
    }
}


