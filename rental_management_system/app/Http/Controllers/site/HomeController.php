<?php

namespace App\Http\Controllers\site;

use App\Booking;
use App\Driver;
use App\Feedback;
use App\Http\Controllers\Controller;
use App\User;
use App\Vehicle;
use App\Vehicledriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->type == 'admin') {
                return redirect('/admin');
            }
            if (Auth::user()->type == 'driver') {
                return redirect('/driver');
            }
        }

        //counters
        $counter1 = Vehicle::count();
        $counter2 = User::where('type', 'client')->count();
        $counter3 = Booking::count();

        //recently added vehicles  
        $vehicles = Vehicle::orderBy('id', 'desc')->take(5)->get();
        return view('site.home', compact(
            'counter1',
            'counter2',
            'counter3',
            'vehicles'
        ));
    }
    public function vehiclePage()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->get();
        return view('site.vehicle', compact(
            'vehicles'
        ));
    }

    public function contactPage()
    {
        return view('site.contact');
    }
    public function faqPage()
    {
        return view('site.faq');
    }
 
    public function aboutPage()
    {
        return view('site.about');
    }
    public function singelvehicle($vehicle_id)
    {

        $vehicle = Vehicle::find($vehicle_id);
        if ($vehicle) {

            $drivers =   array();
            foreach (Vehicledriver::where('vehicle_id', $vehicle->id)->get() as $vd) {


                $driver = Driver::find($vd->driver_id);
                if ($driver) {

                    array_push($drivers, $driver);
                } else {
                    $vd->delete();
                }
            }



            return view('site.single-vehicle', compact(
                'vehicle',
                'drivers'
            ));
        }
        return redirect('/');
    }

    /**BOOKING */
    public function bookingPage()
    {
        $bookings = array();

        foreach (Booking::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->get() as $booking) {

            $vehicle = Vehicle::find($booking->vehicle_id); 
            $driver = Driver::find($booking->driver_id);
            $user = User::find($booking->user_id);
            if ($vehicle && $driver && $user) {

                array_push($bookings, array(
                    'booking_id' => $booking->id,
                    'user_id' => $booking->user_id,
                    'vehicle_id' => $booking->vehicle_id,
                    'driver_id' => $booking->driver_id,
                    'name' => $booking->name,
                    'phone' => $booking->phone,
                    'travel_date_from' => $booking->travel_date_from,
                    'travel_date_to' => $booking->travel_date_to,
                    'note' => $booking->note,
                    'payement_completed' => $booking->payement_completed,

                    'vehicle_data' => $vehicle,
                    'driver_data' => $driver,
                ));
            }else{
                $booking->delete();
            }
        } 
        return view('site.booking', compact(
            'bookings'
        ));
    }
    //choose vehicle
    public function bookingPageOne()
    {
        $vehicles = Vehicle::where('status', 'Available')->get();


        return view('site.booking-one', compact(
            'vehicles'
        ));
    }
    //choose driver
    public function bookingPageTwo($vehicle_id)
    {
        $vehicle  = Vehicle::find($vehicle_id);
        if ($vehicle) {

            $drivers = array();

            foreach (Vehicledriver::where('vehicle_id', $vehicle->id)->get() as $vd) {

                $driver = Driver::where('id', $vd->driver_id)->where('status', 'Available')->first();
                if ($vehicle) {
                    array_push($drivers, $driver);
                }
            }

            // return $drivers;
            return view('site.booking-two', compact(
                'vehicle',
                'drivers'
            ));
        }

        return redirect('/');
    }
    public function bookingContactPage($vehicle_id, $driver_id)
    {
        $vehicle  = Vehicle::find($vehicle_id);
        if ($vehicle) {
            $driver  = Driver::find($driver_id);
            if ($driver) {


                // return $drivers;
                return view('site.booking-contact', compact(
                    'vehicle',
                    'driver'
                ));
            }
        }

        return redirect('/');
    }
    public function bookingAdd(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'travel_date_from' => 'required',
            'travel_date_to' => 'required',
        ]);


        $vehicle  = Vehicle::find($request->vehicle_id);
        if ($vehicle) {
            $driver  = Driver::find($request->driver_id);
            if ($driver) {

                $booking = new Booking();
                $booking->user_id = Auth::user()->id;
                $booking->vehicle_id = $request->vehicle_id;
                $booking->driver_id = $request->driver_id;
                $booking->name = $request->name;
                $booking->phone = $request->phone;
                $booking->travel_date_from = $request->travel_date_from;
                $booking->travel_date_to = $request->travel_date_to;
                $booking->note = '-';
                $booking->payement_completed = false;
                $booking->save();

                //change status 
                $driver->status = 'Unavailable';
                $vehicle->status = 'Unavailable';
                $driver->save();
                $vehicle->save();
                return redirect('/booking');
            }
        }

        return redirect('/');
    }


    public function feedbackPage()
    {
        $feedbacks = Feedback::all();
        return view('site.feedback',compact(
            'feedbacks'
        ));
    }
    public function feedbackAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]); 

        $feedback = Feedback::where('user_id',Auth::user()->id)->first();
        if(!$feedback){ 
            $feedback = new Feedback(); 
            $feedback->user_id = Auth::user()->id;
        }
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->save();

        return redirect('/feedbacks');
    }
}
