<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

app()->setLocale('en');

echo "=== VERIFYING ALL SERVICE DETAIL PAGES IN ENGLISH (EN) ===\n\n";

$serviceController = new App\Http\Controllers\ServiceController();

$services = [
    'cleaning-service' => [
        'Our Cleaning Service Solutions' => 'Sec 1 Title in EN',
        'General Cleaning' => 'Solution 1 in EN',
        'Deep Cleaning' => 'Solution 2 in EN',
        'Office Cleaning' => 'Solution 3 in EN',
        'Trusted by Hundreds of Clients Across Various Industries' => 'Sec 2 Title in EN',
        'View Our Project Highlights' => 'Video Title in EN',
    ],
    'pengangkutan-sampah' => [
        'Services Tailored to Your Needs' => 'Sec 1 Title in EN',
        'Scheduled Hauling' => 'Solution 1 in EN',
        'Commercial' => 'Solution 2 in EN',
        'Post-Renovation' => 'Solution 3 in EN',
        'On-Demand Hauling' => 'Solution 4 in EN',
        'Scheduled' => 'Tab 1 in EN',
    ],
    'jasa-tukang-perbaikan-dan-renovasi' => [
        'Our Handyman Solutions' => 'Sec 1 Title in EN',
        'Minor Repairs' => 'Solution 1 in EN',
        'Routine Maintenance' => 'Solution 2 in EN',
        'Room Renovation' => 'Solution 3 in EN',
    ],
    'ipal' => [
        'Our WWTP Solutions' => 'Sec 1 Title in EN',
        'Assembly & Installation' => 'Solution 1 in EN',
        'Routine Maintenance' => 'Solution 2 in EN',
        'Regulatory Consulting' => 'Solution 3 in EN',
        'Laboratory Testing' => 'Solution 4 in EN',
    ]
];

foreach ($services as $slug => $checks) {
    echo "--- Testing Service Detail: $slug ---\n";
    $view = $serviceController->show($slug);
    $content = html_entity_decode($view->render(), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
    foreach ($checks as $expected => $desc) {
        if (str_contains($content, $expected)) {
            echo " [OK] Found: $desc ('$expected')\n";
        } else {
            echo " [FAIL] Missing: $desc ('$expected')\n";
        }
    }
    echo "\n";
}

echo "=== ALL SERVICE DETAIL CHECKS FINISHED ===\n";
