<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\urlProvider;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Refreshurlbase;
use PHPUnit\Framework\Attributes\DataProvider;

final class RoutesCheckTest extends TestCase
{
    use RefreshDatabase;
    private Url $url;

    public function setUp(): void
    {
        parent::setUp();

        $urlData = ['name' => 'https://jobpilot.tech/blog'];

        $this->url = Url::createOrFirst(
            [
                'name' => $urlData['name'],
            ],
            [
                'name' => $urlData['name'],
            ]
        );
    }


    #[DataProvider('basicPagesRoutesProvider')]
    public function test_url_common_pages_response_status($page, $data)
    {
        $response = $this->get(route($page, $data));
        $response->assertStatus(200);
    }

    #[DataProvider('basicDetailPagesRoutesProvider')]
    public function test_url_detail_pages_response_status($page)
    {
        $response = $this->get(route($page, $this->url));
        $response->assertStatus(200);
    }

    public static function basicPagesRoutesProvider(): array
    {
        return [
            'home' => ['urls.create', []],
            'urls' => ['urls.index', []],
        ];
    }

    public static function basicDetailPagesRoutesProvider(): array
    {
        return [
            'urls.show' => ['urls.show'],
        ];
    }

    public function test_url_store_response_status()
    {

        $this->post(route('urls.store'), ['url' => [
            'name' => 'https://example.com'
        ]])->assertStatus(302);

        $this->assertDatabaseHas('urls', ['name' => 'https://example.com']);
        $this->assertDatabaseCount('urls', 2);

        // $this->assertDatabaseCount('url_checks', 1);
        // $this->assertDatabaseHas('url_checks', ['url_id' => 2]);
    }
}
