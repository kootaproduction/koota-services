<?php

/**
 * Vercel Serverless Function Entry Point for Laravel
 */

ini_set('display_errors', '0');
error_reporting(E_ALL);

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

if (empty($_SERVER['REMOTE_ADDR'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '127.0.0.1';
}

$tmpStorage = '/tmp/storage';

$requiredDirs = [
    $tmpStorage . '/framework/views',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/logs',
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Redirect all Laravel writable directories & caches to /tmp
$envVars = [
    'APP_STORAGE_PATH' => $tmpStorage,
    'VIEW_COMPILED_PATH' => '/tmp',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'LOG_CHANNEL' => 'stderr',
    'CACHE_STORE' => 'array',
    'CACHE_DRIVER' => 'array',
    'SESSION_DRIVER' => 'cookie',
];

foreach ($envVars as $key => $val) {
    putenv("{$key}={$val}");
    $_ENV[$key] = $val;
    $_SERVER[$key] = $val;
}

// Set Application Key directly
$appKey = getenv('APP_KEY') ?: 'base64:6+IwAaI78Jnc1iTe3P/QumZDHR7WerPWW0owyNuhrv0=';
putenv('APP_KEY=' . $appKey);
$_ENV['APP_KEY'] = $appKey;
$_SERVER['APP_KEY'] = $appKey;

// Ensure SQLite uses writable /tmp directory on Vercel serverless
$sqliteSource = __DIR__ . '/../database/database.sqlite';
$sqliteDest = '/tmp/database.sqlite';

if (!file_exists($sqliteDest) || (file_exists($sqliteDest) && filesize($sqliteDest) < 1000)) {
    if (file_exists($sqliteSource) && filesize($sqliteSource) > 1000) {
        @copy($sqliteSource, $sqliteDest);
    } elseif (!file_exists($sqliteDest)) {
        @touch($sqliteDest);
    }
}

putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=' . $sqliteDest);
$_ENV['DB_CONNECTION'] = 'sqlite';
$_ENV['DB_DATABASE'] = $sqliteDest;
$_SERVER['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_DATABASE'] = $sqliteDest;

// Forward request to Laravel standard front controller
require __DIR__ . '/../public/index.php';
