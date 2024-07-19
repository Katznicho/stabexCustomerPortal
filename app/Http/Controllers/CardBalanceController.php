<?php

namespace App\Http\Controllers;

use App\Models\CardBalance;
use Illuminate\Http\Request;

class CardBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        view("pages.reports.card_balances.index");
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
    public function show(CardBalance $cardBalance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardBalance $cardBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CardBalance $cardBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardBalance $cardBalance)
    {
        //
    }
}
