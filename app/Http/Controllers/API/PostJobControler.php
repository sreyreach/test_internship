<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use DB;
use App\User;
use App\PostJob;

class PostJobControler extends Controller
{
    public function index()
    {
        $postjob = DB::table('postjob')->latest('id')->get();
        return response()->json($postjob);
    }

    public function store(Request $request){

        // $user = User::where('id', $request->user_id)->select('role')->first();

     //dd($request);
        
            $credential = $request->only('title', 'company', 'job_type', 'location', 'job_description',
             'user_id','company_profile','post_date','closing_date','company_description','apply');
                
                //return $credential;
                // if (Auth::attempt($credential)) 
                // {
                //     return response()->json(['error'=>'Unauthorised'], 401);
                // } 

            if ($request->hasFile('photo'))
            {
                    $photo = $request->file('photo');    
                    $new_name = rand() . '.' . $photo->getClientOriginalName();
                    $photo->move(public_path('images'), $new_name);
                    $request['company_profile'] = $new_name;
                //  return $new_name;
            }else{

                    return response()->json(['error'=>'Unauthorised'], 401);
                }

       $postjob = PostJob::create($request->toArray()); 
       $postjob['createdAt'] = Carbon::parse($postjob->created_at)->format("m d,Y H:i:s");
       $postjob['updatedAt'] = Carbon::parse($postjob->updated_at)->format("m d,Y H:i:s");
        return response()->json($postjob);
    } 

    public function show($id)
    {
        
        $postjob = PostJob::find($id);
        $postjob['createdAt'] = Carbon::parse($postjob->created_at)->format("m d,Y H:i:s");
        $postjob['updatedAt'] = Carbon::parse($postjob->updated_at)->format("m d,Y H:i:s");
        return response()->json($postjob);
    }

    public function update(Request $request, $id)
    {     
        $credential = $request->only( 'title', 'company', 'job_type', 'location', 'job_description',
       'user_id','company_profile','post_date','closing_date','company_description','apply');
        
        if ($request->hasFile('photo'))
        {
            $photo = $request->file('photo');    
            $new_name = rand() . '.' . $photo->getClientOriginalName();
            $photo->move(public_path('images'), $new_name);
            $request['company_profile'] = $new_name;
                //  return $new_name;
        }else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
          
        $form_data = array(
            'id'                  => $request->id,
            'title'               => $request->title,
            'company'             => $request->company,
            'post_date'           => $request->post_date,
            'closing_date'        => $request->closing_date,
            'company_description' => $request->company_description,
            'apply'               => $request->apply,
            'job_type'            => $request->job_type,
            'location'            => $request->location,
            'job_description'     => $request->job_description,
            // 'user_id'             => Auth::user()->id,
            'company_profile'     =>  $new_name,
        ); 
        //dd($form_data);
        PostJob::where('id',$id)->update($form_data);
        $postjob = PostJob::where('id',$id)->get(); 
         
        return response()->json($postjob);

    }


    public function destroy($id)
    {
        $postjob = PostJob::find($id);
        $postjob->delete();
        return response()->json($postjob);
        $postjob->save();
    }
    public function find($id)
    {
       
        $postjob = PostJob::findOrFail($id);

        return response()->json($postjob);
    }
    public function showImage($id)
    {

        $filename = DB::table('postjob')
                         ->select(DB::raw('image'))
                         ->where('id','=', $id)
                         ->get();
    
        $name = $filename[0]->image;
    
        return response()->download("images/$name");
    }

    public function getDownload($id)
    {
        // $user = User::findOrFail($id)->first;
        // return response()->json($user,200);
        $user = PostJob::findOrFail($id);

        $file_path = public_path('images/'.$user->company_profile);
        return response()->download($file_path);

       // return response()->json($user->image);
    }

    public function userId($id){
        $postjob = PostJob::where('user_id', $id)->get(); 
        return response()->json($postjob);
    }

    public function readTypeJob($title ,Request $request){
        // $stu = PostJob::where('title',$title)->get();
        $stu = PostJob::where('title', 'like', '%'.$title.'%')->get();
        return response()->json($stu);
    }
}
