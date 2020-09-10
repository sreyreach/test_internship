<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserControler extends Controller
{
    public function index(){
        $user = User::latest('id')->get();
        return response()->json($user);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id){
        $credential = $request->only('images', 'phone_number', 'first_name', 'last_name',
        'company_name','website', 'email', 'password');
            if ($request->hasFile('photo'))
            {
                $photo = $request->file('photo');    
                $new_name = 'profile_'.rand() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('profiles'), $new_name);
                $request['images'] = $new_name;

            }else{
                return response()->json(['error'=>'Unauthorised'], 401);
            }
        //return $credential;
        // if ('Auth'::attempt($credential)) 
        // {
        //     return response()->json(['error'=>'Unauthorised'], 401);
        // } 
        $form_data = array(
            
            'images'       => $request->images  = "profiles/".$new_name,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number,
            'website'      => $request->website,
            'email'        => $request->email,
        ); 
        User::where('id',$id)->update($form_data);
        $user = User::findOrFail($id); 
        
        return response()->json($user);
    }


    public function updateProfile( Request $request){
        $credential = $request->only( 'images');
        if ('Auth'::attempt($credential)) 
        {
            return response()->json(['error'=>'please check fail'], 401);
        } 
        if ($request->hasFile('photo'))
        {
            $photo = $request->file('photo');    
            $new_name = 'profile_'.rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('profiles'), $new_name);
            $request['images'] = $new_name;

        }else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
        $form_data = array(
            // 'images' => $new_name,
            'images' => $request->images  = "profiles/".$new_name,
        );

        User::where('id',$request->id)->update($form_data);
        $user = User::findOrFail($request->id); 
         
        return response()->json($user);
    }

    // public function getDownloadProfile($id)
    // { 
    //     $user = User::findOrFail($id);

    //     $file_path = public_path('profiles/'.$user->images);
    //     return response()->download($file_path);

    // }
    public function getDownloadphoto($id)
    {
        $user = User::findOrFail($id);

        $file_path = public_path('profiles/'.$user->images);
        return response()->download($file_path);
    }
 
}
