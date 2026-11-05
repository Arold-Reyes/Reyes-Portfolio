<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/api/sendmail', [ContactController::class, 'sendMail'])->name('api.sendmail');

Route::get('/sitemap.xml', function () {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
        . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n"
        . '    <url>' . "\n"
        . '        <loc>' . e(url('/')) . '</loc>' . "\n"
        . '        <lastmod>' . now()->toAtomString() . '</lastmod>' . "\n"
        . '        <changefreq>monthly</changefreq>' . "\n"
        . '        <priority>1.0</priority>' . "\n"
        . '    </url>' . "\n"
        . '</urlset>' . "\n";

    return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
})->name('sitemap');

Route::get('/robots.txt', function () {
    $content = "User-agent: *\n"
        . "Allow: /\n"
        . "\n"
        . 'Sitemap: ' . url('/sitemap.xml') . "\n";

    return response($content, 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
})->name('robots');
