<?php

namespace App\Http\Controllers\CRUD;

use App\Models\Lists\ListGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.admin.groups.index', [
            'group_list' => ListGroup::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.admin.groups.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lists\ListGroup  $listGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ListGroup $listGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lists\ListGroup  $listGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ListGroup $listGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lists\ListGroup  $listGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListGroup $listGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lists\ListGroup  $listGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListGroup $listGroup)
    {
        //
    }
}
