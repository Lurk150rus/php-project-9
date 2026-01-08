<?php

namespace App\Http\Controllers;

use App\Http\Services\UrlCheckService;
use App\Models\Url;

class UrlCheckController extends Controller
{
    private UrlCheckService $service;
    public function __construct()
    {
        $this->service = new UrlCheckService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Url $url)
    {
        $urlChecks = $url->urlChecks()->paginate(30);
        return view('urls_check.index', compact('url', 'urlChecks'));
    }

    public function store(Url $url)
    {
        $this->service->check($url);
        return redirect()->route('urls.show', $url);
    }
}
