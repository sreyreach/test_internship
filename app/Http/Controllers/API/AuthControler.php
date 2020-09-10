<?php
namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use \App\User;

class AuthControler extends Controller
{
    public function login(Request $request){
        $credential = $request->only('email', 'password');
        // return $credential;
        if ('Auth'::attempt($credential)) {
            $api_token = str::random(60);
            User::where('id', 'Auth'::user()->id)->update(['api_token' => $api_token]);
            $user = User::findOrFail('Auth'::user()->id);
            return response()->json(['success'=>1,'user'=>$user]);
        }else{
            return response()->json(['success'=>0,'user'=>null], 401); 
        }
    }

    public function register(Request $request) {
//dd($request->all());
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric|unique:App\User',
            'password' => 'required|confirmed|min:6',

            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'please chack your phone number and you password again'], 200);
        }

        $credential = $request->only( 'images', 'phone_number', 'first_name', 'last_name','company_name','website', 'email', 'password');
                if ($request->hasFile('photo'))
                {
                        $photo = $request->file('photo');    
                        $new_name = 'profile_'.rand() . '.' . $photo->getClientOriginalExtension();
                        $photo->move(public_path('profiles'), $new_name);
                        $request['images'] = $new_name;

                }else{

                        return response()->json(['error'=>'Unauthorised'], 401);
                    }
        $request['password'] = Hash::make($request['password']);
        $api_token = Str::random(60);
        $request['api_token'] = $api_token;
        $user = User::create($request->toArray());            
        $api_token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['api_token' => $api_token];
        return response()->json(['success'=>1,'user'=>$user]);   
    }
}
