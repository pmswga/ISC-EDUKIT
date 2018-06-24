<?php

namespace App\Http\Controllers\CRUD\Lists;

use App\Models\Lists\ListEducationUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListEducationUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.admin.units.index', [
            'unit_list' => ListEducationUnit::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.admin.units.add', [
            'education_form_list' => ["Очная", "Очно-заочная", "Заочная"]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ListEducationUnit::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lists\ListEducationUnit  $listEducationUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ListEducationUnit $listEducationUnit)
    {
        return view('pages.unit', ['education_unit' => $listEducationUnit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lists\ListEducationUnit  $listEducationUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ListEducationUnit $listEducationUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lists\ListEducationUnit  $listEducationUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListEducationUnit $listEducationUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lists\ListEducationUnit  $listEducationUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListEducationUnit $listEducationUnit)
    {
        //
    }
}
