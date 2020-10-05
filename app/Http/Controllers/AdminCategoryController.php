<?php

namespace App\Http\Controllers;
use  App\Catagory;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Catagory::latest()->paginate(13);
        return view('\admin\category\job_title',['category' => $category]);
        // ->with('i', (request()->input('page',1) -1) *5);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        
        $category = Catagory::where('title', 'like', '%'.$search.'%')
        ->orwhere('id', 'like', '%'.$search.'%')
        ->paginate(10);
        return view('\admin\category\job_title', compact('category'))
                ->with('i', (request()->input('page',1) -1) *5);
    } 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create');
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
            'title'             =>  'required',
        ]);

        $form_data = array(
            'title'             => $request->title,
        );

        $category=Catagory::create($form_data);
        return redirect('admincategory')->with('success', 'Data Added successfully!');
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
        $category = Catagory::findOrFail($id);
        return view('\admin\category\edit', compact('category'));
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
            'title'             =>  'required',
        ]);

        $form_data = array(
            'title'             => $request->title,
        );

        $category=Catagory::whereId($id)->update($form_data);
        return redirect('admincategory')->with('success', 'Data Added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Catagory::findOrFail($id);
        $data->delete();
        return redirect('admincategory')->with('success','Data is successfully deleted!');
    }
}
