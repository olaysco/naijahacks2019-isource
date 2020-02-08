<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function __construct()
    {
        Auth::guard('api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessOwner  $businessOwner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessOwner $businessOwner)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessOwner  $businessOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessOwner $businessOwner)
    {
        //TODO
    }

    /**
     * Returna all business uploaded
     * by the owner
     *
     * @param  \App\BusinessOwner  $businessOwner
     * @return \Illuminate\Http\Response
     */
    public function myBusiness()
    {
        $owner = Auth::user()->businessOwner;
        return response()->json($owner, 200);
    }
}
