<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\Url;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

final class UrlCheckService
{
    public function check(Url $url): bool
    {
        try {
            $request = Http::get($url->name);

            $crawler = new Crawler($request->body());

            $h1 = $crawler->filter('h1')->text();

            $title = $crawler->filter('title')->text();

            $description = $crawler->filter('meta[name="description"]')->attr('content');

            $url->urlChecks()->create(['status' => $request->status(), 'h1' => $h1, 'title' => $title, 'description' => $description]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return true;
    }
}
