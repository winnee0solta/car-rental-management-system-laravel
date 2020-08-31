<?php

namespace App\Http\Controllers\hq;

use App\Booking;
use App\Driver;
use App\Http\Controllers\Controller;
use App\User;
use App\Vehicle;
use App\Vehicledriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //index
    public function index()
    {
        return redirect('/admin/vehicle');
        // return view('admin.home');
    }
    public function vehicleIndex()
    {
        $vehicle = Vehicle::get();

        return view('admin.vehicle.index', compact(
            'vehicle'
        ));
    }

    public function vehicleAdd(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'no_plate' => 'required',
            'no_of_seats' => 'required',
            'condition' => 'required',
            'ac_status' => 'required',
            'owner_name' => 'required',
            'hiring_cost' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $unique_id = uniqid();
            $filename =  $unique_id . '_vehicle.' . $file->getClientOriginalExtension();
            $file->move('images/vehicles', $filename);


            $vehicle = new Vehicle();
            $vehicle->image =  $filename;
            $vehicle->name =  $request->name;
            $vehicle->type =  $request->type;
            $vehicle->no_plate =  $request->no_plate;
            $vehicle->no_of_seats =  $request->no_of_seats;
            $vehicle->condition =  $request->condition;
            $vehicle->ac_status =  $request->ac_status;
            $vehicle->owner_name =  $request->owner_name;
            $vehicle->hiring_cost =  $request->hiring_cost;
            $vehicle->status =  $request->status;

            $vehicle->save();
        }




        return redirect('/admin/vehicle');
    }

    public function vehicleView($vehicle_id)
    {

        $vehicle =  Vehicle::find($vehicle_id);
        if ($vehicle) {

            // $driver

            // $drivers = DB::table('vehicledrivers')
            //     ->join('drivers', 'vehicledrivers.driver_id', '=', 'drivers.id')
            //     ->join('vehicles', 'vehicledrivers.vehicle_id', '=', 'vehicles.id')
            //     ->select('drivers.*')
            //     ->get();
            $drivers =   array();
            foreach (Vehicledriver::where('vehicle_id', $vehicle->id)->get() as $vd) {


                $driver = Driver::find($vd->driver_id);
                if ($driver) {

                    array_push($drivers, $driver);
                } else {
                    $vd->delete();
                }
            }


            $alldrivers = array();
            foreach (Driver::where('status', 'Available')->get() as $driver) {

                //check if already added 
                if (Vehicledriver::where('vehicle_id', $vehicle->id)->where('driver_id', $driver->id)->count() == 0) {

                    array_push($alldrivers, $driver);
                }
            }
            // return $drivers;
            return view('admin.vehicle.view', compact(
                'vehicle',
                'drivers',
                'alldrivers'
            ));
        }


        return redirect('/admin/vehicle');
    }
    public function vehicleDelete($vehicle_id)
    {

        $vehicle =  Vehicle::find($vehicle_id);
        if ($vehicle) {

            $vehicle->delete();
        }


        return redirect('/admin/vehicle');
    }
    public function vehicleEdit($vehicle_id, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'no_plate' => 'required',
            'no_of_seats' => 'required',
            'condition' => 'required',
            'ac_status' => 'required',
            'owner_name' => 'required',
            'hiring_cost' => 'required',
            'status' => 'required',
        ]);


        $vehicle =  Vehicle::find($vehicle_id);
        if ($vehicle) {

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $unique_id = uniqid();
                $filename =  $unique_id . '_vehicle.' . $file->getClientOriginalExtension();
                $file->move('images/vehicles', $filename);
                $vehicle->image =  $filename;
            }
            $vehicle->name =  $request->name;
            $vehicle->type =  $request->type;
            $vehicle->no_plate =  $request->no_plate;
            $vehicle->no_of_seats =  $request->no_of_seats;
            $vehicle->condition =  $request->condition;
            $vehicle->ac_status =  $request->ac_status;
            $vehicle->owner_name =  $request->owner_name;
            $vehicle->hiring_cost =  $request->hiring_cost;
            $vehicle->status =  $request->status;
            $vehicle->save();
        }


        return redirect('/admin/vehicle');
    }


    /**
     * DRIVER
     */
    public function driverIndex()
    {
        $driver = Driver::get();
        return view('admin.driver.index', compact(
            'driver'
        ));
    }

    public function driverAdd(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'citizenship_no' => 'required',
            'experience' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('image') && $request->hasFile('license')) {

            $file = $request->file('image');
            $unique_id = uniqid();
            $filename =  $unique_id . '_driver.' . $file->getClientOriginalExtension();
            $file->move('images/drivers', $filename);

            $file1 = $request->file('license');
            $unique_id1 = uniqid();
            $filename1 =  $unique_id1 . '_license.' . $file1->getClientOriginalExtension();
            $file1->move('images/drivers', $filename1);


            $driver = new Driver();
            $driver->image =  $filename;
            $driver->name =  $request->name;
            $driver->phone =  $request->phone;
            $driver->address =  $request->address;
            $driver->citizenship_no =  $request->citizenship_no;
            $driver->experience =  $request->experience;
            $driver->license =   $filename1;
            $driver->status =  $request->status;

            $driver->save();
        }



        return redirect('/admin/driver');
    }

    public function driverEdit($driver_id, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'citizenship_no' => 'required',
            'experience' => 'required',
            'status' => 'required',
        ]);


        $driver =  Driver::find($driver_id);
        if ($driver) {

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $unique_id = uniqid();
                $filename =  $unique_id . '_driver.' . $file->getClientOriginalExtension();
                $file->move('images/drivers', $filename);
                $driver->image =  $filename;
            }
            if ($request->hasFile('license')) {


                $file1 = $request->file('license');
                $unique_id1 = uniqid();
                $filename1 =  $unique_id1 . '_license.' . $file1->getClientOriginalExtension();
                $file1->move('images/drivers', $filename1);

                $driver->license =   $filename1;
            }


            $driver->name =  $request->name;
            $driver->address =  $request->address;
            $driver->citizenship_no =  $request->citizenship_no;
            $driver->experience =  $request->experience;
            $driver->status =  $request->status;

            $driver->save();
        }


        return redirect('/admin/driver');
    }
    public function vehicleDriverAdd($vehicle_id, $driver_id)
    {
        $vehicle = Vehicle::find($vehicle_id);
        if ($vehicle) {
            $driver =  Driver::find($driver_id);
            if ($driver) {

                if (Vehicledriver::where('vehicle_id', $vehicle->id)->where('driver_id', $driver->id)->count() == 0) {

                    Vehicledriver::create([
                        'vehicle_id' => $vehicle->id,
                        'driver_id' => $driver->id,
                    ]);

                    return redirect('/admin/vehicle/view/' . $vehicle->id);
                }
            }
        }

        return redirect('/admin/vehicle');
    }
    public function vehicleDriverRemove($vehicle_id, $driver_id)
    {
        $vehicle = Vehicle::find($vehicle_id);
        if ($vehicle) {
            $driver =  Driver::find($driver_id);
            if ($driver) {

                Vehicledriver::where('vehicle_id', $vehicle->id)->where('driver_id', $driver->id)->delete();
                return redirect('/admin/vehicle/view/' . $vehicle->id);
            }
        }



        return redirect('/admin/vehicle');
    }


    /**
     * BOOKING
     */
    public function BookingIndex()
    {
        $bookings = array();

        foreach (Booking::orderBy('id', 'desc')->get() as $booking) {

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
            } else {
                $booking->delete();
            }
        }

        return view('admin.bookings.index', compact(
            'bookings'
        ));
    }

    public function bookingCancel($booking_id)
    {
        $booking = Booking::find($booking_id);

        if ($booking) {

            $vehicle = Vehicle::find($booking->vehicle_id);
            if ($vehicle) {

                $vehicle->status = "Available";
                $vehicle->save();
            }
            $driver = Driver::find($booking->driver_id);
            if ($driver) {

                $driver->status = "Available";
                $driver->save();
            }
            $booking->delete();
        }

        return redirect('/admin/booking');
    }
    public function bookingPaymentCompleted($booking_id)
    {
        $booking = Booking::find($booking_id);

        if ($booking) {


            $booking->payement_completed = true;
            $booking->save();


            $vehicle = Vehicle::find($booking->vehicle_id);
            if ($vehicle) {
                $vehicle->status = 'Available';
                $vehicle->save();
            } else {
                $booking->delete();
            }
            $driver = Driver::find($booking->driver_id);
            if ($driver) {
                $driver->status = 'Available';
                $driver->save();
            } else {
                $booking->delete();
            }
        }

        return redirect('/admin/booking');
    }
    public function bookingPaymentUncompleted($booking_id)
    {
        $booking = Booking::find($booking_id);

        if ($booking) {

            $booking->payement_completed = false;
            $booking->save();

            $vehicle = Vehicle::find($booking->vehicle_id);
            if ($vehicle) {
                $vehicle->status = 'Unavailable';
                $vehicle->save();
            } else {
                $booking->delete();
            }
            $driver = Driver::find($booking->driver_id);
            if ($driver) {
                $driver->status = 'Unavailable';
                $driver->save();
            } else {
                $booking->delete();
            }
        }

        return redirect('/admin/booking');
    }

    /**
     * CLIENT
     */
    public function clientsIndex()
    {
        // $users = User::where('type','client')->get();

        $users = DB::table('users')
            ->join('clientinfos', 'clientinfos.user_id', '=', 'users.id')
            ->select('clientinfos.*', 'users.email', 'users.email_verified')
            ->get();

        return view('admin.client.index', compact(
            'users'
        ));
    }
}
