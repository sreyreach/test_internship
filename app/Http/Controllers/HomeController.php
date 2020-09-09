<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('post_job.new_post');
    }

    public function user(){
        $users = User::get();
        return view('\welcome',['users' => $users]);
    }
    
}
