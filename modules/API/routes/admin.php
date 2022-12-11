<?php

use Juzaweb\API\Http\Controllers\Documentation\SwaggerAssetController;
use Juzaweb\API\Http\Controllers\Documentation\SwaggerController;
use Juzaweb\API\Http\Middleware\SwaggerApiDocumentation;

Route::group(
    [
        'prefix' => 'api/documentation',
        'middleware' => SwaggerApiDocumentation::class,
    ],
    function () {
        Route::get('/', [SwaggerController::class, 'index']);
        Route::get('/asset/{asset}', [SwaggerAssetController::class, 'index'])
            ->name('l5-swagger.default.asset');
        Route::get('/oauth2-callback', [SwaggerController::class, 'oauth2Callback'])
            ->name('l5-swagger.default.oauth2_callback');
    }
);
