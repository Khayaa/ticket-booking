<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class eventsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){

        return view('admin.Events');
    }
}
