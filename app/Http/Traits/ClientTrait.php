<?php

namespace App\Http\Traits;
use App\Models\Client;

trait ClientTrait {

    
    public function index() {
        // Fetch all the students from the 'student' table.
        $student = Student::all();
        return view('welcome')->with(compact('student'));
    }

    
}

