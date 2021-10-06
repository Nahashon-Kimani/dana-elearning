<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Scheme;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schemes = Scheme::where('created_by', '=', Auth::user()->id)->latest()->get();
        return view('lecturer.scheme.index', compact('schemes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::latest()->get();
        return view('lecturer.scheme.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'unit_id'=>'required',
            'desc'=>'required'
        ]);

        $scheme  = new Scheme();
        $scheme->unit_id = $request->unit_id;
        $scheme->slug = $request->unit_id;
        $scheme->desc = $request->desc;
        $scheme->created_by = Auth::user()->id;
        $scheme->save();

        return redirect()->route('lecturer.scheme.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scheme = Scheme::findOrFail($id);
        return view('lecturer.scheme.show', compact('scheme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheme = Scheme::findOrFail($id);
        $units = Unit::latest()->get();
        return view('lecturer.scheme.edit', compact('scheme', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'unit_id'=>'required',
            'desc'=>'required'
        ]);

        $scheme  = Scheme::findOrFail($id);
        $scheme->unit_id = $request->unit_id;
        $scheme->slug = $request->unit_id;
        $scheme->desc = $request->desc;
        $scheme->created_by = Auth::user()->id;
        $scheme->save();

        return redirect()->route('lecturer.scheme.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
