<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() {
        return view('admin.brands.index');
    }
    public function create() {
        return view('admin.brands.create');
    }
    public function store() {
        return view('admin.brands.index')->with('succes', 'brand created successfully');
    }
}
