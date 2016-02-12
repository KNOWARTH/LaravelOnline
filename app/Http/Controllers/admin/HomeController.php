<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	//Check Authentication.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Display Admin Dashboard page.
    public function index()
    {
        return view('admin.index');
    }
}
