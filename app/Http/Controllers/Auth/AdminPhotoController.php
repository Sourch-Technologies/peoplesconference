<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPhotoController extends Controller
{
    public function update_photo(Request $request)
    {

        if ($request->hasFile('image')) {
         
            $fileName = time() . $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->storeAs('images', $fileName, 'public');

            $request->user()->update(['photo' => $fileName]);

            return redirect()->to('/dashboard');

        }else{

            

        }

    }


}
