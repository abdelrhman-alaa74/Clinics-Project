<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreAppointmentRequest;
use App\Http\Requests\V1\UpdateAppointmentRequest;
use App\Http\Services\V1\AppointmentService;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Mockery\Expectation;

class AppointmentController extends Controller
{
    protected AppointmentService $AppointmentService;
    public function __construct(AppointmentService $AppointmentService){
        $this->AppointmentService = $AppointmentService;
    }

    /** 
     * Display a listening of resources
    **/
    public function index(){
        $appointments = $this->AppointmentService->getAll();
        return view();
    }


    public function show(Appointment $appointment){
        $appointment = $this->AppointmentService->getOne($appointment->id);
        return view();
    }

    public function create(){
        return view();
    }

    public function store(StoreAppointmentRequest $request){
        try{
            $appointment = $this->AppointmentService->store($request->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment Send Successfully',
                'data' => $appointment
            ], 201);
        }catch(\Exception $e){
            Log::error('Failed Store Appointment:' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Some Thing Wrong ' . $e->getMessage(),
            ], 500);
        }
    }

    public function edit(){
        return view();
    }

    public function update(UpdateAppointmentRequest $request , Appointment $appointment){
        $appointment = $this->AppointmentService->update($request->validated() , $appointment->id);
        return redirect()->back();
    }

    public function destroy(Appointment $appointment){
        $appointment = $appointment = $this->AppointmentService->destroy($appointment->id);
        return redirect()->back();
    }
}