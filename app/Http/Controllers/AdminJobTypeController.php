<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobType;
class AdminJobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobtype = JobType::latest()->paginate(13);
        return view('\admin\job_type\job_type',['jobtype' => $jobtype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_type'             =>  'required',
        ]);

        $form_data = array(
            'job_type'             => $request->job_type,
        );

        $jobtype=JobType::create($form_data);
        return redirect('adminjobtype')->with('success', 'Data Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobtype =JobType::findOrFail($id);
        return view('\admin\job_type\edit', compact('jobtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'job_type'             =>  'required',
        ]);

        $form_data = array(
            'job_type'             => $request->job_type,
        );

        $jobtype=JobType::whereId($id)->update($form_data);
        return redirect('adminjobtype')->with('success', 'Data Added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =JobType::findOrFail($id);
        $data->delete();
        return redirect('adminjobtype')->with('success','Data is successfully deleted!');
    }
}
