<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function brand(Request $request)
    {

        $brand = new Brand();
        $brand->brand = $request->input('brand');
        $brand->save();
        return redirect('/admin');
    }
}
