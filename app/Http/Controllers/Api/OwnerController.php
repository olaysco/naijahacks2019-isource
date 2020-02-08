<?php

namespace App\Http\Controllers\Api;

use App\Business;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
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

    public function owner()
    {
        $owner = Auth::user()->owner;
        return $owner;
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
        $businesses = Business::where('business_owner_id', $this->owner()->id)->get();
        return response()->json($businesses, 200);
    }


    public function single()
    {
        $user = User::find(Auth::user()->id)->with('owner')->first();
        return response()->json($user, 200);
    }
}
