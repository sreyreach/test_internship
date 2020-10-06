<?php
namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use \App\User;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Password;

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

        $credential = $request->only( 'images', 'phone_number', 'first_name', 'last_name', 'email', 'password');
                if ($request->hasFile('photo'))
                {
                        $photo = $request->file('photo');    
                        $new_name = 'profile_'.rand() . '.' . $photo->getClientOriginalExtension();
                        $photo->move(public_path('profiles'), $new_name);
                        $request['images'] = $new_name;

                }else{

                        return response()->json(['error'=>'Unauthorised'], 401);
                    }
        $request['images']   = "profiles/".$new_name;
        $request['password'] = Hash::make($request['password']);
        $api_token = Str::random(60);
        $request['api_token'] = $api_token;
        $user = User::create($request->toArray());  
                 
        $api_token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['api_token' => $api_token];
        return response()->json(['success'=>1,'user'=>$user]);   
    }
    public function forgot_password(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'email' => "required|email",
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                    $message->subject($this->getEmailSubject());
                });
                switch ($response) {
                    case Password::RESET_LINK_SENT:
                        return response()->json(array("status" => 200, "message" => trans($response), "data" => array()));
                    case Password::INVALID_USER:
                        return response()->json(array("status" => 400, "message" => trans($response), "data" => array()));
                }
            } catch (\Swift_TransportException $ex) {
                $arr = array("status" => 400, "message" => $ex->getMessage(), "data" => []);
            } catch (Exception $ex) {
                $arr = array("status" => 400, "message" => $ex->getMessage(), "data" => []);
            }
        }
        return response()->json($arr);
    }
    
    public function change_password(Request $request)
    {
        $input = $request->all();
        $userid = FacadesAuth::guard('api')->user()->id;
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                if ((Hash::check(request('old_password'), FacadesAuth::user()->password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                } else if ((Hash::check(request('new_password'), FacadesAuth::user()->password)) == true) {
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }
        }
        return response()->json::json($arr);
    }
}
