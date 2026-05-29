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
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:50',
            'vat_number' => [
                'required',
                'string',
                'regex:/^(ATU\d{8}|BE[01]\d{9}|BG\d{9,10}|CY\d{8}[LX]|CZ\d{8,10}|DE\d{9}|DK\d{8}|EE\d{9}|EL\d{9}|ES[\dA-Z]\d{7}[\dA-Z]|FI\d{8}|FR[\dA-Z]{2}\d{9}|HR\d{11}|HU\d{8}|IE\d{7}[A-Z]{2}|IT\d{11}|LT(\d{9}|\d{12})|LU\d{8}|LV\d{11}|MT\d{8}|NL\d{9}B\d{2}|PL\d{10}|PT\d{9}|RO\d{2,10}|SE\d{12}|SI\d{8}|SK\d{10})$/i'
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/'
            ],
            'email' => 'required|unique:businesses,email|email:rfc,dns|max:255',
            'status' => 'required|in:active,inactive',
            'category_id' => 'required',
        ]);

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
