<?php

use Laracasts\Holodeck\Http\Controllers\DesignController;
use Laracasts\Holodeck\Http\Controllers\DocumentationController;
use Laracasts\Holodeck\Http\Controllers\ImageReplicatorController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->prefix('/holodeck')->name('holodeck.')->group(function () {
    Route::get('/design', [DesignController::class, 'vue'])->name('design');
    Route::get('/design/blade', [DesignController::class, 'blade'])->name('design.blade');

    Route::get('/docs/{path}', [DocumentationController::class, 'show'])->name('docs.show');
});

Route::middleware('api')->prefix('/api/holodeck')->name('api.holodeck.')->group(function () {
    Route::post('/image-replicator', [ImageReplicatorController::class, 'store'])->name('image-replicator.store');
    Route::delete('/image-replicator/{identifier}', [ImageReplicatorController::class, 'delete'])->name('image-replicator.delete');
});
