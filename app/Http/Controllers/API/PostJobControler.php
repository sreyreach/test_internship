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
use App\Location;
use App\Catagory;
use App\JobType;

class PostJobControler extends Controller
{
    // public function index()
    // {
    //     $postjob = DB::table('postjob')->latest('id')->get();
    //     return response()->json($postjob);
    // }

    public function index(Request $request)
    {
        $job_type=$request->job_type;
       
        $location = $request->location;
        $job_title = $request->job_title;
        
        if($job_type ==null and $location ==null and $job_title==null){
            $postjob = DB::table('postjob')
            ->leftjoin('category','postjob.category_id','category.id')
            ->leftjoin('job_type','postjob.job_type_id','job_type.id')
            ->leftjoin('location','postjob.location_id','location.id')
            ->select(
                'postjob.id',
                'postjob.company_profile',
                'postjob.title',
                'category.title AS job_title',
                'job_type.job_type',
                'postjob.job_description',
                'postjob.company_description',
                'postjob.apply',
                'postjob.company_profile',
                'postjob.post_date',
                'postjob.closing_date',
                'location.location',
                'postjob.company',
                'postjob.updated_at',
                'postjob.user_id'
            )
        ->orderByDesc('postjob.updated_at')
        ->paginate(10);
        return response()->json($postjob);
        }elseif($job_type ==null and $location ==null){

        $job_title_list = DB::table('category')->where('title',$job_title)->get();
        $job_title_id = $job_title_list[0]->id;
            return $this->getPostJobByOneParam("postjob.category_id",$job_title_id);
        }elseif($job_type ==null and $job_title ==null){
        $location_list = DB::table('location')->where('location',$location)->get();
        $location_id = $location_list[0]->id;
            return $this->getPostJobByOneParam('postjob.location_id',$location_id);
        }
        elseif($job_title ==null and $location ==null){
            $job_type_list = DB::table('job_type')->where('job_type',$job_type)->get();
            $job_type_id = $job_type_list[0]->id;
            return $this->getPostJobByOneParam("postjob.job_type_id",$job_type_id);
        }
        elseif($job_type ==null){

        $job_title_list = DB::table('category')->where('title',$job_title)->get();
        $job_title_id = $job_title_list[0]->id;

        $location_list = DB::table('location')->where('location',$location)->get();
        $location_id = $location_list[0]->id;
            return $this->getPostJobByTwoParam("postjob.location_id",$location_id,"postjob.category_id",$title_id);
        }elseif($location == null){
            $job_type_list = DB::table('job_type')->where('job_type',$job_type)->get();
        $job_type_id = $job_type_list[0]->id;

        $job_title_list = DB::table('category')->where('title',$job_title)->get();
        $job_title_id = $job_title_list[0]->id;
            return $this->getPostJobByTwoParam("postjob.job_type_id",$job_type_id,"postjob.category_id",$job_title_id);
        }elseif($job_title==null){
            $job_type_list = DB::table('job_type')->where('job_type',$job_type)->get();
        $job_type_id = $job_type_list[0]->id;

        $location_list = DB::table('location')->where('location',$location)->get();
        $location_id = $location_list[0]->id;
            return $this->getPostJobByTwoParam("postjob.job_type_id",$job_type_id,'postjob.location_id',$location_id);
        }else{
            $job_type_list = DB::table('job_type')->where('job_type',$job_type)->get();
        $job_type_id = $job_type_list[0]->id;

        $job_title_list = DB::table('category')->where('title',$job_title)->get();
        $job_title_id = $job_title_list[0]->id;

        $location_list = DB::table('location')->where('location',$location)->get();
        $location_id = $location_list[0]->id;
            return $this->getPostJobByTreeParam("postjob.job_type_id",$job_type_id,'postjob.location_id',$location_id,"postjob.category_id",$job_title_id);
        }
        
    }
    public function getPostJobByOneParam($tableName,$param){
        $postjob = DB::table('postjob')
        // ->Join('postjob', 'users.id', '=', 'postjob.user_id')
        ->where($tableName,$param)
        ->leftjoin('category','postjob.category_id','category.id')
        ->leftjoin('job_type','postjob.job_type_id','job_type.id')
        ->leftjoin('location','postjob.location_id','location.id')
        ->select(
            'postjob.id',
            'postjob.company_profile',
            'postjob.title',
            'category.title AS job_title',
            'job_type.job_type',
            'postjob.job_description',
            'postjob.company_description',
            'postjob.apply',
            'postjob.company_profile',
            'postjob.post_date',
            'postjob.closing_date',
            'location.location',
            'postjob.company',
            'postjob.updated_at',
            'postjob.user_id'
        )
        ->orderByDesc('postjob.updated_at')
        ->paginate(10);
        return response()->json($postjob);
    }
    // public function getPostJobByJobTitle($tableName,$param){
    //     $postjob = DB::table('postjob')
    //     // ->Join('postjob', 'users.id', '=', 'postjob.user_id')
    //     ->leftjoin('category','postjob.category_id','category.id')
    //     ->leftjoin('job_type','postjob.job_type_id','job_type.id')
    //     ->leftjoin('location','postjob.location_id','location.id')
    //     ->select(
    //         'postjob.id',
    //         'postjob.company_profile',
    //         'postjob.title',
    //         'category.title AS job_title',
    //         'job_type.job_type',
    //         'postjob.job_description',
    //         'postjob.company_description',
    //         'postjob.company_profile',
    //         'postjob.post_date',
    //         'postjob.closing_date',
    //         'location.location',
    //         'postjob.company',
    //         'postjob.updated_at',
    //         'postjob.user_id'
    //     )
    //     ->where($tableName,'like', '%'.$param.'%')
    //     ->orderByDesc('postjob.updated_at')
    //     ->paginate(10);
    //     return response()->json($postjob);
    // }

