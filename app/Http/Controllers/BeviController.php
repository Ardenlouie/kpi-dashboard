<?php

namespace App\Http\Controllers;

use App\Models\Bevi;
use Illuminate\Http\Request;
use App\Models\Brand;

class BeviController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();

        return view('bevi.index')->with([
            'brands' => $brands
           
        ]);
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
    public function show(Bevi $bevi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bevi $bevi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bevi $bevi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bevi $bevi)
    {
        //
    }
}
