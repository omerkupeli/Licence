<?php

namespace App\Http\Controllers;

use App\Models\Columns;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColumnsRequest;
use App\Http\Requests\UpdateColumnsRequest;
use Illuminate\Http\Request;

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
        return view('createColumn');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreColumnsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'length' => 'required|integer',
        ]);

        $value = new Columns([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'length' => $request->input('length'),
        ]);

        $value->save();

        return redirect()->route('admin')->with('success', 'Veri başarıyla oluşturuldu.');
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
   

    public function deleteColumn($id){
        $column = Columns::find($id);
        $column->delete();
        return redirect()->back();
    }
}
