Route::get('/sections', [App\Http\Controllers\Admin\SectionController::class, 'sections'])->name('admin.sections');

                Route::get('/addsection', [App\Http\Controllers\Admin\SectionController::class, 'addsection'])->name('admin.addsection');
                Route::post('/addsection/store', [App\Http\Controllers\Admin\SectionController::class, 'storesection'])->name('admin.section.store');
                Route::get('/editsection/{id}', [App\Http\Controllers\Admin\SectionController::class, 'editsection'])->name('admin.editsection');
                Route::get('/showsection/{id}', [App\Http\Controllers\Admin\SectionController::class, 'showsection'])->name('admin.showsection');

                Route::post('/updatesection/update/{id}', [App\Http\Controllers\Admin\SectionController::class, 'updatesection'])->name('admin.section.update');
                Route::get('/section/remove/{id}', [App\Http\Controllers\Admin\SectionController::class, 'removesection'])->name('admin.section.remove');