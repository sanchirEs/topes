<?php

use App\Http\Middleware\GoneForHackSpam;
use Illuminate\Http\Request;

// Copied from production logs on 2026-11-15. The SEO-spam loader planted in
// the 2026-10 hack served these, and Googlebot still crawls them by the
// thousand, getting the home page back with a 200.
dataset('hack spam urls', [
    'home with a view/item query' => '/?view/item/235836949',
    'index.php with a view/item query' => '/index.php?view/item/235836949',
    'product search .shtm page' => '/products-search-detail-C67200190111.shtm',
    'shop .phtml page' => '/shop/nigrum/bludgeon021087179733.phtml',
    'spam sitemap' => '/sitemap-detail-324.xml',
]);

dataset('real urls', [
    'home' => '/',
    'home from a Facebook share' => '/?fbclid=IwAR0abc123',
    'home from an ad campaign' => '/?utm_source=facebook&utm_medium=cpc',
    'shop page 2' => '/shop?page=2',
    'health check' => '/up',
]);

it('answers 410 Gone for spam URLs left by the hack', function (string $url) {
    $this->get($url)
        ->assertStatus(410)
        ->assertHeader('X-Robots-Tag', 'noindex');
})->with('hack spam urls');

it('answers spam URLs without starting a session', function () {
    $response = $this->get('/?view/item/235836949');

    expect($response->headers->getCookies())->toBeEmpty();
});

it('recognises the raw query string PHP passes in production', function () {
    // Test requests re-encode the query as "view%2Fitem%2F235836949=", while
    // `artisan serve` hands Laravel the raw "view/item/235836949".
    $request = Request::create('/');
    $request->server->set('QUERY_STRING', 'view/item/235836949');

    $response = (new GoneForHackSpam)->handle($request, fn () => response('home'));

    expect($response->getStatusCode())->toBe(410);
});

it('leaves real pages alone', function (string $url) {
    $this->get($url)->assertOk();
})->with('real urls');
