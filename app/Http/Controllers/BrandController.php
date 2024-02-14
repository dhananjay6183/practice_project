<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            $brand = Brand::all();
            // dd($brand);
            return DataTables::of($brand)
            ->addIndexColumn()
            ->addColumn('brand_name', function ($row) {
                return $row->brand_name;
            })
            ->addColumn('description', function ($row) {
                return $row->description;
            })
            ->addColumn('price', function ($row) {
                return $row->price;
            })
            ->addColumn('action', function ($row) {
                $editUrl = route("admin.brand.edit", $row->id);
                $viewUrl = route("admin.brand.show", $row->id);
                $deleteUrl = route("admin.brand.delete", $row->id);
                return '<a href="' . $editUrl . '" class="btn btn-primary">Edit</a>
                <a href="' . $viewUrl . '" class="btn btn-info">view</a>
                <form action="' . $deleteUrl . '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure you want to delete this?\');">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>'; 
            })
            ->rawColumns(['brand_name', 'description', 'price', 'action'])
            ->make(true);
        }
        return view('admin.brands.index');
    }
    public function create() {
        return view('admin.brands.create');
    }
    public function store(Request $request) {

        $request->validate([
            'brand_name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        Brand::create($request->all());

        return redirect()->route('admin.brand.index')->with('success', 'brand created successfully');
    }
    
    public function show(Request $request,  $id) {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.view', compact('brand'));
    }

    public function edit(Request $request, $id) {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'brand_name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());

        return redirect()->route('admin.brand.index')->with('success', 'brand updated successfully');
    }
    public function destroy($id) {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.brand.index')->with('delete', 'brand delete successfully');
    }
}
