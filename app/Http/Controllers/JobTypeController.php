<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobType;
class JobTypeController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->All());
        $request->validate([
            'job_type'             =>  'required',
        ]);

        $form_data = array(
            'job_type'             => $request->location,
        );

        $jobtype=JobType::create($form_data);
        return redirect('/add_job_type')->with('success', 'Data Added successfully!');
    }

    public function view(){
        $location = Location::get();
        $category = Catagory::get();
        $jobtype  = JobType::get();
        return view('\post_job.new_post',compact('location','category','jobtype'));
    }
}
