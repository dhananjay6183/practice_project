<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
// use DataTables;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            $categories = Category::all();
            // dd( $categories);

            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('category', function ($row) {
                    return $row->category;
                })
                ->addColumn('priority', function ($row) {
                    return $row->priority;
                })
                ->addColumn('description', function ($row) {
                    return $row->description;
                })
                ->addColumn('date', function ($row) {
                    return $row->date;
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route("admin.category.edit", $row->id);
                    $deleteUrl = route("admin.category.destroy", $row->id);
                    return '<a href="' . $editUrl . '" class="btn btn-primary">Edit</a>
            <form action="' . $deleteUrl . '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure you want to delete this?\');">
                ' . csrf_field() . '
                ' . method_field("DELETE") . '
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>';
                })
                ->rawColumns(['category', 'priority', 'description', 'date', 'action'])
                ->make(true);
        } 
        return view('admin.category.index');
    }


    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'date' => 'required',
            'priority_id' => 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('admin.category.index')
            ->with('success', 'Category created successfully.');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // dd($category);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'description' => 'required',
            'date' => 'required',
            'priority_id' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.category.index')
            ->with('success', 'Category updated successfully');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')
            ->with('delete', 'Category deleted successfully');
    }
}
