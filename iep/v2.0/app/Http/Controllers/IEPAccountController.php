<?php

namespace App\Http\Controllers;

use App\IEPAccount;
use Illuminate\Http\Request;

class IEPAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account', [
            'account_list' => IEPAccount::get()
        ]);
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
     * @param  \App\IEPAccount  $iEPAccount
     * @return \Illuminate\Http\Response
     */
    public function show(IEPAccount $iEPAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IEPAccount  $iEPAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(IEPAccount $iEPAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IEPAccount  $iEPAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IEPAccount $iEPAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IEPAccount  $iEPAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(IEPAccount $iEPAccount)
    {
        //
    }
}
