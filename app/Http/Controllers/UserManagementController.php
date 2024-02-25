<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserManagementController extends Controller
{
    public function index() {
        return view('admin.userManagement.index');
    }
    public function create() {

    }
    public function store(Request $request) {
        // dd($request->all());
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'dob' => 'required|date_format:Y-m-d',
                'image_path' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            if ($request->hasFile('image_path')) {
                $imagePath = $request->file('image_path')->store('/public/images');
    
                $userManagement = UserManagement::updateOrCreate([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
                    'dob' => $request->input('dob'),
                    'image_path' => $imagePath
                ]);            
                return Response()->json($userManagement);
            }
    }
}