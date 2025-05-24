<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Home;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
//----------------------------------view-data----------------------------------------
    public function view()
    {
        $data = Category::get();
        $dashboard_data = Home::first();
        return view('admin.category.view', compact('dashboard_data','data'));
    }
//----------------------------------edit-data-----------------------------------------
    public function edit($id)
    {
        $data = Category::findOrFail($id);
        $dashboard_data = Home::first();
        return view('admin.category.edit', compact('dashboard_data','data'));
    }
//----------------------------------store-data----------------------------------------
    public function store(Request $request)
    {
        //validation-field-to-save-date
        $request->validate(
            [
            'category_name' => 'required|string',
        ]);
        
        //importing-new-data
        $data = new Category();        
        $data->fill($request->only([
            'category_name',
        ]));
        $data->save();

        return response()->json([
            'msg' => 'Data has saved successfully!',
        ]);
    }
//----------------------------------------update-data-------------------------------------
    public function update(Request $request, $id)
    {
        //validation-field-to-update-date
        $request->validate(
            [
                'category_name' => 'required|string',
            ]
        );
        
        //updating-existing-data 
        $categoryData = Category::findOrFail($id);
        $data = $categoryData;
        $data->fill($request->only([
            'category_name',
        ]));        
        $data->save();

        return back()->with('msg', "Data has been updated successfully");
    }
//------------------------------------------delete-data------------------------------------------------------
    public function delete($id)
    {
        $data = category::findOrFail($id);
        $data->delete();
        return back()->with('msg', "Data has been deleted successfully");
    }
}

