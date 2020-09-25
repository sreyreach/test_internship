<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PostJob;
use App\Catagory;
use App\Location;
use App\JobType;
use DB;
use Vinkla\Hashids\Facades\Hashids;
class PostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = PostJob::where('user_id', Auth::User()->id)->get();
        return view('\my_post', compact('jobs'));
    }

    public function view(){
        $jobs = PostJob::latest();
        return view('\index', compact('jobs'));
    }
     public function hotjob(){
        $jobs = PostJob::orderBy('updated_at', 'DESC')->get();
        $location = Location::get();
        $category = Catagory::get();
        $jobtype  = JobType::get();
        return view('\index',compact('jobs','location','category','jobtype'));
    }
    public function  categories(){
        $jobs = PostJob::get();
        // $jobs = PostJob::where("title","Graphic Designer")->get();
        return view('\post_job.view_categories',['jobs' => $jobs]);
    }
    
    public function  profile(){
        $jobs = PostJob::where("user_id",Auth::user()->id)->orderBy('updated_at', 'DESC')->get();
        return view('\my_post',['jobs' => $jobs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('\post_job.view_job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->All());
        $request->validate([
            'title'               =>  'required',
            'category_id'         =>  'required',
            'company'             => 'required',
            'post_date'           => 'required',
            'closing_date'        => 'required',
            'company_description' => 'required',
            'apply'               => 'required',
            'job_type_id'         =>  'required',
            'location_id'         =>  'required',
            'job_description'     =>  'required',
            'company_profile'     => 'required|image|max:2048',
        ]);
        
        $image = $request->file('company_profile');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'title'               => $request->title,
            'category_id'         => $request->category_id,
            'company'             => $request->company,
            'post_date'           => $request->post_date,
            'closing_date'        => $request->closing_date,
            'company_description' => $request->company_description,
            'apply'               => $request->apply,
            'job_type_id'         => $request->job_type_id,
            'location_id'         => $request->location_id,
            'job_description'     => $request->job_description,
            'user_id'             => Auth::user()->id,
            'company_profile'   =>  $new_name,
        );

        $user = PostJob::create($form_data)->paginate(10);
        return redirect('/')->with('success', 'Data Added successfully!')
        ->with('i', (request()->input('page',1) -1) *5);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $jobs = PostJob::find($id);
        return view('\post_job.show_info_job',['jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd('edit')
        $job = PostJob::findOrFail($id);
        $category = Catagory::get();
        $location = Location::get();
        $jobtype  = JobType::get();
        return view('\post_job\edit_post', compact('job','category','location','jobtype'));
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
        // dd('dsd');
        $request->validate([
            'title'             =>  'required',
            'company'           => 'required',
            'post_date'           => 'required',
            'closing_date'           => 'required',
            'company_description'    => 'required',
            'apply'           => 'required',
            'job_type'          =>  'required',
            'location'          =>  'required',
            'job_description'   =>  'required',
            'company_profile'  => 'required|image|max:2048',
        ]);

        $image = $request->file('company_profile');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'title'             => $request->title,
            'company'           => $request->company,
            'post_date'           => $request->post_date,
            'closing_date'           => $request->closing_date,
            'company_description'           => $request->company_description,
            'apply'           => $request->apply,
            'job_type'          => $request->job_type,
            'location'          => $request->location,
            'job_description'   => $request->job_description,
            'user_id'           => Auth::user()->id,
            'company_profile'   =>  $new_name,
        );

        PostJob::whereId($id)->update($form_data);
        return redirect('/update')->with('success', 'Data Added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = PostJob::findOrFail($id);
        $job->delete();
        return redirect('/my_post')->with('success','Data is successfully deleted!');
    }

    // public function search(Request $request)
    // {
    //     $search = $request->search;
        
    //     $postjob = PostJob::where('title', 'like', '%'.$search.'%')
    //     ->paginate(10);
    //     return view('job', compact('postjob'))
    //             ->with('i', (request()->input('page',1) -1) *5);
    // } 

    public function search(Request $request)
    { 
        $location_id = $request->location_id;
        $category_id = $request->category_id;
        $job_type_id = $request->job_type_id;
        $locationSearch = DB::table('postjob')->where('location_id',$location_id);
        $titleSearch = DB::table('postjob')->where('category_id',$category_id);
        $job_typeSearch = DB::table('postjob')->where('job_type_id',$job_type_id);
        $result_search = $locationSearch->union($titleSearch)->union($job_typeSearch)->get();

        $jobs = DB::table('postjob')->where('location_id','=', "%{$location_id}")
        ->orwhere('category_id','like', "%{$category_id}")
        ->orwhere('job_type_id','=', "%{$job_type_id}")
        ->get();
        return view('\index', compact('jobs'));
          
    }
    
    // public function get_category($id){
    //     $job = PostJob::findOrFail(2);
    //     return view('\post_job.view_categories',compact('jobs'));
    // }
      
}
