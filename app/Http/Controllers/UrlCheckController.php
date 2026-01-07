<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\UrlCheck;
use Illuminate\Http\Request;

class UrlCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Url $url)
    {
        $urlChecks = $url->urlChecks()->paginate(30);
        return view('urls_check.index', compact('url','urlChecks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}
