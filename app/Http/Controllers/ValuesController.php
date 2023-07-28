<?php

namespace App\Http\Controllers;

use App\Models\Values;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreValuesRequest;
use App\Http\Requests\UpdateValuesRequest;
use Illuminate\Http\Request;
use App\Models\Columns;


class ValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = Values::all();

        return view('index', compact('values'));
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
     * @param  \App\Http\Requests\StoreValuesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'values' => 'required|array',
            'values.*' => 'required|string',
        ]);

        // Otomatik olarak atanacak rowNumber değeri
        $rowNumber = Values::max('rowNumber') + 1;

        foreach ($data['values'] as $column_id => $value) {
            Values::create([
                'rowNumber' => $rowNumber,
                'column_id' => $column_id,
                'value' => $value,
            ]);
        }

        return redirect()->route('values.index')->with('success', 'Value created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Values  $values
     * @return \Illuminate\Http\Response
     */
    public function show(Values $values)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Values  $values
     * @return \Illuminate\Http\Response
     */
    public function edit(Values $values)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateValuesRequest  $request
     * @param  \App\Models\Values  $values
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValuesRequest $request, Values $values)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Values  $values
     * @return \Illuminate\Http\Response
     */
    public function destroy(Values $values)
    {
        //
    }

    public function getValues()
    {
        $values = Values::all();
        $columns = Columns::all();

        return view('listdeneme', compact('values' , 'columns'));
    }
}
