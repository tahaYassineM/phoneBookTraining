<?php

namespace App\Http\Controllers\Repository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Phonebook;
use App\Http\Requests\PhonebookRequest;

class PhonebookRepository extends Controller
{
    protected $phonebook;


    public function __construct(Phonebook $phonebook)
    {
        $this->phonebook = $phonebook;
    }

    public function allPhonebooks(){
        return $this->phonebook->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePhonebook(PhonebookRequest $request)
    {
        $phoneb = Phonebook::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        
        // $phoneb = new Phonebook();
        // $phoneb->name = $request->name;
        // $phoneb->email = $request->email;
        // $phoneb->phone = $request->phone;
        
        // $phoneb->save();
        
        return response()->json([
            'phonebook' => $phoneb
        ], 201);
    }
}
