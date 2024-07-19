<?php

namespace App\Http\Controllers;

use App\Models\Lubricant;
use Illuminate\Http\Request;

class LubricantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("pages.products.lubricants.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lubricant $lubricant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lubricant $lubricant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lubricant $lubricant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lubricant $lubricant)
    {
        //
    }
}
