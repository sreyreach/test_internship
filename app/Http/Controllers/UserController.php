<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role',1);
        return view('\admin\admin\user_admin',['user' => $user]);
              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'first_name'   => 'required',
            'last_name'    => 'required',
            'company_name' => 'required',
            'phone_number' => 'numeric',
            'email'        => 'unique:App\User,email',
            'website'      => 'required',
        ]);
    
        $form_data = array(
            'first_name'   =>  $request->first_name,
            'last_name'    => $request->last_name,
            'company_name' => $request->company_name,
            'email'        => $request->email,
            'password'     => Hash::make($data['password']),
            'phone_number' => $request->phone_number,
            'website'      => $request->website,
            'role'         => $request->role,
        );

        User::create($form_data);
        return redirect('user')->with('success', 'Data Added successfully!');

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
        $user = User::findOrFail($id);
        return view('\update_userprofile', compact('user'));
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
        //dd($request->all());
        $request->validate([
            'images'        => 'required',
            'first_name'   => 'required',
            'last_name'    => 'required',
            'company_name' => 'required',
            'phone_number' => 'required',
            'website'      => 'required',
            // 'password'     => 'required|min:8|confirmed',  
        ]);

        //$image = $data['images'];
        $image = $request->images;
        $new_name = 'profile_'.rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('profiles'), $new_name);
    
        $form_data = array(
            'images'       => $request->images = "profiles/".$new_name,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number,
            'website'      => $request->website,
            'phone_number' => $request->phone_number,
        );
        User::whereId($id)->update($form_data);
        // return redirect()->with('success', 'Data Added successfully!');
        return Redirect::to('/')->with('success', 'Data Added successfully!');

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
