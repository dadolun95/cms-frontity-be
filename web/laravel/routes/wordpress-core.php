<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Wordpress\RestApiController;

Route::middleware('wordpress')->group(function () {
    $wordpressRestApiControllerExecute = [RestApiController::class, 'execute'];
    Route::get('/', $wordpressRestApiControllerExecute)->name('checkWpApi');
    Route::get('/posts', $wordpressRestApiControllerExecute)->name('WpPosts');
    Route::get('/posts/{id}/revisions', $wordpressRestApiControllerExecute)->name('WpPostRevisions');
    Route::get('/categories', $wordpressRestApiControllerExecute)->name('WpCategories');
    Route::get('/tags', $wordpressRestApiControllerExecute)->name('WpTags');
    Route::get('/pages', $wordpressRestApiControllerExecute)->name('WpPages');
    Route::get('/pages/{id}/revisions', $wordpressRestApiControllerExecute)->name('WpPageRevisions');
    Route::get('/comments', $wordpressRestApiControllerExecute)->name('WpComments');
    Route::get('/taxonomies', $wordpressRestApiControllerExecute)->name('WpTaxonomies');
    Route::get('/media', $wordpressRestApiControllerExecute)->name('WpMedia');
    Route::get('/users', $wordpressRestApiControllerExecute)->name('WpUsers');
    Route::get('/types', $wordpressRestApiControllerExecute)->name('WpPostTypes');
    Route::get('/statuses', $wordpressRestApiControllerExecute)->name('WpPostStatuses');
    Route::get('/settings', $wordpressRestApiControllerExecute)->name('WpSettingss');
    Route::get('/themes', $wordpressRestApiControllerExecute)->name('WpThemes');
    Route::get('/search', $wordpressRestApiControllerExecute)->name('WpSearch');
    Route::get('/block-types', $wordpressRestApiControllerExecute)->name('WpBlockTypes');
    Route::get('/blocks', $wordpressRestApiControllerExecute)->name('WpBlocks');
    Route::get('/blocks/{id}/autosaves', $wordpressRestApiControllerExecute)->name('WpBlockRevisions');
    Route::get('/block-renderer', $wordpressRestApiControllerExecute)->name('WpBlockRenderer');
    Route::get('/block-directory/search', $wordpressRestApiControllerExecute)->name('WpBlockDirectoryItems');
    Route::get('/plugins', $wordpressRestApiControllerExecute)->name('WpPlugins');
});
