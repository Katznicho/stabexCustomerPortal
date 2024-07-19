<?php

namespace App\Http\Controllers;

use App\Models\CardTransfer;
use Illuminate\Http\Request;

class CardTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("pages.card_manangement.card_transfers.index");
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
    public function show(CardTransfer $cardTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardTransfer $cardTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CardTransfer $cardTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardTransfer $cardTransfer)
    {
        //
    }
}
