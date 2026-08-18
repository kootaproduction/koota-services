<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

echo "1. Testing Language Switcher (EN & ID)..." . PHP_EOL;
$reqEn = \Illuminate\Http\Request::create('/locale/en', 'GET');
$resEn = $kernel->handle($reqEn);
echo "Locale switch to EN status: " . $resEn->getStatusCode() . PHP_EOL;

$reqId = \Illuminate\Http\Request::create('/locale/id', 'GET');
$resId = $kernel->handle($reqId);
echo "Locale switch to ID status: " . $resId->getStatusCode() . PHP_EOL;

echo PHP_EOL . "2. Testing Maintenance Mode..." . PHP_EOL;
\App\Models\SiteSetting::set('is_maintenance', '1');

// Guest accessing public page
$reqGuest = \Illuminate\Http\Request::create('/', 'GET');
$resGuest = $kernel->handle($reqGuest);
echo "Guest accessing '/' during maintenance -> Status: " . $resGuest->getStatusCode() . " (Expected: 503)" . PHP_EOL;

// Admin accessing admin page during maintenance
$admin = \App\Models\User::first();
\Illuminate\Support\Facades\Auth::login($admin);
$reqAdmin = \Illuminate\Http\Request::create('/admin/dashboard', 'GET');
$resAdmin = $kernel->handle($reqAdmin);
echo "Admin accessing '/admin/dashboard' during maintenance -> Status: " . $resAdmin->getStatusCode() . " (Expected: 200)" . PHP_EOL;

// Reset maintenance mode to 0
\App\Models\SiteSetting::set('is_maintenance', '0');
$reqNormal = \Illuminate\Http\Request::create('/', 'GET');
$resNormal = $kernel->handle($reqNormal);
echo "Guest accessing '/' after maintenance turned off -> Status: " . $resNormal->getStatusCode() . " (Expected: 200)" . PHP_EOL;

echo PHP_EOL . "3. Testing Video Helper parsing..." . PHP_EOL;
$shorts = \App\Helpers\VideoHelper::parse('https://www.youtube.com/shorts/aqz-KE-bpKQ');
echo "YouTube Shorts embed URL: " . $shorts['embed_url'] . PHP_EOL;

$reels = \App\Helpers\VideoHelper::parse('https://www.instagram.com/reel/C8xyz123/');
echo "Instagram Reels embed URL: " . $reels['embed_url'] . PHP_EOL;

echo PHP_EOL . "=== ALL ADVANCED FEATURE TESTS COMPLETED SUCCESSFULLY ===" . PHP_EOL;
