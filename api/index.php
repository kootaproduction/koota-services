<?php

/**
 * Vercel Serverless Function Entry Point for Laravel
 */

$tmpStorage = '/tmp/storage';

$requiredDirs = [
    $tmpStorage . '/framework/views',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/logs',
    '/tmp/bootstrap/cache',
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

putenv('APP_STORAGE_PATH=' . $tmpStorage);
putenv('VIEW_COMPILED_PATH=' . $tmpStorage . '/framework/views');

// If using SQLite on Vercel, copy database.sqlite to /tmp if not exists
$sqliteSource = __DIR__ . '/../database/database.sqlite';
$sqliteDest = '/tmp/database.sqlite';

if (file_exists($sqliteSource) && !file_exists($sqliteDest)) {
    @copy($sqliteSource, $sqliteDest);
}

// Forward request to Laravel standard front controller
require __DIR__ . '/../public/index.php';
