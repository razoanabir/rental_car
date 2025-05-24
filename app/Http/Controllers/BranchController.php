<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Home;
use Illuminate\Http\Request;

class BranchController extends Controller
{
//----------------------------------view-data----------------------------------------
    public function view()
    {
        $data = Branch::get();
        $dashboard_data = Home::first();
        return view('admin.branch.view', compact('dashboard_data','data'));
    }
    //----------------------------------add-data-----------------------------------------
    public function add()
    {
        $dashboard_data = Home::first();
        return view('admin.branch.add', compact('dashboard_data',));
    }
    //----------------------------------edit-data-----------------------------------------
    public function edit($id)
    {
        $data = Branch::findOrFail($id);
        $dashboard_data = Home::first();

        return view('admin.branch.edit', compact('dashboard_data','data'));
    }
//----------------------------------store-data----------------------------------------
    public function store(Request $request)
    {
        //validation-field-to-save-date
        $request->validate(
            [
            'location'       => 'required|string',
            'contact_number' => 'required|string',
        ]);
        
        //importing-new-data
        $data = new Branch();
        $data->fill($request->only([
            'location',
            'contact_number',
        ]));
        $data->save();

        return back()->with('msg', 'Data has been added successfully');
    }
//----------------------------------------update-data-------------------------------------
    public function update(Request $request, $id)
    {
        //validation-field-to-update-date
        $request->validate(
            [
                'location'       => 'required|string',
                'contact_number' => 'required|string',
            ]
        );
        
        //updating-existing-data 
        $branchData = Branch::findOrFail($id);
        $data = $branchData;
        $data->fill($request->only([
            'location',
            'contact_number',
        ]));        
        $data->save();

        return back()->with('msg', "Data has been updated successfully");
    }
//------------------------------------------delete-data------------------------------------------------------
    public function delete($id)
    {
        $data = Branch::findOrFail($id);
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
