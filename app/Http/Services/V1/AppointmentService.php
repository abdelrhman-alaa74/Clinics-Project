<?php

namespace App\Http\Services\V1;

use App\Models\Appointment;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppointmentService
{
    public function getAll(){
        return Appointment::all();
    }

    public function getOne(int $id){
        return Appointment::findOrFail($id);
    }

    /*
     * Store
    */

    public function store(array $data): Appointment
    {
        return DB::transaction(function () use ($data) {

            $appointmentWithSameDate = Appointment::where('date', $data['date'])
            ->where("time", $data['time'])->exists();
                if($appointmentWithSameDate){
                    throw new \Exception('This date is not Available');
                }
                // every appointment have 30min time

            
            
            $appointment = Appointment::create($data);
            // Handle relationships if needed
            // if (!empty($data['relation_ids'])) {
            //     $appointment->relations()->sync($data['relation_ids']);
            // }
            
            // Return with relationships loaded
            // return $appointment->load(['relations']);
            return $appointment;
        });
    }

    /*
     * Update
    */

    public function update(array $data ,int $id ): Appointment
    {
        return DB::transaction(function () use ($id, $data) {
            $appointment = Appointment::findOrFail($id);
            
            // Update the resource
            $appointment->update($data);
            
            // Handle relationships if needed
            // if (isset($data['relation_ids'])) {
            //     $appointment->relations()->sync($data['relation_ids']);
            // }
            
            // Return with relationships loaded
            //      return $appointment->load(['relations']);
            return $appointment;
        });
    }

    public function destroy(int $id) : bool
    {
        return DB::transaction(function () use ($id) {
            $appointment = Appointment::findOrFail($id);
            
            // Perform any cleanup (e.g., delete related files)
            // $this->cleanupAppointment($appointment);
            
            return $appointment->delete();
        });
    }
}