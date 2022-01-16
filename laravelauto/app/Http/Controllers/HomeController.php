<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
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
        if (!Auth::check()) exit;

        $user_id = Auth::user()->id;

        function isAdmin($id)
        {
            $result = DB::table('users')->where('id', $id)->first();
            return $result->is_admin;
        }

        function noUseBrands()
        {
            $result_table = DB::table('brands')->select('brand')->get();
            $result_brand = DB::table('autos')->select('brand')->get();
            $arr_table = [];
            foreach ($result_table as $item) {
                $arr_table[] = $item->brand;
            }
            $arr_brand = [];
            foreach ($result_brand as $item) {
                $arr_brand[] = $item->brand;
            }
            return $res = array_diff($arr_table, $arr_brand);
        }

        $admin = isAdmin($user_id);

        if ($admin == 0) {
            $result['autos'] = DB::table('autos')->where('user_id', $user_id)->paginate(3);
            $result['brands'] = DB::table('brands')->get();
            $result['image'] = DB::table('images')->select('newname')->get();
            return view('home', ['result' => $result]);
        }

        $result['autos'] = DB::table('autos')->paginate(4);
        $result['users'] = DB::table('users')->get();
        $result['no_brands'] = noUseBrands();
        return view('admin', ['result' => $result]);
    }
}
