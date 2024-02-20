<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            $product = Product::all();
            return DataTables::of($product)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('detail', function ($row) {
                    return $row->detail;
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route("admin.product.edit", $row->id);
                    $viewUrl = route("admin.product.show", $row->id);
                    $deleteUrl = route("admin.product.delete", $row->id);
                    return '<a href="' . $editUrl . '" class="btn btn-info">Edit</a>
                    <a href="' . $viewUrl . '" class="btn btn-primary">view</a>
            <form action="' . $deleteUrl . '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure you want to delete this?\');">
                ' . csrf_field() . '
                ' . method_field("DELETE") . '
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>';
                })
                ->rawColumns(['name', 'detail', 'action'])
                ->make(true);
        }
        return view('admin.products.index');
    }
    public function create() {
        return view('admin.products.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('admin.product.index')
                         ->with('success', 'product created successfully.');
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('admin.products.view', compact('product'));
    }
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.product.index')
                         ->with('success', 'product updated successfully.');
    }
    public function destroy($id) {
        $product = Product::findOrfail($id);
        $product->delete();
        return redirect()->route('admin.product.index')
        ->with('delete', 'product deleted successfully');

    }
}
