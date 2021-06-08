<?php

namespace App\Http\Controllers;


use App\Models\Activity;
    
use Illuminate\Http\Request;

class ActivityController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $activities = Activity::get();       
 
       // return view('clients.index')->with('clients', $clients);
        return view('activity.index', compact('activities'));

    }


}
