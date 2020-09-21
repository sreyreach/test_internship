<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Catagory;
class LocationController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->All());
        $request->validate([
            'location'             =>  'required',
        ]);

        $form_data = array(
            'location'             => $request->location,
        );

        $location=Location::create($form_data);
        return redirect('/add_location')->with('success', 'Data Added successfully!');
    }

    public function view(){
        $location = Location::get();
        $category = Catagory::get();
        return view('\post_job.new_post',compact('location','category'));
    }

}
