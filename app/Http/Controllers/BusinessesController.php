<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businesses;
use App\Models\Category;

class BusinessesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Businesses::all();
        return view('businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('businesses.create', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Businesses::create($request->all());
        return redirect()->route('businesses.index')
            ->with('success', 'Business created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $business = Businesses::findOrFail($id);
        $categories = Category::all();
        return view('businesses.show', compact('business', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $business = Businesses::findOrFail($id);
        $categories = Category::all();
        return view('businesses.edit', compact('business', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $business = Businesses::findOrFail($id);
        $business->update($request->all());
        return redirect()->route('businesses.index')
            ->with('success', 'Business updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $business = Businesses::findOrFail($id);
        $business->delete();
        return redirect()->route('businesses.index')
            ->with('success', 'Business deleted successfully.');
    }
}
