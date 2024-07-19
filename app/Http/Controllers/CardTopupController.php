<?php

namespace App\Http\Controllers;

use App\Models\CardTopup;
use Illuminate\Http\Request;

class CardTopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("pages.card_manangement.card_topups.index");
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
    public function show(CardTopup $cardTopup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardTopup $cardTopup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CardTopup $cardTopup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardTopup $cardTopup)
    {
        //
    }
}
