<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreContactRequest;
use App\Http\Requests\V1\UpdateContactRequest;
use App\Http\Services\V1\ContactService;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected ContactService $ContactService;
    public function __construct(ContactService $ContactService){
        $this->ContactService = $ContactService;
    }

    /** 
     * Display a listening of resources
    **/
    public function index(){
        $contacts = $this->ContactService->getAll();
        return view();
    }


    public function show(Contact $contact){
        $contact = $this->ContactService->getOne($contact->id);
        return view();
    }

    public function create(){
        return to_route('doctor.contact');
    }

    public function store(StoreContactRequest $request){
        try{
            $contact = $this->ContactService->store($request->validated());
            return response()->json([
                'status' => 'success',
                'message'=>'Contact Send Successfully',
                'data'=> $contact
            ],201);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 401);
        }
    }

    public function edit(){
        return view();
    }

    public function update(UpdateContactRequest $request , Contact $contact){
        $contact = $this->ContactService->update($request->validated() , $contact->id);
        return redirect()->back();
    }

    public function destroy(Contact $contact){
        $contact = $contact = $this->ContactService->destroy($contact->id);
        return redirect()->back();
    }
}