<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestJobControler extends Controller
{
    public function index()
    {
        $user = DB::table('users')->orderByDesc('updated_at')->get();
        return response()->json($user);
    }

    // public function show($id)
    // {
    //     $postcv = DB::table('users')
    //                 ->where('users.id','=',$id)
    //                 ->Join('postcv', 'users.id', '=', 'postcv.user_id')
    //                 ->select('users.first_name','users.last_name','postcv.title','postcv.updated_at','postcv.experience','users.phone_number','users.email')
    //                 ->get();

    //     return response()->json($postcv);
    // }

}
