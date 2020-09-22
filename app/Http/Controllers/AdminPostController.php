<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostJob;
class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postjob = PostJob::latest();
        // return view('\admin\Post_job\job',['post' => $data]);
        return view('\admin\Post_job\job', compact('postjob'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = User::where('id', $request->user_id)->select('role')->first();
        // if($user->role == '2')
        // {
        $request->validate([
            'title'               => 'required',
            'category_id'         => 'required',
            'company'             => 'required',
            'post_date'           => 'required',
            'closing_date'        => 'required',
            'company_description' => 'required',
            'apply'               => 'required',
            'job_type'            => 'required',
            'location_id'         => 'required',
            'job_description'     => 'required',

        ]);
        
        $image = $request->file('image');
        $new_name = rand() . '.' . $image-> getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        // }else {
        //     return response()->json(['error' => 'Wrong position'], 200);
        // }
        $form_data = array(
            'title'               => $request->title,
            'category_id'         => $request->category_id,
            'company'             => $request->company,
            'post_date'           => $request->post_date,
            'closing_date'        => $request->closing_date,
            'company_description' => $request->company_description,
            'apply'               => $request->apply,
            'job_type'            => $request->job_type,
            'location_id'         => $request->location_id,
            'job_description'     => $request->job_description,
            'user_id'             => Auth::user()->id,
            'company_profile'     =>  $new_name,
        );
    
        PostJob::create($form_data);
        return redirect('postjob')->with('success', 'Data Added successfully!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
