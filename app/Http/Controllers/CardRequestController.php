<?php

namespace App\Http\Controllers;

use App\Models\CardRequest;
use Illuminate\Http\Request;

class CardRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("pages.card_manangement.card_requests.index");
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
    public function show(CardRequest $cardRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardRequest $cardRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CardRequest $cardRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardRequest $cardRequest)
    {
        //
    }
}
