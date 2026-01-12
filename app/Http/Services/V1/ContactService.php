<?php

namespace App\Http\Services\V1;

use App\Models\Contact;
use App\Notifications\ContactNotification;
use Illuminate\Support\Facades\DB;


class ContactService
{
    public function getAll(){
        return Contact::all();
    }

    public function getOne(int $id){
        return Contact::findOrFail($id);
    }

    /*
     * Store
    */

    public function store(array $data): Contact
    {
        return DB::transaction(function () use($data) {


            $contact = Contact::create($data);
            
            // Handle relationships if needed
            if (!empty($data['relation_ids'])) {
                $contact->relations()->sync($data['relation_ids']);
            }
            
            // Return with relationships loaded
            // return $contact->load(['relations']);


            //Notification
            $contact->notify(new ContactNotification($contact->contact_name, $contact->contact_email, $contact->contact_subject, $contact->contact_message));


            return $contact;
        });
    }

    /*
     * Update
    */

    public function update(array $data ,int $id ): Contact
    {
        return DB::transaction(function () use ($id, $data) {
            $contact = Contact::findOrFail($id);
            
            // Update the resource
            $contact->update($data);
            
            // Handle relationships if needed
            if (isset($data['relation_ids'])) {
                $contact->relations()->sync($data['relation_ids']);
            }
            
            // Return with relationships loaded
            //      return $contact->load(['relations']);
            return $contact;
        });
    }

    public function destroy(int $id) : bool
    {
        return DB::transaction(function () use ($id) {
            $contact = Contact::findOrFail($id);
            
            // Perform any cleanup (e.g., delete related files)
            // $this->cleanupContact($contact);
            
            return $contact->delete();
        });
    }
}