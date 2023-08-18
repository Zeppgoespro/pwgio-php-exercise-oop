<?php

declare(strict_types=1);

session_start();

use App\App;
use App\Config;
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\FileUploader;
use App\Controllers\TransactionController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/upload', [FileUploader::class, 'uploader'])
    ->post('/upload', [FileUploader::class, 'upload_file'])
    ->get('/transactions', [TransactionController::class, 'render'])
    ->post('/transactions/clear', [TransactionController::class, 'clear_transactions']);

(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();