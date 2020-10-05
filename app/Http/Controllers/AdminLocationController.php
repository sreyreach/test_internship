<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\location;
class AdminLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::latest()->paginate(13);
        return view('\admin\location\location',['location' => $location]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        
        $location = Location::where('location', 'like', '%'.$search.'%')
        ->orwhere('id', 'like', '%'.$search.'%')
        ->paginate(10);
        return view('\admin\location\location', compact('location'))
                ->with('i', (request()->input('page',1) -1) *5);
    } 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/location/create');
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
            'location'             =>  'required',
        ]);

        $form_data = array(
            'location'             => $request->location,
        );
        $location=Location::create($form_data);
        return redirect('adminlocation')->with('success', 'Data Added successfully!');
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
        $locations = Location::findOrFail($id);
        return view('\admin\location\edit', compact('locations'));
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
        $request->validate([
            'location'             =>  'required',
        ]);

        $form_data = array(
            'location'             => $request->location,
        );

        $location=Location::whereId($id)->update($form_data);
        return redirect('adminlocation')->with('success', 'Data Added successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =Location::findOrFail($id);
        $data->delete();
        return redirect('adminlocation')->with('success','Data is successfully deleted!');
    }
}
