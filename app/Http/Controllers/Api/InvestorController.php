<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
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

        return response()->json([], 200);
    }


    public function single()
    {
        $user = User::where('id', Auth::user()->id)->with('investor')->first();
        return response()->json($user, 200);
    }
}
