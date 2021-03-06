<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $credential = $request->only( 'phone_number', 'first_name', 'last_name', 'email','company_name','website');
            if ($request->hasFile('photo'))
            {
                $photo = $request->file('photo');    
                $new_name = 'profile_'.rand() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('profiles'), $new_name);
                $request['images'] = $new_name;

            }else{
                $form_data = $request->toArray();
                User::where('id',$id)->update($form_data);
                $user = User::findOrFail($id); 
        
                return response()->json($user);
            } 
        $form_data = array(
            'images'       => $request->images  = "profiles/".$new_name,
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
            'images' => $request->images  = "profiles/".$new_name,
        );

        User::where('id',$request->id)->update($form_data);
        $user = User::findOrFail($request->id); 
         
        return response()->json($user);
    }
    public function getDownloadphoto($id)
    {
        $user = User::findOrFail($id);

        $file_path = public_path($user->images);
        return response()->download($file_path);
    }

    public function changePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'newPassword' => 'required|confirmed|min:6',
        ]);
        if($validator->fails()){
            return 3;
        }

        $credential = $request->only('id','password');
        if ('Auth'::attempt($credential)) {

            $newPassword['password'] = Hash::make($request['newPassword']);
            DB::table('users')->where('id',$request->id)->update($newPassword);
            $user=DB::table('users')->where('id',$request->id)->get();
            return $user;
        }else{
            return "password incorrect";
        }
    }
 
}
