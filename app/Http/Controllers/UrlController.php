<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use App\Http\Services\UrlCheckService;
use App\Models\Url;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UrlController extends Controller
{
    private UrlCheckService $checkService;
    public function __construct()
    {
        $this->checkService = new UrlCheckService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Url::paginate(15);

        return view('urls.index', compact(['urls']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUrlRequest $request)
    {
        $urlData = $request['url'];

        DB::beginTransaction();

        try {
            $url = Url::create($urlData);
            $this->checkService->check($url);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());
        }


        return redirect()->route('urls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url): View
    {
        return view('urls.show', compact(['url']));
    }

    public function check(Url $url): RedirectResponse
    {
        $isSuccess = $this->checkService->check($url);
        $messageData = $isSuccess
            ? ['success', 'Страница успешно проверена!']
            : ['warning', 'Произошла ошибка при проверке. Попробуйте позднее'];
        return redirect()->route('urls.show', $url)->with($messageData[0], $messageData[1]);
    }
}
