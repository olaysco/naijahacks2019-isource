<?php

namespace App\Http\Controllers\Api;

use App\Business;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessStoreRequest;
use App\Traits\AjaxFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    use AjaxFile;

    /**
     * Folder to save
     * business related  files
     */
    protected $folder = 'business';

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store( BusinessStoreRequest $request)
    {
        $cover = $this->saveFile($request->cover, $this->folder);
        $business = new Business();
        $business->title = $request->title;
        $business->key_resources = $request->key_resources;
        $business->customer_segment = $request->customer_segment;
        $business->value_proposition = $request->value_proposition;
        $business->description = $request->description;
        $business->value = $request->value;
        $business->type = $request->type;
        $business->cover_url = $cover;
        $business->business_owner_id = Auth::user()->businessOwner->id;
        $business->save();

        return response()->json($business, 200);

    }
}
