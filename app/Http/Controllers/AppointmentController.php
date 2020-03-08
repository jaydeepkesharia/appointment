<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Client;
use App\Employee;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Appointments List';
        $data['list'] = Appointment::paginate(10);
        return view('appointment.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Appointment' ;
        $data['client'] = Client::all();
        $data['employee'] = Employee::all();
        return view('appointment.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'client' => 'required|string|max:255',
            'employee' => 'required|string|max:255',
            'start_time' => 'required|string|max:255',
            'finish_time' => 'required|string|max:255'
        ]);

        $appointment = new Appointment();

        $appointment->client = $request->client;
        $appointment->employee = $request->employee;
        $appointment->start_time = $request->start_time;
        $appointment->finish_time = $request->finish_time;
        $appointment->price = $request->price;
        $appointment->comments = $request->comments;

        $appointment->save();

        return redirect('appointments');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Appointment' ;
        $data['appointment'] = Appointment::find($id);
        $data['client'] = Client::all();
        $data['employee'] = Employee::all();
        return view('appointment.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'client' => 'required|string|max:255',
            'employee' => 'required|string|max:255',
            'start_time' => 'required|string|max:255',
            'finish_time' => 'required|string|max:255'
        ]);

        $appointment = Appointment::find($id);

        $appointment->client = $request->client;
        $appointment->employee = $request->employee;
        $appointment->start_time = $request->start_time;
        $appointment->finish_time = $request->finish_time;
        $appointment->price = $request->price;
        $appointment->comments = $request->comments;

        $appointment->save();

        return redirect('appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Appointment::where('id',$id)->delete();
        return redirect('appointments');
    }
}
