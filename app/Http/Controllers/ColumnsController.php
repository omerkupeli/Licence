<?php

namespace App\Http\Controllers;

use App\Models\Columns;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColumnsRequest;
use App\Http\Requests\UpdateColumnsRequest;

class ColumnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreColumnsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColumnsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Columns  $columns
     * @return \Illuminate\Http\Response
     */
    public function show(Columns $columns)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Columns  $columns
     * @return \Illuminate\Http\Response
     */
    public function edit(Columns $columns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColumnsRequest  $request
     * @param  \App\Models\Columns  $columns
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColumnsRequest $request, Columns $columns)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Columns  $columns
     * @return \Illuminate\Http\Response
     */
    public function destroy(Columns $columns)
    {
        //
    }
}
