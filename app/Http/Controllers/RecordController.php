<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $records
        ];
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'milk_quantity' => 'required',
            'farmer' => 'required',
        ]);

        $record = Record::create($request->all());
        return [
            "status" => 1,
            "data" => $record
        ];
    }

    public function show(Record $record)
    {
        return [
            "status" => 1,
            "data" =>$record
        ];
    }


    public function update(Request $request, Record $record)
    {
        $request->validate([
            'milk_quantity' => 'required',
            'farmer' => 'required',
        ]);

        $record->update($request->all());

        return [
            "status" => 1,
            "data" => $record,
            "msg" => "Record updated successfully"
        ];
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return [
            "status" => 1,
            "data" => $record,
            "msg" => "Record deleted successfully"
        ];
    }
}
