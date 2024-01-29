<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::paginate(5);
        return view("categories.index", compact("categories"))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'name' => 'required',
            ]);
            $params = $request->except('_token');
            $categories = Categories::create($params);
            if ($categories->id) {
                return redirect()->route('categories.add')->with('success', 'Add categories successfully!');
            }
        }
        return view('categories.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
    {
        $categories = Categories::find($id);
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'name' => 'required',
            ]);
            $params = $request->except('_token');
            $result = $categories->update($params);
            if ($result) {
                return redirect()->route('categories.edit', ['id' => $id])->with('success', 'Edit categories successfully!');
            }
        }
        return view('categories.edit', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->back()->with('success', 'Delete categories successfully!');
    }
}
