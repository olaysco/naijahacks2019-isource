<?php

namespace App\Http\Controllers\Api;

use App\Business;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessStoreRequest;
use App\Traits\AjaxFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    use AjaxFile;

    /**
     * Folder to save
     * business related  files
     */
    protected $folder = 'business';

    public function __construct()
    {

    }

    public function index( Request $request )
    {
        return response()->json($this->allBusiness(), 200);
    }

    public function search( Request $request )
    {
        $location = ($request->location == "All")?'':$request->location;
        $sector = ($request->sector == "All")?'':$request->sector;
        $term = $request->term;
        $business = Business
                    ::where( 'title', 'LIKE', '%'.$term.'%' )
                    ->where( 'sector', 'LIKE', '%'.$sector.'%' )
                    ->where( 'location', 'LIKE', '%'.$location.'%' )
                    ->whereBetween( 'value', $request->value )
                    ->with('businessOwner')
                    ->get();
        return response()->json($business, 200);
    }

    public function allBusiness()
    {
        return Business::with('businessOwner')->get();
    }
}
