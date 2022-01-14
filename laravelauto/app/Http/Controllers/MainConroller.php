<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MainConroller extends Controller
{

    public function auto_check(Request $request) {
        $valid = $request->validate([
            'name' => 'required|min:4|max:100',
            'vin' => 'required|min:4|max:100',
            'color' => 'required|min:3|max:20',
        ]);

        $auto = new Auto();



        $auto->name = $request->input('name');
        $auto->vin = $request->input('vin');
        $auto->color = $request->input('color');
        $auto->user_id = Auth::user()->id;
        $auto->image = $request->file('image')->store('uploads', 'public');

        $auto->save();

        return redirect()->route('home');
    }
}
