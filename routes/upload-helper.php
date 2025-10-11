<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// TEMPORARY ROUTE - DELETE AFTER UPLOADING IMAGES
Route::middleware('web')->group(function () {
    
    // Show upload form
    Route::get('/bulk-upload-images', function () {
        return view('bulk-upload');
    });
    
    // Handle bulk upload
    Route::post('/bulk-upload-images', function (Request $request) {
        $uploaded = [];
        $errors = [];
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                try {
                    $originalName = $file->getClientOriginalName();
                    $path = $file->store('public');
                    $uploaded[] = $originalName . ' → ' . $path;
                } catch (\Exception $e) {
                    $errors[] = $originalName . ' → Error: ' . $e->getMessage();
                }
            }
        }
        
        return response()->json([
            'uploaded' => count($uploaded),
            'errors' => count($errors),
            'files' => $uploaded,
            'error_details' => $errors
        ]);
    });
    
    // Handle ZIP upload and extraction
    Route::post('/bulk-upload-zip', function (Request $request) {
        if (!$request->hasFile('zip_file')) {
            return response()->json(['error' => 'No ZIP file uploaded'], 400);
        }
        
        $zipFile = $request->file('zip_file');
        $zipPath = $zipFile->storeAs('temp', 'images.zip');
        $extractPath = storage_path('app/public/extracted');
        
        // Create extraction directory
        if (!file_exists($extractPath)) {
            mkdir($extractPath, 0755, true);
        }
        
        $zip = new \ZipArchive;
        if ($zip->open(storage_path('app/' . $zipPath)) === TRUE) {
            $zip->extractTo($extractPath);
            $zip->close();
            
            // Clean up ZIP file
            Storage::delete($zipPath);
            
            return response()->json([
                'success' => true,
                'message' => 'ZIP extracted successfully',
                'location' => $extractPath
            ]);
        }
        
        return response()->json(['error' => 'Failed to extract ZIP'], 500);
    });
});

