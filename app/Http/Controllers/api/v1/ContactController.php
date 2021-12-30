<?php

namespace App\Http\Controllers\api\v1;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return $this->success($contacts, 'All Contact lIST');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->only('name','email','phone','group', 'is_favourite' ));
        return $this->success($contact, 'Contact Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $data = $contact;
        return $this->success($data, 'Contact Viewed Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {

        $contact->update($request->only('name','email','phone','group', 'is_favourite' ));
        $data =  $contact;
        return $this->success($data, 'Contact Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $this->success('Deleted', 'Contact Deleted Successfully');
    }

    public function filterContact(Request $request, Contact $contact)
    {
        $contacts = $contact->newQuery();

        if ($request->has('name')) {
            $contacts->where('name', 'LIKE', "%{$request->name}%");
        }

        if ($request->has('email')) {
            $contacts->where('email', 'LIKE', "%{$request->email}%");
        }

        if ($request->has('phone')) {
            $contacts->where('phone', 'LIKE', "%{$request->phone}%");
        }

        if ($request->has('group')) {
            $contacts->where('group', 'LIKE', "%{$request->group}%");
        }

        return $this->success($contacts->get(), 'Contact filtered Successfully');
    }
}
