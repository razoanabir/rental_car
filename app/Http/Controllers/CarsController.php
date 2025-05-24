<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Home;
use Illuminate\Http\Request;

class CarsController extends Controller
{
//---------------------------method-for-image-upload//update//delete-------------------------
    protected function updateImage(Request $request, Cars $data, $image)
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
            $data = Cars::get();
            $dashboard_data = Home::first();
            return view('admin.our_cars.view', compact('dashboard_data','data'));
        }
//----------------------------------add-data-----------------------------------------
    public function add()
        {
            $dashboard_data = Home::first();
            return view('admin.our_cars.add', compact('dashboard_data'));
        }
//----------------------------------edit-data-----------------------------------------
    public function edit($id)
        {
            $dashboard_data = Home::first();
            $data = Cars::findOrFail($id);
            return view('admin.our_cars.edit', compact('dashboard_data','data'));
        }
//----------------------------------store-data----------------------------------------
    public function store(Request $request)
        {
            //validation-field-to-save-date
            $request->validate(
                [
                'vehicle_model_name'=> 'required|string',
                'price'             => 'required|string',                
                'seating_capacity'  => 'required|string',
                'transmission'      => 'required|string',
                'fuel_type'         => 'required|string',
                'year_of_release'   => 'required|string',
                'gearbox'           => 'required|string',
                'mileage'           => 'required|string',
                'image'             => 'required|image|mimes:jpg,png,jpeg,gif,bmp,svg,webp',
            ]);
            
            //importing-new-data
            $data = new Cars();
            $data->fill($request->only([
                'vehicle_model_name',
                'price',
                'seating_capacity',
                'transmission',
                'fuel_type',
                'year_of_release',
                'gearbox',
                'mileage',
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
                    'vehicle_model_name'=> 'required|string',
                    'price'             => 'required|string',                
                    'seating_capacity'  => 'required|string',
                    'transmission'      => 'required|string',
                    'fuel_type'         => 'required|string',
                    'year_of_release'   => 'required|string',
                    'gearbox'           => 'required|string',
                    'mileage'           => 'required|string',
                ]
            );
            
            //updating-existing-data 
            $CarsData = Cars::findOrFail($id);
            $data = $CarsData;
            $data->fill($request->only([
                'vehicle_model_name',
                'price',
                'seating_capacity',
                'transmission',
                'fuel_type',
                'year_of_release',
                'gearbox',
                'mileage',
            ]));
            $this->updateImage($request, $data, 'image');
            
            $data->save();

            return back()->with('msg', "Data has been updated successfully");
        }
//------------------------------------------delete-data------------------------------------------------------
public function delete($id)
    {
        $data = Cars::findOrFail($id);
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