    public function getPostJobByTwoParam($tableName1,$param1,$tableName2,$param2){
        $postjob = DB::table('postjob')
        // ->Join('postjob', 'users.id', '=', 'postjob.user_id')
        // ->where("postjob.title",$keyword)
        ->where($tableName1,$param1)
        ->where($tableName2,$param2)
        ->leftjoin('category','postjob.category_id','category.id')
        ->leftjoin('job_type','postjob.job_type_id','job_type.id')
        ->leftjoin('location','postjob.location_id','location.id')
        ->select(
            'postjob.id',
            'postjob.company_profile',
            'postjob.title',
            'category.title AS job_title',
            'job_type.job_type',
            'postjob.job_description',
            'postjob.company_description',
            'postjob.apply',
            'postjob.company_profile',
            'postjob.post_date',
            'postjob.closing_date',
            'location.location',
            'postjob.company',
            'postjob.updated_at',
            'postjob.user_id'
        )
        ->orderByDesc('postjob.updated_at')
        ->paginate(10);
        return response()->json($postjob);
    }
    public function getPostJobByTreeParam($tableName1,$param1,$tableName2,$param2,$tableName3,$param3){
        $postjob = DB::table('postjob')
        // ->Join('postjob', 'users.id', '=', 'postjob.user_id')
        // ->where("postjob.title",$keyword)
        ->where($tableName1,$param1)
        ->where($tableName2,$param2)
        ->where($tableName3,$param3)
        ->leftjoin('category','postjob.category_id','category.id')
        ->leftjoin('job_type','postjob.job_type_id','job_type.id')
        ->leftjoin('location','postjob.location_id','location.id')
        ->select(
            'postjob.id',
            'postjob.company_profile',
            'postjob.title',
            'category.title AS job_title',
            'job_type.job_type',
            'postjob.job_description',
            'postjob.company_description',
            'postjob.apply',
            'postjob.company_profile',
            'postjob.post_date',
            'postjob.closing_date',
            'location.location',
            'postjob.company',
            'postjob.updated_at',
            'postjob.user_id'
        )
        ->orderByDesc('postjob.updated_at')
        ->paginate(10);
        return response()->json($postjob);
    }
    public function store(Request $request){

        $user = User::where('id', $request->user_id)->select('role')->first();

     //dd($request);
        if ($user->role != '1') {
            $credential = $request->only('title','category_id', 'company', 'job_type_id', 'location_id', 'job_description',
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
        } else {
            return response()->json(['error' => 'Wrong position'], 200);
        }        

       $postjob = PostJob::create($request->toArray()); 
       $postjob['createdAt'] = Carbon::parse($postjob->created_at)->format("m d,Y H:i:s");
       $postjob['updatedAt'] = Carbon::parse($postjob->updated_at)->format("m d,Y H:i:s");
        return response()->json($postjob);
    } 

    public function show($id)
    {
       // $postjob = PostJob::findOrFail('postjob.id',$id);
        $postjob = DB::table('postjob')
        ->where('postjob.id', $id)
        ->leftjoin('category','postjob.category_id','category.id')
            ->leftjoin('job_type','postjob.job_type_id','job_type.id')
            ->leftjoin('location','postjob.location_id','location.id')
            ->select(
                'postjob.id',
                'postjob.company_profile',
                'postjob.title',
                'category.title AS job_title',
                'job_type.job_type',
                'postjob.job_description',
                'postjob.company_description',
                'postjob.apply',
                'postjob.company_profile',
                'postjob.post_date',
                'postjob.closing_date',
                'location.location',
                'postjob.company',
                'postjob.updated_at',
                'postjob.user_id'
            )
        // ->orderByDesc('postjob.updated_at')
        ->get();
        // return response()->json($postjob);
        // $postjob['createdAt'] = Carbon::parse($postjob->created_at)->format("m d,Y H:i:s");
        // $postjob['updatedAt'] = Carbon::parse($postjob->updated_at)->format("m d,Y H:i:s");
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
            'category_id'         => $request->categoty_id,
            'company'             => $request->company,
            'post_date'           => $request->post_date,
            'closing_date'        => $request->closing_date,
            'company_description' => $request->company_description,
            'apply'               => $request->apply,
            'job_type_id'            => $request->job_type,
            'location_id'            => $request->location_id,
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
    // public function find($id)
    // {
       
    //     $postjob = PostJob::findOrFail($id);

    //     return response()->json($postjob);
    // }
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
        $postjob = PostJob::findOrFail($id);

        $file_path = public_path('images/'.$postjob->company_profile);
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

    public function getLocation(){
        $location = DB::table('location')
        ->select(

            'location.id',
            'location.location'
        )->get();
        return response()->json($location);
    }

    public function getCategory(){
        $category = DB::table('category')
        ->select(
            'category.id',
            'category.title'
        )->get();
        return response()->json($category);
    }

    public function getJobtype(){
        $job_type = DB::table('job_type')
        ->select(
            'job_type.id',
            'job_type.job_type'
        )->get();
        return response()->json($job_type);
    }
}
