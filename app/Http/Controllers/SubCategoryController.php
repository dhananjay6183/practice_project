<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subCategory = SubCategory::all();

            return DataTables::of($subCategory)
                ->addIndexColumn()
                ->addColumn('subcategory', function ($row) {
                    return $row->subcategory;
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
                    $editUrl = route("admin.subcategory.edit", $row->id);
                    $viewUrl = route("admin.subcategory.show", $row->id);
                    $deleteUrl = route("admin.subcategory.destroy", $row->id);
                    return '<a href="' . $editUrl . '" class="btn btn-primary">Edit</a>
                    <a href="' . $viewUrl . '" class="btn btn-info">view</a>
        <form action="' . $deleteUrl . '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure you want to delete this?\');">
            ' . csrf_field() . '
            ' . method_field("DELETE") . '
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>';
                })
                ->rawColumns(['subcategory', 'priority', 'description', 'date', 'action'])
                ->make(true);
        }
        return view('admin.subcategory.index');
    }
    public function create()
    {
        return view('admin.subcategory.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'subcategory' => 'required',
            'description' => 'required',
            'date' => 'required',
            'priority_id' => 'required'
        ]);
        SubCategory::create($request->all());
        return redirect()->route('admin.subcategory.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Request $request,  $id) {
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.subCategory.view', compact('subcategory'));
    }

    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subCategory'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'subcategory' => 'required',
            'description' => 'required',
            'date' => 'required',
            'priority_id' => 'required'
        ]);
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update($request->all());
        return redirect()->route('admin.subcategory.index')
            ->with('success', 'SubCategory updated successfully');
    }
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        return redirect()->route('admin.subcategory.index')
            ->with('delete', 'SubCategory deleted successfully');
    }
}
