<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            $user = Auth::user()->id;

        }
        $autos = DB::table('autos')->where('user_id', $user)->get();
        return view('home', ['autos' => $autos->all()]);

    }
}
