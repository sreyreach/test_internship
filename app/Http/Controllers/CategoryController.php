<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->All());
        $request->validate([
            'title'             =>  'required',
        ]);

        $form_data = array(
            'title'             => $request->title,
        );

        $category=Catagory::create($form_data);
        return redirect('/add_category')->with('success', 'Data Added successfully!');
    }

    public function view(){
        $category = Catagory::get();
        return view('\post_job.new_post',compact('category'));
    }

    
}