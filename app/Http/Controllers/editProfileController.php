<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class editProfileController extends Controller
{
//---------------------------method-for-image-upload//update//delete-------------------------
    protected function updateImage(Request $request, Admin $data, $image)
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
//------------------------------------------view-data--------------------------------------------------------
    public function settings()
    {
        $dashboard_data = Home::first();
        return view('admin.profile.view',compact('dashboard_data'));
    }
//-------------------------------------------update-data--------------------------------------------------------
    public function update_info(Request $request, $id)
    {
        $adminData = Admin::findOrFail($id);
        $request->validate(
            [
                'name' => 'required',
                'email'   => 'required',
            ]
        );

        $data = $adminData;
        $data->name= $request->name;
        $data->email= $request->email;
        $this->updateImage($request, $data, 'image');

        $data->save();

        return back()->with('msg', "Your data has been updated successfully");
    }
//------------------------------------------------update-password-----------------------------------
    public function update_password(Request $request, $id)
    {
        $adminData = Admin::findOrFail($id);
        $data = $adminData;
        if(Hash::check($request->current_password, $data->password) && $request->new_password == $request->confirm_password)
        {
            $pass = Hash::make($request->new_password);
            $data->password = $pass;
            $data->save();
            return back()->with('msg', "Password has been updated successfully");

        }
        return back()->with('msg', "Password did not match please try again");
    }
//------------------------------------------------delete-account----------------------------------------------
    public function deleteAdminData(Request $request, $id)
    {
        $adminData = Admin::findOrFail($id);
        $data = $adminData;
        if(Hash::check($request->password, $data->password))
        {
            $data->delete();
            return Redirect::to('/');
        }
        return back()->with('msg', "Password did not match please try again");
    }
}
