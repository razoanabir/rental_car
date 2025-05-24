<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cars;
use App\Models\ExtraFacility;
use App\Models\Home;
use App\Models\PersonalInformation;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
//========================================multistep-reservation============================================
    public function reservation(Request $request)
    {
        $validated = $request->validate([
            'pick_up_location' => 'required|string|max:255',
            'drop_off_location'=> 'required|string|max:255',
            'pick_up_date'     => 'required|date',
            'pick_up_time'     => 'required|string',
            'drop_off_date'    => 'required|date',
            'drop_off_time'    => 'required|string',
        ]);
        $home = Home::first();
        $about= About::first();
        $personalInformation = PersonalInformation::first();
        $cars = Cars::get();
        $facility = ExtraFacility::get();
        return view('rental_car.partials.reservation.reservation',['itinerary' => $validated],compact(
            'personalInformation',
            'about',
            'home',
            'cars',
            'facility',

        ));
    }

//==========================================saving-reservation-data==========================================
    public function store_reservation(Request $request)
    {
        $data = new Reservation();
        $request->validate([
    
            'pick_up_location' => 'required|string',
            'drop_off_location'=> 'required|string',
            'pick_up_time'     => 'required|string',
            'drop_off_time'    => 'required|string',
            'pick_up_date'     => 'required|string',
            'drop_off_date'    => 'required|string',            
            'car_id'           => 'required|string',
            'email'            => 'required|string',
            'name'             => 'required|string',
            'age'              => 'required|string',
            'phone_number'     => 'required|string',
        ]);

        $data->fill($request->only([
            'pick_up_location',
            'drop_off_location',
            'pick_up_time',
            'drop_off_time',
            'pick_up_date',
            'drop_off_date',
            'car_id',
            'extra_facility_id',
            'name',
            'age',
            'phone_number',
            'email',
        ]));
        $data->reservation_status = 'pending';
        $data->save();
        return redirect()->route('rental_car')->with('msg',' Your Request Has Been Sent Successfully, You Will Be Notify Soon.');
    }
//-------------------------------------------view-details-------------------------------------------
    public function reservation_details($id)
    {
        $dashboard_data = Home::first();
        $data = Reservation::findOrFail($id);

        return view('admin.reservation_details', compact('data','dashboard_data'));
    }
//-------------------------------------------update-reservation-status-------------------------------------------
    public function reservation_status(Request $request, $id)
    {
    
        //updating-existing-data 
        $updateStatus = Reservation::findOrFail($id);
        $data = $updateStatus;
        $data->reservation_status = $request->reservation_status;
      
        $data->save();

        return redirect()->route('admin.dashboard')->with('msg', "Data has been updated successfully");
    }
//------------------------------------------delete-data------------------------------------------------------
    public function delete($id)
    {
        $data = Reservation::findOrFail($id);
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
