<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role',2)->latest()->paginate(10);
        return view('\admin\Employer\employer',['user' => $user]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        
        $user = User::where('role',2)->where('first_name', 'like', '%'.$search.'%')
        ->orWhere('last_name', 'like', '%'.$search.'%')
        ->orWhere('id', 'like', '%'.$search.'%')
        ->paginate(10);
        return view('\admin\Employer\employer', compact('user'))
                ->with('i', (request()->input('page',1) -1) *5);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/Employer/create');
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

        $image = $request->file('images');
        $new_name = 'profile_'.rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('profiles'), $new_name);
            
        $form_data = array(
            'images'       => "profiles/".$new_name,
            'first_name'   =>  $request->first_name,
            'last_name'    => $request->last_name,
            'company_name' => $request->company_name,
            'email'        => $request->email,
            'password'     => 'test',
            'phone_number' => $request->phone_number,
            'website'      => $request->website,
            'role'         => $request->role,
        );

        User::create($form_data);
        return redirect('employer')->with('success', 'Data Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('\admin\Employer\read', compact('user'));
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
        return view('\admin\Employer\edit', compact('user'));
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
        return redirect('employer')->with('success', 'Data is successfully update !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('employer')->with('success','Data is successfully deleted!');
    }
}
