<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'images'    =>['required'],
            'first_name' =>['required'],
            'last_name' =>['required'],
            'company_name'=>['required'],
            'phone_number' => 'required|string|numeric',
            'website' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$image = $data['images']->file('images');
        $image = $data['images'];
        $new_name = 'profile_'.rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('profiles'), $new_name);

        return User::create([
            'images'       => "profiles/".$new_name,
            'first_name'   => $data['first_name'],
            'last_name'    => $data['last_name'],
            'company_name' => $data['company_name'],
            'phone_number' => $data['phone_number'],
            'website'      => $data['website'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
        ]);
    }
}