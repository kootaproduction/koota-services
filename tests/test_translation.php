<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

app()->setLocale('en');

echo "=== VERIFYING TRANSLATION IN ENGLISH (EN) ===\n\n";

// 1. Test Home view
$homeController = new App\Http\Controllers\HomeController();
$viewHome = $homeController->index();
$contentHome = html_entity_decode($viewHome->render(), ENT_QUOTES | ENT_HTML5, 'UTF-8');

$checks = [
    'What is Koota Services?' => 'FAQ Question 1 in EN',
    'What services are offered by Koota Services?' => 'FAQ Question 2 in EN',
    'Which areas does Koota Services operate in?' => 'FAQ Question 3 in EN',
    'How do I consult or book Koota Services?' => 'FAQ Question 4 in EN',
    'Our Core Services' => 'Home Section Title in EN',
    'Let\'s Create a' => 'Commitment Title in EN',
    'Cleaner City' => 'Commitment Subtitle in EN',
    'Consult Now' => 'Header CTA in EN',
];

foreach ($checks as $expected => $desc) {
    if (str_contains($contentHome, $expected)) {
        echo " [OK] Found: $desc ('$expected')\n";
    } else {
        echo " [FAIL] Missing: $desc ('$expected')\n";
    }
}

// 2. Test Services Index
$serviceController = new App\Http\Controllers\ServiceController();
$viewServices = $serviceController->index();
$contentServices = html_entity_decode($viewServices->render(), ENT_QUOTES | ENT_HTML5, 'UTF-8');

$checksServices = [
    'Comprehensive Service Catalog' => 'Services Catalog Header in EN',
    'Service Workflow' => 'Workflow Section in EN',
    'Consultation & Assessment' => 'Workflow Step 1 in EN',
    'Field Survey' => 'Workflow Step 2 in EN',
];
foreach ($checksServices as $expected => $desc) {
    if (str_contains($contentServices, $expected)) {
        echo " [OK] Found: $desc ('$expected')\n";
    } else {
        echo " [FAIL] Missing: $desc ('$expected')\n";
    }
}

// 3. Test Portfolio Index
$portController = new App\Http\Controllers\PortfolioController();
$viewPort = $portController->index(new Illuminate\Http\Request());
$contentPort = html_entity_decode($viewPort->render(), ENT_QUOTES | ENT_HTML5, 'UTF-8');

$checksPort = [
    'Deep Cleaning & Full Sanitation for Corporate Head Office' => 'Project 1 Title in EN',
    'Integrated Waste Management & Hauling for Residential Township' => 'Project 2 Title in EN',
    'Modern Co-Working Space Renovation & Interior Fit-Out' => 'Project 3 Title in EN',
    'Integrated Clinic Wastewater Treatment System Installation' => 'Project 4 Title in EN',
    'View Complete Photo Catalog' => 'Portfolio Action in EN',
];
foreach ($checksPort as $expected => $desc) {
    if (str_contains($contentPort, $expected)) {
        echo " [OK] Found: $desc ('$expected')\n";
    } else {
        echo " [FAIL] Missing: $desc ('$expected')\n";
    }
}

// 4. Test Blog Index
$blogController = new App\Http\Controllers\BlogController();
$viewBlog = $blogController->index(new Illuminate\Http\Request());
$contentBlog = html_entity_decode($viewBlog->render(), ENT_QUOTES | ENT_HTML5, 'UTF-8');

$checksBlog = [
    '5 Mandatory Hygiene Standards for Modern Commercial and Office Facilities' => 'Blog Post 1 Title in EN',
    'Sorted Waste Management Solutions to Reduce Your Business Carbon Footprint' => 'Blog Post 2 Title in EN',
    'Building Preventive Maintenance Guide: Preventing Damage Before It\'s Too Late' => 'Blog Post 3 Title in EN',
    'Read More' => 'Blog Read More in EN',
];
foreach ($checksBlog as $expected => $desc) {
    if (str_contains($contentBlog, $expected)) {
        echo " [OK] Found: $desc ('$expected')\n";
    } else {
        echo " [FAIL] Missing: $desc ('$expected')\n";
    }
}

echo "\n=== ALL CHECKS FINISHED ===\n";
