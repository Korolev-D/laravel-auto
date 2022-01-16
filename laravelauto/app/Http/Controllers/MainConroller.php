<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Auto;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;

class MainConroller extends Controller {

    public function auto_check(Request $request) {
        //        $valid = $request->validate([
        //            'name' => 'required|min:4|max:100',
        //            'vin' => 'required|min:4|max:100',
        //            'color' => 'required|min:3|max:20',
        //        ]);

        //проверка на копию картинки в бд
        function getImage($request) {
            $imageRequest = $request->file('image')->getClientOriginalName();
            $imageFromDb = DB::table('images')->where('oldname', $imageRequest)->first();

            $image = new Image();
            if (!$imageFromDb) {
                $image->newname = $request->file('image')->store('uploads', 'public');
                $image->oldname = $imageRequest;
                $image->save();
                return $res = $image->newname;
            } else {
                 $image->newname = DB::table('images')->select('newname')->where('oldname', $imageRequest)->first();
                return $res = $image->newname->newname;
            }
        }

        $auto = new Auto();
        $auto->name = $request->input('name');
        $auto->brand = $request->brand;
        $auto->vin = $request->input('vin');
        $auto->color = $request->input('color');
        $auto->user_id = Auth::user()->id;
        $auto->image = getImage($request);
//        dd($auto->image);
        $auto->save();


        return redirect()->route('home');
    }
}
