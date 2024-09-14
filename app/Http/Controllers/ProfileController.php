<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|max:2048', // Image file validation
        ]);

        $user = Auth::user();
        $file = $request->file('profile_image');
        $fileData = file_get_contents($file->getRealPath());

        $user->profile_image = $fileData;
        $user->save();

        return back()->with('success', 'Profile image uploaded successfully!');
    }

    public function showImage()
    {
        $user = Auth::user();
        $image = $user->profile_image;

        if ($image) {
            return response($image)
                ->header('Content-Type', 'image/jpeg/jpg'); // เปลี่ยนเป็น MIME type ที่เหมาะสม
        } else {
            // ส่งค่าภาพพื้นฐานหากไม่มีภาพ
            return response()->json(['message' => 'No image found'], 404);
        }

    }
}