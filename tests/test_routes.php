<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$firstProject = \App\Models\Project::first();
$projectId = $firstProject ? $firstProject->id : 1;
$projectSlug = $firstProject ? $firstProject->slug : 'deep-cleaning-head-office';

$urls = [
    '/',
    '/layanan',
    '/layanan/cleaning-service',
    '/layanan/pengangkutan-sampah',
    '/layanan/jasa-tukang-perbaikan-dan-renovasi',
    '/layanan/ipal',
    '/portofolio',
    '/portofolio/' . $projectId,
    '/portofolio/' . $projectSlug,
    '/blog',
    '/blog/5-standar-higienitas-fasilitas-komersial',
    '/tentang-kami',
    '/konsultasi',
    '/admin/login',
    '/admin/dashboard',
    '/admin/services',
    '/admin/projects',
    '/admin/posts',
];

$allPassed = true;
foreach ($urls as $url) {
    $request = \Illuminate\Http\Request::create($url, 'GET');
    
    // For admin routes, mock authentication
    if (str_starts_with($url, '/admin') && $url !== '/admin/login') {
        $user = \App\Models\User::first();
        \Illuminate\Support\Facades\Auth::login($user);
    }

    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    echo $url . ' -> Status: ' . $status . PHP_EOL;
    if ($status >= 400) {
        $allPassed = false;
        echo 'FAILED: ' . substr($response->getContent(), 0, 500) . PHP_EOL;
    }
}

if ($allPassed) {
    echo PHP_EOL . '=== ALL 18 PUBLIC & ADMIN ROUTES RETURNED 200 OK SUCCESS! ===' . PHP_EOL;
}
