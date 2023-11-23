<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPhotoController extends Controller
{
    public function update_photo(Request $request)
    {

        $validatedData = $request->validate([
            'photo' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $user = auth()->user();
        
            if ($user && $user->photo) {
                Storage::delete('public/images/' . $user->photo);
            }
        
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $fileName);
            $user->update(['photo' => $fileName]);
        }
        
        return redirect()->to('/dashboard');
        

    }


}
